<?php 
$thumbsize = !isset($thumbsize) ? greenorganic_get_blog_thumbsize() : $thumbsize; 
$thumb = greenorganic_display_post_thumb($thumbsize);
?>
<article <?php post_class('post list-small'); ?>>
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
        <div class="info entry-meta">
            <?php
                if (get_the_title()) {
                ?>
                    <h4 class="entry-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h4>
                <?php
            }
            ?>
            <div class="date">
                <i class="fa fa-clock-o" aria-hidden="true"></i> <?php the_time('d M , Y'); ?>
            </div>
        </div>
    </div>
</article>