<?php

/**
 * Demo Importer
 *
 * Import the content, widgets and
 * the customizer settings via the
 * plugin one click demo importer.
 */
add_filter('pt-ocdi/import_files', 'medyc_ocdi_import_files');
function medyc_ocdi_import_files() {
  return array(
    array(
      'import_file_name'           => esc_html__('Main Demo', 'medyc'),
      'categories'                 => array('Demo'),
      'import_file_url'            => 'https://nunforest.com/documentation/medyc/medyc.WordPress.2024-02-05.xml',
      'import_widget_file_url'     => 'https://nunforest.com/documentation/medyc/themeguri.com-medyc-widgets.wie',
      'import_customizer_file_url' => 'https://nunforest.com/documentation/medyc/medyc-export.dat',
      'import_notice'              => esc_html__('Everything that is listed in our demo will be imported.', 'medyc'),
    ),
  );
}

/**
 * After Import Setup
 *
 * Set the Classic Home Page as front
 * page and assign the menu to
 * the main menu location.
 */
add_action('pt-ocdi/after_import', 'medyc_ocdi_after_import_setup');
function medyc_ocdi_after_import_setup() {

  // Find and delete the WP default 'Sample Page'
  $defaultPage = get_page_by_title( 'Sample Page' );
  wp_delete_post( $defaultPage->ID, $bypass_trash = true );

  // Find and delete the WP default 'Hello world!' post
  $defaultPost = get_posts( array( 'title' => 'Hello World!' ) );
  wp_delete_post( $defaultPost[0]->ID, $bypass_trash = true );

  $main_menu = get_term_by('name', 'Menu 1', 'nav_menu');

  if ($main_menu) {
    set_theme_mod('nav_menu_locations', array('primary' => $main_menu->term_id));
  }

  // Front Page
  $front_page_id = get_page_by_title('Home');
  if ($front_page_id) {
    update_option('page_on_front', $front_page_id->ID);
    update_option('show_on_front', 'page');
  }
  $blog_page_id = get_page_by_title('Blog');
  if ($blog_page_id) {
    update_option('page_for_posts', $blog_page_id->ID);
  }
}

  /**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme construct for publication on ThemeForest
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'medyc_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function medyc_register_required_plugins() {
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
    
       array(
            'name'      => esc_html__( 'Kirki Customizer Framework', 'medyc' ),
            'slug'      => 'kirki',
            'required'  => true,
        ), array(
            'name'      => esc_html__( 'Elementor Page Builder', 'medyc' ),
            'slug'      => 'elementor',
            'required'  => true,
        ),array(
            'name'      => esc_html__( 'Advanced Custom Fields (ACF)', 'medyc' ),
            'slug'      => 'advanced-custom-fields',
            'required'  => true,
        ),
        array(
            'name'      => esc_html__( 'Mailchimp for WordPress', 'medyc' ),
            'slug'      => 'mailchimp-for-wp',
            'required'  => true,
        ),array(
            'name'      => esc_html__( 'CMB2', 'medyc' ),
            'slug'      => 'cmb2',
            'required'  => true,
        ),array(
            'name'      => esc_html__( 'Contact Form 7', 'medyc' ),
            'slug'      => 'contact-form-7',
            'required'  => true,
        ),array(
            'name'      => esc_html__( 'Booking Calendar', 'medyc' ),
            'slug'      => 'booking',
            'required'  => true,
        ),array(
            'name'      => esc_html__( 'One Click Demo Import', 'medyc' ),
            'slug'      => 'one-click-demo-import',
            'required'  => true,
        )
    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => esc_html__( 'Install Required Plugins', 'medyc' ),
            'menu_title'                      => esc_html__( 'Install Plugins', 'medyc' ),
            'installing'                      => esc_html__( 'Installing Plugin: %s', 'medyc' ), // %s = plugin name.
            'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'medyc' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'medyc' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'medyc' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'medyc' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'medyc' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'medyc' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'medyc' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'medyc' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'medyc' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'medyc' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'medyc' ),
            'return'                          => esc_html__( 'Return to Required Plugins Installer', 'medyc' ),
            'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'medyc' ),
            'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'medyc' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );
    tgmpa( $plugins, $config );
}