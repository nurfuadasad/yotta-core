<?php
/**
 * Themeim Header & Footer Builder Custom Post Type(CPTs)
 * @package Themeim Header & Footer Builder
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit();//exit if access directly
}

if (!class_exists('Themeim_Header_Footer_Builder_Frontend_Init')) {
    class Themeim_Header_Footer_Builder_Frontend_Init
    {

        //$instance variable
        private static $instance;

        /**
         * get Instance
         * @since  1.0.0
         */

        public static function getInstance()
        {
            if (null == self::$instance) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function __construct()
        {
            add_action('get_header', [$this, 'themin_get_header'], 10, 2);
        }

        public function get_current_page_id()
        {
            global $post;
        }

        public static function themin_get_header($name, $args)
        {
            include __DIR__ . '/views/header.php';
            $templates = [];
            $templates[] = 'header.php';
            remove_all_actions('wp_head');
            ob_start();
            locate_template($templates, true);
            ob_get_clean();
        }


        public function get_builder_id($arr, $key)
        {
            foreach ($arr as $k => $val) {
                if (in_array($key, $val['ss'])) {
                    return $k;
                }
            }
            return null;
        }

        public function __themename_themebuilder_id($arr = [], $id)
        {
            if (empty($arr)) {
                return;
            }
            global $post;
            $post_type = get_post_type($post->ID);

            //  check custom postype select header
            if (is_singular($post_type) && $this->get_builder_id($arr, $post_type)) {
                return $content_id = $this->get_builder_id($arr, $post_type);
            }

            if (is_front_page() && $this->get_builder_id($arr, 'front_page')) {
                return $content_id = $this->get_builder_id($arr, 'front_page');
            }
            //  Check block page
            if (is_home() && $this->get_builder_id($arr, 'home_page')) {
                return $content_id = $this->get_builder_id($arr, 'home_page');
            }
            // Check 404 page
            if (is_404() && $this->get_builder_id($arr, 'four_0_4')) {
                return $content_id = $this->get_builder_id($arr, 'four_0_4');
            }
            // Check category
            if (is_category() && $this->get_builder_id($arr, 'category')) {
                return $content_id = $this->get_builder_id($arr, 'category');
            }
            // if has header on archive page
            if (is_archive() && $this->get_builder_id($arr, 'archives')) {
                return $content_id = $this->get_builder_id($arr, 'archives');
            }
            //  Check is search page
            if (is_search() && $this->get_builder_id($arr, 'search')) {
                return $content_id = $this->get_builder_id($arr, 'search');
            }
            // if page has uniqeuue header
            if ($this->get_builder_id($arr, $id)) {
                return $content_id = $this->get_builder_id($arr, $id);
            }
            if (is_single() && $this->get_builder_id($arr, 'single_block')) {
                return $content_id = $this->get_builder_id($arr, 'single_block');
            }
            if (is_page() && $this->get_builder_id($arr, 'all_page')) {
                return $content_id = $this->get_builder_id($arr, 'all_page');
            }
            if ($this->get_builder_id($arr, 'entire_website')) {
                return $content_id = $this->get_builder_id($arr, 'entire_website');
            }

            return '';
        }


        public function get_themebuilder_Id($id, $type = 'header')
        {

            $arg = [
                'post_type' => 'themeim-templates',
                'post_status' => 'publish',
                'sort_order' => 'DESC',
                'sort_column' => 'ID,post_title',
                'numberposts' => -1,
            ];
            $pages = get_posts($arg);


            $dispaly_list = [];

            foreach ($pages as $page) {

                $get_type = get_post_meta($page->ID, 'themeim_template_type', true);
                $template_list = get_post_meta($page->ID, 'themeim_template_view', true);
                //  Check display Header
                if ($get_type == $type) {
                    $dispaly = $template_list;
                    $dispaly_list[$page->ID] = $template_list;
                }
            }

            return $this->__themename_themebuilder_id($dispaly_list, $id);
        }


    }

    if (class_exists('Themeim_Header_Footer_Builder_Frontend_Init')) {
        Themeim_Header_Footer_Builder_Frontend_Init::getInstance();
    }
}
