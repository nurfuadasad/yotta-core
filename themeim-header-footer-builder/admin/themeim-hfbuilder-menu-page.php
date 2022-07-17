<?php
/**
 * Themeim Header & Footer Builder Menu Custom Function
 * @package Themeim Header & Footer Builder
 * @since 1.0.0
 */
if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}
if (!class_exists('Themeim_Header_Footer_Builder_Admin_Custom_Menu')){
    class Themeim_Header_Footer_Builder_Admin_Custom_Menu{

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
        public function __construct(){

            //add admin menu page
            add_action('admin_menu',array($this, 'themeim_hfbuilder_admin_menu_page'));
            //set tab menu
            add_action('admin_notice', array($this,'themeim_hfbuilder_set_tab_menu'));
        }


        /**
         * Theme admin menu page
         * @since 1.0.0
         */
        public function themeim_hfbuilder_admin_menu_page(){
            //check user capability
            if (!current_user_can('edit_posts',get_current_user_id())){
                return;
            }
            do_action('themeim_header_admin_menu_start');
            //add menu page
            add_menu_page(
              esc_html__('Themeim Header & Footer Page',''),
              esc_html__('Themeim Header & Footer Page'),
                'edit_pages',
                'edit.php?post_type=themeim-templates',
                '',
                'dashicons-welcome-widgets-menus',
                7
            );
            do_action('themeim_header_admin_menu_end');
        }



    }//end class

    if (class_exists('Themeim_Header_Footer_Builder_Admin_Custom_Menu')){
        Themeim_Header_Footer_Builder_Admin_Custom_Menu::getInstance();
    }
}