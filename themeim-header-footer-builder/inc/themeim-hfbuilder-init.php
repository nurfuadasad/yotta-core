<?php
/**
 * Themeim Header & Footer Builder Init
 * @package Themeim Header & Footer Builder
 * @since 1.0.0
 */
if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}
if (!class_exists('Themeim_Header_Footer_Builder_Init')) {
    class Themeim_Header_Footer_Builder_Init
    {


        /**
         * $instance
         * @since 1.0.0
         */
        protected static $instance;

        public function __construct()
        {
            //Load plugin assets
            add_action('wp_enqueue_scripts', array($this, 'plugin_assets'));
            //load plugin text domain
            add_action('init', array($this, 'load_textdomain'));
            //add custom icon to codester framework
            add_filter('csf_field_icon_add_icons', array($this, 'csf_custom_icon'));
            //load plugin dependency files()
            add_action('plugin_loaded', array($this, 'load_plugin_dependency_files'));
        }

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
         * Load Plugin Text domain
         * @since 1.0.0
         */

        public function load_textdomain()
        {
            load_plugin_textdomain('themeim-hfbuilder', false, THEMEIM_HEADER_FOOTER_ROOT_PATH . '/language');
        }

        /**
         * Load plugin dependency files()
         * @since 1.0.0
         */
        public function load_plugin_dependency_files()
        {
            $includes_files = array(
                [
                    'file-name' => 'themeim-hfbuilder-menu-page',
                    'folder-name' => THEMEIM_HEADER_FOOTER_ADMIN
                ],
                [
                    'file-name' => 'themeim-hfbuilder-custom-post-type',
                    'folder-name' => THEMEIM_HEADER_FOOTER_ADMIN
                ],
                [
                    'file-name' => 'themeim-hfbuilder-common',
                    'folder-name' => THEMEIM_HEADER_FOOTER_ADMIN
                ],
                [
                    'file-name' => 'themeim-hfbuilder-elementor-widget-init',
                    'folder-name' => THEMEIM_HEADER_FOOTER_ELEMENTOR
                ],
                [
                    'file-name' => 'themeim-hfbuilder-elementor-icon-manager',

                    'folder-name' => THEMEIM_HEADER_FOOTER_INC
                ],
                [
                    'file-name' => 'themeim-hfbuilder-megamenu-walker',
                    'folder-name' => THEMEIM_HEADER_FOOTER_INC
                ],
                [
                    'file-name' => 'init',
                    'folder-name' => THEMEIM_HEADER_FOOTER_TEMPLATE
                ],
            );
            if (is_array($includes_files) && !empty($includes_files)) {
                foreach ($includes_files as $file) {
                    if (file_exists($file['folder-name'] . '/' . $file['file-name'] . '.php')) {
                        require_once $file['folder-name'] . '/' . $file['file-name'] . '.php';
                    }
                }
            }
        }

        /**
         * Admin assets
         * @since 1.0.0
         */

        public function plugin_assets()
        {
            self::load_plugin_css_files();
            self::load_plugin_js_files();
        }


        /**
         * Load plugin css files()
         * @since 1.0.0
         */
        public function load_plugin_css_files()
        {
            $plugin_version = THEMEIM_HEADER_FOOTER_VERSION;
            $all_css_files = [
                [
                    'handle' => 'themeim-hfbuilder-main-style',
                    'src' => THEMEIM_HEADER_FOOTER_CSS . '/themeim-hfbuilder-main-style.css',
                    'deps' => [],
                    'ver' => $plugin_version,
                    'media' => 'all'
                ]
            ];
            $all_css_files = apply_filters('themeim_hfbuilder_css', $all_css_files);
            if (is_array($all_css_files) && !empty($all_css_files)) {
                foreach ($all_css_files as $css) {
                    call_user_func_array('wp_enqueue_style', $css);
                }
            }
        }

        /**
         * Load plugin js
         * @since 1.0.0
         */
        public function load_plugin_js_files()
        {
            $plugin_version = THEMEIM_HEADER_FOOTER_VERSION;
            $all_js_files = [
                [
                    'handle' => 'themeim-hfbuilder-main-js',
                    'src' => THEMEIM_HEADER_FOOTER_JS . '/themeim-hfbuilder-main.js',
                    'deps' => [],
                    'ver' => $plugin_version,
                    'media' => 'all'
                ]
            ];
            $all_js_files = apply_filters('themeim_hfbuilder_frontend_script_enqueue', $all_js_files);
            if (is_array($all_js_files) && !empty($all_js_files)) {
                foreach ($all_js_files as $js) {
                    call_user_func_array('wp_enqueue_script', $js);
                }
            }
        }


    }//End Class
    if (class_exists('Themeim_Header_Footer_Builder_Init')) {
        Themeim_Header_Footer_Builder_Init::getInstance();
    }
}