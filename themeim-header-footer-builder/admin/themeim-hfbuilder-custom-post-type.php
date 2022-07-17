<?php
/**
 * Themeim Header & Footer Builder Custom Post Type(CPTs)
 * @package Themeim Header & Footer Builder
 * @since 1.0.0
 */
if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}

if (!class_exists('Themeim_Header_Footer_Builder_Custom_Post_Type')) {
    class Themeim_Header_Footer_Builder_Custom_Post_Type
    {


        //$instance variable
        private static $instance;


        public function __construct()
        {
            //register post type
            add_action('init', array($this, 'register_custom_post_type'));
            // add metabox
            add_action('add_meta_boxes', [$this, 'template_type']);
            // set header anf footer templates for individual pages nad post
//            add_action('add_meta_boxes', [$this, 'render_metabox']);
           add_action( 'save_post',      [$this, 'save'] );
        }

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


        /**
         * Register Custom Post Type
         * @since  2.0.0
         */
        public function register_custom_post_type()
        {
            $labels = [
                'name' => esc_html__('Templates', 'themeim-hfbuilder'),
                'singular_name' => esc_html__('Templates', 'themeim-hfbuilder'),
                'menu_name' => esc_html__('Templates', 'themeim-hfbuilder'),
                'name_admin_bar' => esc_html__('Templates', 'themeim-hfbuilder'),
                'add_new' => esc_html__('Add New', 'themeim-hfbuilder'),
                'add_new_item' => esc_html__('Add New Header, Footer or Block', 'themeim-hfbuilder'),
                'new_item' => esc_html__('New Templates', 'themeim-hfbuilder'),
                'edit_item' => esc_html__('Edit Header Footer & Blocks Template', 'themeim-hfbuilder'),
                'view_item' => esc_html__('View Header Footer & Blocks Template', 'themeim-hfbuilder'),
                'all_items' => esc_html__('All Templates', 'themeim-hfbuilder'),
                'search_items' => esc_html__('Search Header Footer & Blocks Templates', 'themeim-hfbuilder'),
                'parent_item_colon' => esc_html__('Parent Header Footer & Blocks Templates:', 'themeim-hfbuilder'),
                'not_found' => esc_html__('No Header Footer & Blocks Templates found.', 'themeim-hfbuilder'),
                'not_found_in_trash' => esc_html__('No Header Footer & Blocks Templates found in Trash.', 'themeim-hfbuilder'),
            ];

            $args = [
                'labels' => $labels,
                'public' => true,
                'show_ui' => true,
                'show_in_menu' => false,
                'exclude_from_search' => true,
                'capability_type' => 'post',
                'hierarchical' => false,
                'menu_icon' => 'dashicons-editor-kitchensink',
                'supports' => ['title', 'thumbnail', 'elementor'],
                'show_in_nav_menus' => true,
            ];
            register_post_type(themeim_hfbuilder_common()->posttype, $args);
        }

        public  function  template_type() {
            add_meta_box(
                'my-meta-box',
                __( 'My Meta Box', 'textdomain' ),
                array( $this, 'render_metabox' ),
                'themeim-templates',
                'advanced',
                'default'
            );
        }
        public  function  render_metabox ($meta_id) {
             $get_type = get_post_meta($meta_id->ID, 'themeim_template_type', true);
             $get_type_view = get_post_meta($meta_id->ID, 'themeim_template_view', true);
            ?>
             <div>
                 <select name="template_type" id="template-type">
                     <option value="">Select</option>
                     <option value="header" <?php selected($get_type, 'header'); ?>>Header</option>
                     <option value="footer" <?php selected($get_type, 'footer'); ?>>Footer</option>
                     <option value="banner" <?php selected($get_type, 'banner'); ?>>Banner</option>
                     <option value="404" <?php selected($get_type, '404'); ?>>404</option>
                 </select>
             </div>
             <div>
                 <select name="template_page_type[ss][]" id="template_page_type" multiple>
                     <optgroup label="Select Template">
                         <?php

                         if(!empty($this->site_template_list())) {
                             foreach ($this->site_template_list() as $key=>$post) {
                                  $selected = in_array($key, $get_type_view['ss']) ? 'selected' : '';
                                 ?>
                                 <option value="<?php echo esc_attr($key); ?>" <?php echo esc_attr($selected); ?>><?php echo esc_html($post); ?></option>
                                 <?php
                             }
                         }

                         ?>
                     </optgroup>
                    <optgroup label="Pages">
                     <?php

                       if(!empty($this->get_posts_list('page'))) {
                           foreach ($this->get_posts_list('page') as $key=>$post) {
                               $selected = in_array($key, $get_type_view['ss']) ? 'selected' : '';
                               ?>
                               <option value="<?php echo esc_attr($key); ?>" <?php echo esc_attr($selected); ?>><?php echo esc_html($post); ?></option>
                                   <?php 
                           }
                       }

                     ?>
                    </optgroup>
                     <optgroup label="Posts">
                         <?php

                         if(!empty($this->get_posts_list())) {
                             foreach ($this->get_posts_list() as $key=>$post) {
                                 $selected = in_array($key, $get_type_view['ss']) ? 'selected' : '';
                                 ?>
                                 <option value="<?php echo esc_attr($key); ?>" <?php echo esc_attr($selected); ?> ><?php echo esc_html($post); ?></option>
                                 <?php
                             }
                         }

                         ?>
                     </optgroup>
                 </select>
             </div>
            <?php
        }

        public  function  get_posts_list ($type = 'post') {
             $args = [
                  'post_type' => $type,
                  'numberposts' => -1,
             ];

             $get_posts = get_posts( $args);
             $get_post_list = [];
             foreach ( $get_posts as $post) {
                 $get_post_list[$post->ID] = $post->post_title;
             }
             return $get_post_list;
        }
        public  function  site_template_list () {
            return  [
                'entire_website' => __('Entire Website', 'themeim-hfbuilder'),
                'front_page'     => __('Front Page', 'themeim-hfbuilder'),
                'home_page'      => __('Blog Page', 'themeim-hfbuilder'),
                'all_page'       => __('All Pages', 'themeim-hfbuilder'),
                'single_block'   => __('All Single Post', 'themeim-hfbuilder'),
                'archives'       => __('All Archives', 'themeim-hfbuilder'),
                'category'       => __('All Category', 'themeim-hfbuilder'),
                'four_0_4'       => __('404', 'themeim-hfbuilder'),
                'search'         => __('Search', 'themeim-hfbuilder'),
            ];
        }

        public  function  save ( $post_id ) {
            // check autosave action
            if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
                return;
            }
            // if our current user can't edit this post, bail.
            if ( ! current_user_can( 'edit_posts' ) ) {
                return;
            }

            if ( isset( $_POST['template_type'] ) ) {
                update_post_meta( $post_id, 'themeim_template_type', $_POST['template_type'] );
            }

            if ( isset( $_POST['template_page_type'] ) ) {
                update_post_meta( $post_id, 'themeim_template_view', $_POST['template_page_type'] );
            }
        }

    } //End Class
    if (class_exists('Themeim_Header_Footer_Builder_Custom_Post_Type')) {
        Themeim_Header_Footer_Builder_Custom_Post_Type::getInstance();
    }
}