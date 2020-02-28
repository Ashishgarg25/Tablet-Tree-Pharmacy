<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$img = wp_get_attachment_image_src($img,'full');
if ( !empty($product_slug) ) {
	global $woocommerce;
	$args = array( 'name' => $product_slug, 'post_status' => 'publish', 'post_type' => 'product' );
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
		<div class="widget clearfix widget-products-deal <?php echo esc_attr($el_class); ?> <?php echo (!empty($img) && isset($img[0])) ? 'has-banner':''; ?>">
            <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                <?php if ( !empty($img) && isset($img[0]) ): ?>
                    <div class="banner-deal">
                        <a href="<?php the_permalink(); ?>">
                            <?php greenorganic_display_image($img); ?>
                        </a>
                    </div>
                <?php endif; ?>
            	<div class="widget-content woocommerce">
                    <?php wc_get_template_part( 'item-product/inner-deal' ); ?>
            	</div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
    	</div>
		<?php
	}
}