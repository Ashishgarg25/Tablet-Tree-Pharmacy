<?php $thumbsize = !isset($thumbsize) ? greenorganic_get_blog_thumbsize() : $thumbsize; $thumb = greenorganic_display_post_thumb($thumbsize);
global $post;
?>
<article <?php post_class('post list-default'); ?>>
    <div class="list-inner">
        <?php
            if ( !empty($thumb) ) {
                ?>
                <div class="image">
                    <?php echo trim($thumb); ?>
                </div>
                <?php
            }
        ?>
        <div class="info">
            <div class="top-blog-info clearfix">
                <div class="pull-left">
                    <span class="author text-theme"><?php the_author_posts_link(); ?></span>
                    <span class="date"> - <?php the_time( get_option('date_format', 'M d, Y') ); ?></span> 
                </div>
                <div class="pull-right">
                    <span class="categories"><i class="fa fa-tag" aria-hidden="true"></i><?php greenorganic_post_categories($post); ?></span>
                    <span class="comments"><i class="fa fa-comments-o" aria-hidden="true"></i><?php comments_number( '0 Comment', '1 Comment', '% Comments' ); ?></span>
                </div>
            </div>
            <?php
                if (get_the_title()) {
                ?>
                    <h4 class="entry-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h4>
                <?php
            }
            ?>
            <?php if (! has_excerpt()) { ?>
                <div class="description"><?php echo trim(greenorganic_substring( get_the_content(), 55, '...' )); ?></div>
            <?php } else { ?>
                <div class="description"><?php echo trim(greenorganic_substring( get_the_excerpt(), 55, '...' )); ?></div>
            <?php } ?>
            <a class="read-more" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'greenorganic'); ?> <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
        </div>
    </div>
</article>