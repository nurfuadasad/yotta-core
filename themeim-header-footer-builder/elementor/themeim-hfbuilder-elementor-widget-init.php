<?php

/**
 * Elementor Themeim Header & Footer Elementor Widget Init
 * @package yotta
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); // exit if access directly
}
if (!class_exists('Themeim_Header_Footer_Builder_Elementor_Widget_Init')) {
    class Themeim_Header_Footer_Builder_Elementor_Widget_Init
    {

        /**
         * $instance
         * @since 1.0.0
         */
        private static $instance;

        /**
         * getInstance()
         * @since 1.0.0
         */
        public static function getInstance()
        {
            if (null == self::$instance) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        /**
         * construct()
         * @since 1.0.0
         */
        public function __construct()
        {
            add_action('elementor/elements/categories_registered', array($this, '_widget_categories'));
            //elementor widget registered
            add_action('elementor/widgets/widgets_registered', array($this, '_widget_registered'));
        }

        /**
         * _widget_categories()
         * @since 1.0.0
         */
        public function _widget_categories( $elements_manager ) {
            $elements_manager->add_category(
                'themeim_hfbuilder_elementor_widget',
                [
                    'title' => esc_html__('Themeim Elementor Widgets', 'themeim-hfbuilder'),
                    'icon' => 'dashicons-flag',
                ]
            );
        }


        /**
         * _widget_registered()
         * @since 1.0.0
         */

        public function _widget_registered()
        {
            if (!class_exists('Elementor\Widget_Base')) {
                return;
            }
            $elementor_widgets = [
                'navbar-style-one'
            ];

            $elementor_widgets = apply_filters('themeim_hfbuilder_elementor_widget', $elementor_widgets);
            ksort($elementor_widgets);
            if (is_array($elementor_widgets) && !empty($elementor_widgets)) {
                foreach ($elementor_widgets as $widget) {
                    if (file_exists(THEMEIM_HEADER_FOOTER_ELEMENTOR . '/addons/themeim-elementor-' . $widget . '-widget.php')) {
                        require_once THEMEIM_HEADER_FOOTER_ELEMENTOR . '/addons/themeim-elementor-' . $widget . '-widget.php';
                    }
                }
            }
        }


    } //End Class

    if (class_exists('Themeim_Header_Footer_Builder_Elementor_Widget_Init')) {
        Themeim_Header_Footer_Builder_Elementor_Widget_Init::getInstance();
    }
}