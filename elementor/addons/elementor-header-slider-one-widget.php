<?php
/**
 * Elementor Widget
 * @package Yotta
 * @since 1.0.0
 */

namespace Elementor;
class Yotta_Header_Area_Slider_One_Widget extends Widget_Base
{

    /**
     * Get widget name.
     *
     * Retrieve Elementor widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_name()
    {
        return 'yotta-header-slider-one-widget';
    }

    /**
     * Get widget title.
     *
     * Retrieve Elementor widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_title()
    {
        return esc_html__('Header Slider: 01', 'yotta-core');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Elementor widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_icon()
    {
        return 'eicon-archive-title';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Elementor widget belongs to.
     *
     * @return array Widget categories.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_categories()
    {
        return ['yotta_widgets'];
    }

    /**
     * Register Elementor widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'settings_section',
            [
                'label' => esc_html__('Section Contents', 'yotta-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'background_image', [
                'label' => esc_html__('Background Image', 'yotta-core'),
                'type' => Controls_Manager::MEDIA,
                'show_label' => false,
                'description' => esc_html__('upload background image', 'yotta-core'),
                'default' => [
                    'src' => Utils::get_placeholder_image_src()
                ],
            ]
        );
        $this->add_control(
            'banner_boxing_image', [
                'label' => esc_html__('Banner Boxing Image', 'yotta-core'),
                'type' => Controls_Manager::MEDIA,
                'show_label' => false,
                'description' => esc_html__('upload banner boxing image', 'yotta-core'),
                'default' => [
                    'src' => Utils::get_placeholder_image_src()
                ],
            ]
        );
        $this->add_control(
            'banner_right_image_shape', [
                'label' => esc_html__('Banner Right Shape Image', 'yotta-core'),
                'type' => Controls_Manager::MEDIA,
                'show_label' => false,
                'description' => esc_html__('upload banner right image shape', 'yotta-core'),
                'default' => [
                    'src' => Utils::get_placeholder_image_src()
                ],
            ]
        );
        $this->add_control(
            'banner_boxing_gloves', [
                'label' => esc_html__('Banner Boxing Image', 'yotta-core'),
                'type' => Controls_Manager::MEDIA,
                'show_label' => false,
                'description' => esc_html__('upload banner boxing gloves image', 'yotta-core'),
                'default' => [
                    'src' => Utils::get_placeholder_image_src()
                ],
            ]
        );
        $this->add_control(
            'banner_boxing_gloves_02', [
                'label' => esc_html__('Banner Boxing Two Image', 'yotta-core'),
                'type' => Controls_Manager::MEDIA,
                'show_label' => false,
                'description' => esc_html__('upload banner boxing gloves image', 'yotta-core'),
                'default' => [
                    'src' => Utils::get_placeholder_image_src()
                ],
            ]
        );
        $this->add_control(
            'banner_sowrd_logo', [
                'label' => esc_html__('Banner Yotta Image', 'yotta-core'),
                'type' => Controls_Manager::MEDIA,
                'show_label' => false,
                'description' => esc_html__('upload banner yotta image', 'yotta-core'),
                'default' => [
                    'src' => Utils::get_placeholder_image_src()
                ],
            ]
        );
        $this->add_control(
            'banner_boxer_image', [
                'label' => esc_html__('Banner Boxer Image', 'yotta-core'),
                'type' => Controls_Manager::MEDIA,
                'show_label' => false,
                'description' => esc_html__('upload banner boxer image', 'yotta-core'),
                'default' => [
                    'src' => Utils::get_placeholder_image_src()
                ],
            ]
        );
        $this->add_control(
            'subtitle', [
                'label' => esc_html__('Sub Title', 'yotta-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('WELCOME TO YOTTA', 'yotta-core'),
                'description' => esc_html__('enter description', 'yotta-core'),
            ]
        );
        $this->add_control(
            'title', [
                'label' => esc_html__('Title', 'yotta-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('EVERY GREAT', 'yotta-core'),
                'description' => esc_html__('enter title', 'yotta-core')
            ]
        );
        $this->add_control(
            'feature-title', [
                'label' => esc_html__('Feature Title', 'yotta-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('JOURNEY STARTS WITH ONE STEP!', 'yotta-core'),
                'description' => esc_html__('enter description', 'yotta-core'),
            ]
        );
        $this->add_control(
            'description', [
                'label' => esc_html__('Description', 'yotta-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Morbi eleifend tortor vitae sapien laoreet feugiat. Aliquam dictum vulputate sapien eu laoreet. Aliquam purus est, molestie et sagittis sit amet, sagittis in magna. Morbi placerat commodo luctus. Etiam pulvinar dapibus risus, sit amet consectetur metus lobortis vitae.', 'yotta-core'),
                'description' => esc_html__('enter description', 'yotta-core'),
            ]
        );
        $this->add_control(
            'banner_widget_image', [
                'label' => esc_html__('Banner Widget Image', 'yotta-core'),
                'type' => Controls_Manager::MEDIA,
                'show_label' => false,
                'description' => esc_html__('upload banner widget image', 'yotta-core'),
                'default' => [
                    'src' => Utils::get_placeholder_image_src()
                ],
            ]
        );
        $this->add_control(
            'banner_arrow_image', [
                'label' => esc_html__('Banner Arrow Image', 'yotta-core'),
                'type' => Controls_Manager::MEDIA,
                'show_label' => false,
                'description' => esc_html__('upload banner arrow image', 'yotta-core'),
                'default' => [
                    'src' => Utils::get_placeholder_image_src()
                ],
            ]
        );
        $this->add_control(
            'btn_status', [
                'label' => esc_html__('Button Show/Hide', 'yotta-core'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'description' => esc_html__('show/hide button', 'yotta-core')
            ]
        );
        $this->add_control(
            'btn_text', [
                'label' => esc_html__('Button Text', 'yotta-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Apply Now ', 'yotta-core'),
                'description' => esc_html__('enter button text', 'yotta-core')
            ]
        );
        $this->add_control(
            'btn_link', [
                'label' => esc_html__('Button URL', 'yotta-core'),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#'
                ],
                'description' => esc_html__('enter button url', 'yotta-core')
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'css_styles',
            [
                'label' => esc_html__('Styling Settings', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control('slider_subtitle_color', [
            'label' => esc_html__('Slider Sub Title Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .banner-section .banner-content .sub-title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('slider_title_color', [
            'label' => esc_html__('Title Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .banner-section .banner-content .title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('slider_feature_color', [
            'label' => esc_html__('Feature Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .banner-section .banner-content .inner-title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('slider_paragraph_color', [
            'label' => esc_html__('Paragraph Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .banner-section .banner-content p" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_responsive_control('padding', [
            'label' => esc_html__('Padding', 'yotta-core'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em'],
            'allowed_dimensions' => ['top', 'bottom'],
            'selectors' => [
                '{{WRAPPER}} .banner-area' => 'padding-top: {{TOP}}{{UNIT}};padding-bottom: {{BOTTOM}}{{UNIT}};'
            ],
            'description' => esc_html__('set padding for header area ', 'yotta-core')
        ]);

        $this->end_controls_section();

        /* button styling */
        $this->start_controls_section('header_button_section', [
            'label' => esc_html__('Button Settings', 'yotta-core'),
            'tab' => Controls_Manager::TAB_STYLE
        ]);

