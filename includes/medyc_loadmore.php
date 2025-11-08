<?php

function medyc_my_load_more_scripts() {
 global $query; 
 $query = new WP_Query();

 // In most cases it is already included on the page and this line can be removed
 wp_enqueue_script('jquery');

 // register our main script but do not enqueue it yet
 wp_register_script( 'medyc_loadmore', get_stylesheet_directory_uri() . '/assets/js/myloadmore.js', array('jquery') );

 // now the most interesting part
 // we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
 // you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
 wp_localize_script( 'medyc_loadmore', 'medyc_loadmore_params', array(
     'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
     'posts' => json_encode( $query->query_vars ), // everything about your loop is here
     'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
     'max_page' => $query->max_num_pages
 ) );

  wp_enqueue_script( 'medyc_loadmore' );
}

add_action( 'wp_enqueue_scripts', 'medyc_my_load_more_scripts' );

function medyc_loadmore_ajax_handler(){
 
	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
    $args['post_status'] = 'publish';
	$args['posts_per_page'] = $_POST['postsNumber'];
	
	if ( !empty($_POST['postsOrder']) ) {
		$args[ 'order' ] = $_POST['postsOrder'];
	}

	if ( !empty($_POST['postsTags']) ) {
		$args[ 'tag' ] = $_POST['postsTags'];
	}

	if ( !empty($_POST['postsCategory']) ) {
		$args[ 'tax_query' ] = array(
			array(
				'taxonomy' => 'category',
				'field'    => 'slug',
				'terms'    => $_POST['postsCategory'],
			),
		);
	}

	if ( !empty($_POST['postsComment']) ) {
		$args['orderby'] = 'comment_count';
	}

	if ( !empty($_POST['postsPopular']) ) {
		$args['meta_key'] = 'post_views_count';
		$args['orderby'] = 'meta_value_num';
	}

	if ( !empty($_POST['postsCustom']) ) {
		$posts_array = explode(',', $_POST['postsCustom'] );
            
		$posts_custom = array_values($posts_array);
		

		$args['post__in'] = $posts_custom;
	}
 
	// it is always better to use WP_Query but not here
	query_posts( $args );
 
	if( have_posts() ) :
 
		// run the loop
		while( have_posts() ): the_post();?>
        <div class="item">
            <?php
 
			// look into your theme code how the posts are inserted, but you can use your own HTML of course
			// do you remember? - my example is adapted for Twenty Seventeen theme
			get_template_part( 'template-parts/post-layouts/'. $_POST['layoutPost']);
			// for the test purposes comment the line above and uncomment the below one
            // the_title();
            
            ?>
        </div>
		<?php
 
		endwhile;
 
	endif;
	die; // here we exit the script and even no wp_reset_query() required!
}
 
 
 
add_action('wp_ajax_loadmore', 'medyc_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'medyc_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}