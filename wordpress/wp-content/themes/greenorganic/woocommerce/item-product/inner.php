<?php 
global $product;
?>
<div class="product-block grid" data-product-id="<?php echo esc_attr($product->get_id()); ?>">
    <div class="block-inner">
        <figure class="image">
            <?php
                $image_size = isset($image_size) ? $image_size : 'shop_catalog';
                greenorganic_product_image($image_size);

                remove_action('woocommerce_before_shop_loop_item_title', 'greenorganic_swap_images', 10);
                do_action( 'woocommerce_before_shop_loop_item_title' );
            ?>
            
        </figure>
        <div class="groups-button clearfix">
            <?php if (greenorganic_get_config('show_quickview', true)) { ?>
                <div class="quick-view">
                    <a href="#" class="quickview btn btn-theme" data-product_id="<?php echo esc_attr($product->get_id()); ?>" data-toggle="modal" data-target="#apus-quickview-modal">
                        <?php echo esc_html__('QUICK VIEW','greenorganic') ?>
                    </a>
                </div>
            <?php } ?>
            <?php 
                remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
                do_action( 'woocommerce_after_shop_loop_item' ); 
            ?>
        </div>
    </div>
    <div class="caption">
        <div class="meta">
            <h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <div class="infor clearfix">
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
            </div>
        </div>    
    </div>
</div>