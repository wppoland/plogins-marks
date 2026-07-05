<?php
/**
 * Service wiring. Returns a closure that registers every service in the
 * container.
 *
 * @package Marks
 */

declare(strict_types=1);

use Marks\Admin\Settings;
use Marks\Container;
use Marks\Migrator;
use Marks\Service\ElementorWidgets;
use Marks\Service\MarksService;

defined('ABSPATH') || exit;

return static function (Container $c): void {
    $c->singleton(Migrator::class, static fn (): Migrator => new Migrator());

    $c->singleton(MarksService::class, static fn (): MarksService => new MarksService());

    // Elementor integration (self-guards on the elementor/widgets/register hook).
    $c->singleton(ElementorWidgets::class, static fn (): ElementorWidgets => new ElementorWidgets());

    // Admin (only needed in wp-admin context).
    if (is_admin()) {
        $c->singleton(Settings::class, static fn (): Settings => new Settings());
    }
};
