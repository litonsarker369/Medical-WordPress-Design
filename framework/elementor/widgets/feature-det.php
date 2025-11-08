<?php
/**
 * Medyc Elementor Global Widget Feature_Detail.
 *
 * @package    Medyc - Themewisdom
 * @subpackage Medyc 
 * @since      Medyc 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	return; // Exit if it is accessed directly
}

class Medyc_Elementor_Global_Widgets_Feature_Detail extends Widget_Base {

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_Feature_Detail widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Medyc-Global-Widgets-Home-Feature-Detail';
	}

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_Feature_Detail widget Title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Feature Detail Block', 'medyc' );
	}

	/**
	 * Retrieve medyc_Elementor_Global_Widget_Feature_Detail widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-archive-title';
	}

	/**
	 * Retrieve the list of categories the medyc_Elementor_Global_Widget_Feature_Detail widget belongs to.
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
	 * Register medyc_Elementor_Global_Widget_Feature_Detail widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		// Widget title section
		$this->start_controls_section(
			'section_Feature_Detail_title_manage',
			array(
				'label' => esc_html__( 'Feature Title', 'medyc' ),
			)
		);

	    $this->add_control(
	        'about_title',
	        [
	            'label' => 'Feature Title',
	            'type' => Controls_Manager::TEXT,
	        ]
	    );

	    $this->add_control(
	        'about_subtitle',
	        [
	            'label' => 'Feature SubTitle',
	            'type' => Controls_Manager::TEXT,
	        ]
	    );

	    $this->add_control(
	        'about_desc',
	        [
	            'label' => 'Feature Description',
	            'type' => Controls_Manager::TEXTAREA,
	            'default' => 'Feature Description',
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
	            'label' => 'Small Icon Image',
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
	 * Render Medyc_Elementor_Global_Widgets_Feature_Detail widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

	    $about_title = ! empty( $settings['about_title'] ) ? $settings['about_title'] : '';
    	$about_subtitle = ! empty( $settings['about_subtitle'] ) ? $settings['about_subtitle'] : '';
    	$about_description = ! empty( $settings['about_desc'] ) ? $settings['about_desc'] : '';
    	$square_image = ! empty( $settings['square_image']['url'] ) ? $settings['square_image']['url'] : '';
    	$square_image2 = ! empty( $settings['square_image2']['url'] ) ? $settings['square_image2']['url'] : '';
    	$about_text = ! empty( $settings['text_link'] ) ? $settings['text_link'] : '';
    	$about_link = ! empty( $settings['about_link']['url'] ) ? $settings['about_link']['url'] : '#';


	    // Output the section structure
	    ?>

	    <section class="eye-surgery">
	        <div class="flex-container w-container">
	            <div class="w-row">
	                <div class="column w-col w-col-5">
	                    <img
	                        class="eye-surgery-image"
	                        src="<?php echo esc_url($square_image); ?>"
	                        alt="surgeon" loading="lazy"
	                    />
	                </div>
	                <div class="column-2 w-col w-col-7">
	                    <div class="lasikeye_inner">
	                        <div class="lasik_title w-clearfix">
	                            <img src="<?php echo esc_url($square_image2); ?>" loading="lazy" width="91" alt="Image" class="lasik-eye-image" />
	                            <div class="lasikimg_text">
	                                <div class="lasik-eye-span"><?php echo esc_html($about_subtitle); ?></div>
	                                <div class="lasik-eye-title"><?php echo esc_html($about_title); ?></div>
	                            </div>
	                        </div>
	                        <div class="lasik_text">
	                            <div class="lasik-eye-paragraph"><?php echo esc_html($about_description); ?></div>
	                            <?php if($about_link != null): ?>
	                            <a href="<?php echo esc_url($about_link); ?>" class="lasik-button w-inline-block w-clearfix">
	                                <div class="lasik-button-text"><?php echo esc_html($about_text); ?></div>
	                                <div class="lasik-button-arrow"></div>
	                            </a>
	                        	<?php endif; ?>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section>
			
    
    <?php

	}
}
