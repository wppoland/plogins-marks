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

delete_option('marks_settings');
delete_option('marks_db_version');

// The PRO banner's dismissal is stored per user, so it belongs to the
// plugin rather than to the site content. User meta is global, not
// per-site, which is why this uses delete_metadata's \$delete_all rather
// than a loop over the users of one blog.
delete_metadata('user', 0, 'marks_pro_banner_dismissed', '', true);
