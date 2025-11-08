<?php

$singleLayout = get_post_meta( get_the_ID(), '_medyc_post_layout', true );
  
get_header();
?>


<?php

if ( have_posts() ) : while ( have_posts() ) : the_post();
    setPostViews(get_the_ID());

        
    get_template_part( 'template-parts/single' );


endwhile; endif; ?>
        
<?php
get_footer();

?>