<?php
/**
 * Medyc Elementor Global Widget Services_Block.
 *
 * @package    Medyc - Themewisdom
 * @subpackage Medyc 
 * @since      Medyc 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	return; // Exit if it is accessed directly
}

class Medyc_Elementor_Global_Widgets_Services_Block extends Widget_Base {

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_Services_Block widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Medyc-Global-Widgets-Services-Block';
	}

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_Services_Block widget Title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Services Block', 'medyc' );
	}

	/**
	 * Retrieve medyc_Elementor_Global_Widget_Services_Block widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-archive-title';
	}

	/**
	 * Retrieve the list of categories the medyc_Elementor_Global_Widget_Services_Block widget belongs to.
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
	 * Register medyc_Elementor_Global_Widget_Services_Block widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		// Widget title section
		$this->start_controls_section(
			'section_services_block_title_manage',
			array(
				'label' => esc_html__( 'Services Block', 'medyc' ),
			)
		);
	    
		$repeater = new Repeater();

		$repeater->add_control(
			'list_title', [
				'label' => __( 'Services Name', 'medyc' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'list_desc', [
				'label' => __( 'Services Description', 'medyc' ),
				'type' => Controls_Manager::TEXTAREA,
			]
		);

		$repeater->add_control(
			'list_icon', [
				'label' => __( 'Icon Image', 'medyc' ),
				'type' => Controls_Manager::MEDIA,
			]
		);


		$this->add_control(
			'list',
			[
				'label' => __( 'Tool List', 'medyc' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ list_title }}}',
			]
		);

		$repeater = new Repeater();

	    $this->end_controls_section();

	}

	/**
	 * Render Medyc_Elementor_Global_Widgets_Services_Block widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

	    // Output the section structure
	    ?>

        <div class="w-layout-layout services-grid wf-layout-layout">

        	<?php 
        		foreach (  $settings['list'] as $item ) { 
        	?>
            <div class="w-layout-cell service-item">
                <img src="<?php echo esc_url($item['list_icon']['url']); ?>" loading="lazy" alt="service-icon" class="service-image" />
                <div class="service-infos">
                    <h4 class="service-item-title"><?php echo esc_html($item['list_title']); ?></h4>
                    <p class="service-item-paragraph"><?php echo esc_html($item['list_desc']); ?></p>
                </div>
            </div>
            <?php } ?>
            
        </div>
    
    <?php

	}
}
