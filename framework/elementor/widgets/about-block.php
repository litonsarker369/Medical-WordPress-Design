<?php
/**
 * Medyc Elementor Global Widget About_Block.
 *
 * @package    Medyc - Themewisdom
 * @subpackage Medyc 
 * @since      Medyc 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	return; // Exit if it is accessed directly
}

class Medyc_Elementor_Global_Widgets_About_Block extends Widget_Base {

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_About_Block widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Medyc-Global-Widgets-About-Block';
	}

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_About_Block widget Title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'About Block', 'medyc' );
	}

	/**
	 * Retrieve medyc_Elementor_Global_Widget_About_Block widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-archive-title';
	}

	/**
	 * Retrieve the list of categories the medyc_Elementor_Global_Widget_About_Block widget belongs to.
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
	 * Register medyc_Elementor_Global_Widget_About_Block widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		// Widget title section
		$this->start_controls_section(
			'section_about_block_title_manage',
			array(
				'label' => esc_html__( 'About Block', 'medyc' ),
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
	        'about_subtitle',
	        [
	            'label' => 'Subtitle',
	            'type' => Controls_Manager::TEXT,
	        ]
	    );

	    $this->add_control(
	        'about_description',
	        [
	            'label' => 'About Description',
	            'type' => Controls_Manager::WYSIWYG,
	        ]
	    );

	    $this->add_control(
	        'square_image',
	        [
	            'label' => 'Large Image',
	            'type' => Controls_Manager::MEDIA,
	            'default' => [],
	        ]
	    );

	    $this->add_control(
	        'square_image2',
	        [
	            'label' => 'Small Image 1',
	            'type' => Controls_Manager::MEDIA,
	            'default' => [],
	        ]
	    );

	    $this->add_control(
	        'square_image3',
	        [
	            'label' => 'Small Image 2',
	            'type' => Controls_Manager::MEDIA,
	            'default' => [],
	        ]
	    );

		$repeater = new Repeater();

		$repeater->add_control(
			'list_title', [
				'label' => __( 'List Item', 'medyc' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'list',
			[
				'label' => __( 'All Services List', 'medyc' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ list_title }}}',
			]
		);

	    $this->end_controls_section();

	}

	/**
	 * Render Medyc_Elementor_Global_Widgets_About_Block widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

	    $about_title = ! empty( $settings['about_title'] ) ? $settings['about_title'] : 'About';
    	$about_subtitle = ! empty( $settings['about_subtitle'] ) ? $settings['about_subtitle'] : '';
    	$about_description = ! empty( $settings['about_description'] ) ? $settings['about_description'] : '';
    	$square_image = ! empty( $settings['square_image']['url'] ) ? $settings['square_image']['url'] : '';
    	$square_image2 = ! empty( $settings['square_image2']['url'] ) ? $settings['square_image2']['url'] : '';
    	$square_image3 = ! empty( $settings['square_image3']['url'] ) ? $settings['square_image3']['url'] : '';


	    // Output the section structure
	    ?>

	    <div class="welcome">
	        <div class="flex-container w-container">
	            <div class="row w-row">
	                <div class="six-column w-col w-col-6 w-col-stack">
	                    <div class="row w-row">
	                        <div class="five-column w-col w-col-5">
	                            <img src="<?php echo esc_url($square_image2); ?>" loading="lazy" width="400" alt="Small image" class="welcome-image" />
	                            <img src="<?php echo esc_url($square_image3); ?>" loading="lazy" alt="Doctor Standing" class="welcome-image" />
	                        </div>
	                        <div class="seven-column w-col w-col-7">
	                            <div class="padding-div">
	                                <img src="<?php echo esc_url($square_image); ?>" loading="lazy" alt="Large Image" class="welcome-image" />
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="six-column w-col w-col-6 w-col-stack">
	                    <div class="welcome-text">
	                        <div class="tab-span welcome_about"><?php echo esc_html( $about_subtitle ); ?></div>
	                        <h2 class="tab-content-title welcome_about"><?php echo esc_html( $about_title ); ?></h2>
	                        
	                        <?php echo do_shortcode($settings['about_description']); ?>
	                        
	                        <div class="page-border"></div>
	                        <div class="welcome-services">
                                <ul role="list" class="welcome-list-row w-list-unstyled">
                                	<?php 
					            		foreach (  $settings['list'] as $item ) { 
					            	?>
                                    <li class="welcome-list-item w-clearfix">
                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/about_iages_39about_iages_38.png" loading="lazy" alt="tick icon" class="tick-icon" />
                                        <div class="welcome-list-item-text"><?php echo esc_html($item['list_title']); ?></div>
                                    </li>
                                	<?php } ?>
                                </ul>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
    
    <?php

	}
}
