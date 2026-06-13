<?php
/**
 * Default settings, merged under the option key `marks_settings`.
 *
 * The feature ships enabled with the common automatic badges on. The merchant
 * tunes which badges show, their labels and the low-stock threshold, and may
 * define a single manual badge (label + colour) from the Marks admin screen.
 *
 * @package Marks
 *
 * @return array<string, mixed>
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

return [
    'enabled' => true,

    // Where badges render.
    'show_on_single' => true,
    'show_on_loop'   => true,

    // Automatic badge toggles.
    'show_sale_badge'       => true,
    'show_new_badge'        => true,
    'show_low_stock_badge'  => true,
    'show_bestseller_badge' => true,

    // Automatic badge thresholds.
    'newness_days'         => 30,
    'low_stock_threshold'  => 3,
    'bestseller_threshold' => 25,

    // Manual badge (a single store-wide label/colour, opt-in per product via meta).
    'show_manual_badge'  => true,
    'manual_badge_text'  => '',
    'manual_badge_style' => 'accent',

    // Render hints consumed by the CSS-only template.
    'shape'             => 'pill',
    'uppercase'         => false,
    'max_badges_single' => 4,
    'max_badges_loop'   => 3,
];
