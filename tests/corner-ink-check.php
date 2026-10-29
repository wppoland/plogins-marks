<?php

/**
 * Corner, brand ink and Product Collection placement (1.1.0).
 *
 * - corner `end` adds marks-badges--end, `start` adds nothing,
 * - a custom ink lands inline as --marks-ink, the packaged ink does not,
 * - the label text on the ink is whichever of white and near-black contrasts more,
 * - a product-image block the classic hook stamps (or already stamped) is left alone.
 *
 * Run: php tests/corner-ink-check.php
 */

declare(strict_types=1);

// phpcs:disable
define('ABSPATH', __DIR__ . '/');
define('MARKS_DIR', dirname(__DIR__) . '/');

$GLOBALS['marks_test_option'] = [];

function get_option($name, $default = false) { return $GLOBALS['marks_test_option']; }
function esc_attr($text) { return htmlspecialchars((string) $text, ENT_QUOTES); }
function esc_html($text) { return htmlspecialchars((string) $text, ENT_QUOTES); }
function esc_url($url) { return htmlspecialchars((string) $url, ENT_QUOTES); }
function is_product() { return false; }
function wc_get_product($id) { $GLOBALS['marks_test_loaded'][] = $id; return null; }
class WP_Block { public array $context = ['postId' => 5]; }
function sanitize_html_class($class) { return preg_replace('/[^A-Za-z0-9_-]/', '', (string) $class); }

require MARKS_DIR . 'lib/storefront-kit/Badge/Badge.php';
require MARKS_DIR . 'lib/storefront-kit/Badge/BadgeEngine.php';
require MARKS_DIR . 'src/Contract/HasHooks.php';
require MARKS_DIR . 'src/Service/MarksService.php';

use Marks\Service\MarksService;

$failures = [];
$check = static function (bool $ok, string $what) use (&$failures): void {
    if (! $ok) {
        $failures[] = $what;
    }
};

$service = (new ReflectionClass(MarksService::class))->newInstanceWithoutConstructor();
$render  = new ReflectionMethod($service, 'renderTemplate');
$group   = static function (array $option) use ($service, $render): string {
    $GLOBALS['marks_test_option'] = $option;
    ob_start();
    $render->invoke($service, 'badges', [
        'badges'  => [new Marks\Vendor\StorefrontKit\Badge\Badge('Bestseller', 'accent')],
        'context' => 'loop',
    ]);

    return (string) strtok((string) ob_get_clean(), "\n");
};

$default = $group([]);
$check(! str_contains($default, 'marks-badges--end') && ! str_contains($default, 'style='), "defaults render as before: $default");

$custom = $group(['corner' => 'end', 'ink_color' => '#ffd700']);
$check(str_contains($custom, 'marks-badges--end'), "corner end: $custom");
$check(str_contains($custom, '--marks-ink:#ffd700;--marks-ink-fg:#1d2327;'), "light ink gets dark text: $custom");

$check(MarksService::inkVars('#c52d1a') === '', 'packaged ink adds nothing inline');
$check(MarksService::inkVars('#1e3a8a') === '--marks-ink:#1e3a8a;--marks-ink-fg:#fff;', 'dark ink gets white text');
$check(MarksService::inkVars('red;}x{') === '', 'non-hex ink is ignored');

// The engine is required before the block filter does anything; give it one.
$engine = new ReflectionProperty($service, 'engine');
$engine->setValue($service, (new ReflectionClass(Marks\Vendor\StorefrontKit\Badge\BadgeEngine::class))->newInstanceWithoutConstructor());
$stamped = '<div class="wc-block-components-product-image"><div class="marks-badges marks-badges--loop"></div><img></div>';
$GLOBALS['marks_test_loaded'] = [];
$service->prependLoopBadges($stamped, [], new WP_Block());
$check($GLOBALS['marks_test_loaded'] === [], 'an already stamped card is left alone');
$service->prependLoopBadges('<div><img></div>', ['attrs' => ['isInherited' => 1]], new WP_Block());
$check($GLOBALS['marks_test_loaded'] === [], 'a card the archive compatibility layer stamps is left to the classic hook');
$service->prependLoopBadges('<div><img></div>', [], new WP_Block());
$check($GLOBALS['marks_test_loaded'] === [5], 'an unstamped card resolves its product from the block context');

if ($failures !== []) {
    fwrite(STDERR, "FAIL\n - " . implode("\n - ", $failures) . "\n");
    exit(1);
}

echo "OK: corner, ink and Product Collection placement\n";
