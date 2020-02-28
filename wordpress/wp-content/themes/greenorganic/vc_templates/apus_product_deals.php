<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

if ( !empty($product_slugs) ) {
	global $woocommerce;
    $product_slugs = explode(',', $product_slugs);
	$args = array( 'post_name__in' => $product_slugs, 'post_status' => 'publish', 'post_type' => 'product' );
	$args['meta_query'] = array();
    $args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
    $args['meta_query'][] = $woocommerce->query->visibility_meta_query();
    $args['meta_query'][] =  array(
        array(
            'key'           => '_sale_price_dates_to',
            'value'         => time(),
            'compare'       => '>',
            'type'          => 'numeric'
        )
    );
	$loop = new WP_Query( $args );
	if ( $loop->have_posts() ) {
		?>
		<div class="widget woocommerce widget-products-deals <?php echo esc_attr($el_class); ?>">
            <div class="owl-carousel products" data-items="<?php echo esc_attr($columns); ?>" data-carousel="owl" data-medium="3" data-smallmedium="2" data-extrasmall="2" data-verysmall="1" data-pagination="false" data-nav="true">
                <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                	<div class="product item">
                        <?php wc_get_template_part( 'item-product/inner-deals' ); ?>
                	</div>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>
    	</div>
		<?php
	}
}