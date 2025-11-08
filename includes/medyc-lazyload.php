<?php 


add_action( 'wp_enqueue_scripts', 'medyc_lazyload_assets', 10 );

function medyc_lazyload_assets() {
  $js_dir = get_template_directory_uri() . '/assets/js';
  wp_enqueue_script( 'medyc-lazyload', $js_dir . '/lazyload.js', [], '', true );
}

add_filter( 'the_content', 'medyc_lazyload_content_images' );
add_filter( 'wp_get_attachment_image_attributes', 'medyc_lazyload_attachments', 10, 2 );

// Replace the image attributes in Post/Page Content
function medyc_lazyload_content_images( $content ) {
  $content = preg_replace( '/(<img.+)(src)/Ui', '$1data-$2', $content );
  $content = preg_replace( '/(<img.+)(srcset)/Ui', '$1data-$2', $content );
  return $content;
}

// Replace the image attributes in Post Listing, Related Posts, etc.
function medyc_lazyload_attachments( $atts, $attachment ) {
  $atts['data-src'] = $atts['src'];
  unset( $atts['src'] );
  
  if( isset( $atts['srcset'] ) ) {
    $atts['data-srcset'] = $atts['srcset'];
    unset( $atts['srcset'] );
  }

  return $atts;
}

