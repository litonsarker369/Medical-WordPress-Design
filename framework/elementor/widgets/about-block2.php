<?php
/**
 * Medyc Elementor Global Widget About_Block2.
 *
 * @package    Medyc - Themewisdom
 * @subpackage Medyc 
 * @since      Medyc 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	return; // Exit if it is accessed directly
}

class Medyc_Elementor_Global_Widgets_About_Block2 extends Widget_Base {

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_About_Block2 widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Medyc-Global-Widgets-About-Block2';
	}

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_About_Block2 widget Title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'About Block 2', 'medyc' );
	}

	/**
	 * Retrieve medyc_Elementor_Global_Widget_About_Block2 widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-archive-title';
	}

	/**
	 * Retrieve the list of categories the medyc_Elementor_Global_Widget_About_Block2 widget belongs to.
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
	 * Register medyc_Elementor_Global_Widget_About_Block2 widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		// Widget title section
		$this->start_controls_section(
			'section_about_block2_title_manage',
			array(
				'label' => esc_html__( 'About Block 2', 'medyc' ),
			)
		);

	    $this->add_control(
	        'about_title',
	        [
	            'label' => 'Title',
	            'type' => Controls_Manager::TEXT,
	            'default' => 'About',
	        ]
	    );

	    $this->add_control(
	        'about_description',
	        [
	            'label' => 'About Description',
	            'type' => Controls_Manager::TEXTAREA,
	        ]
	    );

	    $this->add_control(
	        'about_title2',
	        [
	            'label' => 'Title 2',
	            'type' => Controls_Manager::TEXT,
	            'default' => 'About',
	        ]
	    );

	    $this->add_control(
	        'about_description2',
	        [
	            'label' => 'About Description 2',
	            'type' => Controls_Manager::TEXTAREA,
	        ]
	    );

	    $this->add_control(
	        'square_image',
	        [
	            'label' => 'Image',
	            'type' => Controls_Manager::MEDIA,
	            'default' => [],
	        ]
	    );

	    $this->add_control(
	        'about_title3',
	        [
	            'label' => 'Action Banner Title',
	            'type' => Controls_Manager::TEXT,
	            'default' => 'About',
	        ]
	    );

	    $this->add_control(
	        'about_description3',
	        [
	            'label' => 'Action Banner Description',
	            'type' => Controls_Manager::TEXTAREA,
	        ]
	    );

	    $this->add_control(
	        'square_image2',
	        [
	            'label' => 'Banner Image',
	            'type' => Controls_Manager::MEDIA,
	            'default' => [],
	        ]
	    );

	    $this->add_control(
	        'about_button',
	        [
	            'label' => 'Button Text',
	            'type' => Controls_Manager::TEXT,
	        ]
	    );

	    $this->add_control(
	        'about_link',
	        [
	            'label' => 'Button Link',
	            'type' => Controls_Manager::TEXT,
	        ]
	    );

	    $this->end_controls_section();

	}

	/**
	 * Render Medyc_Elementor_Global_Widgets_About_Block2 widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

	    $about_title = ! empty( $settings['about_title'] ) ? $settings['about_title'] : '';
    	$about_description = ! empty( $settings['about_description'] ) ? $settings['about_description'] : '';
	    $about_title2 = ! empty( $settings['about_title2'] ) ? $settings['about_title2'] : '';
    	$about_description2 = ! empty( $settings['about_description2'] ) ? $settings['about_description2'] : '';
	    $about_title3 = ! empty( $settings['about_title3'] ) ? $settings['about_title3'] : '';
    	$about_description3 = ! empty( $settings['about_description3'] ) ? $settings['about_description3'] : '';
    	$square_image = ! empty( $settings['square_image']['url'] ) ? $settings['square_image']['url'] : '';
    	$square_image2 = ! empty( $settings['square_image2']['url'] ) ? $settings['square_image2']['url'] : '';
	    $about_button = ! empty( $settings['about_button'] ) ? $settings['about_button'] : '';
    	$about_link = ! empty( $settings['about_link'] ) ? $settings['about_link'] : '';


	    // Output the section structure
	    ?>

	    <div class="hire-section">
	        <div class="flex-container w-container">
	            <div class="row w-row">
	                <div class="eight-column w-col w-col-8 w-col-stack">
	                    <img
	                        src="<?php echo esc_url($square_image); ?>"
	                        loading="lazy"
	                        alt="About Image"
	                        class="hire-main-image"
	                    />
	                    <div class="row w-row">
	                        <div class="six-column w-col w-col-6">
	                            <div class="hire_text">
	                                <h3 class="hire-title"><?php echo esc_html( $about_title ); ?></h3>
	                                <p class="main-paragraph inter-font"><?php echo esc_html( $about_description ); ?></p>
	                            </div>
	                        </div>
	                        <div class="six-column w-col w-col-6">
	                            <div class="hire_text hire_text2">
	                                <h3 class="hire-title"><?php echo esc_html( $about_title2 ); ?></h3>
	                                <p class="main-paragraph inter-font"><?php echo esc_html( $about_description2 ); ?></p>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="four-column no-padding-column w-col w-col-4 w-col-stack book-banner">
	                    <img src="<?php echo esc_url($square_image2); ?>" loading="lazy" alt="Image 2" class="Action Image" />
	                    <div class="hire_absolute">
	                        <h2 class="hire-apply-title"><?php echo esc_html( $about_title3 ); ?></h2>
	                        <p class="main-paragraph color-white inter-font"><?php echo esc_html( $about_description3 ); ?></p>
	                        <a href="<?php echo esc_url( $about_link ); ?>" class="hire-button w-button"><?php echo esc_html( $about_button ); ?></a>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
    
    <?php

	}
}
