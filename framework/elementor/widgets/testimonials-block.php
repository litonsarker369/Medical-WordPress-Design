<?php
/**
 * Medyc Elementor Global Widget Testimonial_Block.
 *
 * @package    Medyc - Themewisdom
 * @subpackage Medyc 
 * @since      Medyc 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	return; // Exit if it is accessed directly
}

class Medyc_Elementor_Global_Widgets_Testimonial_Block extends Widget_Base {

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_Testimonial_Block widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Medyc-Global-Widgets-Testimonial-Block';
	}

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_Testimonial_Block widget Title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Testimonial Block', 'medyc' );
	}

	/**
	 * Retrieve medyc_Elementor_Global_Widget_Testimonial_Block widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-archive-title';
	}

	/**
	 * Retrieve the list of categories the medyc_Elementor_Global_Widget_Testimonial_Block widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'medyc-widget-blocks' );
	}
	
	/**
	 * Register medyc_Elementor_Global_Widget_Testimonial_Block widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		// Widget title section
		$this->start_controls_section(
			'section_testimonial_block_title_manage',
			array(
				'label' => esc_html__( 'Testimonial Block', 'medyc' ),
			)
		);

	    $this->add_control(
	        'about_title',
	        [
	            'label' => 'Title',
	            'type' => Controls_Manager::TEXT,
	            'default' => 'Testimonials',
	        ]
	    );

	    
		$repeater = new Repeater();

		$repeater->add_control(
			'list_title', [
				'label' => __( 'Name', 'medyc' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'list_occup', [
				'label' => __( 'Occoupation / Organization', 'medyc' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'list_icon', [
				'label' => __( 'Image', 'medyc' ),
				'type' => Controls_Manager::MEDIA,
			]
		);

		$repeater->add_control(
			'list_testimonial', [
				'label' => __( 'Testimonial Text', 'medyc' ),
				'type' => Controls_Manager::TEXTAREA,
			]
		);

		$this->add_control(
			'list',
			[
				'label' => __( 'Testimonials List', 'medyc' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ list_title }}}',
			]
		);

		$repeater = new Repeater();

	    $this->end_controls_section();

	}

	/**
	 * Render Medyc_Elementor_Global_Widgets_Team_Block widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

	    $about_title = ! empty( $settings['about_title'] ) ? $settings['about_title'] : 'Team';


	    // Output the section structure
	    ?>

	    <section class="testimonials">
	        <div class="flex-container w-container">
	            <div class="main-title main_title2">
	                <h2 class="main-title-heading title-style-2"><?php echo esc_html( $about_title ); ?></h2>
	            </div>
	            <div class="testimonials-row w-row">
	            	<?php 
	            		$total_items = count($settings['list']);
	                    $columns = 12 / $total_items;
	            		foreach (  $settings['list'] as $item ) { 
	            	?>
	                <div class="tesimonials-three-column w-col w-col-<?php echo esc_attr($columns); ?>">
	                    <div class="testimonial-item">
	                        <img src="<?php echo esc_url($item['list_icon']['url']); ?>" loading="lazy" alt="Testimonial Author " class="test-author-img" />
	                        <h4 class="tesimonials-author-name"><?php echo esc_html($item['list_title']); ?></h4>
	                        <div class="testimonial-span"><?php echo esc_html($item['list_occup']); ?></div>
	                        <p class="tesimonial-paragraph"><?php echo esc_html($item['list_testimonial']); ?></p>
	                    </div>
	                </div>
	            	<?php } ?>
	            </div>
	        </div>
	    </section>
    
    <?php

	}
}
