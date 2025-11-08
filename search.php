<?php
get_header();

$archiveDesc = get_theme_mod( 'archive_description', '' ); 
$image = get_theme_mod( 'image_setting_url', '' );

            ?>

        <!-- page-banner-section 
			================================================== -->
        <section class="page-banner-section">
            <div class="container">
                <h2>
                    <span><?php echo esc_html_e('Search: ', 'medyc') . get_search_query(); ?></span>
                </h2>
            </div>
            <?php if ( $image ){ ?>
                <div class="image-holder">
                    <img src="<?php echo esc_url( $image ); ?>" alt>
                </div>
            <?php } ?>
        </section>
        <!-- End page-banner section -->
        
		<!-- blog-section 
			================================================== -->
        <section class="blog-section">
            <div class="container">
                <div class="row">
                <?php if(is_active_sidebar('sidebar')){ ?>
                    <div class="col-lg-8">
                        <div class="blog-box iso-call col1">
                    <?php }else{ ?>
                    <div class="col-lg-12 no-sidebar">
                        <div class="blog-box iso-call col2">
                    <?php } ?>
                        
                        <?php

                        if(have_posts()) {?>
                            
                            <?php 
                                global $wp_query;
                                query_posts(array_merge($wp_query->query, array(
                                    'paged'          => get_query_var('post'),
                                    'post_type'           => get_query_var('post')
                                )));

                                while(have_posts()) {
                                    the_post(); ?>
                                    <div class="item">
                                        <?php get_template_part( 'template-parts/post-layouts/standard-post' ); ?>
                                    </div>
                                    
                                <?php }
                            ?>
                        <?php } else { ?>
                        
                            <div class="not-found-title">
                                <h1><?php esc_html_e('Not Found', 'medyc'); ?></h1>
                                <span><?php echo esc_html_e('Your search results with keyword {', 'medyc') . get_search_query(); ?> <?php esc_html_e('} is null', 'medyc'); ?></span> <br>
                                <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Back to Home', 'medyc') ?></a>
                            </div>

                        <?php } ?>
                        <?php fabric_paging_navigation($wp_query); ?>
                        </div>
                    </div>
                    <?php if(is_active_sidebar('sidebar')){ ?>
                    <div class="col-lg-4">
                        
                        <?php get_sidebar(); ?>

                    </div>
                    <?php } ?>
                </div>
            </div>
		</section>
        <!-- End search-results page -->
<?php   

get_footer();
?>