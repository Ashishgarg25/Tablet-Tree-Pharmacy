<?php
$post_format = get_post_format();
global $post;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="top-info">
        <?php if ( $post_format == 'gallery' ) {
            $gallery = greenorganic_post_gallery( get_the_content(), array( 'size' => 'full' ) );
        ?>
            <div class="entry-thumb <?php echo  (empty($gallery) ? 'no-thumb' : ''); ?>">
                <?php echo trim($gallery); ?>
            </div>
        <?php } elseif( $post_format == 'link' ) {
                $format = greenorganic_post_format_link_helper( get_the_content(), get_the_title() );
                $title = $format['title'];
                $link = greenorganic_get_link_attributes( $title );
                $thumb = greenorganic_post_thumbnail('', $link);
                echo trim($thumb);
            } else { ?>
            <div class="entry-thumb <?php echo  (!has_post_thumbnail() ? 'no-thumb' : ''); ?>">
                <?php
                    $thumb = greenorganic_post_thumbnail();
                    echo trim($thumb);
                ?>
            </div>
        <?php } ?>
        <?php if (get_the_title()) { ?>
            <h4 class="entry-title">
                <?php the_title(); ?>
            </h4>
        <?php } ?>
        <div class="entry-meta">
            <div class="meta">
                <span class="author"><?php the_author_posts_link(); ?></span><span class="space">|</span>
                <span class="date"><?php the_time( get_option('date_format', 'M d, Y') ); ?></span> <span class="space">|</span>
                <span class="categories"><?php greenorganic_post_categories($post); ?></span>
            </div>
        </div>
    </div>
	<div class="entry-content-detail">
    	<div class="single-info info-bottom">
            <div class="entry-description">
                <?php
                    if ( $post_format == 'gallery' ) {
                        $gallery_filter = greenorganic_gallery_from_content( get_the_content() );
                        echo trim($gallery_filter['filtered_content']);
                    } else {
                        the_content();
                    }
                ?>
            </div><!-- /entry-content -->
    		<?php
    		wp_link_pages( array(
    			'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'greenorganic' ) . '</span>',
    			'after'       => '</div>',
    			'link_before' => '<span>',
    			'link_after'  => '</span>',
    			'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'greenorganic' ) . ' </span>%',
    			'separator'   => '',
    		) );
    		?>
    		<div class="tag-social clearfix">
                <div class="pull-left">
    			 <?php greenorganic_post_tags(); ?>
                </div>
                <div class="pull-right">
    			 <?php if( greenorganic_get_config('show_blog_social_share', false) ) {
    					get_template_part( 'page-templates/parts/sharebox' );
    				} ?>
                </div>
    		</div>
    	</div>
    </div>
</article>