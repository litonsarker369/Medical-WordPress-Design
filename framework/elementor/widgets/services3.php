<?php
/**
 * Medyc Elementor Global Widget Services_Block_Alt2.
 *
 * @package    Medyc - Themewisdom
 * @subpackage Medyc 
 * @since      Medyc 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	return; // Exit if it is accessed directly
}

class Medyc_Elementor_Global_Widgets_Services_Block_Alt2 extends Widget_Base {

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_Services_Block_Alt2 widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Medyc-Global-Widgets-Services-Block-Alt2';
	}

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_Services_Block_Alt2 widget Title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Services Block Alternative 2', 'medyc' );
	}

	/**
	 * Retrieve medyc_Elementor_Global_Widget_Services_Block_Alt2 widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-archive-title';
	}

	/**
	 * Retrieve the list of categories the medyc_Elementor_Global_Widget_Services_Block_Alt2 widget belongs to.
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
	 * Register medyc_Elementor_Global_Widget_Services_Block_Alt2 widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		// Widget title section
		$this->start_controls_section(
			'section_services_block_alt2_title_manage',
			array(
				'label' => esc_html__( 'Services Block Alternative 2', 'medyc' ),
			)
		);

		$this->add_control(
	        'about_title',
	        [
	            'label' => 'Title',
	            'type' => Controls_Manager::TEXT,
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
				'label' => __( 'Services List', 'medyc' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ list_title }}}',
			]
		);
	    

	    $this->end_controls_section();

	}

	/**
	 * Render Medyc_Elementor_Global_Widgets_Services_Block_Alt2 widget output on the frontend.
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

	    <section class="about-services" >
	        <div class="flex-container w-container">
	            <div class="main-title main_title2 main_title_about"><h3 class="main-title-heading title-style-2"><?php echo do_shortcode($about_title); ?></h3></div>
	            <div class="services-cms w-dyn-list">
	                <div role="list" class="services-cms-list w-dyn-items w-row">
	                	<?php 
	                		$total_items = count($settings['list']);
	                    	if($total_items <= 3) {
	                    		$columns = 12 / $total_items;
	                    	} else {
	                    		$columns = 3;
	                    	}
			        		foreach (  $settings['list'] as $item ) { 
			        	?>
	                    <div role="listitem" class="services-item w-dyn-item w-col w-col-<?php echo esc_attr($columns); ?>">
	                        <div class="services-about-inner">
	                            <a href="<?php echo esc_url($item['list_link']); ?>" class="single-services-link w-inline-block">
	                                <img
	                                    loading="lazy"
	                                    alt="Service Image"
	                                    src="<?php echo esc_url($item['list_icon']['url']); ?>"
	                                    class="service-icon" />
	                                <h2 class="single-service-heading"><?php echo esc_html($item['list_title']); ?></h2>
	                                <p class="single-service-paragraph"><?php echo esc_html($item['list_desc']); ?></p>
	                            </a>
	                        </div>
	                    </div>
	                    <?php } ?>
	                    
	                </div>
	            </div>
	        </div>
	    </section>
    
    <?php

	}
}
