<?php

namespace Elementor;

/**
 * Elementor Widget
 * @package Newsim
 * @since 1.0.0
 */

class Yotta_Tabs_Content_Two_Widget extends Widget_Base
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
		return 'newsim-tabs';
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
		return esc_html__('NewsTabs', 'newsim-core');
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
		return 'eicon-tabs';
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
			'newsim_tab_items_items_section',
			[
				'label' => esc_html__('Tab Items', 'newsim-core'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'newsim_tab_title',
			[
				'label' => esc_html__('Tab Title', 'newsim-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__("Whats New", 'newsim-core'),
				'placeholder' => esc_html__('Type your title here', 'newsim-core'),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'newsim_tab_items_title',
			[
				'label' => esc_html__('Title & Description', 'newsim-core'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Tab Title', 'newsim-core'),
				'placeholder' => esc_html__('Tab Title', 'newsim-core'),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);

		// Get Helper Functions.
		$helper = new \Yotta_Core_Helper_Functions;

		$repeater->add_control(
			'newsim_tabs_posts_select',
			[
				'label' => esc_html__('Select Section', 'newsim-core'),
				'type' => Controls_Manager::SELECT,
				'options' => $helper->get_controller_post_opts("ID", 'elementor_library', '_elementor_template_type', 'section'),
			]
		);

		$this->add_control(
			'newsim_tab_items_tabs',
			[
				'label' => esc_html__('Tabs Items', 'newsim-core'),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'newsim_tab_items_title' => esc_html__('Tab #1', 'newsim-core'),
					],
					[
						'newsim_tab_items_title' => esc_html__('Tab #2', 'newsim-core'),
					],
				],
				'title_field' => '{{{ newsim_tab_items_title }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'newsim_tab_items_style',
			[
				'label' => esc_html__('Tab Items', 'newsim-core'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'newsim_tab_border',
				'label' => esc_html__('Border', 'newsim-core'),
				'selector' => '{{WRAPPER}} .Newsim-Tab-Wrapper .new-wrapper .nav',
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'newsim_tab_background',
				'label' => esc_html__('Background', 'newsim-core'),
				'types' => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .Newsim-Tab-Wrapper .new-wrapper .nav',
			]
		);

		$this->add_control(
			'newsim_tab_items_heading_heding',
			[
				'label' => esc_html__('Heading', 'newsim-core'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'newsim_tab_heading_color',
			[
				'label' => esc_html__('Color', 'newsim-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .Newsim-Tab-Wrapper .theme-heading-title .title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'newsim_tab_heading_typography',
				'selector' => '{{WRAPPER}} .Newsim-Tab-Wrapper .theme-heading-title .title',
			]
		);

		$this->add_control(
			'newsim_tab_items_heading_title',
			[
				'label' => esc_html__('Items Title', 'newsim-core'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'newsim_tab_items_color',
			[
				'label' => esc_html__('Color', 'newsim-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .Newsim-Tab-Wrapper .nav-item a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'newsim_tab_items_active_color',
			[
				'label' => esc_html__('Active Color', 'newsim-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .Newsim-Tab-Wrapper .nav-item.active a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'newsim_tab_items_typography',
				'selector' => '{{WRAPPER}} .Newsim-Tab-Wrapper .nav-item a',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'newsim_tab_items_text_stroke',
				'selector' => '{{WRAPPER}} .Newsim-Tab-Wrapper .nav-item a',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'newsim_tab_items_title_shadow',
				'selector' => '{{WRAPPER}} .Newsim-Tab-Wrapper .nav-item a',
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
		extract($settings);
?>
		<div class="Newsim-Tab-Wrapper">
			<div class="new-wrapper">
				<!-- Title -->
				<?php if (!empty($newsim_tab_title)) : ?>
					<div class="theme-heading-title">
						<div class="title"><?php esc_html_e($newsim_tab_title, 'newsim-core') ?></div>
					</div>
				<?php endif; ?>
				<ul class="nav nav-pills">
					<!-- Tabs -->
					<?php if (!empty($newsim_tab_items_tabs)) :
						foreach ($newsim_tab_items_tabs as $tab) :
					?>
							<li class="nav-item" role="presentation">
								<a href="" target="_self" for="<?php esc_html_e($tab['newsim_tabs_posts_select'], 'newsim-core') ?>" class="nav-link " data-bs-toggle="pill" data-bs-target=""><?php esc_html_e($tab['newsim_tab_items_title'], 'newsim-core') ?></a>
							</li>
					<?php endforeach;
					endif; ?>
				</ul>
			</div>
			<div class="tab-content" id="pills-tabContent">

				<?php if (!empty($newsim_tab_items_tabs)) :
					foreach ($newsim_tab_items_tabs as $tab) :
						$elementor = Plugin::instance(); ?>

						<div class="section_container" id="exapand_<?php echo $tab['newsim_tabs_posts_select'] ?>">
							<?php
							if (is_admin()) { // Check if inside Admin Section
								$screen = get_current_screen();
								if ($screen->is_block_editor == 1) { // Check if inside an editor
									$edit_url = get_edit_post_link($tab['newsim_tabs_posts_select']);
							?>
									<div class="sec_edit_container">
										<span class="section_edit"><a href="<?php esc_html_e(str_replace('action=edit', 'action=elementor', $edit_url), 'newsim-core') ?>" target="_blank"><i class="eicon-pencil"></i></a></span>
									</div>
							<?php
								}
							}
							?>
							<!-- Post View -->
							<?php echo  $elementor->frontend->get_builder_content_for_display($tab['newsim_tabs_posts_select']); ?>
						</div>
				<?php endforeach;
				endif; ?>

			</div>
		</div>
<?php
	}
}
Plugin::instance()->widgets_manager->register_widget_type(new Yotta_Tabs_Content_Two_Widget());
