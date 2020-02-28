<?php global $product; 
	$image_size = isset($image_size) ? $image_size : 'woocommerce_thumbnail';
?>
<li class="media product-block">
	<div class="media-left">
		<?php
			greenorganic_product_image($image_size);
			remove_action('woocommerce_before_shop_loop_item_title', 'greenorganic_swap_images', 10);
            do_action( 'woocommerce_before_shop_loop_item_title' );
		?>
	</div>
	<div class="media-body">
		
		<h3 class="name">
			<a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>"><?php echo trim( $product->get_title() ); ?></a>
		</h3>
		<div class="rating clearfix">
			<?php
            	if($rating_html = wc_get_rating_html( $product->get_average_rating() )){
            		echo trim( wc_get_rating_html( $product->get_average_rating() ) );

            	}else{
            		echo '<div class="star-rating pull-left"></div>';
            	}
        	?>
	    </div>
		<div class="price"><?php echo trim($product->get_price_html()); ?></div>
	</div>
</li>