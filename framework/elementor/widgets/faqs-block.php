<?php
/**
 * Medyc Elementor Global Widget Faqs_Block.
 *
 * @package    Medyc - Themewisdom
 * @subpackage Medyc 
 * @since      Medyc 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	return; // Exit if it is accessed directly
}

class Medyc_Elementor_Global_Widgets_Faqs_Block extends Widget_Base {

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_Faqs_Block widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Medyc-Global-Widgets-Faqs-Block';
	}

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_Faqs_Block widget Title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Faqs Block', 'medyc' );
	}

	/**
	 * Retrieve medyc_Elementor_Global_Widget_Faqs_Block widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-archive-title';
	}

	/**
	 * Retrieve the list of categories the medyc_Elementor_Global_Widget_Faqs_Block widget belongs to.
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
	 * Register medyc_Elementor_Global_Widget_Faqs_Block widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		// Widget title section
		$this->start_controls_section(
			'section_faqs_block_title_manage',
			array(
				'label' => esc_html__( 'Faqs Block', 'medyc' ),
			)
		);

	    $this->add_control(
	        'about_title',
	        [
	            'label' => 'Title',
	            'type' => Controls_Manager::TEXT,
	            'default' => 'faqs',
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

		$repeater = new Repeater();

		$repeater->add_control(
			'list_title', [
				'label' => __( 'Question Text', 'medyc' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'list_testimonial', [
				'label' => __( 'Answer Text', 'medyc' ),
				'type' => Controls_Manager::TEXTAREA,
			]
		);

		$this->add_control(
			'list',
			[
				'label' => __( 'FAQs List', 'medyc' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ list_title }}}',
			]
		);

	    $this->add_control(
	        'about_close',
	        [
	            'label' => 'Close opened tab',
	            'type' => Controls_Manager::TEXT,
	            'default' => 'Close open tab',
	        ]
	    );

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

	    $about_title = ! empty( $settings['about_title'] ) ? $settings['about_title'] : 'Team';
    	$square_image = ! empty( $settings['square_image']['url'] ) ? $settings['square_image']['url'] : '';


	    // Output the section structure
	    ?>

	    <section class="accordion">
        <div class="flex-container w-container">
            <div class="accordion-row w-row">
                <div class="five-column w-col w-col-5">
                    <img src="<?php echo esc_url($square_image); ?>" loading="lazy" width="100" alt="FAQS Doctor" class="accordion-image" />
                </div>

                <div class="seven-column w-col w-col-7">
                    <div class="accordion-content">
                        <h2 class="accordion-title"><?php echo esc_html( $about_title ); ?></h2>


                        <section class="accordion_css accordion--radio">
                        	<?php 
                        		$i = 1;
			            		foreach (  $settings['list'] as $item ) { 
			            	?>
								<div class="accordion_tab">
									<input type="radio" name="accordion-2" id="rd<?php echo esc_attr($i); ?>">
									<label for="rd<?php echo esc_attr($i); ?>" class="tab__label"><?php echo esc_html($item['list_title']); ?></label>
									<div class="tab__content">
								  		<p><?php echo esc_html($item['list_testimonial']); ?></p>
									</div>
								</div>
                        	<?php $i++; } ?>
							<div class="accordion_tab">
								<input type="radio" name="accordion-2" id="rd5">
								<label for="rd5" class="tab__close"><?php echo esc_html($settings['about_close']); ?> &times;</label>
							</div>
                        </section>                        

                </div>
            </div>
        </div>
    </section>
    
    <?php

	}
}
