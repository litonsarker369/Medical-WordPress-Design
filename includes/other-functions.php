<?php 

class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        // Get the custom field value for the icon

        if (function_exists('get_field')) {
            // ACF is active, so it's safe to use get_field()
            $icon_url = get_field('services_menu_icon', $item);
            // Rest of your code using $value
        } else {
            // ACF is not active, handle this situation accordingly
            // For example, you can set a default value or display a message
            $icon_url = null;
            // Rest of your code using $value
        }
        

        $output .= "<li class='service-list'>";
        $output .= "<a href='{$item->url}' class='top-services-link w-inline-block'>";
        $output .= "<img src='{$icon_url}' loading='lazy' width='51' alt='' class='top-service-icon' />";
        $output .= "<div class='top-service-text'>{$item->title}</div>";
        $output .= "</a>";
    }
}



remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );
add_action( 'shutdown', function() {
   while ( @ob_end_flush() );
} );

//pagination
function medyc_pagination($prev = '', $next = '', $pages='') {

    global $wp_query, $wp_rewrite;

    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

    if($pages==''){

        global $wp_query;
        $pages = $wp_query->max_num_pages;

        if(!$pages){
            $pages = 1;
        }

    } if(is_front_page() and !is_home()) {
        $curent = (get_query_var('page')) ? get_query_var('page') : 1;
    } else {
        $curent = (get_query_var('paged')) ? get_query_var('paged') : 1;
    }

    $pagination = array(
        'base'      => str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
        'format'    => '',
        'current'     => max( 1, $curent),
        'total'     => $pages,
        'prev_text' => $prev,
        'next_text' => $next,
        'type'      => 'list',
        'end_size'    => 2,
        'mid_size'    => 1
    );

    $return =  paginate_links( $pagination );
    echo str_replace( "<ul class='page-numbers'>", '<ul class="pagination-list">', $return );
}

// function to display number of posts.

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}

// function to count views.
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}



/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
    $content_width = 1170;
}

function medyc_excerpt($limit = 20) {
 
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
      array_pop($excerpt);
      $excerpt = implode(" ",$excerpt).'...';
    } else {
      $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
    return $excerpt;
  
}
  
function medyc_excerpt_more( $more ) {
  return ' ';
}
add_filter( 'excerpt_more', 'medyc_excerpt_more' );

function medyc_get_wysiwyg_output( $meta_key, $post_id = 0 ) {
	global $wp_embed;

	$post_id = $post_id ? $post_id : get_the_id();

	$content = get_post_meta( $post_id, $meta_key, 1 );
	$content = $wp_embed->autoembed( $content );
	$content = $wp_embed->run_shortcode( $content );
	$content = wpautop( $content );
	$content = do_shortcode( $content );

	return $content;
}

function medyc_query_vars( $qvars ) {
    $qvars[] = 'custom_query_var';
    return $qvars;
}
add_filter( 'query_vars', 'medyc_query_vars' );

function medyc_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . esc_url(home_url( '/' )) . '" >
    <div>
        <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . esc_attr("Search", 'medyc') . '"/>
        <button type="submit" id="searchsubmit" class="submit">
            <i class="fas fa-search"></i>
        </button>
    </div>
    </form>';

    return $form;
}

add_filter( 'get_search_form', 'medyc_search_form', 100 );

function medyc_time_ago_function() {
    return sprintf( esc_html__( '%s ago', 'medyc' ), human_time_diff(get_the_time ( 'U' ), current_time( 'timestamp' ) ) );
}

add_filter( 'the_time', 'medyc_time_ago_function' );
add_filter( 'get_comment_date', 'medyc_time_ago_function' );

/**
 * Default Pagination
 *
 * Well organised pagination with numbers and arrows,
 * theme uses it on blogs and portfolios.
 */
if ( !function_exists( 'fabric_paging_navigation' ) ) {
	function fabric_paging_navigation( $query_object ) {

		// Don't print empty markup if there's only one page.
		if ( $query_object->max_num_pages < 2 ) {
			return;
		}

		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );

		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}

		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

		// Set up paginated links.
		$page_links = paginate_links( array(
			'base'     => $pagenum_link,
			'format'   => $format,
			'total'    => $query_object->max_num_pages,
			'current'  => $paged,
			'mid_size' => 6,
			'add_args' => array_map( 'urlencode', $query_args ),
			'type'      => 'list',
			'prev_text' => '<',
			'next_text' => '>',
		) );

		if ( $page_links ) :
			?>
            <div class="fabriclab-pagination">
				<?php echo wp_kses_post( $page_links ); ?>
            </div>

		<?php
		endif;

	}
}


// add the ajax fetch js
add_action( 'wp_footer', 'ajax_fetch' );
function ajax_fetch() { ?>

<script>
    function fetch(){
        if (jQuery('#keyword').val() !== '') {
            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: { action: 'data_fetch', keyword: jQuery('#keyword').val() },
                success: function(data) {
                    jQuery('#datafetch').html( data );
                }
            });
        } else {
            jQuery('#datafetch').html('Search results will appear here');
        }

    }
</script>

<?php
}

// the ajax function
add_action('wp_ajax_data_fetch' , 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch','data_fetch');
function data_fetch(){

    $the_query = new WP_Query( 
      array( 
        'posts_per_page' => -1, 
        's' => esc_attr( $_POST['keyword'] ), 
        'post_type' => 'post' 
      ) 
    );
  
    if( $the_query->have_posts() ) :
        while( $the_query->have_posts() ): $the_query->the_post(); ?>
            <div class="search-post">
                
                <div class="image-holder">
                    <img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt>
                </div>
                <div class="post-content">
                    <h4><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title();?></a></h4>
                    <ul class="post-meta">
                        <?php
                            $categories = get_the_category();
                            if ( ! empty( $categories ) ) { ?>
                                <li>
                                    <a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) )?>">
                                        <i class="far fa-folder-open"></i>
                                        <?php echo esc_html( $categories[0]->name ); ?>
                                    </a>
                                </li>
                            <?php }
                        ?>
                        <li>
                            <a href="#">
                                <i class="far fa-clock"></i>
                                <?php the_time(); ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        <?php endwhile;
        wp_reset_postdata();  
    endif;

    die();
}

/**
 * Enable dark theme mode
 * Forked from https://wordpress.org/plugins/wp-night-mode/
 */
function medyc_dark_mode($classes) {
    $medyc_night_mode = isset($_COOKIE['medycNightMode']) ? $_COOKIE['medycNightMode'] : '';
    //if the cookie is stored..
    if ($medyc_night_mode !== '') {
        // Add 'dark-mode' body class
        return array_merge($classes, array('dark-mode'));
    }
    return $classes;
}
add_filter('body_class', 'medyc_dark_mode');