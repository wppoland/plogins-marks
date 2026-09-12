<?php

/**
 * The discount-percent badge must not load a product object per variation.
 *
 * getDiscountPercent() looped $product->get_children() and called
 * wc_get_product() on each one to read two numbers off it. That runs per badge
 * render, so a shop-loop page with twelve variable products of fifty variations
 * each built six hundred product objects before a shopper clicked anything.
 *
 * WooCommerce already keeps those two numbers in the cached variation price
 * array it builds to print the price range on the same card, so this harness
 * asserts two things at once: the percentage is still the biggest saving on
 * offer, and wc_get_product() is never called to find it.
 *
 * Run: php tests/discount-percent-check.php
 */

declare(strict_types=1);

/** @var int $marks_test_hydrations How many times wc_get_product() was called. */
$marks_test_hydrations = 0;

// phpcs:disable
function apply_filters(string $hook, $value, ...$args) { return $value; }
function add_action(string $hook, $callback, int $priority = 10, int $args = 1): void {}
function sanitize_key($key): string { return strtolower((string) $key); }

function wc_get_product($product = null)
{
    global $marks_test_hydrations;
    ++$marks_test_hydrations;

    return null;
}

class WC_Product
{
    /**
     * @param array<int, array{regular: string, sale: string}> $variations
     */
    public function __construct(
        private string $regular = '',
        private string $sale = '',
        private array $variations = [],
        private bool $onSale = false,
    ) {
    }

    public function get_id(): int { return 1; }
    public function get_regular_price($context = 'view') { return $this->regular; }
    public function get_sale_price($context = 'view') { return $this->sale; }
    public function is_on_sale($context = 'view'): bool { return $this->onSale; }
    public function is_type($type): bool { return 'simple' === $type; }
    public function get_date_created() { return null; }
    public function managing_stock(): bool { return false; }
    public function get_stock_quantity() { return null; }
    public function get_total_sales() { return 0; }
    public function get_shipping_class(): string { return ''; }
    public function is_in_stock(): bool { return true; }

    /** @return array<int, int> */
    public function get_children(): array
    {
        return array_keys($this->variations);
    }

    /** @return array<string, array<int, string>> */
    public function get_variation_prices(bool $forDisplay = false): array
    {
        $regular = [];
        $sale    = [];

        foreach ($this->variations as $id => $prices) {
            $regular[$id] = $prices['regular'];
            // WooCommerce writes the regular price into the sale slot when a
            // variation is not on sale. Mirror that, or the harness tests a
            // WooCommerce that does not exist.
            $sale[$id] = '' === $prices['sale'] ? $prices['regular'] : $prices['sale'];
        }

        return ['price' => $regular, 'regular_price' => $regular, 'sale_price' => $sale];
    }
}

class WC_Product_Variable extends WC_Product
{
    public function is_type($type): bool { return 'variable' === $type; }
}
// phpcs:enable

require __DIR__ . '/../lib/storefront-kit/Badge/Badge.php';
require __DIR__ . '/../lib/storefront-kit/Badge/BadgeEngine.php';

$engine = new \WPPoland\StorefrontKit\Badge\BadgeEngine(
    'badges',
    [],
    ['manual_text' => '_manual', 'manual_style' => '_style', 'secondary_text' => '_secondary'],
    static fn (): bool => true,
    static fn (): array => [
        // Only the badge under test, so the assertion reads one value.
        'show_manual_badge'           => false,
        'show_secondary_badge'        => false,
        'show_sale_badge'             => false,
        'show_new_badge'              => false,
        'show_low_stock_badge'        => false,
        'show_bestseller_badge'       => false,
        'show_free_shipping_badge'    => false,
        'show_out_of_stock_badge'     => false,
        'show_discount_percent_badge' => true,
    ],
    static fn (\WC_Product $product, string $key): string => '',
    static function (string $template, array $args): void {},
);

/**
 * @return array{0: string, 1: int} The badge text and the hydration count.
 */
function marks_test_badge(\WPPoland\StorefrontKit\Badge\BadgeEngine $engine, \WC_Product $product): array
{
    global $marks_test_hydrations;
    $marks_test_hydrations = 0;

    $badges = $engine->getBadges($product, 'loop');
    $text   = $badges === [] ? '' : $badges[0]->text;

    return [$text, $marks_test_hydrations];
}

$failures = [];

$cases = [
    'biggest saving across variations' => [
        new WC_Product_Variable('', '', [
            11 => ['regular' => '100.00', 'sale' => '90.00'],
            12 => ['regular' => '200.00', 'sale' => '100.00'],
            13 => ['regular' => '50.00', 'sale' => ''],
        ], true),
        '-50%',
    ],
    'no variation on sale, no badge' => [
        new WC_Product_Variable('', '', [
            11 => ['regular' => '100.00', 'sale' => ''],
            12 => ['regular' => '200.00', 'sale' => ''],
        ], true),
        '',
    ],
    'a simple product still works' => [
        new WC_Product('80.00', '60.00', [], true),
        '-25%',
    ],
];

foreach ($cases as $label => [$product, $expected]) {
    [$text, $hydrations] = marks_test_badge($engine, $product);

    if ($text !== $expected) {
        $failures[] = sprintf('%s: rendered %s, expected %s', $label, var_export($text, true), var_export($expected, true));
    }

    if (0 !== $hydrations) {
        $failures[] = sprintf('%s: loaded %d product object(s) to read prices, expected 0', $label, $hydrations);
    }
}

if ([] !== $failures) {
    fwrite(STDERR, "discount-percent-check: FAIL\n");
    foreach ($failures as $failure) {
        fwrite(STDERR, '  ' . $failure . "\n");
    }
    exit(1);
}

echo 'discount-percent-check: OK (' . count($cases) . " cases, no product object loaded per variation)\n";
