<?php

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

if (isset($categoriesbanners) && !empty($categoriesbanners)):
    $categoriesbanners = (array) vc_param_group_parse_atts( $categoriesbanners );
	?>
	<div class="widget-categorybanner <?php echo esc_attr($el_class); ?>">
			<div class="owl-carousel" data-items="<?php echo esc_attr($columns); ?>" data-carousel="owl" data-medium="4" data-smallmedium="3" data-extrasmall="1" data-pagination="false" data-nav="true">
			    <?php foreach ($categoriesbanners as $item) { ?>
			    	<?php
		    		$category = get_term_by( 'slug', $item['category'], 'product_cat' );
		    		if ( !empty($category) ) {
			    	?>	
			    		<div class="grid-banner-category">
			    			<a href="<?php echo esc_url(get_term_link($category)); ?>">
						        <div class="item category-wrapper">
					                <?php
						                if ( isset($item['image']) && $item['image'] ) {
						                	$image = wp_get_attachment_image_src($item['image'],'full');
						                	greenorganic_display_image($image);
						                }
					                ?>
					                <div class="category-meta">
					                	<div class="category-meta-inner">
						                	<h2 class="title">
						                		<?php if ( !empty($title) ) { ?>
					                                <?php echo trim($title); ?>
					                            <?php } else { ?>
					                                <?php echo trim($category->name); ?>
					                            <?php } ?>
					                        </h2>
					                        <?php if ( $show_number_products ) { ?>
				                            	<span class="product-count">( <?php echo trim($category->count); ?> <?php echo esc_html__('items','greenorganic') ?> )</span>
				                            <?php } ?>
			                            </div>
					                </div>
						        </div>
						    </a>
				        </div>
		    		<?php } ?>
			    <?php } ?>
			</div>
	</div>
	<?php
endif;