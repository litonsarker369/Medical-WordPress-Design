<?php
/**
 * Medyc Elementor Global Widget Tabs_Block.
 *
 * @package    Medyc - Themewisdom
 * @subpackage Medyc 
 * @since      Medyc 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	return; // Exit if it is accessed directly
}

class Medyc_Elementor_Global_Widgets_Tabs_Block extends Widget_Base {

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_Tabs_Block widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Medyc-Global-Widgets-Tabs-Block';
	}

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_Tabs_Block widget Title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Tabs Block', 'medyc' );
	}

	/**
	 * Retrieve medyc_Elementor_Global_Widget_Tabs_Block widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-archive-title';
	}

	/**
	 * Retrieve the list of categories the medyc_Elementor_Global_Widget_Tabs_Block widget belongs to.
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
	 * Register medyc_Elementor_Global_Widget_Tabs_Block widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		// Widget title section
		$this->start_controls_section(
			'section_tabs_block_title_manage',
			array(
				'label' => esc_html__( 'Tabs Block', 'medyc' ),
			)
		);

	    $this->add_control(
	        'square_image',
	        [
	            'label' => 'Background Image',
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
			'list_subtitle', [
				'label' => __( 'Subtitle', 'medyc' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'list_testimonial', [
				'label' => __( 'Description', 'medyc' ),
				'type' => Controls_Manager::WYSIWYG,
			]
		);

		$repeater->add_control(
			'list_icon', [
				'label' => __( 'Left Image', 'medyc' ),
				'type' => Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'list',
			[
				'label' => __( 'TABs List', 'medyc' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ list_title }}}',
			]
		);

		$repeater = new Repeater();

	    $this->end_controls_section();

	}

	/**
	 * Render Medyc_Elementor_Global_Widgets_Team_Block widget output on the frontend.
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

	    <section class="tabs_section" style="background-image: url(<?php echo esc_url( $square_image ); ?>);">
	        <div class="flex-container w-container">


	            <div class="tabset">
	            	<?php 
                		$i = 1;
	            		foreach (  $settings['list'] as $item ) { 
	            	?>
	            	<input type="radio" name="tabset" id="tab<?php echo esc_attr($i); ?>" aria-controls="tab<?php echo esc_attr($i); ?>" checked>
	              	<label for="tab<?php echo esc_attr($i); ?>"><?php echo esc_html($item['list_title']); ?></label>
	            	<?php $i++; } ?>
	              <!-- Tab 1 -->
	              
	              <div class="tab-panels">
	              	<?php 
                		$i = 1;
	            		foreach (  $settings['list'] as $item ) { 
	            	?>
	                <section id="tab<?php echo esc_attr($i); ?>" class="tab-panel">
	                    <div class="tab-inner w-row">
	                        <div class="six-column w-col w-col-6">
	                            <img alt="Tab Image" src="<?php echo esc_url($item['list_icon']['url']); ?>" loading="lazy" class="tab-conent-image" />
	                        </div>
	                        <div class="six-column w-col w-col-6">
	                            <div class="tab-span"><?php echo esc_html($item['list_subtitle']); ?></div>
	                            <h2 class="tab-content-title"><?php echo esc_html($item['list_title']); ?></h2>
	                            <?php echo do_shortcode($item['list_testimonial']); ?>
	                        </div>
	                    </div>
	                </section>
	                <?php $i++; } ?>
	                
	              </div>
	              
	            </div>

	        </div>
	    </section>
    
    <?php

	}
}
