<?php

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$categories = array();
if ( !empty($category) ) {
    $categories = array($category);
}

$loop = greenorganic_get_products( $categories, $type, 1, $number );
?>
    <div class="widget widget-products <?php echo esc_attr($el_class); ?>">
    	<?php if ($title!=''): ?>
	        <h3 class="widget-title">
	           <?php echo esc_attr( $title ); ?>
		    </h3>
	    <?php endif; ?>
        <div class="widget-content woocommerce">
            <?php wc_get_template( 'layout-products/'.$layout_type.'.php' , array( 'loop' => $loop, 'columns' => $columns, 'number' => $number,'product_item' => $item_type ) ); ?>
        </div>
    </div>