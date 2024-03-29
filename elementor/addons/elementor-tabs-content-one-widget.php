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

		$repeater = new Repeater();

		$repeater->add_control(
			'yotta_tab_items_title',
			[
				'label' => esc_html__('Title', 'yotta-core'),
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
            'yotta_tab_icon',
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


        $this->start_controls_tabs(
            'icon_style_tabs'
        );
        // Normal Tab
        $this->start_controls_tab(
            'icon_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'yotta-core' ),
            ]
        );
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'yotta_tab_border',
				'label' => esc_html__('Nav Border', 'yotta-core'),
				'selector' => '{{WRAPPER}} .web-hosting-tab .nav',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'yotta_tab_item_border',
				'label' => esc_html__('Item Border', 'yotta-core'),
				'selector' => '{{WRAPPER}} .web-hosting-tab .nav-tabs .nav-link',
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'yotta_tab_background',
				'label' => esc_html__('Background', 'yotta-core'),
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .web-hosting-tab nav',
			]
		);

	
		$this->add_control(
			'yotta_tab_items_heading_title',
			[
				'label' => esc_html__('Nav Text', 'yotta-core'),
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
					'{{WRAPPER}} .web-hosting-tab .nav-tabs .nav-link' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'yotta_tab_items_active_color',
			[
				'label' => esc_html__('Active Color', 'yotta-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .web-hosting-tab .nav-tabs .nav-link.active' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'yotta_tab_items_active_bg',
			[
				'label' => esc_html__('Active Background', 'yotta-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .web-hosting-tab .nav-tabs .nav-link' => 'background: {{VALUE}}',
				],
				'default'	=> 'transparent'
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'yotta_tab_items_typography',
				'selector' => '{{WRAPPER}} .web-hosting-tab .nav-tabs .nav-link span',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'yotta_tab_items_text_stroke',
				'selector' => '{{WRAPPER}} .web-hosting-tab .nav-tabs .nav-link span',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'yotta_tab_items_title_shadow',
				'selector' => '{{WRAPPER}} .web-hosting-tab .nav-tabs .nav-link',
			]
		);
		$this->add_control(
			'yotta_tab_items_icon',
			[
				'label' => esc_html__('Icon', 'yotta-core'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'tab_icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 30,
				],
				'selectors' => [
					'{{WRAPPER}} .web-hosting-tab-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

    	$this->end_controls_tab();

		// Hover Tab
		$this->start_controls_tab(
			'icon_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'yotta-core' ),
			]
		);
		$this->add_control(
			'yotta_tab_items_hover_color',
			[
				'label' => esc_html__('Hover Color', 'yotta-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .web-hosting-tab .nav-tabs .nav-link:hover' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_tab();
      	$this->end_controls_tabs(); // End of Tabs section

		$this->end_controls_section();// End of section
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
        extract($settings);
        ?>
        <div class="web-hosting-tab-area">
            <div class="web-hosting-tab">
                <nav>
                    <div class="nav nav-tabs" role="tablist">

					<!-- Tabs -->
					<?php if (!empty($yotta_tab_items_tabs)) :
						foreach ($yotta_tab_items_tabs as $key=> $tab) : 
                         
                        $first_loop_class = $key === 0 ? 'nav-link text-center active show' : 'nav-link text-center';
                        ?>
                        <a class="<?php echo esc_attr( $first_loop_class ); ?>" id="#el-<?php echo esc_attr( $tab['_id'] ); ?>" data-toggle="tab" href="#el-<?php echo esc_attr( $tab['_id'] ); ?>" role="tab" aria-selected="true">
                             
						<?php if(!empty($tab['yotta_tab_icon'])): ?>
							<div class="web-hosting-tab-icon">
							<?php
                            	Icons_Manager::render_icon($tab['yotta_tab_icon'], ['aria-hidden' => 'true']);
							?>
                            </div>
							<?php endif; ?>
                            <span><?php echo esc_html($tab['yotta_tab_items_title']); ?></span>
                        </a>
					    <?php endforeach;
					endif; ?>

                    </div>
                </nav>

                <div class="tab-content">


                <?php if (!empty($yotta_tab_items_tabs)) :
					foreach ($yotta_tab_items_tabs as $key=>$tab) :
						$elementor = \Elementor\Plugin::instance(); ?>

                    <?php $first_content_class = ($key  === 0) ? 'active show tab-pane fade': 'tab-pane fade'; ?>
                    <div class="<?php echo esc_attr( $first_content_class ); ?>" id="el-<?php echo esc_attr($tab['_id']); ?>" role="tabpanel">
                        <div class="web-hosting-item">
							<!-- Post View -->
							<?php
                                                        
                            echo  $elementor->frontend->get_builder_content_for_display($tab['yotta_tabs_posts_select']); ?>
                        </div>
                    </div>

                    <?php endforeach;
				endif; ?>
                </div>
            </div>
        </div>


        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Yotta_Tabs_Content_One_Widget());
