<?php
/**
 * Elementor Widget
 * @package Yotta
 * @since 1.0.0
 */

namespace Elementor;
class Yotta_Live_Video_Popup_Widget extends Widget_Base
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
        return 'yotta-live-video-popup-widget';
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
        return esc_html__('Live Video Popup', 'yotta-core');
    }

    public function get_keywords()
    {
        return ['Live', 'Video', 'Popup', "ThemeIM", 'Yotta'];
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
        return 'eicon-pojome';
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
            'icon',
            [
                'label' => esc_html__('Icon', 'yotta-core'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('select Icon.', 'yotta-core'),
                'default' => [
                    'value' => 'fas fa-play',
                    'library' => 'solid',
                ]
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'yotta-core'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'description' => esc_html__('enter title.', 'yotta-core'),
                'default' => esc_html__('Go Live in a Minutes', 'yotta-core')
            ]
        );
        $this->add_control('description',
            [
                'label' => esc_html__('Description', 'yotta-core'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('enter description', 'yotta-core'),
                'default' => esc_html__('We make it simple to launch in the cloud and hosting our best pricing and team accounts.', 'yotta-core')
            ]);
        $this->end_controls_section();



        // STYLE TAB
        
        $this->start_controls_section(
            'typography_settings_sections',
            [
                'label' => esc_html__('Style Settings', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control('title_colors', [
            'label' => esc_html__('Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .data-inner-content .title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'label' => esc_html__('Title Typography', 'yotta-core'),
            'name' => 'title_typographys',
            'description' => esc_html__('select title typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .data-inner-content .title"
        ]);
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


        ?>
        <div class="about-video-area">
            <div class="about-video">
                <div class="video-main">
                    <div class="promo-video">
                        <div class="waves-block">
                            <div class="waves wave-1"></div>
                            <div class="waves wave-2"></div>
                            <div class="waves wave-3"></div>
                        </div>
                    </div>
                    <a class="video-icon video-play-btn-02 mfp-iframe" <?php echo yotta_core()->render_elementor_link_attributes($settings['link']) ?> >
                        <?php echo yotta_core()->render_elementor_icons($settings['icon']) ?>
                    </a>
                </div>
            </div>
            <div class="about-video-content">
                <h3 class="inner-title"><?php echo esc_html($settings['title']) ?></h3>
                <p><?php echo esc_html($settings['description']) ?></p>
            </div>
            <div class="bottom-shape"></div>
        </div>

        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Yotta_Live_Video_Popup_Widget());