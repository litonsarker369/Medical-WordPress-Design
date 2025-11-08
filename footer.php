<?php
    
    get_template_part( 'template-parts/footer' );

    $facebook = get_theme_mod('facebook');
    $twitter = get_theme_mod('twitter');
    $instagram = get_theme_mod('instagram');
    if ( true == get_theme_mod( 'switch_socials' ) ) :
?>

        <div class="socials">
            <?php if ($facebook != '') { ?>
            <a href="<?php echo esc_url($facebook); ?>" class="social-item w-inline-block"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/fcb.png" loading="lazy" alt="facebook-icon" class="facebook-icon" /></a>
            <?php } ?>
            <?php if ($twitter != '') { ?>
            <a href="<?php echo esc_url($twitter); ?>" class="social-item w-inline-block"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/twitter.png" loading="lazy" alt="twitter-icon" class="twitter-icon" /></a>
            <?php } ?>
            <?php if ($instagram != '') { ?>
            <a href="<?php echo esc_url($instagram); ?>" class="social-item w-inline-block"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram.png" loading="lazy" alt="insta-icon" class="insta-icon" /></a>
            <?php } ?>
        </div>
    
<?php 
    endif;
wp_footer(); ?>

</body>
</html>