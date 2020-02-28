<?php

if ( function_exists('vc_path_dir') && function_exists('vc_map') ) {
	require_once vc_path_dir('SHORTCODES_DIR', 'vc-posts-grid.php');

	if ( !function_exists('greenorganic_load_post_element')) {
		function greenorganic_load_post_element() {
			$layouts = array(
				esc_html__('Grid', 'greenorganic') => 'grid',
				esc_html__('Grid 2', 'greenorganic') => 'grid-v2',
				esc_html__('Grid 3', 'greenorganic') => 'grid-v3',
				esc_html__('List', 'greenorganic') => 'list',
				esc_html__('Carousel', 'greenorganic') => 'carousel',
				esc_html__('Special', 'greenorganic') => 'special',
			);
			$columns = array(1,2,3,4,6);
			vc_map( array(
				'name' => esc_html__( 'Apus Grid Posts', 'greenorganic' ),
				'base' => 'apus_gridposts',
				'icon' => 'icon-wpb-news-12',
				"category" => esc_html__('Apus Post', 'greenorganic'),
				'description' => esc_html__( 'Create Post having blog styles', 'greenorganic' ),
				 
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Title', 'greenorganic' ),
						'param_name' => 'title',
						'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'greenorganic' ),
						"admin_label" => true
					),

					array(
						'type' => 'loop',
						'heading' => esc_html__( 'Grids content', 'greenorganic' ),
						'param_name' => 'loop',
						'settings' => array(
							'size' => array( 'hidden' => false, 'value' => 4 ),
							'order_by' => array( 'value' => 'date' ),
						),
						'description' => esc_html__( 'Create WordPress loop, to populate content from your site.', 'greenorganic' )
					),
					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Show Pagination?', 'greenorganic' ),
						'param_name' => 'show_pagination',
						'description' => esc_html__( 'Enables to show paginations to next new page.', 'greenorganic' ),
						'value' => array( esc_html__( 'Yes, to show pagination', 'greenorganic' ) => 'yes' )
					),
					array(
		                "type" => "dropdown",
		                "heading" => esc_html__('Grid Columns','greenorganic'),
		                "param_name" => 'grid_columns',
		                "value" => $columns
		            ),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Layout Type", 'greenorganic'),
						"param_name" => "layout_type",
						"value" => $layouts
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Thumbnail size', 'greenorganic' ),
						'param_name' => 'thumbsize',
						'description' => esc_html__( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'greenorganic' )
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Extra class name', 'greenorganic' ),
						'param_name' => 'el_class',
						'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'greenorganic' )
					)
				)
			) );
		}
	}
	add_action( 'vc_after_set_mode', 'greenorganic_load_post_element', 99 );

	class WPBakeryShortCode_apus_gridposts extends WPBakeryShortCode_VC_Posts_Grid {}
}