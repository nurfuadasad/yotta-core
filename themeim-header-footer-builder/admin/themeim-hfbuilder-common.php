<?php
/**
 * Themeim Header & Footer Builder Common
 * @package Themeim Header & Footer Builder
 * @since 1.0.0
 */
if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}

if (!class_exists('Themeim_Header_Footer_Builder_Common')) {
    class Themeim_Header_Footer_Builder_Common
    {

        //$instance variable
        private static $instance;


        /**
         * get Instance
         * @since  2.0.0
         */
        public static function getInstance()
        {
            if (null == self::$instance) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public $posttype = 'themeim-templates';

        public function all_posts($arg = ['post_type' => 'page', 'post_status' => 'publish'], $index = [])
        {
            if (!isset($arg['posts_per_page'])) {
                $arg['posts_per_page'] = -1;
            }


            $page = get_posts($arg);
            $pages = [];
            foreach ($page as $v) {
                if (!isset($v->ID)) {
                    continue;
                }
                $pages[$v->ID] = $v->post_title;
            }
            if (!empty($index)) {
                if (is_array($index)) {
                    return array_map(function ($in, $pg) {
                        return ($pg[$in]) ?? '';
                    }, $index, $pages);
                }
                return isset($pages[$index]) ?? '';
            }

            return $pages;
        }

        public function working_posttype(){
            $post_types = get_post_types();
            $removeCate = [
                'elementor_library',
                'attachment',
                'revision',
                'nav_menu_item',
                'custom_css',
                'customize_changeset',
                'wp_block',
                'themeim-templates',
                'edd_log',
                'oembed_cache',
            ];

            foreach($removeCate as $d){
                if( in_array( $d, $post_types) ){
                    unset($post_types[array_search($d, $post_types)]);
                }
            }
            return apply_filters('themeim_head_template_select_posttype', array_values($post_types) );
        }



        /**
         * Render elementor link attributes
         * @since 1.0.0
         */
        public function render_elementor_link_attributes($link, $class = null)
        {
            $return_val = '';

            if (!empty($link['url'])) {
                $return_val .= 'href="' . esc_url($link['url']) . '"';
            }
            if (!empty($link['is_external'])) {
                $return_val .= 'target="_blank"';
            }
            if (!empty($link['nofollow'])) {
                $return_val .= 'rel="nofollow"';
            }
            if (!empty($class)) {
                if (is_array($class)) {
                    $return_val .= 'class="';
                    foreach ($class as $cl) {
                        $return_val .= $cl . ' ';
                    }
                    $return_val .= '"';
                } else {
                    $return_val .= 'class="' . esc_attr($class) . '"';
                }
            }

            return $return_val;
        }


        /**
         * Get list of nav menu
         * @since 2.0.0
         * */
        public static function get_nav_menu_list($output = 'slug')
        {
            $return_val = [];
            $all_menu_list = wp_get_nav_menus();

            foreach ($all_menu_list as $menu) {
                if ($output == 'slug') {
                    $return_val[$menu->slug] = $menu->name;
                } else {
                    $return_val[$menu->term_id] = $menu->name;
                }
            }

            return $return_val;
        }
        /**
         * render elementor content
         * @since 2.0.0
         * */
        public function render_elementor_content( $content = null ) {
            $return_val = '';
            if ( defined( 'ELEMENTOR_VERSION' ) ) {
                $el_plugin_instance = \Elementor\Plugin::instance();
                $return_val = $el_plugin_instance->frontend->get_builder_content( $content );
            }

            return $return_val;
        }
        /**
         * Render elementor icons field value
         * @since 1.0.0
         */
        public function render_elementor_icons($settings, $attr = [])
        {
            $attr['aria-hidden'] = 'true';
            return \Themeim_Hfbulder\Themeim_Hfbulder_elementor_icon_manager::render_icon($settings, $attr);
        }

    }//End Class

    if (class_exists('Themeim_Header_Footer_Builder_Common')) {
        Themeim_Header_Footer_Builder_Common::getInstance();
    }
}
