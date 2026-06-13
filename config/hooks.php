<?php
/**
 * Boot order: services listed here are resolved from the container and have
 * their registerHooks() called during Plugin::boot(). Each must implement
 * Marks\Contract\HasHooks.
 *
 * @package Marks
 *
 * @return array<class-string>
 */

declare(strict_types=1);

use Marks\Admin\Settings;
use Marks\Service\MarksService;

defined('ABSPATH') || exit;

$hooks = [
    MarksService::class,
];

if (is_admin()) {
    $hooks[] = Settings::class;
}

return $hooks;
