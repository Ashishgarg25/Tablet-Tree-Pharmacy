<?php
if ( function_exists('vc_map') && class_exists('WPBakeryShortCode') ) {

	if ( !function_exists('greenorganic_woocommerce_get_categories') ) {
	    function greenorganic_woocommerce_get_categories() {
	        $return = array( esc_html__(' --- Choose a Category --- ', 'greenorganic') => '' );

	        $args = array(
	            'type' => 'post',
	            'child_of' => 0,
	            'orderby' => 'name',
	            'order' => 'ASC',
	            'hide_empty' => false,
	            'hierarchical' => 1,
	            'taxonomy' => 'product_cat'
	        );

	        $categories = get_categories( $args );
	        greenorganic_get_category_childs( $categories, 0, 0, $return );

	        return $return;
	    }
	}

	if ( !function_exists('greenorganic_get_category_childs') ) {
	    function greenorganic_get_category_childs( $categories, $id_parent, $level, &$dropdown ) {
	        foreach ( $categories as $key => $category ) {
	            if ( $category->category_parent == $id_parent ) {
	                $dropdown = array_merge( $dropdown, array( str_repeat( "- ", $level ) . $category->name => $category->slug ) );
	                unset($categories[$key]);
	                greenorganic_get_category_childs( $categories, $category->term_id, $level + 1, $dropdown );
	            }
	        }
	    }
	}

	if ( !function_exists('greenorganic_vc_get_product_object')) {
		function greenorganic_vc_get_product_object($term) {
			$vc_taxonomies_types = vc_taxonomies_types();

			return array(
				'label' => $term->post_title,
				'value' => $term->post_name,
				'group_id' => $term->post_name,
				'group' => isset( $vc_taxonomies_types[ $term->taxonomy ], $vc_taxonomies_types[ $term->taxonomy ]->labels, $vc_taxonomies_types[ $term->taxonomy ]->labels->name ) ? $vc_taxonomies_types[ $term->taxonomy ]->labels->name : esc_html__( 'Taxonomies', 'greenorganic' ),
			);
		}
	}

	if ( !function_exists('greenorganic_product_field_search')) {
		function greenorganic_product_field_search( $search_string ) {
			$data = array();
			$loop = greenorganic_get_products(array(), 'deals');
			if ( !empty($loop->posts) ) {
				foreach ( $loop->posts as $t ) {
					if ( is_object( $t ) ) {
						$data[] = greenorganic_vc_get_product_object( $t );
					}
				}
			}
			
			return $data;
		}
	}

	if ( !function_exists('greenorganic_product_render')) {
		function greenorganic_product_render( $query ) {
			$args = array(
			  'name'        => $query['value'],
			  'post_type'   => 'product',
			  'post_status' => 'publish',
			  'numberposts' => 1
			);
			$products = get_posts($args);
			if ( ! empty( $query ) && $products ) {
				$product = $products[0];
				$data = array();
				$data['value'] = $product->post_name;
				$data['label'] = $product->post_title;
				return ! empty( $data ) ? $data : false;
			}
			return false;
		}
	}
	add_filter( 'vc_autocomplete_apus_product_deal_product_slug_callback', 'greenorganic_product_field_search', 10, 1 );
	add_filter( 'vc_autocomplete_apus_product_deal_product_slug_render', 'greenorganic_product_render', 10, 1 );
	
	add_filter( 'vc_autocomplete_apus_product_deals_product_slugs_callback', 'greenorganic_product_field_search', 10, 1 );
	add_filter( 'vc_autocomplete_apus_product_deals_product_slugs_render', 'greenorganic_product_render', 10, 1 );

	function greenorganic_load_woocommerce_element() {
		$categories = greenorganic_woocommerce_get_categories();
		$types = array(
			esc_html__('Recent Products', 'greenorganic' ) => 'recent_product',
			esc_html__('Best Selling', 'greenorganic' ) => 'best_selling',
			esc_html__('Featured Products', 'greenorganic' ) => 'featured_product',
			esc_html__('Top Rate', 'greenorganic' ) => 'top_rate',
			esc_html__('On Sale', 'greenorganic' ) => 'on_sale',
			esc_html__('Recent Review', 'greenorganic' ) => 'recent_review'
		);

		vc_map( array(
			'name' => esc_html__( 'Apus Products', 'greenorganic' ),
			'base' => 'apus_products',
			'icon' => 'icon-wpb-woocommerce',
			'category' => esc_html__( 'Apus Woocommerce', 'greenorganic' ),
			'description' => esc_html__( 'Display products in frontend', 'greenorganic' ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Tab Title', 'greenorganic' ),
					'param_name' => 'title',
				),	
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Get Products By",'greenorganic'),
					"param_name" => "type",
					"value" => $types,
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Category', 'greenorganic' ),
					"param_name" => "category",
					"value" => $categories
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Number Products', 'greenorganic' ),
					'value' => 10,
					'param_name' => 'number',
					'description' => esc_html__( 'Number products per page to show', 'greenorganic' ),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Layout Type', 'greenorganic' ),
					"param_name" => "layout_type",
					"value" => array(
						esc_html__( 'Grid', 'greenorganic' ) => 'grid',
						esc_html__( 'Carousel', 'greenorganic' ) => 'carousel',
						esc_html__( 'List', 'greenorganic' ) => 'list',
					)
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Item Style', 'greenorganic' ),
					"param_name" => "item_type",
					"value" => array(
						esc_html__( 'Grid 1', 'greenorganic' ) => 'inner',
						esc_html__( 'Grid 2', 'greenorganic' ) => 'inner2',
						esc_html__( 'Grid 3', 'greenorganic' ) => 'inner3',
						esc_html__( 'List', 'greenorganic' ) => 'list',
					)
				),
				array(
	                "type" => "dropdown",
	                "heading" => esc_html__('Columns', 'greenorganic'),
	                "param_name" => 'columns',
	                "value" => array(1,2,3,4,5,6),
	            ),
	            array(
					"type" => "textfield",
					"heading" => esc_html__("Extra class name",'greenorganic'),
					"param_name" => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",'greenorganic')
				)
			)
		) );

		vc_map( array(
			'name' => esc_html__( 'Apus Products Tabs', 'greenorganic' ),
			'base' => 'apus_products_tabs',
			'icon' => 'icon-wpb-woocommerce',
			'category' => esc_html__( 'Apus Woocommerce', 'greenorganic' ),
			'description' => esc_html__( 'Display products in Tabs', 'greenorganic' ),
			'params' => array(
				array(
					'type' => 'param_group',
					'heading' => esc_html__( 'Product Tabs', 'greenorganic' ),
					'param_name' => 'tabs',
					'params' => array(
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Tab Title', 'greenorganic' ),
							'param_name' => 'title',
						),
						array(
							"type" => "dropdown",
							"heading" => esc_html__("Get Products By",'greenorganic'),
							"param_name" => "type",
							"value" => $types,
						),
						array(
							"type" => "dropdown",
							"heading" => esc_html__( 'Category', 'greenorganic' ),
							"param_name" => "category",
							"value" => $categories
						),
						array(
							"type" => "attach_image",
							"heading" => esc_html__("Icon", 'greenorganic'),
							"param_name" => "img"
						),
					)
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__( 'Item Style', 'greenorganic' ),
					"param_name" => "product_item",
					"value" => array(
						esc_html__( 'Grid 1', 'greenorganic' ) => 'inner',
						esc_html__( 'Grid 2', 'greenorganic' ) => 'inner2',
						esc_html__( 'Grid 3', 'greenorganic' ) => 'inner3',
					)
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Number Products', 'greenorganic' ),
					'value' => 10,
					'param_name' => 'number',
					'description' => esc_html__( 'Number products per page to show', 'greenorganic' ),
				),
				array(
	                "type" => "dropdown",
	                "heading" => esc_html__('Columns', 'greenorganic'),
	                "param_name" => 'columns',
	                "value" => array(2,3,4,5,6),
	            ),
	            array(
					"type" => "dropdown",
					"heading" => esc_html__("Style", 'greenorganic'),
					"param_name" => "style",
					'value' 	=> array(
						esc_html__('Default', 'greenorganic') => '', 
						esc_html__('Icon', 'greenorganic') => 'st_icon', 
					),
					'std' => ''
				),
	            array(
	                "type" => "checkbox",
	                "heading" => esc_html__('Show Load More','greenorganic'),
	                "param_name" => 'load_more'
	            ),
	            array(
					"type" => "textfield",
					"heading" => esc_html__("Extra class name",'greenorganic'),
					"param_name" => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",'greenorganic')
				)
			)
		) );

		vc_map( array(
			'name' => esc_html__( 'Apus Product Single Deal', 'greenorganic' ),
			'base' => 'apus_product_deal',
			'icon' => 'icon-wpb-woocommerce',
			'category' => esc_html__( 'Apus Woocommerce', 'greenorganic' ),
			'description' => esc_html__( 'Display product deal', 'greenorganic' ),
			'params' => array(
				array(
					"type" => "attach_image",
					"heading" => esc_html__("Banner for Widget", 'greenorganic'),
					"param_name" => "img",
				),
				array(
				    'type' => 'autocomplete',
				    'heading' => esc_html__( 'Choose Product', 'greenorganic' ),
				    'param_name' => 'product_slug',
				    'settings' => array(
				     	'multiple' => false,
				     	'unique_values' => false
				    ),
			   	),
	            array(
					"type" => "textfield",
					"heading" => esc_html__("Extra class name", 'greenorganic'),
					"param_name" => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",'greenorganic')
				)
			)
		) );

		vc_map( array(
			'name' => esc_html__( 'Apus Product Deals', 'greenorganic' ),
			'base' => 'apus_product_deals',
			'icon' => 'icon-wpb-woocommerce',
			'category' => esc_html__( 'Apus Woocommerce', 'greenorganic' ),
			'description' => esc_html__( 'Display product deals', 'greenorganic' ),
			'params' => array(
				array(
				    'type' => 'autocomplete',
				    'heading' => esc_html__( 'Choose Products', 'greenorganic' ),
				    'param_name' => 'product_slugs',
				    'settings' => array(
				     	'multiple' => true,
				     	'unique_values' => true
				    ),
			   	),
			   	array(
	                "type" => "dropdown",
	                "heading" => esc_html__('Columns', 'greenorganic'),
	                "param_name" => 'columns',
	                "value" => array(2,3,4,5,6),
	                'std' => 4
	            ),
	            array(
					"type" => "textfield",
					"heading" => esc_html__("Extra class name", 'greenorganic'),
					"param_name" => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",'greenorganic')
				)
			)
		) );

		vc_map( array(
			'name' => esc_html__( 'Apus Category Banners ', 'greenorganic' ),
			'base' => 'apus_category_banner',
			'icon' => 'icon-wpb-woocommerce',
			'category' => esc_html__( 'Apus Woocommerce', 'greenorganic' ),
			'description' => esc_html__( 'Display category banner', 'greenorganic' ),
			'params' => array(
				array(
					'type' => 'param_group',
					'heading' => esc_html__( 'Banner', 'greenorganic' ),
					'param_name' => 'categoriesbanners',
					'params' => array(
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Title', 'greenorganic' ),
							'param_name' => 'title',
						),
						array(
							"type" => "dropdown",
							"heading" => esc_html__( 'Category', 'greenorganic' ),
							"param_name" => "category",
							"value" => $categories
						),
						array(
							"type" => "attach_image",
							"heading" => esc_html__("Category Image", 'greenorganic'),
							"param_name" => "image"
						),
					)
				),
				array(
	                "type" => "dropdown",
	                "heading" => esc_html__('Columns', 'greenorganic'),
	                "param_name" => 'columns',
	                "value" => array(1,2,3,4,5,6),
	            ),
	            array(
	                "type" => "checkbox",
	                "heading" => esc_html__('Show Number Products', 'greenorganic'),
	                "param_name" => 'show_number_products'
	            ),
	            array(
					"type" => "textfield",
					"heading" => esc_html__("Extra class name", 'greenorganic'),
					"param_name" => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'greenorganic')
				)
			)
		) );
	}
	add_action( 'vc_after_set_mode', 'greenorganic_load_woocommerce_element', 99 );

	class WPBakeryShortCode_apus_products extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_products_tabs extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_product_deal extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_product_deals extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_category_banner extends WPBakeryShortCode {}
}