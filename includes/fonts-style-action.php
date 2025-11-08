<?php 


/**
 * Display custom color CSS.
 */
function medyc_colors_css_wrap() {
  global  $wp_query;
  $logo_dimensions = get_theme_mod('logo_dimensions');
?>

<style type="text/css" id="custom-theme-colors">
 <?php 
  if($logo_dimensions){
    $css="
      .logo a img {
        max-width: ".$logo_dimensions['max-width'].";
      }
    ";
  }
  echo do_shortcode($css);
?>
</style>
<?php }
add_action( 'wp_head', 'medyc_colors_css_wrap' );

/*
Register Fonts
*/


if ( ! function_exists( 'medyc_get_google_fonts_url' ) ) {
  /**
   * Load/Get Google Fonts Url
   */
  function medyc_google_fonts_url( $fonts ) {
    $font_url = '';

    $font_url = add_query_arg( 'family', urlencode( $fonts ), "//fonts.googleapis.com/css" );

    return $font_url;
  }
}

/**
 * Enqueue google fonts
 */
function medyc_enqueue_google_fonts() {
  $body_google_fonts = 'Montserrat:100,200,300,400,500,600,700';
  $secondary_google_fonts = 'Rubik:300,400,600,700';

  wp_enqueue_style( 'medyc-font-Montserrat', medyc_google_fonts_url( $body_google_fonts ), array(), '1.0.0' );
  wp_enqueue_style( 'medyc-font-Rubik', medyc_google_fonts_url( $secondary_google_fonts ), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'medyc_enqueue_google_fonts', 10000 );



