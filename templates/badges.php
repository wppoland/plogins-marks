<?php
/**
 * CSS-only product badge group rendered on the storefront. No JavaScript, no
 * layout shift.
 *
 * @package Marks
 *
 * @var list<\Marks\Vendor\StorefrontKit\Badge\Badge> $badges
 * @var string $context  Render context: `single` or `loop`.
 * @var string $shape    Badge shape hint: `pill` or `square`.
 * @var bool   $uppercase Whether labels render uppercase.
 * @var string $corner   `start` (top left in LTR) or `end` (top right in LTR).
 * @var string $ink      Inline custom properties for a brand ink, or ''.
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound -- Variables are local to the template include scope, not true globals.

if (empty($badges) || ! is_array($badges)) {
    return;
}

$shape     = isset($shape) && $shape === 'square' ? 'square' : 'pill';
$context   = isset($context) && $context === 'loop' ? 'loop' : 'single';
$uppercase = ! empty($uppercase);
$ink       = isset($ink) && is_string($ink) ? $ink : '';

$groupClasses = sprintf(
    'marks-badges marks-badges--%s marks-badges--%s%s%s',
    sanitize_html_class($context),
    sanitize_html_class($shape),
    $uppercase ? ' marks-badges--upper' : '',
    isset($corner) && $corner === 'end' ? ' marks-badges--end' : '',
);
?>
<div class="<?php echo esc_attr($groupClasses); ?>"<?php if ($ink !== '') : ?> style="<?php echo esc_attr($ink); ?>"<?php endif; ?>>
    <?php foreach ($badges as $badge) : ?>
        <?php if ( strpos( $badge->style, 'image' ) === 0 ) : ?>
            <span class="marks-badge marks-badge--image">
                <img src="<?php echo esc_url($badge->text); ?>" alt="" width="48" height="24" loading="lazy" decoding="async" />
            </span>
        <?php else : ?>
            <span class="marks-badge marks-badge--<?php echo esc_attr(sanitize_html_class($badge->style)); ?>">
                <?php echo esc_html($badge->text); ?>
            </span>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
