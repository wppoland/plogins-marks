<?php

/**
 * The badge template must receive the render context it is given.
 *
 * renderTemplate() took its variables as `$context`, so extract(EXTR_SKIP)
 * refused to overwrite it and the template saw the whole array. Every badge
 * group then rendered as `marks-badges--single`, in the shop loop as well.
 *
 * Run: php tests/badge-context-check.php
 */

declare(strict_types=1);

// phpcs:disable
define('ABSPATH', __DIR__ . '/');
define('MARKS_DIR', dirname(__DIR__) . '/');

function esc_attr($text) { return htmlspecialchars((string) $text, ENT_QUOTES); }
function esc_html($text) { return htmlspecialchars((string) $text, ENT_QUOTES); }
function esc_url($url) { return htmlspecialchars((string) $url, ENT_QUOTES); }
function sanitize_html_class($class) { return preg_replace('/[^A-Za-z0-9_-]/', '', (string) $class); }

require MARKS_DIR . 'lib/storefront-kit/Badge/Badge.php';
require MARKS_DIR . 'src/Contract/HasHooks.php';
require MARKS_DIR . 'src/Service/MarksService.php';

$service = (new ReflectionClass(Marks\Service\MarksService::class))->newInstanceWithoutConstructor();
$render  = new ReflectionMethod($service, 'renderTemplate');

$failures = [];

foreach (['loop', 'single'] as $context) {
    ob_start();
    $render->invoke($service, 'badges', [
        'badges'    => [new WPPoland\StorefrontKit\Badge\Badge('Sale', 'warning')],
        'context'   => $context,
        'product'   => null,
        'shape'     => 'pill',
        'uppercase' => false,
    ]);
    $html = (string) ob_get_clean();

    if (! str_contains($html, 'marks-badges--' . $context)) {
        $failures[] = "context '$context' rendered as: " . trim(strtok($html, "\n") ?: '(nothing)');
    }
}

if ($failures !== []) {
    fwrite(STDERR, "FAIL\n - " . implode("\n - ", $failures) . "\n");
    exit(1);
}

echo "OK: loop and single badge groups carry their own context\n";
