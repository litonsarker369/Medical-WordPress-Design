<?php
/**
 * Implements the compatibility for the Elementor plugin in medyc  theme.
 *
 * @package    Medyc - Themewisdom
 * @subpackage Medyc 
 * @since      Medyc 1.0
 */


if ( ! function_exists( 'medyc_elementor_active_page_check' ) ) :

	/**
	 * Check whether Elementor plugin is activated and is active on current page or not
	 *
	 * @return bool
	 *
	 * @since medyc 1.0
	 */
	function medyc_Elementor_active_page_check() {
		global $post;

		if ( defined( 'ELEMENTOR_VERSION' ) && get_post_meta( $post->ID, '_elementor_edit_mode', true ) ) {
			return true;
		}

		return false;
	}

endif;

if ( ! function_exists( 'medyc_elementor_widget_render_filter' ) ) :

	/**
	 * Render the default WordPress widget settings, ie, divs
	 *
	 * @param $args the widget id
	 *
	 * @return array register sidebar divs
	 *
	 * @since medyc 1.0
	 */
	function medyc_Elementor_widget_render_filter( $args ) {

		return
			array(
				'before_widget' => '<section class="widget ' . medyc_widget_class_names( $args[ 'widget_id' ] ) . ' clearfix">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="heading2 widget-title">',
				'after_title'   => '</h2>',
			);
	}

endif;

add_filter( 'elementor/widgets/wordpress/widget_args', 'medyc_elementor_widget_render_filter' ); // WPCS: spelling ok.

if ( ! function_exists( 'medyc_widget_class_names' ) ) :

	/**
	 * Render the widget classes for Elementor plugin compatibility
	 *
	 * @param $widgets_id the widgets of the id
	 *
	 * @return mixed the widget classes of the id passed
	 *
	 * @since medyc Custom1.0
	 */
	function medyc_widget_class_names( $widgets_id ) {

		$widgets_id = str_replace( 'wp-widget-', '', $widgets_id );

		$classes = medyc_widgets_classes();

		$return_value = isset( $classes[ $widgets_id ] ) ? $classes[ $widgets_id ] : 'widget_featured_block';

		return $return_value;
	}

endif;


/**
 * Load the medyc Custom Elementor widgets file and registers it
 */
if ( ! function_exists( 'medyc_elementor_widgets_registered' ) ) :

	/**
	 * Load and register the required Elementor widgets file
	 *
	 * @param $widgets_manager
	 *
	 * @since medyc Custom 1.0
	 */
	function medyc_elementor_widgets_registered( $widgets_manager ) {

		// Require the files
		// 1. Block Widgets
		
		require MEDYC_ELEMENTOR_WIDGETS_DIR . '/home-block.php';
		require MEDYC_ELEMENTOR_WIDGETS_DIR . '/services.php';
		require MEDYC_ELEMENTOR_WIDGETS_DIR . '/services2.php';
		require MEDYC_ELEMENTOR_WIDGETS_DIR . '/services3.php';
		require MEDYC_ELEMENTOR_WIDGETS_DIR . '/feature-det.php';
		require MEDYC_ELEMENTOR_WIDGETS_DIR . '/team-block.php';
		require MEDYC_ELEMENTOR_WIDGETS_DIR . '/testimonials-block.php';
		require MEDYC_ELEMENTOR_WIDGETS_DIR . '/faqs-block.php';
		require MEDYC_ELEMENTOR_WIDGETS_DIR . '/tabs-block.php';
		require MEDYC_ELEMENTOR_WIDGETS_DIR . '/contact-block.php';
		require MEDYC_ELEMENTOR_WIDGETS_DIR . '/contact.php';
		require MEDYC_ELEMENTOR_WIDGETS_DIR . '/gallery-block.php';
		require MEDYC_ELEMENTOR_WIDGETS_DIR . '/about-block.php';
		require MEDYC_ELEMENTOR_WIDGETS_DIR . '/about-block2.php';
		require MEDYC_ELEMENTOR_WIDGETS_DIR . '/blog.php';
		require MEDYC_ELEMENTOR_WIDGETS_DIR . '/departments-block.php';
		require MEDYC_ELEMENTOR_WIDGETS_DIR . '/appointment.php';

		

		// Register the widgets
		// 1. Block Widgets
		 
		$widgets_manager->register_widget_type( new \Elementor\Medyc_Elementor_Global_Widgets_Home_Block() );
		$widgets_manager->register_widget_type( new \Elementor\Medyc_Elementor_Global_Widgets_Services_Block_default() );
		$widgets_manager->register_widget_type( new \Elementor\Medyc_Elementor_Global_Widgets_Services_Block_Alt() );
		$widgets_manager->register_widget_type( new \Elementor\Medyc_Elementor_Global_Widgets_Services_Block_Alt2() );
		$widgets_manager->register_widget_type( new \Elementor\Medyc_Elementor_Global_Widgets_Feature_Detail() );
		$widgets_manager->register_widget_type( new \Elementor\Medyc_Elementor_Global_Widgets_Team_Block() );
		$widgets_manager->register_widget_type( new \Elementor\Medyc_Elementor_Global_Widgets_Testimonial_Block() );
		$widgets_manager->register_widget_type( new \Elementor\Medyc_Elementor_Global_Widgets_faqs_Block() );
		$widgets_manager->register_widget_type( new \Elementor\Medyc_Elementor_Global_Widgets_Tabs_Block() );
		$widgets_manager->register_widget_type( new \Elementor\Medyc_Elementor_Global_Widgets_Contact_Block() );
		$widgets_manager->register_widget_type( new \Elementor\Medyc_Elementor_Global_Widgets_Contact_Block2() );
		$widgets_manager->register_widget_type( new \Elementor\Medyc_Elementor_Global_Widgets_Gallery_Block() );
		$widgets_manager->register_widget_type( new \Elementor\Medyc_Elementor_Global_Widgets_About_Block() );
		$widgets_manager->register_widget_type( new \Elementor\Medyc_Elementor_Global_Widgets_About_Block2() );
		$widgets_manager->register_widget_type( new \Elementor\Medyc_Elementor_Global_Widgets_Blog_Block() );
		$widgets_manager->register_widget_type( new \Elementor\Medyc_Elementor_Global_Widgets_Departments_Block() );
		$widgets_manager->register_widget_type( new \Elementor\Medyc_Elementor_Global_Widgets_Appointment_Block() );
		
		
	}

endif;

add_action( 'elementor/widgets/widgets_registered', 'medyc_elementor_widgets_registered' );

if ( ! function_exists( 'medyc_elementor_category' ) ) :

	/**
	 * Add the Elementor category for use in medyc Custom widgets as seperator
	 *
	 * @since medyc Custom 1.0
	 */
	function medyc_Elementor_category() {

		// Register widget block category for Elementor section
		\Elementor\Plugin::instance()->elements_manager->add_category( 'medyc-widget-blocks', array(
			'title' => esc_html__( 'Medyc Custom Widget Blocks', 'medyc' ),
		), 1 );

		// Register widget grid category for Elementor section
		\Elementor\Plugin::instance()->elements_manager->add_category( 'medyc-widget-grid', array(
			'title' => esc_html__( 'Medyc Custom Widget Grid', 'medyc' ),
		), 1 );

		// Register widget global category for Elementor section
		\Elementor\Plugin::instance()->elements_manager->add_category( 'medyc-widget-global', array(
			'title' => esc_html__( 'Medyc Custom Global Widgets', 'medyc' ),
		), 1 );
	}

endif;

add_action( 'elementor/init', 'medyc_elementor_category' );
