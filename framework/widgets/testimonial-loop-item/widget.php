<?php
namespace MaputoElementorWidgets\Widgets\TestimonialLoopItem;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

class Widget_TestimonialLoopItem extends Widget_Base {

	public function get_name() {
		return 'bt-testimonial-loop-item';
	}

	public function get_title() {
		return __( 'Testimonial Loop Item', 'maputo' );
	}

	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	public function get_categories() {
		return [ 'maputo' ];
	}

	protected function register_layout_section_controls() {

	}

	protected function register_style_section_controls() {

		$this->start_controls_section(
			'section_style_box',
			[
				'label' => esc_html__( 'Box', 'maputo' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);


		$this->add_control(
			'box_border_radius',
			[
				'label' => __( 'Border Radius', 'maputo' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bt-post--inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'box_padding',
			[
				'label' => __( 'Padding', 'maputo' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bt-post--inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'selector' => '{{WRAPPER}} .bt-post--inner',
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_content',
			[
				'label' => esc_html__( 'Content', 'maputo' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'quote_icon_style',
			[
				'label' => __( 'Quote Icon', 'maputo' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'quote_icon_color',
			[
				'label' => __( 'Color', 'maputo' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bt-post--quote-icon svg path' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title_style',
			[
				'label' => __( 'Title', 'maputo' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'maputo' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bt-post--title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title_color_hover',
			[
				'label' => __( 'Color Hover', 'maputo' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bt-post:hover .bt-post--title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Typography', 'maputo' ),
				'default' => '',
				'selector' => '{{WRAPPER}} .bt-post--title',
			]
		);

		$this->add_control(
			'job_style',
			[
				'label' => __( 'Job', 'maputo' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'job_color',
			[
				'label' => __( 'Color', 'maputo' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bt-post--job' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'job_color_hover',
			[
				'label' => __( 'Color Hover', 'maputo' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bt-post:hover .bt-post--job' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'job_typography',
				'label' => __( 'Typography', 'maputo' ),
				'default' => '',
				'selector' => '{{WRAPPER}} .bt-post--job',
			]
		);

		$this->add_control(
			'desc_style',
			[
				'label' => __( 'Description', 'maputo' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label' => __( 'Color', 'maputo' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bt-post--desc' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => __( 'Typography', 'maputo' ),
				'default' => '',
				'selector' => '{{WRAPPER}} .bt-post--desc',
			]
		);

		$this->end_controls_section();

	}

	protected function register_controls() {
		$this->register_layout_section_controls();
		$this->register_style_section_controls();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		?>
			<div class="bt-elwg-testimonial-loop-item--default">
				<?php get_template_part( 'framework/templates/testimonial', 'style' ); ?>
	    </div>
		<?php
	}

	protected function content_template() {

	}
}
