    <?php 


    $facebook = get_theme_mod('facebook');
    $twitter = get_theme_mod('twitter');
    $instagram = get_theme_mod('instagram');
    $linkedin = get_theme_mod('linkedin');
    $youtube = get_theme_mod('youtube');
    $google = get_theme_mod('google');

    $top_bar_text = get_theme_mod('top_bar');
    $phone_number = get_theme_mod('phone');

    ?>

    <div class="header">

        <?php if($top_bar_text || $facebook || $twitter || $instagram || $linkedin || $youtube || $google ) : ?>

        <div class="top-bar flex-container w-clearfix">
            <div class="bar-left w-clearfix">
                <div class="bar-icon"></div>
                <?php if ($top_bar_text != '') { ?>
                <div class="bar-welcome"><?php echo esc_html($top_bar_text); ?></div>
                <?php } ?>
            </div>
            <div class="icons-top">
                <?php if ($facebook != '') { ?>
                <a href="<?php echo esc_url($facebook); ?>" class="bar-socials icon_top facebook">
                    
                </a>
                <?php } ?>
                <?php if ($twitter != '') { ?>
                <a href="<?php echo esc_url($twitter); ?>" class="bar-socials icon_top facebook">
                    
                </a>
                <?php } ?>
                <?php if ($instagram != '') { ?>
                <a href="<?php echo esc_url($instagram); ?>" class="bar-socials icon_top facebook">
                    
                </a>
                <?php } ?>
                <?php if ($linkedin != '') { ?>
                <a href="<?php echo esc_url($linkedin); ?>" class="bar-socials icon_top facebook">
                    
                </a>
                <?php } ?>
                <?php if ($youtube != '') { ?>
                <a href="<?php echo esc_url($youtube); ?>" class="bar-socials icon_top facebook">
                    
                </a>
                <?php } ?>
                <?php if ($google != '') { ?>
                <a href="<?php echo esc_url($google); ?>" class="bar-socials icon_top facebook">
                    
                </a>
                <?php } ?>
            </div>
        </div>
        <?php endif; ?>

        <div class="logo-section flex-container w-clearfix">
            <div class="logo">
                <?php $custom_logo = get_post_meta($wp_query->get_queried_object_id(), '_medyc_custom_logo', true) ?>

                <?php 
                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>" class="brand-logo w-nav-brand">
                    <?php if($custom_logo!=''){ ?>
                        <img src="<?php echo esc_url($custom_logo); ?>" alt="<?php bloginfo('name'); ?>" loading="lazy" class="logo">
                    <?php }elseif($custom_logo_id!=''){ ?>
                        <?php $image = wp_get_attachment_image_src( $custom_logo_id , 'full' ); ?>
                        <img src="<?php echo esc_url($image[0]); ?>" alt="<?php bloginfo('name'); ?>" loading="lazy" class="logo"/>
                    <?php }else{  ?>
                        <?php bloginfo('name'); ?>
                    <?php } ?>
                </a>
            </div>
            <?php if (has_nav_menu('secondary') && has_nav_menu('secondary', array('echo' => false))) { ?>
            <div class="medical-services">

                <?php
                    wp_nav_menu(array(
                        'theme_location' => 'secondary', // Change this to your secondary menu location
                        'menu'           => '',
                        'container'      => '',
                        'container_class' => '',
                        'container_id'   => '',
                        'link_before'    => '',     
                        'link_after'     => '',
                        'menu_class'     => 'list w-clearfix w-list-unstyled',
                        'depth'          => 0,
                        'walker'         => new Custom_Walker_Nav_Menu()
                    ));
                ?>
            </div>
            <?php } ?>
        </div>

        <div class="nav-container">
            <div data-animation="default" data-collapse="medium" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="main-navbar flex-container w-nav">

                <div class="navbar">

                    <input class="menu-btn" type="checkbox" id="menu-btn" />
                    <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
                  
                    <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'menu'            => 'nav-link w-nav-link',
                            'container'       => '',
                            'container_class' => '',
                            'container_id'    => '',
                            'link_before' => '',     
                            'link_after'  => '',
                            'menu_class' => 'menu',
                            'depth'           => 0
                        ));
                    ?>

                </div>
                <?php if ($phone_number != '') { ?>
                <div class="phone_header w-clearfix">
                    <div class="phone-number"><?php echo esc_html($phone_number); ?></div>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/phone2_4phone2_03.png" loading="lazy" alt="Phone Icon" class="phone-icon" />
                </div>
                <?php } ?>



            </div>
        </div>
    </div>