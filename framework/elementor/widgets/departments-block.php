<?php
/**
 * Medyc Elementor Global Widget Departments_Block.
 *
 * @package    Medyc - Themewisdom
 * @subpackage Medyc 
 * @since      Medyc 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	return; // Exit if it is accessed directly
}

class Medyc_Elementor_Global_Widgets_Departments_Block extends Widget_Base {

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_Departments_Block widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Medyc-Global-Widgets-Departments-Block';
	}

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_Departments_Block widget Title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Departments Block', 'medyc' );
	}

	/**
	 * Retrieve medyc_Elementor_Global_Widget_Departments_Block widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-archive-title';
	}

	/**
	 * Retrieve the list of categories the medyc_Elementor_Global_Widget_Departments_Block widget belongs to.
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
	 * Register medyc_Elementor_Global_Widget_Departments_Block widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		// Widget title section
		$this->start_controls_section(
			'section_departments_block_title_manage',
			array(
				'label' => esc_html__( 'Departments Block', 'medyc' ),
			)
		);

	    $this->add_control(
	        'square_image',
	        [
	            'label' => 'Image',
	            'type' => Controls_Manager::MEDIA,
	            'default' => [],
	        ]
	    );
	    
		$repeater = new Repeater();

		$repeater->add_control(
			'list_title', [
				'label' => __( 'Title', 'medyc' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'list_desc', [
				'label' => __( 'Number', 'medyc' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'list_link', [
				'label' => __( 'Link', 'medyc' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'list_icon', [
				'label' => __( 'Image', 'medyc' ),
				'type' => Controls_Manager::MEDIA,
			]
		);


		$this->add_control(
			'list',
			[
				'label' => __( 'Departments List', 'medyc' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ list_title }}}',
			]
		);
	    

	    $this->end_controls_section();

	}

	/**
	 * Render Medyc_Elementor_Global_Widgets_Departments_Block widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

    	$square_image = ! empty( $settings['square_image']['url'] ) ? $settings['square_image']['url'] : '';

	    // Output the section structure
	    ?>

	    <div class="departments">
	        <div class="flex-container w-container">
	            <div class="departments-row w-row">
	                <div class="three-column w-col w-col-3">
	                	<img src="<?php echo esc_url($square_image); ?>" loading="lazy" alt="Departments" class="department-image" />
	                </div>
	                <?php 
		        		foreach (  $settings['list'] as $item ) { 
		        	?>
	                <div class="three-column w-col w-col-3">
	                    <a href="<?php echo esc_url($item['list_link']); ?>" class="department-links w-inline-block">
	                        <img src="<?php echo esc_url($item['list_icon']['url']); ?>" loading="lazy" alt="hospitals" class="department-small-images" />
	                        <div class="department-text">
	                            <div class="department-number"><?php echo esc_html($item['list_desc']); ?></div>
	                            <div class="department-name"><?php echo esc_html($item['list_title']); ?></div>
	                        </div>
	                    </a>
	                </div>
	                <?php } ?>
	            </div>
	        </div>
	    </div>
    
    <?php

	}
}
