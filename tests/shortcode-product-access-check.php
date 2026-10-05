<?php

/**
 * [marks_badges id=N] must not resolve a product the viewer cannot open.
 *
 * resolveProduct() returned any product for an explicit ID, so a contributor
 * previewing a post could read the badges of a draft, private or password
 * protected product.
 *
 * Run: php tests/shortcode-product-access-check.php
 */

declare(strict_types=1);

// phpcs:disable
define('ABSPATH', __DIR__ . '/');
define('MARKS_DIR', dirname(__DIR__) . '/');

class WC_Product
{
    public function __construct(private string $status, private string $password = '') {}
    public function get_status() { return $this->status; }
    public function get_post_password() { return $this->password; }
}

$products = [
    1 => new WC_Product('publish'),
    2 => new WC_Product('draft'),
    3 => new WC_Product('private'),
    4 => new WC_Product('publish', 'secret'),
];
$canRead = false;

function wc_get_product($id) { global $products; return $products[$id] ?? false; }
function current_user_can($cap, $id) { global $canRead; return $canRead; }

require MARKS_DIR . 'src/Contract/HasHooks.php';
require MARKS_DIR . 'src/Service/MarksService.php';

$service = (new ReflectionClass(Marks\Service\MarksService::class))->newInstanceWithoutConstructor();
$resolve = new ReflectionMethod($service, 'resolveProduct');

$failures = [];
$expect   = [
    // [id, viewer can read, resolves]
    [1, false, true],
    [2, false, false],
    [3, false, false],
    [4, false, false],
    [2, true, true],
    [3, true, true],
    [4, true, true],
    [99, true, false],
];

foreach ($expect as [$id, $can, $resolves]) {
    $canRead = $can;
    $got     = $resolve->invoke($service, $id) !== null;

    if ($got !== $resolves) {
        $failures[] = "id $id, can read " . var_export($can, true) . ': expected ' . var_export($resolves, true);
    }
}

if ($failures !== []) {
    fwrite(STDERR, "FAIL\n - " . implode("\n - ", $failures) . "\n");
    exit(1);
}

echo "OK: explicit product IDs resolve only for published products or readers\n";
