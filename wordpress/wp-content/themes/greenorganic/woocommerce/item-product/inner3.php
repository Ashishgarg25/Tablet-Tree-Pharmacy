<?php 
global $product;
$product_id = $product->get_id();
?>
<div class="product-block grid3" data-product-id="<?php echo esc_attr($product->get_id()); ?>">
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
                    <a href="#" class="quickview" data-product_id="<?php echo esc_attr($product->get_id()); ?>" data-toggle="modal" data-target="#apus-quickview-modal">
                        <i class="ion-ios-search"></i>
                    </a>
                </div>
            <?php } ?>
            
            <?php
                if ( class_exists( 'YITH_WCWL' ) ) {
                    echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
                }
            ?>
            <?php if( class_exists( 'YITH_Woocompare_Frontend' ) ) { ?>
                <?php
                    $obj = new YITH_Woocompare_Frontend();
                    $url = $obj->add_product_url($product_id);
                    $compare_class = '';
                    if ( isset($_COOKIE['yith_woocompare_list']) ) {
                        $compare_ids = json_decode( $_COOKIE['yith_woocompare_list'] );
                        if ( in_array($product_id, $compare_ids) ) {
                            $compare_class = 'added';
                            $url = $obj->view_table_url($product_id);
                        }
                    }
                ?>
                <div class="yith-compare">
                    <a title="<?php echo esc_html__('compare','greenorganic') ?>" href="<?php echo esc_url( $url ); ?>" class="compare <?php echo esc_attr($compare_class); ?>" data-product_id="<?php echo esc_attr($product_id); ?>">
                        <i class="ion-ios-shuffle"></i>
                    </a>
                </div>
            <?php } ?>
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
        <?php 
            remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
            do_action( 'woocommerce_after_shop_loop_item' ); 
        ?>    
    </div>
</div>