        $this->start_controls_tabs('button_styling');
        $this->start_controls_tab('normal_style', [
            'label' => esc_html__('Button Normal', "yotta-core")
        ]);
        $this->add_control('button_normal_color', [
            'label' => esc_html__('Button Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .btn-wrap .boxed-btn" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('divider_01', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'name' => 'button_background',
            'label' => esc_html__('Button Background ', 'yotta-core'),
            'selector' => "{{WRAPPER}} .btn-wrap .boxed-btn"
        ]);
        $this->add_control('divider_02', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_group_control(Group_Control_Border::get_type(), [
            'name' => 'header_button_border',
            'label' => esc_html__('Border', 'yotta-core'),
            'selector' => "{{WRAPPER}} .btn-wrap .boxed-btn"
        ]);
        $this->end_controls_tab();

        $this->start_controls_tab('hover_style', [
            'label' => esc_html__('Button Hover', "yotta-core")
        ]);
        $this->add_control('button_hover_normal_color', [
            'label' => esc_html__('Button Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .btn-wrap .boxed-btn:hover" => "color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_control('divider_05', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_control(
            'button_border_radius',
            [
                'label' => esc_html__('Border Radius', 'yotta-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .btn-wrap .boxed-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        /* button styling end */

        /* typography settings start */
        $this->start_controls_section('typography_settings', [
            'label' => esc_html__('Typography Settings', 'yotta-core'),
            'tab' => Controls_Manager::TAB_STYLE
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'title_typography',
            'label' => esc_html__('Title Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .banner-section .banner-content .title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'banner_feature_typography',
            'label' => esc_html__('Banner Feature Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .banner-section .banner-content .inner-title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'banner_paragraph_typography',
            'label' => esc_html__('Banner Paragraph Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .banner-section .banner-content p"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'subtitle_typography',
            'label' => esc_html__('Sub Title Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .banner-section .banner-content .sub-title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'button_typography',
            'label' => esc_html__('Button Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .btn-wrap .boxed-btn"
        ]);
        $this->end_controls_section();
        /* typography settings end */

    }

    /**
     * Render Elementor widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $image_id = $settings['background_image']['id'];
        $image_url = !empty($image_id) ? wp_get_attachment_image_src($image_id, 'full', false)[0] : '';

        $image_field_id = [
            'banner_boxing_image',
            'banner_right_image_shape'
        ];
        $image_field_id_02 = [
            'banner_boxing_gloves',
            'banner_boxing_gloves_02',
            'banner_sowrd_logo',
            'banner_boxer_image'
        ];

        $banner_widget = $settings['banner_widget_image']['id'];
        $banner_widget_image_url = !empty($banner_widget) ? wp_get_attachment_image_src($banner_widget, 'full', false)[0] : '';
        $banner_widget_image_alt = get_post_meta($banner_widget, '_wp_attachment_image_alt', true);

        $banner_element_arrow = $settings['banner_arrow_image']['id'];
        $banner_arrow_image_url = !empty($banner_element_arrow) ? wp_get_attachment_image_src($banner_element_arrow, 'full', false)[0] : '';
        $banner_arrow_image_alt = get_post_meta($banner_element_arrow, '_wp_attachment_image_alt', true);


        ?>
        <section class="banner-section .banner-area bg_img" style="background-image: url(<?php echo esc_url($image_url) ?>)">
            <?php
            foreach ($image_field_id as $index => $img_id) {
                $animation_image = $settings[$img_id]['id'];
                $animation_image_url = !empty($animation_image) ? wp_get_attachment_image_src($animation_image, 'full')[0] : '';
                $animation_image_alt = get_post_meta($banner_element_arrow, '_wp_attachment_image_alt', true);

                printf('<div class="banner-element-%2$s"><img src="%1$s" alt="%3$s"></div>', esc_url($animation_image_url), esc_attr($index), esc_url($animation_image_alt));
            }
            ?>
            <div class="banner-thumb-area">
                <?php
                foreach ($image_field_id_02 as $index => $img_id) {
                    $animation_image = $settings[$img_id]['id'];
                    $animation_image_url = !empty($animation_image) ? wp_get_attachment_image_src($animation_image, 'full')[0] : '';
                    $animation_image_alt = get_post_meta($banner_element_arrow, '_wp_attachment_image_alt', true);

                    printf('<div class="banner-thumb-element-%2$s"><img src="%1$s" alt="%3$s"></div>', esc_url($animation_image_url), esc_attr($index), esc_url($animation_image_alt));
                }
                ?>
            </div>
            <div class="container-fluid">
                <div class="row align-items-end mb-30-none">
                    <div class="col-xl-6 col-lg-12 mb-30">
                        <div class="banner-content" data-aos="fade-right" data-aos-duration="1800">
                            <?php if (!empty($settings['subtitle'])): ?>
                                <span class="sub-title">
                                        	<?php
                                            $subtitle = str_replace(['{c}', '{/c}'], ['<span>', '</span>'], $settings['subtitle']);
                                            print wp_kses($subtitle, yotta_core()->kses_allowed_html('all'));
                                            ?>
                                    </span>
                            <?php endif; ?>
                            <h1 class="title"><?php echo esc_html($settings['title']) ?></h1>
                            <?php if (!empty($settings['feature-title'])): ?>
                                <h3 class="inner-title">
                                    <?php
                                    $subtitle = str_replace(['{c}', '{/c}'], ['<span>', '</span>'], $settings['feature-title']);
                                    print wp_kses($subtitle, yotta_core()->kses_allowed_html('all'));
                                    ?>
                                </h3>
                            <?php endif; ?>
                            <?php if (!empty($settings['description'])): ?>
                                <p>
                                    <?php echo esc_html($settings['description']) ?>
                                </p>
                            <?php endif; ?>
                            <div class="banner-arrow">
                                <img src="<?php echo esc_url($banner_arrow_image_url) ?>"
                                     alt="<?php echo esc_url($banner_arrow_image_alt) ?>">
                            </div>
                            <div class="banner-widget">
                                <div class="banner-widget-wrapper">
                                    <div class="banner-widget-left">
                                        <div class="banner-widget-thumb">
                                            <img src="<?php echo esc_url($banner_widget_image_url) ?>"
                                                 alt="<?php echo esc_url($banner_widget_image_alt) ?>">
                                        </div>
                                    </div>
                                    <div class="banner-widget-middle">
                                        <div class="banner-widget-content">
                                            <p class="text-white">
                                                <?php
                                                $subtitle = str_replace(['{c}', '{/c}'], ['<span>', '</span>'], $settings['subtitle']);
                                                print wp_kses($subtitle, yotta_core()->kses_allowed_html('all'));
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                    <?php if ($settings['btn_status'] == 'yes') : ?>
                                        <div class="banner-widget-right">
                                            <div class="btn-wrap">
                                                <a href="<?php echo esc_url($settings['btn_link']['url']) ?>"
                                                   class="boxed-btn"><?php echo esc_html($settings['btn_text']) ?><i
                                                            class="fas fa-arrow-right ml-2"></i></a>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Yotta_Header_Area_Slider_One_Widget());