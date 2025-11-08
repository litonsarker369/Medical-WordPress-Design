<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>

<?php

$aria_req = ( $req ? " aria-required='true'" : '' );
if ( !is_user_logged_in() ) {
    $comment_args = array(
        'title_reply_before' => '<h3>',
        'title_reply_after'  => '</h3>',
        'title_reply'=> esc_html__('Leave a comment','medyc'),

        'fields' => apply_filters( 'comment_form_default_fields', array(

            'author' => '<div class="row">
                <div class="col-lg">
                    <div class="input-line">
                        <label for="name">
                            <i class="fas fa-user"></i>
                        </label>
                        <input type="text" name="author" placeholder="'.esc_attr__('Name','medyc').'*"  id="name" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' />
                    </div>
            ',

            'email' => '
                    <div class="input-line">
                        <label for="email">
                            <i class="far fa-envelope"></i>
                        </label>
                        <input id="mail" placeholder="'.esc_attr__('Email','medyc').'*" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . ' />
                    </div>
            ',
            'url' => '
                    <div class="input-line">
                        <label for="url">
                            <i class="fas fa-link"></i>
                        </label>
                        <input id="website" name="url" placeholder="'.esc_attr__('Website','medyc').'" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '"  />
                    </div>
                </div>
            '
        )),
        'comment_field' => ' <div class="col-lg">
            <textarea  rows="7" id="comment" placeholder="'.esc_attr__('Comment','medyc').'*" name="comment"'.$aria_req.'></textarea>
            </div>
        </div>
        ',
        'label_submit' => esc_html__('Post Comment', 'medyc'),
        'comment_notes_after' => '',
    );
} else {
    $comment_args = array(
        'title_reply_before' => '<h3>',
        'title_reply_after'  => '</h3>',
        'title_reply'=> esc_html__('Leave a comment','medyc'),

        
        'comment_field' => '<div class="row">
                <div class="col-lg-6">
            <textarea  rows="7" id="comment" placeholder="'.esc_attr__('Comment','medyc').'*" name="comment"'.$aria_req.'></textarea>
            </div></div>
        ',
        'label_submit' => esc_html__('Leave a Comment', 'medyc'),
        'class_submit' => esc_attr__('logged-in-submit', 'medyc'),
        'comment_notes_after' => '',
    );
}
?>


<?php if( get_comments_number()){ ?>
<div class="comments-box" id="comments">
    <h3>
        <?php comments_number( esc_html__('0 Comments','medyc'), esc_html__('1 Comment','medyc'), esc_html__('% Comments','medyc') ); ?>
    </h3>
    <?php if(get_comment_pages_count()>0){ ?>
        <ul class="comments-list">
            <?php wp_list_comments('callback=medyc_theme_comment'); ?>
        </ul>
        <?php
        // Are there comments to navigate through?
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
            ?>
            <div class="navigation comment-navigation" role="navigation">
                
                <div class="previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'medyc' ) ); ?></div>
                <div class="next right"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'medyc' ) ); ?></div>
            </div><!-- .comment-navigation -->
        <?php endif; // Check for comment navigation ?>

        <?php if ( ! comments_open() && get_comments_number() ) : ?>
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.' , 'medyc' ); ?></p>
        <?php endif; ?>
    <?php } ?>
</div>
<?php } ?>

<!-- Contact form  -->
<?php if('open' == $post->comment_status){ ?>
<div class="comments-form">
    <div id="comment-form">
        <?php comment_form($comment_args); ?>
    </div>
</div>
<!-- End contact form box -->
<?php } ?>
<!-- End Contact form -->

