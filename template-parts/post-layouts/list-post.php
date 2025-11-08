
<div <?php post_class( 'blog-post post-list-style' ); ?>>
    <?php if ( has_post_thumbnail() ) { ?>
        <a href="<?php the_permalink(); ?>" class="post-thumbnail">
            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt>
        </a>
    <?php } ?>
    <div class="post-content">
        <ul class="meta-list">
            <?php
                $categories = get_the_category();
                if ( ! empty( $categories ) ) { ?>
                    <li>
                        <a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) )?>">
                            <i class="far fa-folder-open"></i>
                            <?php echo esc_html( $categories[0]->name ); ?>
                        </a>
                    </li>
                <?php }
            ?>
            <li>
                <a href="#">
                    <i class="far fa-clock"></i>
                    <?php the_time(); ?>
                </a>
            </li>
        </ul>

        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <p><?php the_excerpt(); ?></p>
        <a class="button-one" href="<?php the_permalink(); ?>">
            <span><?php esc_html_e('Read More', 'medyc'); ?></span>
        </a>
    </div>

</div>