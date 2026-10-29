<?php

/**
 * Badge labels fill {stock} and {discount_percent} on the server, and a badge
 * whose token has no value is dropped instead of showing a blank or a zero.
 *
 * Run: php tests/badge-tokens-check.php
 */

declare(strict_types=1);

// phpcs:disable
function apply_filters(string $hook, $value, ...$args) { return $value; }
function add_action(string $hook, $callback, int $priority = 10, int $args = 1): void {}
function sanitize_key($key): string { return strtolower((string) $key); }

class WC_Product
{
    /**
     * @param array<int, array{regular: string, sale: string}> $variations
     */
    public function __construct(
        public string $label = '',
        private ?int $stock = null,
        private string $regular = '',
        private string $sale = '',
        private array $variations = [],
    ) {
    }

    public function managing_stock(): bool { return $this->stock !== null; }
    public function get_stock_quantity() { return $this->stock; }
    public function get_regular_price($context = 'view') { return $this->regular; }
    public function get_sale_price($context = 'view') { return $this->sale; }

    /** @return array<string, array<int, string>> */
    public function get_variation_prices(bool $forDisplay = false): array
    {
        $regular = [];
        $sale    = [];

        foreach ($this->variations as $id => $prices) {
            $regular[$id] = $prices['regular'];
            $sale[$id]    = '' === $prices['sale'] ? $prices['regular'] : $prices['sale'];
        }

        return ['price' => $regular, 'regular_price' => $regular, 'sale_price' => $sale];
    }
}

class WC_Product_Variable extends WC_Product
{
}
// phpcs:enable

require __DIR__ . '/../lib/storefront-kit/Badge/Badge.php';
require __DIR__ . '/../lib/storefront-kit/Badge/BadgeEngine.php';

// Only the manual badge, its label read from the product, so each case renders one label.
$engine = new \Marks\Vendor\StorefrontKit\Badge\BadgeEngine(
    'badges',
    [],
    ['manual_text' => '_manual', 'manual_style' => '_style', 'secondary_text' => '_secondary'],
    static fn (): bool => true,
    static fn (): array => [
        'show_manual_badge'           => true,
        'show_secondary_badge'        => false,
        'show_sale_badge'             => false,
        'show_new_badge'              => false,
        'show_low_stock_badge'        => false,
        'show_bestseller_badge'       => false,
        'show_free_shipping_badge'    => false,
        'show_out_of_stock_badge'     => false,
        'show_discount_percent_badge' => false,
    ],
    static fn (\WC_Product $product, string $key): string => $key === '_manual' ? $product->label : '',
    static function (string $template, array $args): void {},
);

$variable = new WC_Product_Variable('-{discount_percent}%', null, '', '', [
    1 => ['regular' => '100', 'sale' => '90'],
    2 => ['regular' => '200', 'sale' => '100'],
    3 => ['regular' => '50', 'sale' => ''],
]);

$cases = [
    'stock filled'                   => [new WC_Product('Only {stock} left', 3), 'Only 3 left'],
    'stock not managed hides'        => [new WC_Product('Only {stock} left'), null],
    'no stock left hides'            => [new WC_Product('Only {stock} left', 0), null],
    'discount rounded'               => [new WC_Product('Save {discount_percent}%', null, '30', '20'), 'Save 33%'],
    'no discount hides'              => [new WC_Product('Save {discount_percent}%', null, '30', ''), null],
    'variable takes biggest saving'  => [$variable, '-50%'],
    'both tokens'                    => [new WC_Product('{stock} at -{discount_percent}%', 7, '10', '5'), '7 at -50%'],
    'plain label untouched'          => [new WC_Product('Editor {pick}', 2), 'Editor {pick}'],
];

$failures = [];

foreach ($cases as $label => [$product, $expected]) {
    $badges = $engine->getBadges($product, 'loop');
    $text   = $badges === [] ? null : $badges[0]->text;

    if ($text !== $expected) {
        $failures[] = sprintf('%s: rendered %s, expected %s', $label, var_export($text, true), var_export($expected, true));
    }
}

if ([] !== $failures) {
    fwrite(STDERR, "badge-tokens-check: FAIL\n");
    foreach ($failures as $failure) {
        fwrite(STDERR, '  ' . $failure . "\n");
    }
    exit(1);
}

echo 'badge-tokens-check: OK (' . count($cases) . " cases)\n";
