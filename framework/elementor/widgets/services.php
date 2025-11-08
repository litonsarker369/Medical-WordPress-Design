<?php
/**
 * Medyc Elementor Global Widget Services_Block_default.
 *
 * @package    Medyc - Themewisdom
 * @subpackage Medyc 
 * @since      Medyc 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	return; // Exit if it is accessed directly
}

class Medyc_Elementor_Global_Widgets_Services_Block_default extends Widget_Base {

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_Services_Block_default widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Medyc-Global-Widgets-Services-Block-default';
	}

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_Services_Block_default widget Title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Services Block Default', 'medyc' );
	}

	/**
	 * Retrieve medyc_Elementor_Global_Widget_Services_Block_default widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-archive-title';
	}

	/**
	 * Retrieve the list of categories the medyc_Elementor_Global_Widget_Services_Block_default widget belongs to.
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
	 * Register medyc_Elementor_Global_Widget_Services_Block_default widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		// Widget title section
		$this->start_controls_section(
			'section_services_block_default_title_manage',
			array(
				'label' => esc_html__( 'Services Block', 'medyc' ),
			)
		);

		$this->add_control(
	        'about_title',
	        [
	            'label' => 'About Title',
	            'type' => Controls_Manager::TEXT,
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
				'label' => __( 'About List Name', 'medyc' ),
				'type' => Controls_Manager::WYSIWYG,
			]
		);

		$repeater->add_control(
			'list_desc', [
				'label' => __( 'List Description', 'medyc' ),
				'type' => Controls_Manager::TEXTAREA,
			]
		);

		$repeater->add_control(
			'list_link', [
				'label' => __( 'List Link Page', 'medyc' ),
				'type' => Controls_Manager::TEXT,
			]
		);


		$this->add_control(
			'list',
			[
				'label' => __( 'About Medyc List', 'medyc' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ list_title }}}',
			]
		);
	    
		$repeater2 = new Repeater();

		$repeater2->add_control(
			'list_title', [
				'label' => __( 'Services Title', 'medyc' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$repeater2->add_control(
			'list_desc', [
				'label' => __( 'Services Subtitle', 'medyc' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$repeater2->add_control(
			'list_icon', [
				'label' => __( 'Icon Image', 'medyc' ),
				'type' => Controls_Manager::MEDIA,
			]
		);


		$this->add_control(
			'list2',
			[
				'label' => __( 'Services List', 'medyc' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater2->get_controls(),
				'title_field' => '{{{ list_title }}}',
			]
		);

	    $this->end_controls_section();

	}

	/**
	 * Render Medyc_Elementor_Global_Widgets_Services_Block_default widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

	    $about_title = ! empty( $settings['about_title'] ) ? $settings['about_title'] : '';
    	$square_image = ! empty( $settings['square_image']['url'] ) ? $settings['square_image']['url'] : '';
    	$about_text = ! empty( $settings['text_link'] ) ? $settings['text_link'] : '';
    	$about_link = ! empty( $settings['about_link']['url'] ) ? $settings['about_link']['url'] : '';

	    // Output the section structure
	    ?>

	    <section class="services">
	        <div class="flex-container w-container">
	            <div class="columns w-row">
	                <div class="services-left-column w-col w-col-9">

	                    <div class="upper-services w-row">
	                    	<?php 
	                    		$total_items = count($settings['list']);
	                    		$columns = 12 / $total_items;
				        		foreach (  $settings['list'] as $item ) { 
				        	?>
		                        <div class="upper-column w-col w-col-<?php echo esc_attr($columns); ?> w-col-medium-<?php echo esc_attr($columns); ?>">
		                            <a href="<?php echo esc_url($item['list_link']); ?>" class="upper-inn upper_radius w-inline-block">
		                                <div class="service-arrow"></div>
		                                <div class="upper-service-title">
		                                	<?php echo do_shortcode($item['list_title']); ?>
		                                </div>
		                                <div class="upper-service-text"><?php echo esc_html($item['list_desc']); ?></div>
		                            </a>
		                        </div>
	                        <?php } ?>
	                    </div>
	                    <div class="under-services w-row">
	                    	<?php 
	                    		$i = 0;
	                    		$total_items2 = count($settings['list2']);
	                    		$columns2 = 12 / $total_items2;

				        		foreach (  $settings['list2'] as $item2 ) { 
					        		if ($i % 2 == 0) { ?>
					        			<div class="underserv_column w-col w-col-<?php echo esc_attr($columns2); ?>">
				                            <div class="underserv_inner">
				                                <div class="upper-border"></div>
				                                <img src="<?php echo esc_url($item2['list_icon']['url']); ?>" loading="lazy" alt="Services Icon" class="under-serv-img-up" />
				                                <div class="under-services-title"><?php echo esc_html($item2['list_title']); ?></div>
				                                <div class="under-services-text"><?php echo esc_html($item2['list_desc']); ?></div>
				                                <div class="under-border"></div>
				                            </div>
				                        </div>
					        		<?php } else { ?>
					        			<div class="underserv_column2 w-col w-col-<?php echo esc_attr($columns2); ?>">
				                            <div class="underserv_inner2">
				                                <div class="upper-border-2"></div>
				                                <div class="under-services-title-second"><?php echo esc_html($item2['list_title']); ?></div>
				                                <div class="under-services-text-second"><?php echo esc_html($item2['list_desc']); ?></div>
				                                <img src="<?php echo esc_url($item2['list_icon']['url']); ?>" loading="lazy" alt="Services Icon" class="under-serv-img-down" />
				                                <div class="under-border-2"></div>
				                            </div>
				                        </div>
					        		<?php }
		                    		$i++;
	                    		} ?>
	                    </div>
	                </div>
	                <div class="services-right-column w-col w-col-3">
	                    <div class="serv-img-right">
	                        <img src="<?php echo esc_url($square_image); ?>" loading="lazy" alt="Doctor" class="get-in-touch-img" />
	                        <div class="checkup-text"><?php echo do_shortcode($about_title); ?></div>
	                        <a href="<?php echo esc_url($about_link); ?>" class="button_whitebg w-button"><?php echo esc_html($about_text); ?></a>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section>
    
    <?php

	}
}
