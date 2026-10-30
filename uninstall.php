<?php
/**
 * Uninstall cleanup for Marks.
 *
 * Runs when the plugin is deleted from wp-admin. Removes the options Marks
 * creates. The per-product manual badge meta (_marks_manual_text /
 * _marks_manual_style) is intentionally left in place: it is user content that
 * may be shared with other tools and is cheap to leave. `marks_settings` also
 * holds an add-on's own settings, so it stays while that add-on is on disk;
 * whichever plugin is deleted last removes it.
 *
 * @package Marks
 */

declare(strict_types=1);

defined('WP_UNINSTALL_PLUGIN') || exit;

if (! function_exists('get_plugins')) {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

// Core's bulk delete runs every uninstall in one request, and the cached plugin
// list would still show an add-on whose files were deleted a moment earlier.
wp_cache_delete('plugins', 'plugins');

// Matched on the text domain, so a renamed add-on folder still counts.
$marks_addon_installed = in_array('plogins-sale-stock-badges-pro', array_column(get_plugins(), 'TextDomain'), true);

// A closure rather than a named function, so the file can be included more
// than once in a request without a redeclaration error.
$marks_uninstall_site = static function () use ($marks_addon_installed): void {
    if (! $marks_addon_installed) {
        delete_option('marks_settings');
    }
    delete_option('marks_db_version');
};

// Options are per site, so a network uninstall has to visit every site. The
// add-on check above is about the plugin folders, which are shared by the whole
// network, so it is read once.
if (is_multisite()) {
    foreach (get_sites(['fields' => 'ids', 'number' => 0]) as $marks_site_id) {
        switch_to_blog((int) $marks_site_id);
        $marks_uninstall_site();
        restore_current_blog();
    }
    unset($marks_site_id);
} else {
    $marks_uninstall_site();
}
unset($marks_uninstall_site);

// The PRO banner's dismissal is stored per user, so it belongs to the
// plugin rather than to the site content. User meta is global, not
// per-site, which is why this uses delete_metadata's \$delete_all rather
// than a loop over the users of one blog.
delete_metadata('user', 0, 'marks_pro_banner_dismissed', '', true);
