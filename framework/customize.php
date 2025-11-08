<?php
/**
 * An example file demonstrating how to add all controls.
 *
 * @package     Kirki
 * @category    Core
 * @author      Aristeides Stathopoulos
 * @copyright   Copyright (c) 2017, Aristeides Stathopoulos
 * @license     http://opensource.org/licenses/https://opensource.org/licenses/MIT
 * @since       3.0.12
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
// Do not proceed if Kirki does not exist.
if ( ! class_exists( 'Kirki' ) ) {
	return;
}
/**
 * First of all, add the config.
 *
 * @link https://aristath.github.io/kirki/docs/getting-started/config.html
 */
Kirki::add_config(
	'kirki_demo', array(
		'capability'  => 'edit_theme_options',
		'option_type' => 'theme_mod',
	)
);
/**
 * Add a panel.
 *
 * @link https://aristath.github.io/kirki/docs/getting-started/panels.html
 */
Kirki::add_panel(
	'medyc_options_panel', array(
		'priority'    => 10,
		'title'       => esc_attr__( 'Medyc Options Panel', 'medyc' ),
		'description' => esc_attr__( 'Config Your Theme Options Here.', 'medyc' ),
	)
);
/**
 * Add Sections.
 *
 * We'll be doing things a bit differently here, just to demonstrate an example.
 * We're going to define 1 section per control-type just to keep things clean and separate.
 *
 * @link https://aristath.github.io/kirki/docs/getting-started/sections.html
 */
$sections = array(
	'body'      => array( esc_attr__( 'Main Body Style', 'medyc' ), '' ),
	'social'	=> array( esc_attr__('Social Network Links', 'medyc'), ''),
	'page_banner'	=> array( esc_attr__('Page Banner Image', 'medyc'), ''),
	'header'	=> array( esc_attr__('Header', 'medyc'), ''),
	'footer'	=> array( esc_attr__('Footer', 'medyc'), ''),
);
foreach ( $sections as $section_id => $section ) {
	$section_args = array(
		'title'       => $section[0],
		'description' => $section[1],
		'panel'       => 'medyc_options_panel',
	);
	if ( isset( $section[2] ) ) {
		$section_args['type'] = $section[2];
	}
	Kirki::add_section( str_replace( '-', '_', $section_id ) . '_section', $section_args );
}
/**
 * A proxy function. Automatically passes-on the config-id.
 *
 * @param array $args The field arguments.
 */
function my_config_kirki_add_field( $args ) {
	Kirki::add_field( 'kirki_demo', $args );
}


// logo max-width
my_config_kirki_add_field(
	array(
		'type'        => 'dimensions',
		'settings'    => 'logo_dimensions',
		'label'       => esc_attr__( 'Logo Dimension Control', 'medyc' ),
		'section'     => 'body_section',
		'default'     => [
			'max-width'  => '180px',
		],
		'choices'     => [
			'labels' => [
				
				'max-width'  => esc_html__( 'Max Width', 'medyc' ),
			],
		],
	)
);

/**social switcher**/

my_config_kirki_add_field(
	array(
		'type'        => 'switch',
		'settings'    => 'switch_socials',
		'label'       => esc_html__( 'Enable/Disable Social Icons', 'medyc' ),
		'section'     => 'social_section',
		'default'     => 'off',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'medyc' ),
			'off' => esc_html__( 'Disable', 'medyc' ),
		],
	)
);

/**facebook line**/

my_config_kirki_add_field(
	array(
		'type'        => 'text',
		'settings'    => 'facebook',
		'label'       => esc_attr__( 'Facebook Url', 'medyc' ),
		'section'     => 'social_section',
	)
);

/**twitter line**/

my_config_kirki_add_field(
	array(
		'type'        => 'text',
		'settings'    => 'twitter',
		'label'       => esc_attr__( 'Twitter Url', 'medyc' ),
		'section'     => 'social_section',
	)
);

/**linkedin line**/

my_config_kirki_add_field(
	array(
		'type'        => 'text',
		'settings'    => 'linkedin',
		'label'       => esc_attr__( 'Linkedin Url', 'medyc' ),
		'section'     => 'social_section',
	)
);

/**instagram line**/

my_config_kirki_add_field(
	array(
		'type'        => 'text',
		'settings'    => 'instagram',
		'label'       => esc_attr__( 'Instagram Url', 'medyc' ),
		'section'     => 'social_section',
	)
);

/**google line**/

my_config_kirki_add_field(
	array(
		'type'        => 'text',
		'settings'    => 'google',
		'label'       => esc_attr__( 'Google Url', 'medyc' ),
		'section'     => 'social_section',
	)
);

/**youtube line**/

my_config_kirki_add_field(
	array(
		'type'        => 'text',
		'settings'    => 'youtube',
		'label'       => esc_attr__( 'Youtube Url', 'medyc' ),
		'section'     => 'social_section',
	)
);



/**youtube line**/

my_config_kirki_add_field(
	array(
		'type'        => 'text',
		'settings'    => 'top_bar',
		'label'       => esc_attr__( 'Top Bar text', 'medyc' ),
		'section'     => 'header_section',
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'text',
		'settings'    => 'phone',
		'label'       => esc_attr__( 'Phone Number', 'medyc' ),
		'section'     => 'header_section',
	)
);

/**social switcher**/

my_config_kirki_add_field(
	array(
		'type'        => 'switch',
		'settings'    => 'switch_info',
		'label'       => esc_html__( 'Enable/Disable Contact Info', 'medyc' ),
		'section'     => 'header_section',
		'default'     => 'off',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'medyc' ),
			'off' => esc_html__( 'Disable', 'medyc' ),
		],
	)
);

my_config_kirki_add_field(
	array(
		'type'        => 'text',
		'settings'    => 'phone_number',
		'label'       => esc_html__( 'Enter phone number', 'medyc' ),
		'section'     => 'footer_section',
		'default'     => esc_html__( '+1 234 5678 90 00', 'medyc' ),
	)
);


my_config_kirki_add_field(
	array(
		'type'        => 'text',
		'settings'    => 'email',
		'label'       => esc_html__( 'Enter Email address', 'medyc' ),
		'section'     => 'footer_section',
		'default'     => esc_html__( 'medyc@domain.com', 'medyc' ),
	)
);


my_config_kirki_add_field(
	array(
		'type'        => 'text',
		'settings'    => 'copyright',
		'label'       => esc_html__( 'Copyright Line Text', 'medyc' ),
		'section'     => 'footer_section',
		'default'     => esc_html__( '© 2020 medyc', 'medyc' ),
	)
);


my_config_kirki_add_field(
	array(
		'type'        => 'text',
		'settings'    => 'mailchimp',
		'label'       => esc_html__( 'Mailchimp Shortcode', 'medyc' ),
		'section'     => 'footer_section'
	)
);


/**page banner image**/

my_config_kirki_add_field(
	array(
		'type'        => 'image',
		'settings'    => 'image_setting_url',
		'label'       => esc_html__( 'Background Image', 'medyc' ),
		'description' => esc_html__( 'Page Banner Background Image.', 'medyc' ),
		'section'     => 'page_banner_section',
		'default'     => '',
	)
);

