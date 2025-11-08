<?php 
$email_add = get_theme_mod('email');
$phone_number = get_theme_mod('phone_number');
$copyright_line = get_theme_mod('copyright');
$mailchimp = get_theme_mod('mailchimp');
$facebook = get_theme_mod('facebook');
$twitter = get_theme_mod('twitter');
$instagram = get_theme_mod('instagram');
$linkedin = get_theme_mod('linkedin');
$youtube = get_theme_mod('youtube');
$google = get_theme_mod('google');

?>
<!-- footer 
    ================================================== -->
<!-- End footer -->


<div class="footer">
        <div class="flex-container w-container">
        	<?php if($phone_number || $email_add): ?>
            <div class="footer-infos">
                <div class="inner-infos">
                    <div class="info-row w-row">
                    	<?php if ($phone_number != '') { ?>
                        <div class="column-three w-col w-col-3">
                            <div class="contact-info">
                                <div class="info-titles"><?php esc_html_e('call us', 'medyc'); ?></div>
                                <div class="info-description"><?php echo esc_html($phone_number); ?></div>
                            </div>
                        </div>
                    	<?php } ?>
                    	<?php if ($email_add != '') { ?>
                        <div class="column-three w-col w-col-3">
                            <div class="contact-info">
                                <div class="info-titles"><?php esc_html_e('email us', 'medyc'); ?></div>
                                <div class="info-description"><?php echo esc_html($email_add); ?></div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if ($mailchimp != '') { ?>
                        <div class="column-three w-col w-col-3">
                            <div class="w-form">
                                <?php echo do_shortcode($mailchimp); ?>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="column-three w-col w-col-3">
                            <div class="info-socials">
                            	<?php if ($facebook != '') { ?>
				                <a href="<?php echo esc_url($facebook); ?>" class="socials-link w-inline-block">
				                    <div class="social-icon"></div>
				                </a>
				                <?php } ?>
				                <?php if ($twitter != '') { ?>
				                <a href="<?php echo esc_url($twitter); ?>" class="socials-link w-inline-block">
				                    <div class="social-icon"></div>
				                </a>
				                <?php } ?>
				                <?php if ($instagram != '') { ?>
				                <a href="<?php echo esc_url($instagram); ?>" class="socials-link w-inline-block">
				                    <div class="social-icon"></div>
				                </a>
				                <?php } ?>
				                <?php if ($linkedin != '') { ?>
				                <a href="<?php echo esc_url($linkedin); ?>" class="socials-link w-inline-block">
				                    <div class="social-icon"></div>
				                </a>
				                <?php } ?>
				                <?php if ($youtube != '') { ?>
				                <a href="<?php echo esc_url($youtube); ?>" class="socials-link w-inline-block">
				                    <div class="social-icon"></div>
				                </a>
				                <?php } ?>
				                <?php if ($google != '') { ?>
				                <a href="<?php echo esc_url($google); ?>" class="socials-link w-inline-block">
				                    <div class="social-icon"></div>
				                </a>
				                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="footer-row w-row">
            	<?php if ( is_active_sidebar('sidebar-footer-1') ) { ?>

	                <div class="column-four w-col w-col-4">
	                    <div class="foot-info w-clearfix">
	                    	<?php dynamic_sidebar('sidebar-footer-1'); ?>
	                    </div>
	                </div>

	            <?php }; ?>
            	<?php if ( is_active_sidebar('sidebar-footer-2') ) { ?>

	                <div class="column-four w-col w-col-4">
	                    <div class="foot-info w-clearfix">
	                    	<?php dynamic_sidebar('sidebar-footer-2'); ?>
	                    </div>
	                </div>
	                
	            <?php }; ?>
            	<?php if ( is_active_sidebar('sidebar-footer-3') ) { ?>

	                <div class="column-four w-col w-col-4">
	                    <div class="foot-info w-clearfix">
	                    	<?php dynamic_sidebar('sidebar-footer-3'); ?>
	                    </div>
	                </div>
	                
	            <?php }; ?>
            </div>
            
            <?php if($copyright_line): ?>
            <div class="footer-copyright">
                <div class="footer-paragraph copyright-text"><?php echo esc_html($copyright_line); ?></div>
            </div>
        	<?php endif; ?>
        </div>
    </div>