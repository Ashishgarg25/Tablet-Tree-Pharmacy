<?php
	$columns = greenorganic_get_config('blog_columns', 1);
	$bcol = floor( 12 / $columns );
?>
<div class="posts-list-default">
    <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'post-formats/loop/list-default/_item' ); ?>
    <?php endwhile; ?>
</div>