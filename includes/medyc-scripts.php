<?php

// Scripts
function medyc_scripts_files() {

    
    wp_enqueue_style( 'normalize', get_template_directory_uri().'/assets/css/normalize.css');
    wp_enqueue_style( 'layout', get_template_directory_uri().'/assets/css/layout.css');
	wp_enqueue_style( 'medyc-default', get_template_directory_uri().'/assets/css/style.css');
    wp_enqueue_style('medyc', get_stylesheet_uri());
    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

      // enqueue the javascript that performs in-link comment reply fanciness
      wp_enqueue_script( 'comment-reply' ); 
  
    }
    
    if ( defined( 'ELEMENTOR_VERSION' ) ) {

        wp_enqueue_script( 'medyc-elementor', get_template_directory_uri().'/assets/js/elementor-frontend.js', array( 'jquery' ), '1.0', true );
    
    }    
    
}
add_action('wp_enqueue_scripts', 'medyc_scripts_files');