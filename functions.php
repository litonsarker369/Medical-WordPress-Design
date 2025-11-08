<?php

/**
 * Medyc
 *
 * Unikwp - Besim Dauti
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

define( 'MEDYC_PARENT_DIR', get_template_directory() );
define( 'MEDYC_CHILD_DIR', get_stylesheet_directory() );
define( 'MEDYC_INCLUDES_DIR', MEDYC_PARENT_DIR . '/framework' );
define( 'MEDYC_CSS_DIR', MEDYC_PARENT_DIR . '/assets/css' );
define( 'MEDYC_JS_DIR', MEDYC_PARENT_DIR . '/assets/js' );
define( 'MEDYC_LANGUAGES_DIR', MEDYC_PARENT_DIR . '/languages' );
define( 'MEDYC_ELEMENTOR_DIR', MEDYC_INCLUDES_DIR . '/elementor' );
define( 'MEDYC_ELEMENTOR_WIDGETS_DIR', MEDYC_ELEMENTOR_DIR . '/widgets' );

/**
 * Define URL Location Constants
 */
define( 'MEDYC_PARENT_URL', get_template_directory_uri() );
define( 'MEDYC_CHILD_URL', get_stylesheet_directory_uri() );
define( 'MEDYC_INCLUDES_URL', MEDYC_PARENT_URL . '/framework' );
define( 'MEDYC_CSS_URL', MEDYC_PARENT_URL . '/assets/css' );
define( 'MEDYC_JS_URL', MEDYC_PARENT_URL . '/assets/js' );
define( 'MEDYC_LANGUAGES_URL', MEDYC_PARENT_URL . '/languages' );
define( 'MEDYC_ELEMENTOR_URL', MEDYC_INCLUDES_URL . '/elementor' );
define( 'MEDYC_ELEMENTOR_WIDGETS_URL', MEDYC_ELEMENTOR_URL . '/widgets' );

require_once MEDYC_INCLUDES_DIR . '/metabox/meta-box.php';
require_once MEDYC_INCLUDES_DIR . '/customize.php';


/** Add the Elementor compatibility file */
if ( defined( 'ELEMENTOR_VERSION' ) ) {
    require_once( MEDYC_ELEMENTOR_DIR . '/elementor-script.php' );
}

// Register Elementor Locations
function medyc_register_elementor_locations( $elementor_theme_manager ) {
	$elementor_theme_manager->register_all_core_location();
};
add_action( 'elementor/theme/register_locations', 'medyc_register_elementor_locations' );


require_once get_template_directory() . '/includes/medyc-after-setup.php';
require_once get_template_directory() . '/includes/medyc-widgets.php';
require_once get_template_directory() . '/includes/medyc-scripts.php';
require_once get_template_directory() . '/includes/other-functions.php';
require_once get_template_directory() . '/includes/medyc-filter.php';
require_once get_template_directory() . '/includes/medyc_loadmore.php';
require_once get_template_directory() . '/includes/fonts-style-action.php';
require_once get_template_directory() . '/includes/medyc-comments.php';
require_once get_template_directory() . '/includes/medyc-required-plugins.php';
