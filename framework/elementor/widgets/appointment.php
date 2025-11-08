<?php
/**
 * Medyc Elementor Global Widget Appointment_Block.
 *
 * @package    Medyc - Themewisdom
 * @subpackage Medyc 
 * @since      Medyc 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	return; // Exit if it is accessed directly
}

class Medyc_Elementor_Global_Widgets_Appointment_Block extends Widget_Base {

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_Appointment_Block widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Medyc-Global-Widgets-Appointment-Block';
	}

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_Appointment_Block widget Title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Appointment Block', 'medyc' );
	}

	/**
	 * Retrieve medyc_Elementor_Global_Widget_Appointment_Block widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-archive-title';
	}

	/**
	 * Retrieve the list of categories the medyc_Elementor_Global_Widget_Appointment_Block widget belongs to.
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
	 * Register medyc_Elementor_Global_Widget_Appointment_Block widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		// Widget title section
		$this->start_controls_section(
			'section_appointment_block_title_manage',
			array(
				'label' => esc_html__( 'Appointment Block', 'medyc' ),
			)
		);

	    $this->add_control(
	        'about_title',
	        [
	            'label' => 'Booking shortcode',
	            'type' => Controls_Manager::WYSIWYG,
	        ]
	    );

	    
	    $this->end_controls_section();

	}

	/**
	 * Render Medyc_Elementor_Global_Widgets_Appointment_Block widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

	    $about_title = ! empty( $settings['about_title'] ) ? $settings['about_title'] : '';


	    // Output the section structure
	    ?>
	    <section class="eye-surgery">
	        <div class="flex-container w-container">
	        	<div class="appointment-system">
					<?php echo do_shortcode( $about_title ); ?>
	        	</div>
	        </div>
	    </section>
    
    <?php

	}
}
