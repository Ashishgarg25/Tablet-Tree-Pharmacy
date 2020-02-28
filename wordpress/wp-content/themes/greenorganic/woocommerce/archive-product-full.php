<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
$sidebar_configs = greenorganic_get_woocommerce_layout_configs();

$display_mode = greenorganic_woocommerce_get_display_mode();
$layout_type = $display_mode;
?>

<?php do_action( 'greenorganic_woo_template_main_before' ); ?>

<section id="main-container" class="main-container <?php echo apply_filters('greenorganic_woocommerce_content_class', 'container');?>">
	
	<?php do_action('greenorganic_woocommerce_archive_description'); ?>

	<div class="row">
		<?php if ( isset($sidebar_configs['left']) ) : ?>
			<div class="<?php echo esc_attr($sidebar_configs['left']['class']) ;?>">
			  	<aside class="sidebar sidebar-left" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
			   		<?php if ( is_active_sidebar( $sidebar_configs['left']['sidebar'] ) ): ?>
				   		<?php dynamic_sidebar( $sidebar_configs['left']['sidebar'] ); ?>
				   	<?php endif; ?>
			  	</aside>
			</div>
		<?php endif; ?>

		<div id="main-content" class="archive-shop col-xs-12 <?php echo esc_attr($sidebar_configs['main']['class']); ?>">

			<div id="primary" class="content-area">
				<div id="content" class="site-content" role="main">

					<?php if ( greenorganic_get_config('product_archive_top_sidebar', true) ) : ?>
						<!-- header for full -->
						<?php
							get_template_part( 'woocommerce/content-shop_header' );
							
							remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
							remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
							remove_action( 'woocommerce_before_shop_loop', 'greenorganic_filter_before' , 1 );
							remove_action( 'woocommerce_before_shop_loop', 'greenorganic_filter_after' , 40 );
						?>
					<?php else:
						add_action( 'woocommerce_before_shop_loop', 'greenorganic_woocommerce_display_modes' );
					endif; ?>
					<div id="apus-shop-products-wrapper" class="apus-shop-products-wrapper" data-layout_type="<?php echo esc_attr($layout_type); ?>">
						<?php
                            // Results bar/button
                            get_template_part( 'woocommerce/content-shop_results_bar' );
                        ?>

                        <!-- product content -->
						<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
							<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
						<?php endif; ?>

						<?php do_action( 'woocommerce_archive_description' ); ?>

						<?php if ( have_posts() ) : ?>

							<?php 
								remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
								do_action( 'woocommerce_before_shop_loop' ); 
							?>

								
								<?php woocommerce_product_subcategories( array( 'before' => '<div class="row subcategories-wrapper">', 'after' => '</div>' ) ); ?>

							<?php woocommerce_product_loop_start(); ?>
								<div class="products-wrapper-<?php echo esc_attr($display_mode); ?>">
									<div class="row">
										<?php while ( have_posts() ) : the_post(); ?>
											<?php wc_get_template_part( 'content', 'product' ); ?>
										<?php endwhile; // end of the loop. ?>
									</div>
								</div>

							<?php woocommerce_product_loop_end(); ?>
							<div class="shop-pagination clearfix">
								<?php 
									add_action( 'woocommerce_after_shop_loop', 'woocommerce_result_count', 20 );
									do_action( 'woocommerce_after_shop_loop' ); 
								?>
							</div>

						<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
							<?php do_action( 'woocommerce_no_products_found' ); ?>
						<?php endif; ?>


					</div>
				</div><!-- #content -->
			</div><!-- #primary -->
		</div><!-- #main-content -->
		<?php if ( isset($sidebar_configs['right']) ) : ?>
			<div class="<?php echo esc_attr($sidebar_configs['right']['class']) ;?>">
			  	<aside class="sidebar sidebar-right" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
			   		<?php if ( is_active_sidebar( $sidebar_configs['right']['sidebar'] ) ): ?>
				   		<?php dynamic_sidebar( $sidebar_configs['right']['sidebar'] ); ?>
				   	<?php endif; ?>
			  	</aside>
			</div>
		<?php endif; ?>
		
	</div>
</section>
<?php

get_footer();
