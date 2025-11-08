<?php
/**
 * Medyc Elementor Global Widget Work_Block.
 *
 * @package    Medyc - Themewisdom
 * @subpackage Medyc 
 * @since      Medyc 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	return; // Exit if it is accessed directly
}

class Medyc_Elementor_Global_Widgets_Work_Block extends Widget_Base {

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_Work_Block widget name.
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Medyc-Global-Widgets-Work-Block';
	}

	/**
	 * Retrieve Medyc_Elementor_Global_Widgets_Work_Block widget Title.
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Work Block', 'medyc' );
	}

	/**
	 * Retrieve medyc_Elementor_Global_Widget_Work_Block widget icon.
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-archive-title';
	}

	/**
	 * Retrieve the list of categories the medyc_Elementor_Global_Widget_Work_Block widget belongs to.
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
	 * Register medyc_Elementor_Global_Widget_Work_Block widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		// Widget title section
		$this->start_controls_section(
			'section_work_block_title_manage',
			array(
				'label' => esc_html__( 'Works Block', 'medyc' ),
			)
		);

	    $this->end_controls_section();

	}

	/**
	 * Render Medyc_Elementor_Global_Widgets_Work_Block widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

	    // Output the section structure
	    ?>
	    <div class="work-wrapper">
            <div class="work-list-wrapper w-dyn-list">
                <div role="list" class="work-list w-dyn-items w-row">
       				<?php
						$args = array(
						    'posts_per_page'      => -1,
						    'post_type'           => 'project',
						    'ignore_sticky_posts' => true
						);
						$query = new \WP_Query($args);

						if ($query->have_posts()) {
						    while ($query->have_posts()) {
						        $query->the_post(); ?>

						        <div role="listitem" class="work-item w-dyn-item w-col w-col-4">
						            <a href="<?php the_permalink(); ?>" class="work-item-inner w-inline-block">
						                <h4 class="work-title"><?php the_title(); ?></h4>
						                <div class="work-category">
						                	<?php
						                		$categories = get_the_terms( $post->ID, 'Project Category' );
											    if ( ! empty( $categories ) ) { ?>
													<span class="cat-link">
														<?php echo esc_html( $categories[0]->name ); ?>
													</span>
											<?php } ?>
						                </div>
						                <div class="image-holder">
						                	<img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" loading="lazy" alt="work-image" class="work-image" />
						                </div>
						            </a>
						        </div>

						<?php }
						    \wp_reset_postdata();
						}
					?>

    
                </div>
            </div>
        </div>
    <?php

	}
}
