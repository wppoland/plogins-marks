<?php
/**
 * Elementor widget: Product Badges.
 *
 * A thin wrapper around the [marks_badges] shortcode so a product's badge group
 * can be placed with the Elementor editor. Kept deliberately minimal (renders
 * the shortcode) so a future migration to Elementor v4 atomic widgets is
 * localized to this class. Loaded only from the `elementor/widgets/register`
 * hook, so the `\Elementor\Widget_Base` base class is guaranteed to exist here.
 *
 * @package Marks\Elementor
 */

declare(strict_types=1);

namespace Marks\Elementor;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

defined('ABSPATH') || exit;

/**
 * Product Badges Elementor widget.
 */
final class MarksBadgesWidget extends Widget_Base
{
    /**
     * Widget machine name.
     */
    public function get_name(): string
    {
        return 'marks_badges';
    }

    /**
     * Widget label shown in the editor.
     */
    public function get_title(): string
    {
        return esc_html__('Product Badges', 'plogins-marks');
    }

    /**
     * Editor panel icon.
     */
    public function get_icon(): string
    {
        return 'eicon-flash';
    }

    /**
     * Editor panel categories.
     *
     * @return string[]
     */
    public function get_categories(): array
    {
        return ['woocommerce-elements', 'general'];
    }

    /**
     * Search keywords in the editor.
     *
     * @return string[]
     */
    public function get_keywords(): array
    {
        return ['marks', 'badge', 'badges', 'label', 'sale', 'new', 'woocommerce'];
    }

    /**
     * Register the editor controls.
     */
    protected function register_controls(): void
    {
        $this->start_controls_section(
            'content',
            ['label' => esc_html__('Product Badges', 'plogins-marks')]
        );

        $this->add_control(
            'product_id',
            [
                'label'       => esc_html__('Product ID', 'plogins-marks'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => 0,
                'min'         => 0,
                'description' => esc_html__('Leave 0 to use the current product on a product page.', 'plogins-marks'),
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render the widget on the front end and in the editor preview.
     */
    protected function render(): void
    {
        $settings   = $this->get_settings_for_display();
        $product_id = isset($settings['product_id']) ? absint($settings['product_id']) : 0;

        echo do_shortcode(sprintf('[marks_badges id="%d"]', $product_id));
    }
}
