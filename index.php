<?php

get_header();
        $image = get_theme_mod( 'image_setting_url', '' );
        
        ?>

            <div class="site-banner" style="background-image: url(<?php echo esc_url( $image ); ?>);">
                <div class="banner-text">
                    <h1 class="banner-title">
                        <?php 
                            if ( is_category() ) {  
                                echo esc_html_e('CATEGORY: ', 'medyc') . single_term_title();
                            } elseif ( is_tag() ) {    
                                echo esc_html_e('TAG: ', 'medyc') . single_term_title();
                            } elseif ( is_date() ) {    
                                the_archive_title();
                            } elseif ( is_author() ) {    
                                echo esc_html_e('Posts by: ', 'medyc') . get_the_author_meta('display_name');
                            } elseif ( is_tax() ) {
                                single_term_title();
                            } elseif (is_home()) {
                                echo esc_html_e('Recent News', 'medyc');
                            } else {
                                the_title();
                            }
                            
                        ?>
                    </h1>
                    <div class="breadcrumbs">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="breadcrumbs-link"><?php echo get_the_title(get_option('page_on_front')); ?></a>
                        <div class="banner-arrow"></div>
                        <a href="<?php echo get_the_permalink(get_option('page_for_posts')); ?>" aria-current="page" class="breadcrumbs-link w--current"><?php echo get_the_title(get_option('page_for_posts')); ?></a>
                        <?php if(!is_home()) : ?>
                        <div class="banner-arrow"></div>
                        <a href="<?php the_permalink(); ?>" aria-current="page" class="breadcrumbs-link w--current"><?php the_title(); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="blog">
                <div class="flex-container w-container">
                    <div class="main-title">
                        <h2 class="main-title-heading">
                            <?php 
                                if ( is_category() ) {  
                                    echo esc_html_e('CATEGORY: ', 'medyc') . single_term_title();
                                } elseif ( is_tag() ) {    
                                    echo esc_html_e('TAG: ', 'medyc') . single_term_title();
                                } elseif ( is_date() ) {    
                                    the_archive_title();
                                } elseif ( is_author() ) {    
                                    echo esc_html_e('Posts by: ', 'medyc') . get_the_author_meta('display_name');
                                } elseif ( is_tax() ) {
                                    single_term_title();
                                } elseif (is_home()) {
                                    echo esc_html_e('Blog', 'medyc');
                                } else {
                                    the_title();
                                }
                                
                            ?>
                        </h2>
                    </div>
                    <div class="w-dyn-list">
                        <?php if(is_active_sidebar('sidebar')){ ?>
                            <div role="list" class="w-dyn-items w-row">
                                <div class="w-dyn-item w-col w-col-8">
                                    <div role="list" class="blog-cms w-dyn-items w-row">
                                        <?php
                                        if(have_posts()) :
                                            while(have_posts()) : the_post(); ?>
                                            <div role="listitem" class="blog-item w-dyn-item w-col w-col-12">
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
                                            <?php endwhile;
                                            endif; 
                                        ?>
                                    </div>
                                    <?php fabric_paging_navigation($wp_query); ?>
                                </div>
                                <div class="w-dyn-item w-col w-col-3">
                                    <?php get_sidebar(); ?>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div role="list" class="blog-cms w-dyn-items w-row">
                                <?php
                                if(have_posts()) :
                                    while(have_posts()) : the_post(); ?>
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
                                    <?php endwhile;
                                    endif; 
                                ?>
                            </div>
                            <?php fabric_paging_navigation($wp_query); ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        
<?php
get_footer();