<?php
/**
 * Medyc Elementor Global Widget Award_Block.
 *
 * @package    Medyc - Themewisdom
 * @subpackage Medyc 
 * @since      Medyc 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	return; // Exit if it is accessed directly
}

class Medyc_Elementor_Global_Widgets_Award_Block extends Widget_Base {

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_Award_Block widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Medyc-Global-Widgets-Award-Block';
	}

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_Award_Block widget Title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Award Block', 'medyc' );
	}

	/**
	 * Retrieve medyc_Elementor_Global_Widget_Award_Block widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-archive-title';
	}

	/**
	 * Retrieve the list of categories the medyc_Elementor_Global_Widget_Award_Block widget belongs to.
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
	 * Register medyc_Elementor_Global_Widget_Award_Block widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		// Widget title section
		$this->start_controls_section(
			'section_award_block_title_manage',
			array(
				'label' => esc_html__( 'Award Block', 'medyc' ),
			)
		);

	    $this->add_control(
	        'about_title',
	        [
	            'label' => 'Title',
	            'type' => Controls_Manager::TEXT,
	            'default' => 'Award Title',
	        ]
	    );

	    
		$repeater = new Repeater();

		$repeater->add_control(
			'list_title', [
				'label' => __( 'Award Name', 'medyc' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'list_desc', [
				'label' => __( 'Award Description', 'medyc' ),
				'type' => Controls_Manager::TEXTAREA,
			]
		);

		$repeater->add_control(
			'list_time', [
				'label' => __( 'Award Year', 'medyc' ),
				'type' => Controls_Manager::TEXT,
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
	 * Render Medyc_Elementor_Global_Widgets_Award_Block widget output on the frontend.
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

        <div class="space-line"></div>

        <div class="awards">
            <h1 class="inner-pages-main-title"><?php echo esc_html( $about_title ); ?></h1>
            <div class="title-blue-line"></div>
            <div class="w-layout-layout awarts-grid wf-layout-layout">
            	<?php 
            		foreach (  $settings['list'] as $item ) { 
            	?>
                <div class="w-layout-cell award-cell">
                    <div class="award-item">
                        <h4 class="award-title"><?php echo esc_html($item['list_title']); ?></h4>
                        <p class="award-text">
                            <?php echo esc_html($item['list_desc']); ?>
                        </p>
                        <div class="award-year"><?php echo esc_html($item['list_time']); ?></div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    
    <?php

	}
}
