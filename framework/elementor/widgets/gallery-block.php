<?php
/**
 * Medyc Elementor Global Widget Gallery_Block.
 *
 * @package    Medyc - Themewisdom
 * @subpackage Medyc 
 * @since      Medyc 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	return; // Exit if it is accessed directly
}

class Medyc_Elementor_Global_Widgets_Gallery_Block extends Widget_Base {

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_Gallery_Block widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Medyc-Global-Widgets-Gallery-Block';
	}

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_Gallery_Block widget Title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Gallery Block', 'medyc' );
	}

	/**
	 * Retrieve medyc_Elementor_Global_Widget_Gallery_Block widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-archive-title';
	}

	/**
	 * Retrieve the list of categories the medyc_Elementor_Global_Widget_Gallery_Block widget belongs to.
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
	 * Register medyc_Elementor_Global_Widget_Gallery_Block widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		// Widget title section
		$this->start_controls_section(
			'section_Gallery_block_title_manage',
			array(
				'label' => esc_html__( 'Gallery Block', 'medyc' ),
			)
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
				'label' => __( 'Subtitle', 'medyc' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'list_icon', [
				'label' => __( 'Gallery Image', 'medyc' ),
				'type' => Controls_Manager::MEDIA,
			]
		);


		$this->add_control(
			'list',
			[
				'label' => __( 'Gallery List', 'medyc' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ list_title }}}',
			]
		);
	    

	    $this->end_controls_section();

	}

	/**
	 * Render Medyc_Elementor_Global_Widgets_Gallery_Block widget output on the frontend.
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


    
	    <div class="gallery">
	    	<div class="flex-container w-container">
	        	<div class="gallery-list-wrapper w-dyn-list">
	            	<div
	                  role="list"
	                  class="gallery-list w-dyn-items w-row">
	              		<?php 
			        		foreach (  $settings['list'] as $item ) { 
			        	?>
	                	<div role="listitem" class="gallery-list-item w-dyn-item w-col w-col-4">
	                      <div class="gallery-overlay"></div>
	                      <a href="#" class="lightbox-link w-inline-block w-lightbox" aria-label="open lightbox" aria-haspopup="dialog">
	                          <img
	                              src="<?php echo esc_url($item['list_icon']['url']); ?>"
	                              loading="lazy"
	                              alt="Gallery Image"
	                              class="lightbox-main-img"
	                          />
	                          
	                      </a>
	                      <div class="gallery-text">
	                          <a href="#" class="single-gallery-link"></a>
	                          <h4 class="gallery-title"><?php echo esc_html($item['list_title']); ?></h4>
	                          <div class="gallery-category"><?php echo esc_html($item['list_desc']); ?></div>
	                      </div>
	                	</div>
	                  	<?php } ?>

	            	</div>
	        	</div>
	    	</div>
	    </div>
    
    <?php

	}
}
