<?php
/**
 * Elementor Widget
 * @package Yotta
 * @since 1.0.0
 */

namespace Elementor;

class Yotta_Tabs_Content_One_Widget extends Widget_Base
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
        return 'yotta-tabs-one-widget';
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
        return esc_html__('Yotta: Tabs Content', 'yotta-core');
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
        return ['Tab', 'Tabs', 'Yotta', "ThemeIM", 'Yotta'];
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
		// Tabs Tab Section
		$this->start_controls_section(
			'yotta_tab_items_items_section',
			[
				'label' => esc_html__('Tab Items', 'yotta-core'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'yotta_tab_title',
			[
				'label' => esc_html__('Tab Title', 'yotta-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__("Whats New", 'yotta-core'),
				'placeholder' => esc_html__('Type your title here', 'yotta-core'),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'yotta_tab_items_title',
			[
				'label' => esc_html__('Title & Description', 'yotta-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Tab Title', 'yotta-core'),
				'placeholder' => esc_html__('Tab Title', 'yotta-core'),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);
        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'yotta-core'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('select Icon.', 'yotta-core'),
                'default' => [
                    'value' => 'fas fa-phone-alt',
                    'library' => 'solid',
                ],
            ]
        );
		// Get Helper Functions.
		$helper = new \Yotta_Core_Helper_Functions;

		$repeater->add_control(
			'yotta_tabs_posts_select',
			[
				'label' => esc_html__('Select Section', 'yotta-core'),
				'type' => Controls_Manager::SELECT,
				'options' => $helper->get_controller_post_opts("ID", 'elementor_library', '_elementor_template_type', 'section'),
			]
		);

		$this->add_control(
			'yotta_tab_items_tabs',
			[
				'label' => esc_html__('Tabs Items', 'yotta-core'),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'yotta_tab_items_title' => esc_html__('Tab #1', 'yotta-core'),
					],
					[
						'yotta_tab_items_title' => esc_html__('Tab #2', 'yotta-core'),
					],
				],
				'title_field' => '{{{ yotta_tab_items_title }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'yotta_tab_items_style',
			[
				'label' => esc_html__('Tab Items', 'yotta-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'yotta_tab_border',
				'label' => esc_html__('Border', 'yotta-core'),
				'selector' => '{{WRAPPER}} .Newsim-Tab-Wrapper .new-wrapper .nav',
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'yotta_tab_background',
				'label' => esc_html__('Background', 'yotta-core'),
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .Newsim-Tab-Wrapper .new-wrapper .nav',
			]
		);

		$this->add_control(
			'yotta_tab_items_heading_heding',
			[
				'label' => esc_html__('Heading', 'yotta-core'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'yotta_tab_heading_color',
			[
				'label' => esc_html__('Color', 'yotta-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .Newsim-Tab-Wrapper .theme-heading-title .title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'yotta_tab_heading_typography',
				'selector' => '{{WRAPPER}} .Newsim-Tab-Wrapper .theme-heading-title .title',
			]
		);

		$this->add_control(
			'yotta_tab_items_heading_title',
			[
				'label' => esc_html__('Items Title', 'yotta-core'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'yotta_tab_items_color',
			[
				'label' => esc_html__('Color', 'yotta-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .Newsim-Tab-Wrapper .nav-item a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'yotta_tab_items_active_color',
			[
				'label' => esc_html__('Active Color', 'yotta-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .Newsim-Tab-Wrapper .nav-item.active a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'yotta_tab_items_typography',
				'selector' => '{{WRAPPER}} .Newsim-Tab-Wrapper .nav-item a',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'yotta_tab_items_text_stroke',
				'selector' => '{{WRAPPER}} .Newsim-Tab-Wrapper .nav-item a',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'yotta_tab_items_title_shadow',
				'selector' => '{{WRAPPER}} .Newsim-Tab-Wrapper .nav-item a',
			]
		);


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

        ?>
                <div class="web-hosting-tab-area">
                    <div class="web-hosting-tab">
                        <nav>

                            <div class="nav nav-tabs" id="nav-tab-five" role="tablist">
                                <a class="nav-link text-center" id="drupal-tab" data-toggle="tab" href="#drupal" role="tab" aria-controls="drupal" aria-selected="false">
                                    <div class="web-hosting-tab-icon">
                                        <i class="lab la-drupal"></i>
                                    </div>
                                    <span>Drupal</span>
                                </a>
                                <a class="nav-link text-center" id="joomla-tab" data-toggle="tab" href="#joomla" role="tab" aria-controls="joomla" aria-selected="false">
                                    <div class="web-hosting-tab-icon">
                                        <i class="lab la-joomla"></i>
                                    </div>
                                    <span>Joomla</span>
                                </a>
                                <a class="nav-link text-center active" id="wordPress-tab" data-toggle="tab" href="#wordPress" role="tab" aria-controls="wordPress" aria-selected="true">
                                    <div class="web-hosting-tab-icon">
                                        <i class="lab la-wordpress"></i>
                                    </div>
                                    <span>WordPress</span>
                                </a>
                                <a class="nav-link text-center" id="magento-tab" data-toggle="tab" href="#magento" role="tab" aria-controls="magento" aria-selected="false">
                                    <div class="web-hosting-tab-icon">
                                        <i class="lab la-magento"></i>
                                    </div>
                                    <span>Magento</span>
                                </a>
                                <a class="nav-link text-center" id="openCart-tab" data-toggle="tab" href="#openCart" role="tab" aria-controls="openCart" aria-selected="false">
                                    <div class="web-hosting-tab-icon">
                                        <i class="lab la-opencart"></i>
                                    </div>
                                    <span>OpenCart</span>
                                </a>
                            </div>

                        </nav>


                        <div class="tab-content" id="nav-tabContent-five">
                            <div class="tab-pane fade" id="drupal" role="tabpanel" aria-labelledby="drupal-tab">
                                <div class="web-hosting-item">
                                    <div class="row justify-content-center mb-30-none">
                                        <div class="col-xl-7 col-lg-6 mb-30">
                                            <div class="web-hosting-content">
                                                <h3 class="title">Managed Drupal Hosting</h3>
                                                <p>WordPress is the world’s most popular blog/CMS solution. Monthly high volume visitor adoptable traffic handler web hosting package available for hosting service.</p>
                                                <p>Bookan unknown printer took a galley of type and scrambled make It has survived not only five centuries.Lorem adipiscg incididuntlabore dolor ipsum dolor sit amet, consectetur. Bookan unknown printer took a galley of type and scrambled make It has survived.</p>
                                                <div class="web-hosting-btn">
                                                    <a href="plan.html" class="btn--base gradient"><i class="las la-plus"></i> Get Started</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-5 col-lg-6 mb-30">
                                            <div class="web-hosting-thumb">
                                                <img src="assets/images/element/element-34.png" alt="element">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="joomla" role="tabpanel" aria-labelledby="joomla-tab">
                                <div class="web-hosting-item">
                                    <div class="row justify-content-center mb-30-none">
                                        <div class="col-xl-7 col-lg-6 mb-30">
                                            <div class="web-hosting-content">
                                                <h3 class="title">Managed Joomla Hosting</h3>
                                                <p>WordPress is the world’s most popular blog/CMS solution. Monthly high volume visitor adoptable traffic handler web hosting package available for hosting service.</p>
                                                <p>Bookan unknown printer took a galley of type and scrambled make It has survived not only five centuries.Lorem adipiscg incididuntlabore dolor ipsum dolor sit amet, consectetur. Bookan unknown printer took a galley of type and scrambled make It has survived.</p>
                                                <div class="web-hosting-btn">
                                                    <a href="plan.html" class="btn--base gradient"><i class="las la-plus"></i> Get Started</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-5 col-lg-6 mb-30">
                                            <div class="web-hosting-thumb">
                                                <img src="assets/images/element/element-34.png" alt="element">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade active show" id="wordPress" role="tabpanel" aria-labelledby="wordPress-tab">
                                <div class="web-hosting-item">
                                    <div class="row justify-content-center mb-30-none">
                                        <div class="col-xl-7 col-lg-6 mb-30">
                                            <div class="web-hosting-content">
                                                <h3 class="title">Managed WordPress Hosting</h3>
                                                <p>WordPress is the world’s most popular blog/CMS solution. Monthly high volume visitor adoptable traffic handler web hosting package available for hosting service.</p>
                                                <p>Bookan unknown printer took a galley of type and scrambled make It has survived not only five centuries.Lorem adipiscg incididuntlabore dolor ipsum dolor sit amet, consectetur. Bookan unknown printer took a galley of type and scrambled make It has survived.</p>
                                                <div class="web-hosting-btn">
                                                    <a href="plan.html" class="btn--base gradient"><i class="las la-plus"></i> Get Started</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-5 col-lg-6 mb-30">
                                            <div class="web-hosting-thumb">
                                                <img src="assets/images/element/element-34.png" alt="element">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="magento" role="tabpanel" aria-labelledby="magento-tab">
                                <div class="web-hosting-item">
                                    <div class="row justify-content-center mb-30-none">
                                        <div class="col-xl-7 col-lg-6 mb-30">
                                            <div class="web-hosting-content">
                                                <h3 class="title">Managed Magento Hosting</h3>
                                                <p>WordPress is the world’s most popular blog/CMS solution. Monthly high volume visitor adoptable traffic handler web hosting package available for hosting service.</p>
                                                <p>Bookan unknown printer took a galley of type and scrambled make It has survived not only five centuries.Lorem adipiscg incididuntlabore dolor ipsum dolor sit amet, consectetur. Bookan unknown printer took a galley of type and scrambled make It has survived.</p>
                                                <div class="web-hosting-btn">
                                                    <a href="plan.html" class="btn--base gradient"><i class="las la-plus"></i> Get Started</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-5 col-lg-6 mb-30">
                                            <div class="web-hosting-thumb">
                                                <img src="assets/images/element/element-34.png" alt="element">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="openCart" role="tabpanel" aria-labelledby="openCart-tab">
                                <div class="web-hosting-item">
                                    <div class="row justify-content-center mb-30-none">
                                        <div class="col-xl-7 col-lg-6 mb-30">
                                            <div class="web-hosting-content">
                                                <h3 class="title">Managed OpenCart Hosting</h3>
                                                <p>WordPress is the world’s most popular blog/CMS solution. Monthly high volume visitor adoptable traffic handler web hosting package available for hosting service.</p>
                                                <p>Bookan unknown printer took a galley of type and scrambled make It has survived not only five centuries.Lorem adipiscg incididuntlabore dolor ipsum dolor sit amet, consectetur. Bookan unknown printer took a galley of type and scrambled make It has survived.</p>
                                                <div class="web-hosting-btn">
                                                    <a href="plan.html" class="btn--base gradient"><i class="las la-plus"></i> Get Started</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-5 col-lg-6 mb-30">
                                            <div class="web-hosting-thumb">
                                                <img src="assets/images/element/element-34.png" alt="element">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Yotta_Tabs_Content_One_Widget());
