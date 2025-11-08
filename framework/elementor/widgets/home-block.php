<?php
/**
 * Medyc Elementor Global Widget Home_Block.
 *
 * @package    Medyc - Themewisdom
 * @subpackage Medyc 
 * @since      Medyc 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	return; // Exit if it is accessed directly
}

class Medyc_Elementor_Global_Widgets_Home_Block extends Widget_Base {

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_Home_Block widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Medyc-Global-Widgets-Home-Block';
	}

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_Home_Block widget Title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Hero Block', 'medyc' );
	}

	/**
	 * Retrieve medyc_Elementor_Global_Widget_Home_Block widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-archive-title';
	}

	/**
	 * Retrieve the list of categories the medyc_Elementor_Global_Widget_Home_Block widget belongs to.
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
	 * Register medyc_Elementor_Global_Widget_Home_Block widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		// Widget title section
		$this->start_controls_section(
			'section_home_block_title_manage',
			array(
				'label' => esc_html__( 'Hero Title', 'medyc' ),
			)
		);

	    $this->add_control(
	        'about_title',
	        [
	            'label' => 'About Title',
	            'type' => Controls_Manager::WYSIWYG,
	        ]
	    );

	    $this->add_control(
	        'about_subtitle',
	        [
	            'label' => 'Hero Description',
	            'type' => Controls_Manager::TEXTAREA,
	            'default' => 'Hero Description',
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
	        'square_image2',
	        [
	            'label' => 'Small Image',
	            'type' => Controls_Manager::MEDIA,
	            'default' => [],
	        ]
	    );

	    $this->add_control(
	        'text_link',
	        [
	            'label' => 'Button Text',
	            'type' => Controls_Manager::TEXT,
	        ]
	    );

	    $this->add_control(
	        'about_link',
	        [
	            'label' => 'Button Link',
	            'type' => Controls_Manager::URL,
	            'default' => [
	                'url' => '#',
	            ],
	        ]
	    );

	    $this->end_controls_section();

	}

	/**
	 * Render Medyc_Elementor_Global_Widgets_Home_Block widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

	    $about_title = ! empty( $settings['about_title'] ) ? $settings['about_title'] : 'Title';
    	$about_subtitle = ! empty( $settings['about_subtitle'] ) ? $settings['about_subtitle'] : 'Hero Description';
    	$square_image = ! empty( $settings['square_image']['url'] ) ? $settings['square_image']['url'] : '';
    	$square_image2 = ! empty( $settings['square_image2']['url'] ) ? $settings['square_image2']['url'] : '';
    	$about_text = ! empty( $settings['text_link'] ) ? $settings['text_link'] : '';
    	$about_link = ! empty( $settings['about_link']['url'] ) ? $settings['about_link']['url'] : '#';


	    // Output the section structure
	    ?>
        	
        <div class="banner">
	        <div class="flex-container w-container">
	            <div class="hero-columns w-row">
	                <div class="left-banner w-col w-col-6">
	                    <div class="banner-main-text">
	                    	<?php echo do_shortcode($about_title); ?>
	                    </div>
	                    <div class="stripe-and-text-banner w-clearfix">
	                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/caption-stripes_1caption-stripes.png" loading="lazy" alt="Stripes" class="stripes" />
	                        <div class="banner-subtext"><?php echo esc_html($about_subtitle); ?></div>
	                    </div>
	                    <a href="<?php echo esc_url($about_link); ?>" class="main-button w-button"><?php echo esc_html($about_text); ?></a>
	                    <img src="<?php echo esc_url($square_image2); ?>" loading="lazy" alt="hand" class="banner-hand-icon" />
	                </div>
	                <div class="right-banner w-clearfix w-col w-col-6">
	                    <img
	                        src="<?php echo esc_url($square_image); ?>"
	                        loading="lazy"
	                        alt="Hero banner"
	                        class="banner-image"
	                    />
	                </div>
	            </div>
	        </div>
	    </div>
			
    
    <?php

	}
}
