<?php
/**
 * Uninstall cleanup for Marks.
 *
 * Runs when the plugin is deleted from wp-admin. Removes the options Marks
 * creates. The per-product manual badge meta (_marks_manual_text /
 * _marks_manual_style) is intentionally left in place: it is user content that
 * may be shared with other tools and is cheap to leave.
 *
 * @package Marks
 */

declare(strict_types=1);

defined('WP_UNINSTALL_PLUGIN') || exit;

/**
 * Remove this plugin's options from the current site.
 */
function marks_uninstall_site(): void
{
    delete_option('marks_settings');
    delete_option('marks_db_version');
}

// Options are per site, so a network uninstall has to visit every site.
if (is_multisite()) {
    foreach (get_sites(['fields' => 'ids', 'number' => 0]) as $marks_site_id) {
        switch_to_blog((int) $marks_site_id);
        marks_uninstall_site();
        restore_current_blog();
    }
    unset($marks_site_id);
} else {
    marks_uninstall_site();
}

// The PRO banner's dismissal is stored per user, so it belongs to the
// plugin rather than to the site content. User meta is global, not
// per-site, which is why this uses delete_metadata's \$delete_all rather
// than a loop over the users of one blog.
delete_metadata('user', 0, 'marks_pro_banner_dismissed', '', true);
