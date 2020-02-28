<?php


if ( ! defined( 'ABSPATH' ) ) exit;

if ( !class_exists('WC_Widget') ) {
	return;
}

class Greenorganic_Widget_Woo_Product_Sorting extends WC_Widget {

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->widget_cssclass    	= 'apus_widget apus_widget_product_sorting woocommerce';
		$this->widget_description	= esc_html__( 'Display a product sorting list.', 'greenorganic' );
		$this->widget_id          	= 'apus_woocommerce_widget_product_sorting';
		$this->widget_name        	= esc_html__( 'WooCommerce Product Sorting', 'greenorganic' );
		$this->settings           	= array(
			'title'  => array(
				'type'  => 'text',
				'std'   => esc_html__( 'Sort By', 'greenorganic' ),
				'label'	=> esc_html__( 'Title', 'greenorganic' )
			)
		);
		
		parent::__construct();
	}

	public function getTemplate() {
		return 'woo-product-sorting.php';
	}
	
	public function widget( $args, $instance ) {
		global $wp_query, $wp;
		// Base page URL
		$link = home_url( $wp->request );

		extract( $args );
		
		$title = ( ! empty( $instance['title'] ) ) ? $before_title . $instance['title'] . $after_title : '';

		$output = '';
		if ( class_exists('Greenorganic_Woo_Custom') ) {
			$output = Greenorganic_Woo_Custom::orderby_list();
		}
		
		echo trim($before_widget . $title . $output . $after_widget);
	}
	
}
register_widget( 'Greenorganic_Widget_Woo_Product_Sorting' );