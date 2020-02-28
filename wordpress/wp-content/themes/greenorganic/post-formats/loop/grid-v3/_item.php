<?php $thumbsize = !isset($thumbsize) ? greenorganic_get_blog_thumbsize() : $thumbsize;?>

<article <?php post_class('post post-grid post-grid-2'); ?>>
    <?php
        $thumb = greenorganic_display_post_thumb($thumbsize);
        echo trim($thumb);
    ?>
    <div class="entry-content <?php echo !empty($thumb) ? '' : 'no-thumb'; ?>">
        <div class="entry-meta">
            <div class="info">
                <span class="author"><span class="sub"><?php esc_html_e('By', 'greenorganic'); ?></span> <?php the_author_posts_link(); ?></span>
                <span class="space">-</span>
                <span class="date"><?php the_time( get_option('date_format', 'd M, Y') ); ?></span>
            </div>
            <?php if (get_the_title()) { ?>
                    <h4 class="entry-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h4>
            <?php } ?>
        </div>
    </div>
</article>