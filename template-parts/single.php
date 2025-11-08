<?php 

    $image = get_theme_mod( 'image_setting_url', '' );
    $archiveDesc = get_theme_mod( 'archive_description', '' ); 
        
?>
        <div class="site-banner" style="background-image: url(<?php echo esc_url( $image ); ?>);">
            <div class="banner-text">
                <h1 class="banner-title">
                    <?php the_title(); ?>
                </h1>
                <div class="breadcrumbs">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="breadcrumbs-link"><?php echo get_the_title(get_option('page_on_front')); ?></a>
                    <div class="banner-arrow"></div>
                    <a href="<?php echo get_the_permalink(get_option('page_for_posts')); ?>" aria-current="page" class="breadcrumbs-link w--current"><?php echo get_the_title(get_option('page_for_posts')); ?></a>
                    <div class="banner-arrow"></div>
                    <a href="<?php the_permalink(); ?>" aria-current="page" class="breadcrumbs-link w--current"><?php the_title(); ?></a>
                </div>
            </div>
        </div>

        <div class="blue-bg">
        <div class="flex-container w-container">
            <?php if(is_active_sidebar('sidebar')){ ?>
                <div role="list" class="w-dyn-items w-row">
                    <div class="w-dyn-item w-col w-col-9">
            <?php } ?>
            <?php if (has_post_thumbnail()) : ?>
            <img  loading="lazy"
                src="<?php echo get_the_post_thumbnail_url(); ?>"
                alt="Single Post"
                class="single-post-main-img"/>
            <?php endif; ?>
            <div class="single-post-body w-clearfix">
                <h2 class="single-post-title">
                    <?php 
                        the_title();
                    ?>
                </h2>
                <div class="single-page-text-style w-richtext">
                    <?php the_content(); ?>
                    <?php the_tags(); ?>
                </div>
            </div>
            <div class="post-author">
                <?php 
                    $post_id = get_the_ID(); // Replace 123 with the actual post ID

                    // Get the post author ID
                    $post_author_id = get_post_field('post_author', $post_id);

                    // Get the user data for the author
                    $author_data = get_userdata($post_author_id);

                    $first_name = $author_data->first_name;
                    $last_name = $author_data->last_name;

                    // Get the Gravatar image HTML
                    $gravatar_image = get_avatar(get_the_author_meta('ID', $post_author_id), 140);
                    $occupation = get_user_meta($post_author_id, '_medyc_occupation', true);
                    $facebook = get_user_meta($post_author_id, '_medyc_facebook_link', true);
                    $twitter = get_user_meta($post_author_id, '_medyc_twitter_link', true);
                    $instagram = get_user_meta($post_author_id, '_medyc_instagram_link', true);
                ?>
                
                <div class="w-row">
                    <div class="w-col w-col-4">
                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 390 ); ?>
                    </div>
                    <div class="w-col w-col-8">
                        <div class="author-title w-clearfix">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/single_post_images_22.png" loading="lazy" alt="Author Image" class="single-post-author-stripes" />
                            <h3 class="single-post-author-name"><?php echo esc_html($first_name) . ' ' . esc_html($last_name); ?></h3>
                            <div class="single-post-author-subtitle"><?php echo esc_html( $occupation ); ?></div>
                        </div>
                        <p class="main-paragraph">
                            <?php the_author_meta('description'); ?>
                        </p>
                        <?php if($facebook) :?>
                        <a href="<?php echo esc_attr($facebook); ?>" class="link-6"></a>
                        <?php endif; ?>
                        <?php if($twitter) :?>
                        <a href="<?php echo esc_attr($twitter); ?>" class="link-6"></a>
                        <?php endif; ?>
                        <?php if($instagram) :?>
                        <a href="<?php echo esc_attr($instagram); ?>" class="link-6"></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="blog-similar">
                <div class="main-title"><h3 class="main-title-heading"><?php esc_html_e('Similar', 'medyc'); ?></h3></div>
                <div role="list" class="blog-cms w-dyn-items w-row">
                    <?php
                        $current_post_id = get_the_ID();

                        // Get the categories assigned to the current post
                        $post_categories = get_the_category($current_post_id);

                        if ($post_categories) {
                            // Get the ID of the first category assigned to the post
                            $category_id = $post_categories[0]->cat_ID;

                            // Query three posts from the same category
                            $related_posts_args = array(
                                'cat' => $category_id,
                                'posts_per_page' => 3,
                                'post__not_in' => array($current_post_id),
                            );

                            $related_posts_query = new WP_Query($related_posts_args);

                            // Display related posts
                            if ($related_posts_query->have_posts()) {
                                while ($related_posts_query->have_posts()) {
                                    $related_posts_query->the_post(); ?>
                                    <div role="listitem" class="blog-item w-dyn-item w-col w-col-4">
                                        <div id="innerblog_column" class="inner-blog-item w-clearfix">
                                            <?php if ( has_post_thumbnail() ) { ?>
                                            <a href="<?php the_permalink(); ?>" class="blog-img-link w-inline-block">
                                                <img
                                                    loading="lazy"
                                                    alt="Post Image"
                                                    src="<?php echo get_the_post_thumbnail_url(); ?>"                                    
                                                    class="blog-img"
                                                />
                                            </a>
                                            <?php } ?>
                                            <div class="blog-meta">
                                                <a href="<?php the_permalink(); ?>" class="category-meta w-inline-block w-clearfix">
                                                    <div class="category-icon"></div>
                                                    <div class="category-text">
                                                        <?php
                                                            $categories = get_the_category();
                                                            if ( ! empty( $categories ) ) { 
                                                                echo esc_html( $categories[0]->name ); 
                                                            }
                                                        ?>
                                                    </div>
                                                </a>
                                                <div class="time-meta w-clearfix">
                                                    <div class="category-icon"></div>
                                                    <div class="category-text"><?php echo get_the_date(); ?></div>
                                                </div>
                                                <div class="blog-line"></div>
                                            </div>
                                            <div class="blog-text">
                                                <a href="<?php the_permalink(); ?>" class="blog-title-link w-inline-block">
                                                    <h2 class="blog-title"><?php the_title(); ?></h2>
                                                </a>
                                                <p class="main-paragraph blog-paragraph">
                                                    <?php echo medyc_excerpt(); ?>
                                                </p>
                                            </div>
                                            <div class="blog-arrow-div w-clearfix"><a href="<?php the_permalink(); ?>" class="read-more-arrow"></a></div>
                                        </div>
                                    </div>
                                <?php }
                                wp_reset_postdata(); // Reset post data to restore the main loop
                            }
                        }
                    ?>

                </div>
            </div>
            <?php if ( comments_open() || get_comments_number() ) {  ?>
                <?php comments_template(); ?>
            <?php } ?>
            <?php if(is_active_sidebar('sidebar')){ ?>
                </div>
                <div class="w-dyn-item w-col w-col-3">
                                    <?php get_sidebar(); ?>
                                </div>
                </div>
            <?php } ?>
        </div>
        </div>



