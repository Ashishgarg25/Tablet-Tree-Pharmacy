<?php 
global $product;
?>
<div class="product-block grid-deal">
    <div class=" wrapper-content">
        
        <div class="wrapper-info">
            <div class="product-content">
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
                    
                    <?php if ( has_excerpt() ) { ?>
                        <div class="entry-description"><?php echo greenorganic_substring( get_the_excerpt(), 18, '...' ); ?></div>
                    <?php } ?>

                    <?php
                    $time_sale = get_post_meta( $product->get_id(), '_sale_price_dates_to', true );
                    if ( $time_sale ) { ?>
                        <div class="time">
                            <div class="apus-countdown clearfix" data-time="timmer"
                                data-date="<?php echo date('m', $time_sale).'-'.date('d', $time_sale).'-'.date('Y', $time_sale).'-'. date('H', $time_sale) . '-' . date('i', $time_sale) . '-' .  date('s', $time_sale) ; ?>">
                            </div>
                        </div>
                    <?php } ?>

                    <?php 
                        remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
                        do_action( 'woocommerce_after_shop_loop_item' ); 
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>