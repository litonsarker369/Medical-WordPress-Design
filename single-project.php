<?php

$image = get_theme_mod( 'image_setting_url', '' );
  
get_header();

if ( have_posts() ) : while ( have_posts() ) : the_post();

$subtitle = get_post_meta($wp_query->get_queried_object_id(), "_medyc_banner_subtitle", true);


?>

<section>

    <div class="inner-pages-wrap">
        <div class="w-layout-blockcontainer main-container w-container">


            <div class="site-map">
                <div class="sitemap-page">
                    <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" loading="lazy" alt="single-project" class="sitemap-image" />
                    <?php endif; ?>
                    <h4 class="sitemap-title">
                        <?php 
                            the_title();
                        ?>
                    </h4>
                </div>
                <div class="sitemap-info">
                    <div class="sitemap-text"><?php echo esc_html($subtitle); ?></div>
                </div>
            </div>
            <div class="single-wrapper">
                <?php if (has_post_thumbnail()) : ?>
                    <img alt="Essence" loading="lazy" src="<?php echo get_the_post_thumbnail_url(); ?>" class="single-work-image" />
                <?php endif; ?>
                <h2 class="single-work-title"><?php the_title(); ?></h2>
                <div class="single-text-style w-richtext">
                    <?php the_content(); ?>
                </div>
    
            </div>

        </div>
    </div>
</section>

<?php endwhile; endif;

get_footer();

?>