<?php
/**
 * Medyc Elementor Global Widget Team_Block.
 *
 * @package    Medyc - Themewisdom
 * @subpackage Medyc 
 * @since      Medyc 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	return; // Exit if it is accessed directly
}

class Medyc_Elementor_Global_Widgets_Team_Block extends Widget_Base {

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_Team_Block widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Medyc-Global-Widgets-Team-Block';
	}

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_Team_Block widget Title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Team Block', 'medyc' );
	}

	/**
	 * Retrieve medyc_Elementor_Global_Widget_Team_Block widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-archive-title';
	}

	/**
	 * Retrieve the list of categories the medyc_Elementor_Global_Widget_Team_Block widget belongs to.
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
	 * Register medyc_Elementor_Global_Widget_Team_Block widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		// Widget title section
		$this->start_controls_section(
			'section_team_block_title_manage',
			array(
				'label' => esc_html__( 'Team Block', 'medyc' ),
			)
		);

	    $this->add_control(
	        'about_title',
	        [
	            'label' => 'Title',
	            'type' => Controls_Manager::TEXT,
	            'default' => 'Team',
	        ]
	    );

	    
		$repeater = new Repeater();

		$repeater->add_control(
			'list_title', [
				'label' => __( 'Member Name', 'medyc' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'list_occup', [
				'label' => __( 'Member Occoupation', 'medyc' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'list_icon', [
				'label' => __( 'Member Image', 'medyc' ),
				'type' => Controls_Manager::MEDIA,
			]
		);

		$repeater->add_control(
			'list_facebook', [
				'label' => __( 'facebook', 'medyc' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'list_twitter', [
				'label' => __( 'twitter', 'medyc' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'list_instagram', [
				'label' => __( 'instagram', 'medyc' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'list',
			[
				'label' => __( 'Team Members List', 'medyc' ),
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

	    $about_title = ! empty( $settings['about_title'] ) ? $settings['about_title'] : 'Team';


	    // Output the section structure
	    ?>

	    <section class="our-team">
	        <div class="flex-container w-container">
	            <div class="main-title">
	                <h2 class="main-title-heading"><?php echo esc_html( $about_title ); ?></h2>
	            </div>
	            <div class="team-members-columns w-row">
	            	<?php 
	            		$total_items = count($settings['list']);
	                    $columns = 12 / $total_items;
	            		foreach (  $settings['list'] as $item ) { 
	            	?>
	                <div class="doctors-three-column w-col w-col-<?php echo esc_attr($columns); ?>">
	                    <div class="team-column-inner">
	                        <div class="team_title">
	                            <div class="team_profession w-clearfix">
	                                <div class="team-circle"></div>
	                                <div class="team-title"><?php echo esc_html($item['list_occup']); ?></div>
	                            </div>
	                            <div class="team-name">
	                                <?php echo esc_html($item['list_title']); ?>
	                            </div>
	                        </div>
	                        <img src="<?php echo esc_url($item['list_icon']['url']); ?>" loading="lazy" alt="Team Member" class="team-image" />
	                        <div class="team_socials">
	                        	<?php if($item['list_facebook']) : ?>
	                            <a href="<?php echo esc_url($item['list_facebook']); ?>" class="team-socials"></a>
	                        	<?php endif; ?>
	                        	<?php if($item['list_twitter']) : ?>
	                            <a href="<?php echo esc_url($item['list_twitter']); ?>" class="team-socials"></a>
	                            <?php endif; ?>
	                            <?php if($item['list_instagram']) : ?>
	                            <a href="<?php echo esc_url($item['list_instagram']); ?>" class="team-socials"></a>
	                            <?php endif; ?>
	                        </div>
	                    </div>
	                </div>
	               	<?php } ?>
	            </div>
	        </div>
	    </section>
    
    <?php

	}
}
