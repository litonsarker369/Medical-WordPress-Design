<?php 

add_action('wp_ajax_myfilter', 'medyc_filter_function'); // wp_ajax_{ACTION HERE} 
add_action('wp_ajax_nopriv_myfilter', 'medyc_filter_function');
 
function medyc_filter_function(){
	$args = array(
        'orderby' => 'date', // we will sort posts by date
        'posts_per_page'      => '4'
	);
 
	// for taxonomies / categories
	if( isset( $_POST['categoryfilter'] ) )
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'category',
				'field' => 'id',
				'terms' => $_POST['categoryfilter']
			)
		);
 
	$query = new WP_Query( $args );
 
	if( $query->have_posts() ) :
		while( $query->have_posts() ): $query->the_post();
            get_template_part( 'template-parts/post-layouts/thumb-post2' );
		endwhile;
		wp_reset_postdata();
	else :
		echo 'No posts found';
	endif;
 
	die();
}