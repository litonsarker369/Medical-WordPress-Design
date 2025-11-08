<?php
/**
 * Medyc Elementor Global Widget Contact_Block.
 *
 * @package    Medyc - Themewisdom
 * @subpackage Medyc 
 * @since      Medyc 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	return; // Exit if it is accessed directly
}

class Medyc_Elementor_Global_Widgets_Contact_Block extends Widget_Base {

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_Contact_Block widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Medyc-Global-Widgets-Contact-Block';
	}

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_Contact_Block widget Title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Contact Block', 'medyc' );
	}

	/**
	 * Retrieve medyc_Elementor_Global_Widget_Contact_Block widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-archive-title';
	}

	/**
	 * Retrieve the list of categories the medyc_Elementor_Global_Widget_Contact_Block widget belongs to.
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
	 * Register medyc_Elementor_Global_Widget_Contact_Block widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		// Widget title section
		$this->start_controls_section(
			'section_contact_block_title_manage',
			array(
				'label' => esc_html__( 'Contact Title', 'medyc' ),
			)
		);

	    $this->add_control(
	        'about_title',
	        [
	            'label' => 'Contact Title',
	            'type' => Controls_Manager::TEXT,
	        ]
	    );

	    $this->add_control(
	        'about_subtitle',
	        [
	            'label' => 'Contact Subtitle',
	            'type' => Controls_Manager::TEXT,
	            'default' => 'get in touch',
	        ]
	    );

	    $this->add_control(
	        'about_description',
	        [
	            'label' => 'Contact Description',
	            'type' => Controls_Manager::TEXTAREA,
	            'default' => 'Contact Description',
	        ]
	    );

	    $this->add_control(
	        'about_contact',
	        [
	            'label' => 'Contact Form Shortcode',
	            'type' => Controls_Manager::WYSIWYG,
	        ]
	    );

	    $this->end_controls_section();

	}

	/**
	 * Render Medyc_Elementor_Global_Widgets_Contact_Block widget output on the frontend.
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

	    <section class="contact-text">
		    <div class="flex-container w-container">
		        <div class="contact-upper">
		            <div class="row w-row">
		                <div class="six-column w-clearfix w-col w-col-6">
		                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/caption-stripes_1caption-stripes.png" loading="lazy" alt="Stripes" class="contact-stripes" />
		                    <h5 class="contact-title"><?php echo esc_html($settings['about_title']); ?></h5>
		                    <div class="contact-span"><?php echo esc_html($settings['about_subtitle']); ?></div>
		                    <p class="contact-paragraph">
		                        <?php echo esc_html($settings['about_description']); ?>
		                    </p>
		                </div>
		                <div class="six-column w-col w-col-6">
		                  <div class="main-form-wrapper w-form">
		                       <?php echo do_shortcode($settings['about_contact']); ?>
		                  </div>
		                </div>
		            </div>
		        </div>
		    </div>
	    </section>
    
    <?php

	}
}
