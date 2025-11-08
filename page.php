<?php 

$elementor_page_active = null;

if ( defined( 'ELEMENTOR_VERSION' ) ) {
    $elementor_page_active = \Elementor\Plugin::$instance->db->is_built_with_elementor(get_the_ID());
}

$image = get_theme_mod( 'image_setting_url', '' );

get_header();


if ( ! is_front_page() ) : ?>

<div class="site-banner" style="background-image: url(<?php echo esc_url( $image ); ?>);">
    <div class="banner-text">
        <h1 class="banner-title"><?php the_title(); ?></h1>
        <div class="breadcrumbs">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="breadcrumbs-link"><?php echo get_the_title(get_option('page_on_front')); ?></a>
            <div class="banner-arrow"></div>
            <a href="<?php the_permalink(); ?>" aria-current="page" class="breadcrumbs-link w--current"><?php the_title(); ?></a>
        </div>
    </div>
</div>

<?php endif;

if($elementor_page_active) {

    the_content();

} else {

    while ( have_posts() ) : the_post(); ?>

    <div class="blog">
        <div class="flex-container w-container">
            <?php
                the_content();
                wp_link_pages();
            ?>
            <?php if ( comments_open() || get_comments_number() ) {  ?>
                <?php comments_template(); ?>   
            <?php } ?>
            
        </div>
    </div>


    <?php endwhile;

}

get_footer();

?>