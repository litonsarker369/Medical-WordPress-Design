<?php 
  
function medyc_get_comment_depth( $my_comment_id ) {
  
    $depth_level = 0;
    
    while( $my_comment_id > 0  ) { 
        
        $my_comment = get_comment( $my_comment_id );
        $my_comment_id = $my_comment->comment_parent;
        $depth_level++;

    }

    return $depth_level;
    
}
    
//Custom comment List:
function medyc_theme_comment($comment, $args, $depth) {
        
    $GLOBALS['comment'] = $comment; ?>
    <!--=======  COMMENTS =========-->
    
    <li <?php comment_class(''); ?> id="comment-<?php comment_ID() ?>" >
    
        <div class="comment-box">

            <div class="image-holder">

                <?php if($comment->user_id!='0' and get_user_meta($comment->user_id, '_medyc_avatar' ,true)!=''){ ?>

                    <?php $image = get_user_meta($comment->user_id, '_medyc_avatar' ,true); ?>
                    <img src="<?php echo esc_url($image); ?>" />

                <?php } else { ?>

                    <?php echo get_avatar($comment, 200); ?>

                <?php } ?>
            </div>

            <div class="comment-content">
                <span class="time">
                    <?php printf(esc_html__('%1$s','medyc'), get_comment_date()) ?> <abbr>/</abbr>
                    <?php esc_html_e('by ', 'medyc'); ?>
                    <?php printf(esc_html__('%s','medyc'), get_comment_author()) ?>
                </span>
                
                <?php comment_text() ?>

                <?php if ($comment->comment_approved == '0') : ?>
                   <em><?php esc_html_e('Your comment is awaiting moderation.','medyc') ?></em>
                   <br />
                <?php endif; ?>

                <?php comment_reply_link( array_merge($args, array(
                  'reply_text' => esc_html__('reply', 'medyc'),
                  'depth'      => $depth,
                  'max_depth'  => $args['max_depth']
                  )
                )); ?>
                
            </div>
        </div>
    
    <?php
}

add_filter( 'comment_form_fields', 'move_comment_field' );
function move_comment_field( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}
    