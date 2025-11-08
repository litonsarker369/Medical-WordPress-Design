<?php
/**
 * Medyc Elementor Global Widget Contact_Block2.
 *
 * @package    Medyc - Themewisdom
 * @subpackage Medyc 
 * @since      Medyc 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	return; // Exit if it is accessed directly
}

class Medyc_Elementor_Global_Widgets_Contact_Block2 extends Widget_Base {

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_Contact_Block2 widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Medyc-Global-Widgets-Contact-Block2';
	}

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_Contact_Block2 widget Title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Contact Block 2', 'medyc' );
	}

	/**
	 * Retrieve medyc_Elementor_Global_Widget_Contact_Block2 widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-archive-title';
	}

	/**
	 * Retrieve the list of categories the medyc_Elementor_Global_Widget_Contact_Block2 widget belongs to.
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
	 * Register medyc_Elementor_Global_Widget_Contact_Block2 widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		// Widget title section
		$this->start_controls_section(
			'section_Contact_block2_title_manage',
			array(
				'label' => esc_html__( 'Contact Block 2', 'medyc' ),
			)
		);

	    $this->add_control(
	        'about_phone',
	        [
	            'label' => 'Phone Number',
	            'type' => Controls_Manager::TEXT,
	        ]
	    );

	    $this->add_control(
	        'about_email',
	        [
	            'label' => 'Email',
	            'type' => Controls_Manager::TEXT,
	        ]
	    );

	    $this->add_control(
	        'about_address',
	        [
	            'label' => 'Address',
	            'type' => Controls_Manager::TEXT,
	        ]
	    );

	    $this->end_controls_section();

	}

	/**
	 * Render Medyc_Elementor_Global_Widgets_Contact_Block2 widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

	    // Output the section structure
	    ?>

	    <div class="blue-bg">
	        <div class="flex-container w-container">
	            <div class="row w-row">
	                <div class="four-column w-col w-col-4">
	                    <div class="contact-infos">
	                        <div class="contact-info-icon"></div>
	                        <div class="contact-info-text"><?php echo esc_html( $settings['about_phone'] ); ?></div>
	                    </div>
	                </div>
	                <div class="four-column w-col w-col-4">
	                    <div class="contact-infos">
	                        <div class="contact-info-icon"></div>
	                        <a href="mailto:<?php echo esc_attr( $settings['about_email'] ); ?>" class="mail-link contact-info-text"><?php echo esc_html( $settings['about_email'] ); ?></a>
	                    </div>
	                </div>
	                <div class="four-column w-col w-col-4">
	                    <div class="contact-infos">
	                        <div class="contact-info-icon"></div>
	                        <div class="contact-info-text"><?php echo esc_html( $settings['about_address'] ); ?></div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>

    <?php

	}
}
