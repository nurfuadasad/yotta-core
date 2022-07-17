<?php
/*
 * @package Themeim Header & Footer Builder
 * @developer Nur Fuad
 */


/**
 * Plugin directory path
 * @package yotta
 * @since 1.0.0
 */

define('THEMEIM_HEADER_FOOTER_ROOT_PATH', plugin_dir_path(__FILE__));
define('THEMEIM_HEADER_FOOTER_ROOT_URL', plugin_dir_url(__FILE__));
define('THEMEIM_HEADER_FOOTER_SELF_PATH','themeim-header-footer-builder/themeim-header-footer.php');
define('THEMEIM_HEADER_FOOTER_VERSION','1.0.0');
define('THEMEIM_HEADER_FOOTER_INC',THEMEIM_HEADER_FOOTER_ROOT_PATH.'/inc');
define('THEMEIM_HEADER_FOOTER_INC_VIEW',THEMEIM_HEADER_FOOTER_ROOT_PATH.'/inc/views');
define('THEMEIM_HEADER_FOOTER_ELEMENTOR',THEMEIM_HEADER_FOOTER_ROOT_PATH.'/elementor');
define('THEMEIM_HEADER_FOOTER_ADMIN',THEMEIM_HEADER_FOOTER_ROOT_PATH.'/admin');
define('THEMEIM_HEADER_FOOTER_TEMPLATE',THEMEIM_HEADER_FOOTER_ROOT_PATH.'/template');
define('THEMEIM_HEADER_FOOTER_ADMIN_ASSETS',THEMEIM_HEADER_FOOTER_ROOT_PATH.'/admin/assets');
define('THEMEIM_HEADER_FOOTER_CSS',THEMEIM_HEADER_FOOTER_ROOT_URL.'/admin/assets/css');
define('THEMEIM_HEADER_FOOTER_JS',THEMEIM_HEADER_FOOTER_ROOT_URL.'/admin/assets/js');
define('THEMEIM_HEADER_FOOTER_IMG',THEMEIM_HEADER_FOOTER_ROOT_URL.'/admin/assets/img');



/**
 * Load additional helpers functions
 * @package yotta
 * @since 1.0.0
 */
if (!function_exists('themeim_hfbuilder_common')){
    require_once THEMEIM_HEADER_FOOTER_ADMIN .'/themeim-hfbuilder-common.php';
    if (!function_exists('themeim_hfbuilder_common')){
        function themeim_hfbuilder_common(){
            return class_exists('Themeim_Header_Footer_Builder_Common') ? new Themeim_Header_Footer_Builder_Common() : false;
        }
    }
}
/**
 * Themeim Header & Footer Init
 * @package yotta
 * @since 1.0.0
 */
if (file_exists(THEMEIM_HEADER_FOOTER_ROOT_PATH . '/inc/themeim-hfbuilder-init.php')){
    require_once THEMEIM_HEADER_FOOTER_ROOT_PATH . '/inc/themeim-hfbuilder-init.php';
}
