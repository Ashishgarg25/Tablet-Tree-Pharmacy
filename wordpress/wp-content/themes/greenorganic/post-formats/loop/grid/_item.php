<?php $thumbsize = !isset($thumbsize) ? greenorganic_get_blog_thumbsize() : $thumbsize;?>
<article <?php post_class('post post-grid'); ?>>
    <?php
        $thumb = greenorganic_display_post_thumb($thumbsize);
        echo trim($thumb);
    ?>
    <div class="entry-content <?php echo !empty($thumb) ? '' : 'no-thumb'; ?>">
        <div class="entry-meta">
            <div class="info">
                <div class="date-post"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php the_time( get_option('date_format', 'd M, Y') ); ?></div>
                <?php if (get_the_title()) { ?>
                    <h4 class="entry-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h4>
                <?php } ?>
            </div>
        </div>
        <a class="read-more" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'greenorganic'); ?> <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
    </div>
</article>