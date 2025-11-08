<?php
/**
 * Medyc Elementor Global Widget Services_Block_Alt.
 *
 * @package    Medyc - Themewisdom
 * @subpackage Medyc 
 * @since      Medyc 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	return; // Exit if it is accessed directly
}

class Medyc_Elementor_Global_Widgets_Services_Block_Alt extends Widget_Base {

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_Services_Block_Alt widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Medyc-Global-Widgets-Services-Block-Alt';
	}

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_Services_Block_Alt widget Title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Services Block Alternative', 'medyc' );
	}

	/**
	 * Retrieve medyc_Elementor_Global_Widget_Services_Block_Alt widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-archive-title';
	}

	/**
	 * Retrieve the list of categories the medyc_Elementor_Global_Widget_Services_Block_Alt widget belongs to.
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
	 * Register medyc_Elementor_Global_Widget_Services_Block_Alt widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		// Widget title section
		$this->start_controls_section(
			'section_services_block_alt_title_manage',
			array(
				'label' => esc_html__( 'Services Block Alternative', 'medyc' ),
			)
		);

		$this->add_control(
	        'about_title',
	        [
	            'label' => 'Title',
	            'type' => Controls_Manager::TEXT,
	        ]
	    );

	    $this->add_control(
	        'square_image',
	        [
	            'label' => 'Image',
	            'type' => Controls_Manager::MEDIA,
	        ]
	    );
	    
		$repeater = new Repeater();

		$repeater->add_control(
			'list_title', [
				'label' => __( 'Service Name', 'medyc' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'list_desc', [
				'label' => __( 'Service Description', 'medyc' ),
				'type' => Controls_Manager::TEXTAREA,
			]
		);

		$repeater->add_control(
			'list_icon', [
				'label' => __( 'Service Icon Image', 'medyc' ),
				'type' => Controls_Manager::MEDIA,
			]
		);

		$repeater->add_control(
			'list_link', [
				'label' => __( 'Service Link Page', 'medyc' ),
				'type' => Controls_Manager::TEXT,
			]
		);


		$this->add_control(
			'list',
			[
				'label' => __( 'Services List Left', 'medyc' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ list_title }}}',
			]
		);
	    
		$repeater2 = new Repeater();

		$repeater2->add_control(
			'list_title', [
				'label' => __( 'Service Name', 'medyc' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$repeater2->add_control(
			'list_desc', [
				'label' => __( 'Services Description', 'medyc' ),
				'type' => Controls_Manager::TEXTAREA,
			]
		);

		$repeater2->add_control(
			'list_icon', [
				'label' => __( 'Service Icon Image', 'medyc' ),
				'type' => Controls_Manager::MEDIA,
			]
		);

		$repeater2->add_control(
			'list_link', [
				'label' => __( 'Service Link Page', 'medyc' ),
				'type' => Controls_Manager::TEXT,
			]
		);


		$this->add_control(
			'list2',
			[
				'label' => __( 'Services List Right', 'medyc' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater2->get_controls(),
				'title_field' => '{{{ list_title }}}',
			]
		);

	    $this->end_controls_section();

	}

	/**
	 * Render Medyc_Elementor_Global_Widgets_Services_Block_Alt widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

	    $about_title = ! empty( $settings['about_title'] ) ? $settings['about_title'] : '';
    	$square_image = ! empty( $settings['square_image']['url'] ) ? $settings['square_image']['url'] : '';

	    // Output the section structure
	    ?>

	    <section class="services-2">
	        <div class="flex-container w-container">
	            <div class="main-title-middle">
	                <h2 class="main-title-heading title-style-2 head_serv2"><?php echo do_shortcode($about_title); ?></h2>
	            </div>
	            <div class="services-2-row w-row">
	                <div class="four-column w-col w-col-4">
	                    <div class="_50px-space"></div>
	                    <?php 
			        		foreach (  $settings['list'] as $item ) { 
			        	?>
	                    <a href="<?php echo esc_url($item['list_link']); ?>" class="link-to-single-service w-inline-block">
	                        <div class="service-2-item">
	                            <img src="<?php echo esc_url($item['list_icon']['url']); ?>" loading="lazy" alt="Services Icon" class="serv-2-icon" />
	                            <h4 class="service-2-item-title"><?php echo esc_html($item['list_title']); ?></h4>
	                            <div class="service-2-item-text"><?php echo esc_html($item['list_desc']); ?></div>
	                        </div>
	                    </a>
	                    <?php } ?>
	                </div>
	                <div class="four-column w-col w-col-4">
	                    <img
	                        src="<?php echo esc_url($square_image); ?>"
	                        loading="lazy"
	                        alt="Services Doctor"
	                        class="service-2-main-img"
	                    />
	                </div>
	                <div class="four-column w-col w-col-4">
	                    <div class="_50px-space"></div>
	                    <?php foreach (  $settings['list2'] as $item2 ) { ?>
	                    <a href="<?php echo esc_url($item2['list_link']); ?>" class="link-to-single-service w-inline-block">
	                        <div class="service-2-item serv2_left">
	                            <img src="<?php echo esc_url($item2['list_icon']['url']); ?>" loading="lazy" alt="Services Icon" class="serv-2-icon" />
	                            <h4 class="service-2-item-title"><?php echo esc_html($item2['list_title']); ?></h4>
	                            <div class="service-2-item-text"><?php echo esc_html($item2['list_desc']); ?></div>
	                        </div>
	                    </a>
	                	<?php } ?>
	                </div>
	            </div>
	        </div>
	    </section>
    
    <?php

	}
}
