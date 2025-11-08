
<?php

// Widgets
add_action('widgets_init','medyc_register_widgets');
function medyc_register_widgets() {
    
	register_sidebar( array(
		'name'          => esc_html__( 'Blog sidebar', 'medyc' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here to appear in your blog sidebar.', 'medyc' ),
		'before_widget' => '<div class="sidebar-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3><span>',
		'after_title'   => '</span></h3>',
	) );
	  
	  register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'medyc' ),
		'id'            => 'sidebar-footer-1',
		'description'   => esc_html__( 'Add widgets here to appear in your Footer 1.', 'medyc' ),
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	  
	  register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'medyc' ),
		'id'            => 'sidebar-footer-2',
		'description'   => esc_html__( 'Add widgets here to appear in your Footer 2.', 'medyc' ),
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
	  
	  register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'medyc' ),
		'id'            => 'sidebar-footer-3',
		'description'   => esc_html__( 'Add widgets here to appear in your Footer 3.', 'medyc' ),
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
}