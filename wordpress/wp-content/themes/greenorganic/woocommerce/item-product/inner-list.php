<?php 
global $product;
$image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id($product->get_id() ), 'blog-thumbnails' );
?>
<div class="product-block list" data-product-id="<?php echo esc_attr($product->get_id()); ?>">
	<div class="clearfix">
		<div class="wrapper-image">
		    <figure class="image">
		        <?php woocommerce_show_product_loop_sale_flash(); ?>
		        <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" class="product-image">
		            <?php
		                /**
		                * woocommerce_before_shop_loop_item_title hook
		                *
		                * @hooked woocommerce_show_product_loop_sale_flash - 10
		                * @hooked woocommerce_template_loop_product_thumbnail - 10
		                */
		                remove_action('woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash', 10);
		                do_action( 'woocommerce_before_shop_loop_item_title' );
		            ?>
		        </a>
		        <?php if (greenorganic_get_config('show_quickview', true)) { ?>
	                <div class="quick-view">
	                    <a href="#" class="btn btn-theme" data-product_id="<?php echo esc_attr($product->get_id()); ?>" data-toggle="modal" data-target="#apus-quickview-modal">	
	                       <span><?php esc_html_e('Quick view','greenorganic'); ?></span>
	                    </a>
	                </div>
	            <?php } ?> 
		    </figure>
		</div>    
	    <div class="wrapper-info">
		    <div class="caption-list">
		        
		        <div class="meta">

		         <h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		            <?php
		                /**
		                * woocommerce_after_shop_loop_item_title hook
		                *
		                * @hooked woocommerce_template_loop_rating - 5
		                * @hooked woocommerce_template_loop_price - 10
		                */
		                remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',5);
		                do_action( 'woocommerce_after_shop_loop_item_title');
		            ?>
		            <div class="desc">
		            	<?php echo  the_excerpt();  ?>
		            </div>
		            <div class="action-bottom clearfix">  
		            	<?php 
			            	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
			            	do_action( 'woocommerce_after_shop_loop_item' ); 
		            	?>
		            </div>
		        </div>    
		    </div>
		</div>    
	</div>	    
</div>