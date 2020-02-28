<?php
$product_item = isset($product_item) ? $product_item : 'list';
?>
<ul class="apus-products-list products">
	<?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
		<div class="product">
			<?php wc_get_template_part( 'item-product/'.$product_item ); ?>
		</div>
	<?php endwhile; ?>
</ul>
<?php wp_reset_postdata(); ?>