<?php

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$_id = greenorganic_random_key();

if (isset($tabs) && !empty($tabs)):
    $tabs = (array) vc_param_group_parse_atts( $tabs );
    $i = 0;
?>

    <div class="widget widget-products-tabs <?php echo esc_attr($el_class.' '.$style); ?>">
        <div class="widget-content woocommerce tab-product-center">
            <div class="nav-tabs-selector">
                <ul role="tablist" class="nav nav-tabs" data-load="ajax">
                    <?php foreach ($tabs as $tab) : ?>
                        <li <?php echo trim($i == 0 ? ' class="active"' : ''); ?>>
                            <a href="#tab-<?php echo esc_attr($_id);?>-<?php echo esc_attr($i); ?>">
                                <?php
                                if ( !empty($tab['img']) ) {
                                    $img = wp_get_attachment_image_src($tab['img'],'full');
                                    if ( !empty($img) && isset($img[0]) ){ ?>
                                        <div class="icon">
                                            <?php greenorganic_display_image($img); ?>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                                <?php if ( !empty($tab['title']) ) { ?>
                                    <?php echo trim($tab['title']); ?>
                                <?php } ?>
                            </a>
                        </li>
                    <?php $i++; endforeach; ?>
                </ul>
            </div>
            <div class="widget-inner">
                <div class="tab-content">
                    <?php $i = 0; foreach ($tabs as $tab) : ?>
                        <div id="tab-<?php echo esc_attr($_id);?>-<?php echo esc_attr($i); ?>" class="tab-pane <?php echo esc_attr($i == 0 ? 'active' : ''); ?>" data-loaded="<?php echo esc_attr($i == 0 ? 'true' : 'false'); ?>" data-number="<?php echo esc_attr($number); ?>" data-categories="<?php echo esc_attr(isset($tab['category']) ? $tab['category'] : ''); ?>" data-columns="<?php echo esc_attr($columns); ?>" data-product_type="<?php echo esc_attr(isset($tab['type']) ? $tab['type'] : ''); ?>" data-page="1" data-view_more="<?php echo esc_attr($load_more); ?>" data-layout_type="grid">

                            <div class="tab-content-products">
                                <?php if ( $i == 0 ): ?>
                                    <?php
                                        $categories = isset($tab['category']) ? array($tab['category']) : array();
                                        $type = isset($tab['type']) ? array($tab['type']) : 'recent_product';
                                        $loop = greenorganic_get_products( $categories, $type, 1, $number );
                                        $max_pages = $loop->max_num_pages;
                                    ?>
                                    <?php wc_get_template( 'layout-products/grid.php' , array( 'product_item' => $product_item, 'loop' => $loop, 'columns' => $columns, 'number' => $number ) ); ?>

                                    <!-- paging -->
                                    <?php if ($load_more): ?>
                                        <div class="clearfix load-product text-center space-tb-30">
                                            <a class="viewmore-products-btn <?php echo esc_attr($max_pages <= 1 ? ' hidden' : ''); ?>" href="#" data-max-page="<?php echo esc_attr($max_pages); ?>"><?php esc_html_e('Load More', 'greenorganic'); ?></a>
                                            <p class="all-products-loaded<?php echo esc_attr($max_pages > 1 ? ' hidden' : ''); ?>"><?php esc_html_e('All Products Loaded', 'greenorganic'); ?></p>
                                        </div>
                                    <?php endif; ?>

                                <?php endif; ?>
                            </div>
                        </div>
                    <?php $i++; endforeach; ?>
                </div>
            </div>
            
        </div>
    </div>
<?php endif; ?>