<?php
/**
 * Elementor Widget
 * @package Yotta
 * @since 1.0.0
 */

namespace Elementor;
class Yotta_Icon_Box_One_Widget extends Widget_Base
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
        return 'yotta-icon-box-item-widget';
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
        return esc_html__('Yotta : Icon Box 01', 'yotta-core');
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
        return 'eicon-alert';
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
        $this->add_control(
            'white_section_title',
            [
                'label' => esc_html__('Subtitle Plane Animation', 'yotta-core'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    'white' => esc_html__('White Style', 'yotta-core'),
                    '' => esc_html__('Default Style', 'yotta-core'),
                ],
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'yotta-core'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('enter title.', 'yotta-core'),
                'default' => esc_html__('User friendly system added', 'yotta-core'),
            ]
        );
        $this->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'yotta-core'),
                'type' => Controls_Manager::URL,
                'description' => esc_html__('enter url.', 'yotta-core'),
                'default' => [
                    'url' => ''
                ]
            ]
        );
        $this->add_control(
            'icon_selector',
            [
                'label' => esc_html__('Icon Selector', 'yotta-core'),
                'type' => Controls_Manager::SELECT,
                'default' => 'icon',
                'options' => [
                    'text_icon' => esc_html__('Text Icon', 'yotta-core'),
                    'icon' => esc_html__('Icon', 'yotta-core'),
                    'image' => esc_html__('Image', 'yotta-core'),
                ],

            ]
        );
        $this->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'yotta-core'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('select Icon.', 'yotta-core'),
                'default' => [
                    'value' => 'fas fa-phone-alt',
                    'library' => 'solid',
                ],
                'condition' => ['icon_selector' => 'icon']
            ]
        );
        $this->add_control(
            'text_icon',
            [
                'label' => esc_html__('Text Icon', 'yotta-core'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('enter text.', 'yotta-core'),
                'default' => esc_html__('1', 'yotta-core'),
                'condition' => ['icon_selector' => 'text_icon']
            ]
        );
        $this->add_control(
            'image', [
                'label' => esc_html__('Image', 'yotta-core'),
                'type' => Controls_Manager::MEDIA,
                'show_label' => false,
                'condition' => ['icon_selector' => 'image']
            ]
        );
        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'yotta-core'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('enter text.', 'yotta-core'),
                'default' => esc_html__('There is a very fast AVANCE L5 system for internet access and it did not disappoint.', 'yotta-core')
            ]
        );
        $this->add_control(
            'text_align',
            [
                'label' => esc_html__('Alignment', 'yotta-core'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'yotta-core'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'yotta-core'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'yotta-core'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'styling_settings_section',
            [
                'label' => esc_html__('Box Styling Settings', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'slider_nav_style_tabs'
        );

        $this->start_controls_tab(
            'active_hover_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'yotta-core'),
            ]
        );
        $this->add_control(
            'item_padding',
            [
                'label' => esc_html__('Padding', 'yotta-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .icon-box-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => esc_html__('Border', 'yotta-core'),
                'selector' => '{{WRAPPER}} .icon-box-item',
            ]
        );
        $this->add_control(
            'background_border_radius',
            [
                'label' => esc_html__('Box Border Radius', 'yotta-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .icon-box-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'background_color',
                'label' => esc_html__('Background Image', 'yotta-core'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .icon-box-item',
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => esc_html__('Box Shadow', 'yotta-core'),
                'selector' => '{{WRAPPER}} .icon-box-item',
            ]
        );
        $this->add_control(
            'title_margin_bottom',
            [
                'label' => esc_html__('Title Margin Bottom', 'yotta-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-box-item .content .title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control('title_color', [
            'label' => esc_html__('Title Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .icon-box-item .content .title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('number_color', [
            'label' => esc_html__('Number Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .icon-box-item .content p" => "color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_tab();


        $this->start_controls_tab(
            'slider_navigation_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'yotta-core'),
            ]
        );
        $this->add_control('background_hover_color', [
            'label' => esc_html__('Background Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .icon-box-item:hover" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow_hover',
                'label' => esc_html__('Box Shadow', 'yotta-core'),
                'selector' => '{{WRAPPER}} .icon-box-item:hover',
            ]
        );
        $this->add_control('icon_bg_hover_color', [
            'label' => esc_html__('Icon Background Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .icon-box-item:hover .icon" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('icon_hover_color', [
            'label' => esc_html__('Icon Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .icon-box-item:hover .icon" => "fill: {{VALUE}}"
            ]
        ]);
        $this->add_control('title_hover_color', [
            'label' => esc_html__('Title Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .icon-box-item:hover .content .title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('paragraph_hover_color', [
            'label' => esc_html__('Paragraph Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .icon-box-item:hover .content p" => "color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_tab();

        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'icon_styling_settings_section',
            [
                'label' => esc_html__('Icon Style', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'icon_border_radius',
            [
                'label' => esc_html__('Icon Border Radius', 'yotta-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .icon-box-item .icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .icon-box-item .text-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );
        $this->add_control(
            'icon_height',
            [
                'label' => esc_html__('Icon Height', 'yotta-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-box-item .icon' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .icon-box-item .text-icon' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'icon_width',
            [
                'label' => esc_html__('Icon Width', 'yotta-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-box-item .icon' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .icon-box-item .text-icon' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'icon_size',
            [
                'label' => esc_html__('Icon Size', 'yotta-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 35,
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-box-item .icon' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .icon-box-item .text-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'icon_margin_bottom',
            [
                'label' => esc_html__('Icon Margin Bottom', 'yotta-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-box-item .icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .icon-box-item .text-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'icon_margin_left',
            [
                'label' => esc_html__('Icon Margin Left', 'yotta-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'condition' => ['position' => 'left'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-box-item .icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .icon-box-item .text-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .icon-box-item img' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'position',
            [
                'label' => esc_html__('Position', 'yotta-core'),
                'type' => Controls_Manager::SELECT,
                'default' => 'top',
                'options' => [
                    'top' => esc_html__('Top', 'yotta-core'),
                    'left' => esc_html__('Left', 'yotta-core'),
                    'right' => esc_html__('Right', 'yotta-core'),
                ],
            ]
        );
        $this->add_control(
            'icon_shape_style',
            [
                'label' => esc_html__('Icon Shape Style', 'yotta-core'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__('Default', 'yotta-core'),
                    'shape' => esc_html__('Style 01', 'yotta-core'),
                    'shape_02' => esc_html__('Style 02', 'yotta-core'),
                    'shape_03' => esc_html__('style 03', 'yotta-core'),
                ],
            ]
        );
        $this->add_control('icon_color', [
            'label' => esc_html__('Icon Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .icon-box-item .icon" => "color: {{VALUE}}",
                "{{WRAPPER}} .icon-box-item .icon svg" => "fill: {{VALUE}}",
                "{{WRAPPER}} .icon-box-item .text-icon" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'icon_bg_color',
                'label' => esc_html__('Background Image', 'yotta-core'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} .icon-box-item .icon,
		                    {{WRAPPER}} .icon-box-item .text-icon"
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'typography_settings_section',
            [
                'label' => esc_html__('Typography Settings', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__('Title Typography', 'yotta-core'),
                'selector' => '{{WRAPPER}} .icon-box-item .content .title',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'text_icon_typography',
                'label' => esc_html__('Text Icon Typography', 'yotta-core'),
                'selector' => '{{WRAPPER}} .icon-box-item .text-icon span',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => esc_html__('Number Typography', 'yotta-core'),
                'selector' => '{{WRAPPER}} .icon-box-item .content p',
            ]
        );
        $this->end_controls_section();
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
        $this->add_render_attribute('icon-box_wrapper', 'class', 'icon-box-item');
        $this->add_render_attribute('link_wrapper', 'class', 'icon-box-anchor');

        $img_id = $settings['image']['id'] ?? '';
        $image_url = !empty($img_id) ? wp_get_attachment_image_src($img_id, 'full', false)[0] : '';
        $image_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);
        if (!empty($settings['link']['url'])) {
            $this->add_link_attributes('link_wrapper', $settings['link']);
        }
        ?>

    <section class="feature-section">
        <div class="feature-item icon-box-item  <?php echo $settings['position'] . " " .
            $settings['white_section_title'] ?>"
             style="text-align:<?php echo $settings['text_align']; ?>">
            <div class="icon-wrap">
                <div class="icon_extra">
                <?php if ($settings['icon_selector'] == 'icon'): ?>

                    <div class="icon <?php echo $settings['icon_shape_style'] ?>">
                        <?php
                            Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']);
                        ?>
                    </div>

                    <?php elseif ($settings['icon_selector'] == 'image'):
                        printf('<img src="%1$s" alt="%2$s">', esc_url($image_url), esc_attr($image_alt));
                    else:
                        printf('<div class="text-icon"><span>%1$s</span></div>', esc_html($settings['text_icon']));

                endif; ?>
            </div>
            </div>
            <div class="content">
                <?php
                if (!empty($settings['title'])) {
                    $title = str_replace(['{c}', '{/c}'], ['<span>', '</span>'], $settings['title']);
                    printf('<a %1$s ><h3 class="title">%2$s</h3></a>', $this->get_render_attribute_string('link_wrapper'), $title);
                }
                if (!empty($settings['description'])) {
                    printf('<p>%1$s</p>', esc_html($settings['description']));
                } ?>
            </div>
        </div>
    </section>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Yotta_Icon_Box_One_Widget());