<?php
/**
 *	The template for displaying the shop header
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<div class="apus-shop-header">
    <div class="apus-shop-menu">
        <div class="row">
            <div class="col-xs-12 content-inner">
                <?php if ( greenorganic_get_config('product_archive_top_categories', true) ) { ?>
                    <div class="pull-left">
                        <?php if ( greenorganic_get_config('product_archive_categories_type', 'list') === 'list' ) { ?>
                            <ul id="apus-categories" class="apus-categories">
                                <?php greenorganic_category_menu(); ?>
                            </ul>
                        <?php } else {
                            ?>
                            <div id="apus-categories-dropdown" class="apus-categories-dropdown apus-dropdown-custom">
                                <div class="dropdown-toggle category-dropdown-label" data-toggle="dropdown" aria-expanded="true" role="button">
                                    <?php echo esc_html__('Category: ', 'greenorganic'); ?> <span></span>
                                    <b class="caret"></b>
                                </div>
                                <div class="dropdown-menu">
                                    <?php
                                        $args = array(
                                            'show_counts' => false,
                                            'hierarchical' => true
                                        );
                                        greenorganic_wc_product_dropdown_categories($args);
                                    ?>
                                </div>
                            </div>
                            <?php
                        } ?>
                    </div>
                <?php } ?>
                <div class="pull-right inner-right">
                    <?php if ( greenorganic_get_config('product_archive_filter_sidebar', true) ) { ?>
                        <div class="pull-left">
                            <ul id="apus-filter-menu" class="apus-filter-menu">
                                <li>
                                    <a class="filter-action" href="#" title="<?php esc_html_e('Filter', 'greenorganic'); ?>"><i class="ion-funnel"></i> <?php esc_html_e( 'Filter ', 'greenorganic' ); ?><b class="caret"></b></a>
                                </li>
                            </ul>
                        </div>
                    <?php } ?>
                    <?php if ( greenorganic_get_config('product_archive_orderby', true) ) {
                        $output = '';
                        if ( class_exists('Greenorganic_Woo_Custom') ) {
                            $output = Greenorganic_Woo_Custom::orderby_list();
                        }
                        ?>
                        <div class="pull-right">
                            <div id="apus-orderby" class="dropdown apus-orderby apus-dropdown-custom">
                                <div class="dropdown-toggle orderby-label" data-toggle="dropdown" aria-expanded="true" role="button">
                                    <?php echo esc_html__('Order By: ', 'greenorganic'); ?> <span></span>
                                    <b class="caret"></b>
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <?php echo trim($output); ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    } ?>
                </div>
            </div>
        </div>
    </div>
    <?php if ( greenorganic_get_config('product_archive_filter_sidebar', true) ) { ?>
        <div id="apus-shop-sidebar" class="apus-shop-sidebar apus-sidebar-header">
            <div class="apus-sidebar-inner">
                <div id="apus-widgets-wrapper" class="row">
                    <?php
                        if ( is_active_sidebar( 'shop-top-filter-sidebar' ) ) {
                            dynamic_sidebar( 'shop-top-filter-sidebar' );
    					}
                    ?>
                </div>
            </div>
            
            <div id="apus-sidebar-layout-indicator"></div> <!-- Don't remove (used for testing sidebar/filters layout in JavaScript) -->
        </div>
    <?php } ?>
</div>
