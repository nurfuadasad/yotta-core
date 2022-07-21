<?php
/**
 * Elementor Widget
 * @package Yotta
 * @since 1.0.0
 */

namespace Elementor;

class Yotta_Testimonial_Three_Widget extends Widget_Base
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
        return 'yotta-testimonial-three-widget';
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
        return esc_html__('Yotta: Testimonial 1', 'yotta-core');
    }
    /**
     * Get widget keyword.
     *
     * Retrieve Elementor widget by keyword.
     *
     * @return string Widget keywords.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_keywords()
    {
        return ['Team', 'Member', 'Testimonial', "ThemeIM", 'Yotta'];
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
        return 'eicon-blockquote';
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
                'label' => esc_html__('General Settings', 'yotta-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control('content_devider', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $repeater = new Repeater();
        $repeater->add_control('image_status',
            [
                'label' => esc_html__('Image Show/Hide', 'yotta-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('show/hide image', 'yotta-core'),
            ]);
        $repeater->add_control('image',
            [
                'label' => esc_html__('Image', 'yotta-core'),
                'type' => Controls_Manager::MEDIA,
                'description' => esc_html__('enter title.', 'yotta-core'),
                'condition' => ['image_status' => 'yes'],
                'default' => array(
                    'url' => Utils::get_placeholder_image_src()
                )
            ]);
        $repeater->add_control('icon_status',
            [
                'label' => esc_html__('Image Show/Hide', 'yotta-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('show/hide image', 'yotta-core'),
            ]);
        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'yotta-core'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('select Icon.', 'yotta-core'),
                'condition' => ['icon_status' => 'yes'],
                'default' => [
                    'value' => 'flaticon-straight-quotes',
                    'library' => 'solid',
                ]
            ]
        );
        $repeater->add_control('name',
            [
                'label' => esc_html__('Name', 'yotta-core'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('enter name', 'yotta-core'),
                'default' => esc_html__('Jhon Abraham', 'yotta-core')
            ]);
        $repeater->add_control('designation_status',
            [
                'label' => esc_html__('Designation Show/Hide', 'yotta-master'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('show/hide designation', 'yotta-master'),
            ]);
        $repeater->add_control('designation',
            [
                'label' => esc_html__('Designation', 'yotta-master'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('enter designation', 'yotta-master'),
                'condition' => ['designation_status' => 'yes'],
                'default' => esc_html__('Marketing Manager', 'yotta-master')
            ]);
        $repeater->add_control('ratings',
            [
                'label' => esc_html__('Ratings Show/Hide', 'yotta-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('show/hide ratings', 'yotta-core'),
            ]);
        $repeater->add_control('ratings_count',
            [
                'label' => esc_html__('Ratings', 'yotta-core'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1' => esc_html__('1 star', 'yotta-core'),
                    '2' => esc_html__('2 star', 'yotta-core'),
                    '3' => esc_html__('3 star', 'yotta-core'),
                    '4' => esc_html__('4 star', 'yotta-core'),
                    '5' => esc_html__('5 star', 'yotta-core'),
                ],
                'description' => esc_html__('set ratings', 'yotta-core'),
                'condition' => ['ratings' => 'yes']
            ]);
        $repeater->add_control('description',
            [
                'label' => esc_html__('Description', 'yotta-core'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('enter description', 'yotta-core'),
                'default' => esc_html__('Fight School has specialized in martial arts since 1986 and has one of the most
Fight School has specialized..', 'yotta-core')
            ]);
        $this->add_control('testimonial_items', [
            'label' => esc_html__('Testimonial Item', 'yotta-core'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                    'title' => esc_html__('William Evans', 'yotta-core'),
                    'description' => esc_html__("Fight School has specialized in martial arts since 1986 and has one of the most
Fight School has specialized.", 'yotta-core'),
                ]
            ],

        ]);
        $this->end_controls_section();


        $this->start_controls_section(
            'slider_settings_section',
            [
                'label' => esc_html__('Slider Settings', 'yotta-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'items',
            [
                'label' => esc_html__('slidesToShow', 'yotta-core'),
                'type' => Controls_Manager::NUMBER,
                'description' => esc_html__('you can set how many item show in slider', 'yotta-core'),
                'default' => '3',
            ]
        );
        $this->add_control(
            'loop',
            [
                'label' => esc_html__('Loop', 'yotta-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'yotta-core'),
            ]
        );
        $this->add_control(
            'autoplay',
            [
                'label' => esc_html__('Autoplay', 'yotta-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'yotta-core'),
            ]
        );
        $this->add_control(
            'nav',
            [
                'label' => esc_html__('Nav', 'yotta-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'yotta-core'),
                'default' => 'yes'
            ]
        );
        $this->add_control(
            'nav_position',
            [
                'label' => esc_html__('Nav Position', 'yotta-core'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__('Normal', 'yotta-core'),
                    'style-01' => esc_html__('Top Position', 'yotta-core'),
                    'style-05' => esc_html__('Top Right Position', 'yotta-core'),
                ],
            ]
        );
        $this->add_control(
            'dots',
            [
                'label' => esc_html__('Dots', 'yotta-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'yotta-core'),
                'default' => 'yes'
            ]
        );
        $this->add_control(
            'nav_left_arrow',
            [
                'label' => esc_html__('Nav Left Icon', 'yotta-core'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('you can set yes/no to enable/disable', 'yotta-core'),
                'default' => [
                    'value' => 'fas fa-arrow-left',
                    'library' => 'solid',
                ],
                'condition' => ['nav' => 'yes']
            ]
        );
        $this->add_control(
            'nav_right_arrow',
            [
                'label' => esc_html__('Nav Right Icon', 'yotta-core'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('you can set yes/no to enable/disable', 'yotta-core'),
                'default' => [
                    'value' => 'fas fa-arrow-right',
                    'library' => 'solid',
                ],
                'condition' => ['nav' => 'yes']
            ]
        );
        $this->add_control(
            'center',
            [
                'label' => esc_html__('Center', 'yotta-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'yotta-core'),

            ]
        );
        $this->add_control(
            'centerPadding',
            [
                'label' => esc_html__('Center Padding', 'yotta-core'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10000,
                        'step' => 2,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 340,
                ],
                'size_units' => ['px'],
                'condition' => array(
                    'center' => 'yes'
                )
            ]
        );
        $this->add_control(
            'autoplaytimeout',
            [
                'label' => esc_html__('Autoplay Timeout', 'yotta-core'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10000,
                        'step' => 2,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 5000,
                ],
                'size_units' => ['px'],
                'condition' => array(
                    'autoplay' => 'yes'
                )
            ]
        );
        $this->end_controls_section();

        // Style Tab
        $this->start_controls_section('styling_section', [
            'label' => esc_html__('Styling Settings', 'yotta-core'),
            'tab' => Controls_Manager::TAB_STYLE
        ]);

        $this->add_group_control(Group_Control_Background::get_type(), [
            'label' => esc_html__('Background', 'yotta-core'),
            'name' => 'content_backaground',
            'selector' => "{{WRAPPER}} .single-testimonial-item-03"
        ]);
        $this->add_control(
            'content_padding',
            [
                'label' => esc_html__('Padding', 'yotta-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .single-testimonial-item-03' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'content_border',
                'label' => esc_html__('Border', 'yotta-core'),
                'selector' => '{{WRAPPER}} .single-testimonial-item-03',
            ]
        );
        $this->add_control(
            'description_bottom_gap',
            [
                'label' => esc_html__('Description Bottom Gap', 'yotta-core'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 2,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 2,
                    ]
                ],
                'size_units' => ['px', '%'],
                'selectors' => [
                    "{{WRAPPER}} .single-testimonial-item-03 .client-content" => 'margin-bottom: {{SIZE}}{{UNIT}};'
                ]
            ]
        );
        $this->add_control(
            'ratings_between_gap',
            [
                'label' => esc_html__('Ratings Between Gap', 'yotta-core'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 2,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 2,
                    ]
                ],
                'size_units' => ['px', '%'],
                'selectors' => [
                    "{{WRAPPER}} .single-testimonial-item-03 .ratings i+i" => 'margin-left: {{SIZE}}{{UNIT}};'
                ]
            ]
        );
        $this->add_control(
            'author_meta_padding_gap',
            [
                'label' => esc_html__('Author Padding', 'yotta-core'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 2,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 2,
                    ]
                ],
                'size_units' => ['px', '%'],
                'selectors' => [
                    "{{WRAPPER}} .single-testimonial-item-03 .client-footer-user-content .title" => 'padding: {{SIZE}}{{UNIT}};'
                ]
            ]
        );
        $this->add_control('icon_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Icon Color', 'yotta-core'),
            'selectors' => [
                "{{WRAPPER}} .single-testimonial-item-03 .client-header .client-quote" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('name_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Name Color', 'yotta-core'),
            'selectors' => [
                "{{WRAPPER}} .single-testimonial-item-03 .client-footer-user-content .title" => "color: {{VALUE}}"
            ]
        ]);

        $this->add_control('description_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Description Color', 'yotta-core'),
            'selectors' => [
                "{{WRAPPER}} .single-testimonial-item-03 .client-content p" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('designation_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Designation Color', 'yotta-core'),
            'selectors' => [
                "{{WRAPPER}} .single-testimonial-item-03 .client-footer-user-content .designation" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('rating_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Ratings Color', 'yotta-core'),
            'selectors' => [
                "{{WRAPPER}} .single-testimonial-item-03 .client-ratings .ratings" => "color: {{VALUE}}"
            ]
        ]);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'item_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'plugin-name' ),
				'selector' => '{{WRAPPER}} .single-testimonial-item-03 ',
			]
		);
        $this->add_control(
            'item_margin',
            [
                'label' => esc_html__('margin', 'yotta-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .single-testimonial-item-03' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section('typography_section', [
            'label' => esc_html__('Typography Settings', 'yotta-core'),
            'tab' => Controls_Manager::TAB_STYLE
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'name_typography',
            'label' => esc_html__('Name Typography', 'yotta-core'),
            "selector" => "{{WRAPPER}} .single-testimonial-item-03 .client-footer-user-content .title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'description_typography',
            'label' => esc_html__('Description Typography', 'yotta-core'),
            "selector" => "{{WRAPPER}} .single-testimonial-item-03 .client-content p"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'designation_typography',
            'label' => esc_html__('Designation Typography', 'yotta-core'),
            "selector" => "{{WRAPPER}} .single-testimonial-item-03 .client-footer-user-content .designation"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'icon_typography',
            'label' => esc_html__('Icon Typography', 'yotta-core'),
            "selector" => "{{WRAPPER}} .single-testimonial-item-03 .client-header .client-quote"
        ]);
        $this->end_controls_section();
    }

    /**
     * Render Elementor widget output on the frontend.
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $all_testimonial_items = $settings['testimonial_items'];
        $rand_numb = rand(333, 999999999);

        //slider settings
        $slider_settings = [
            "loop" => esc_attr($settings['loop']),
            "items" => esc_attr($settings['items'] ?? 3),
            "center" => esc_attr($settings['center']),
            "autoplay" => esc_attr($settings['autoplay']),
            "autoplaytimeout" => esc_attr($settings['autoplaytimeout']['size'] ?? 0),
            "centerpadding" => esc_attr($settings['centerPadding']['size'] ?? 0),
            "nav" => esc_attr($settings['nav']),
            "dot" => esc_attr($settings['dots']),
            "navleft" => yotta_core()->render_elementor_icons($settings['nav_left_arrow']),
            "navright" => yotta_core()->render_elementor_icons($settings['nav_right_arrow'])

        ]

        ?>
        <div class="testimonial-carousel-wrapper yotta-rtl-slider">
            <div class="ts-outer-wrap">
                <div class="testimonial-carousel"
                     id="testimonial-one-carousel-<?php echo esc_attr($rand_numb); ?>"
                     data-settings='<?php echo json_encode($slider_settings) ?>'
                >
                    <?php
                    foreach ($all_testimonial_items as $item):
                        $image_id = $item['image']['id'] ?? '';
                        $image_url = !empty($image_id) ? wp_get_attachment_image_src($image_id, 'full', false)[0] : '';
                        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                        ?>

                    <div class="client-item single-testimonial-item-03">
                        <div class="client-header">
                            <?php if (!empty($item['ratings'])): ?>
                            <div class="client-ratings">
                                <span class="ratings">
                                    <?php
                                        for ($i = 0; $i < $item['ratings_count']; $i++) {
                                            print( '<i class="fa fa-star"></i>');
                                        }
                                    ?>
                                </span>
                            </div>
                            <?php endif; ?>
                            <div class="client-quote">
                            <?php
                                Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true']);
                            ?>
                            </div>
                        </div>
                        <div class="client-content">
                            <p><?php echo esc_html($item['description']); ?></p>
                        </div>
                        <div class="client-footer">
                            <div class="client-footer-user-thumb">
                                <img src="<?php echo esc_url($image_url); ?>"
                                    alt="<?php echo esc_attr($image_alt); ?>">
                            </div>
                            <div class="client-footer-user-content">
                                <h6 class="title"><?php echo esc_html($item['name']); ?></h6>
                                <?php
                                    if (!empty($item['designation_status'])) {
                                        printf('<span class="designation">%1$s</span>', esc_html($item['designation']));
                                    }
                                ?>
                            </div>
                        </div>
                    </div>


                    <?php endforeach; ?>
                </div>
            </div>
            <div class="slick-carousel-controls">
                <?php if (!empty($settings['nav'])) : ?>
                    <div class="slider-nav <?php echo $settings['nav_position'] ?>"></div>
                <?php endif; ?>
                <div class="slider-dots"></div>
            </div>
            
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Yotta_Testimonial_Three_Widget());
