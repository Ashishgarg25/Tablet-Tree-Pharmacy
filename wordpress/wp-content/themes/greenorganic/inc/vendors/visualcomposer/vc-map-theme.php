<?php
if ( function_exists('vc_map') && class_exists('WPBakeryShortCode') ) {
	// custom wp
	$attributes = array(
	    'type' => 'dropdown',
	    'heading' => "Style Element",
	    'param_name' => 'style',
	    'value' => array( "one", "two", "three" ),
	    'description' => esc_html__( "New style attribute", "greenorganic" )
	);
	vc_add_param( 'vc_facebook', $attributes ); // Note: 'vc_message' was used as a base for "Message box" element

	if ( !function_exists('greenorganic_load_load_theme_element')) {
		function greenorganic_load_load_theme_element() {
			$columns = array(1,2,3,4,6);
			// Heading Text Block
			vc_map( array(
				'name'        => esc_html__( 'Apus Widget Heading','greenorganic'),
				'base'        => 'apus_title_heading',
				"class"       => "",
				"category" => esc_html__('Apus Elements', 'greenorganic'),
				'description' => esc_html__( 'Create title for one Widget', 'greenorganic' ),
				"params"      => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Widget title', 'greenorganic' ),
						'param_name' => 'title',
						'description' => esc_html__( 'Enter heading title.', 'greenorganic' ),
						"admin_label" => true,
					),
					array(
						"type" => "textarea_html",
						'heading' => esc_html__( 'Description', 'greenorganic' ),
						"param_name" => "content",
						"value" => '',
						'description' => esc_html__( 'Enter description for title.', 'greenorganic' )
				    ),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Style", 'greenorganic'),
						"param_name" => "style",
						'value' 	=> array(
							esc_html__('Default Center', 'greenorganic') => 'default', 
							esc_html__('Small Center', 'greenorganic') => 'small', 
							esc_html__('Left', 'greenorganic') => 'left', 
						),
						'std' => ''
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Extra class name', 'greenorganic' ),
						'param_name' => 'el_class',
						'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'greenorganic' )
					)
				),
			));

			// calltoaction
			vc_map( array(
				'name'        => esc_html__( 'Apus Widget Call To Action','greenorganic'),
				'base'        => 'apus_call_action',
				"class"       => "",
				"category" => esc_html__('Apus Elements', 'greenorganic'),
				'description' => esc_html__( 'Create title for one Widget', 'greenorganic' ),
				"params"      => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Widget title', 'greenorganic' ),
						'param_name' => 'title',
						'value'       => esc_html__( 'Title', 'greenorganic' ),
						'description' => esc_html__( 'Enter heading title.', 'greenorganic' ),
						"admin_label" => true
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Sub title', 'greenorganic' ),
						'param_name' => 'subtitle',
						'description' => esc_html__( 'Enter Sub title.', 'greenorganic' ),
						"admin_label" => true
					),
					array(
						"type" => "textarea_html",
						'heading' => esc_html__( 'Description', 'greenorganic' ),
						"param_name" => "content",
						"value" => '',
						'description' => esc_html__( 'Enter description for title.', 'greenorganic' )
				    ),

				    array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Text Button 1', 'greenorganic' ),
						'param_name' => 'textbutton1',
						'description' => esc_html__( 'Text Button', 'greenorganic' ),
						"admin_label" => true
					),

					array(
						'type' => 'textfield',
						'heading' => esc_html__( ' Link Button 1', 'greenorganic' ),
						'param_name' => 'linkbutton1',
						'description' => esc_html__( 'Link Button 1', 'greenorganic' ),
						"admin_label" => true
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Button Style", 'greenorganic'),
						"param_name" => "buttons1",
						'value' 	=> array(
							esc_html__('Default ', 'greenorganic') => 'btn-default ', 
							esc_html__('Primary ', 'greenorganic') => 'btn-primary ', 
							esc_html__('Success ', 'greenorganic') => 'btn-success radius-0 ', 
							esc_html__('Info ', 'greenorganic') => 'btn-info ', 
							esc_html__('Warning ', 'greenorganic') => 'btn-warning ', 
							esc_html__('Theme Color ', 'greenorganic') => 'btn-theme',
							esc_html__('Theme Gradient Color ', 'greenorganic') => 'btn-theme btn-gradient',
							esc_html__('Second Color ', 'greenorganic') => 'btn-theme-second',
							esc_html__('Danger ', 'greenorganic') => 'btn-danger ', 
							esc_html__('Pink ', 'greenorganic') => 'btn-pink ', 
							esc_html__('White Gradient ', 'greenorganic') => 'btn-white btn-gradient', 
							esc_html__('Primary Outline', 'greenorganic') => 'btn-primary btn-outline', 
							esc_html__('White Outline ', 'greenorganic') => 'btn-white btn-outline ',
							esc_html__('Theme Outline ', 'greenorganic') => 'btn-theme btn-outline ',
						),
						'std' => ''
					),

					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Text Button 2', 'greenorganic' ),
						'param_name' => 'textbutton2',
						'description' => esc_html__( 'Text Button', 'greenorganic' ),
						"admin_label" => true
					),

					array(
						'type' => 'textfield',
						'heading' => esc_html__( ' Link Button 2', 'greenorganic' ),
						'param_name' => 'linkbutton2',
						'description' => esc_html__( 'Link Button 2', 'greenorganic' ),
						"admin_label" => true
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Button Style", 'greenorganic'),
						"param_name" => "buttons2",
						'value' 	=> array(
							esc_html__('Default ', 'greenorganic') => 'btn-default ', 
							esc_html__('Primary ', 'greenorganic') => 'btn-primary ', 
							esc_html__('Success ', 'greenorganic') => 'btn-success radius-0 ', 
							esc_html__('Info ', 'greenorganic') => 'btn-info ', 
							esc_html__('Warning ', 'greenorganic') => 'btn-warning ', 
							esc_html__('Theme Color ', 'greenorganic') => 'btn-theme',
							esc_html__('Second Color ', 'greenorganic') => 'btn-theme-second',
							esc_html__('Danger ', 'greenorganic') => 'btn-danger ', 
							esc_html__('Pink ', 'greenorganic') => 'btn-pink ', 
							esc_html__('White Gradient ', 'greenorganic') => 'btn-white btn-gradient',
							esc_html__('Primary Outline', 'greenorganic') => 'btn-primary btn-outline', 
							esc_html__('White Outline ', 'greenorganic') => 'btn-white btn-outline ',
							esc_html__('Theme Outline ', 'greenorganic') => 'btn-theme btn-outline ',
						),
						'std' => ''
					),
					
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Style", 'greenorganic'),
						"param_name" => "style",
						'value' 	=> array(
							esc_html__('Default', 'greenorganic') => 'default',
							esc_html__('Center', 'greenorganic') => 'default center',
						),
						'std' => ''
					),

					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Extra class name', 'greenorganic' ),
						'param_name' => 'el_class',
						'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'greenorganic' )
					)
				),
			));
			
			// Apus Counter
			vc_map( array(
			    "name" => esc_html__("Apus Counter",'greenorganic'),
			    "base" => "apus_counter",
			    "class" => "",
			    "description"=> esc_html__('Counting number with your term', 'greenorganic'),
			    "category" => esc_html__('Apus Elements', 'greenorganic'),
			    "params" => array(
			    	array(
						"type" => "textfield",
						"heading" => esc_html__("Title", 'greenorganic'),
						"param_name" => "title",
						"value" => '',
						"admin_label"	=> true
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Number", 'greenorganic'),
						"param_name" => "number",
						"value" => ''
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__("Color Number", 'greenorganic'),
						"param_name" => "text_color",
						'value' 	=> '',
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name", 'greenorganic'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'greenorganic')
					)
			   	)
			));
			// Banner CountDown
			vc_map( array(
				'name'        => esc_html__( 'Apus Banner CountDown','greenorganic'),
				'base'        => 'apus_banner_countdown',
				"class"       => "",
				"category" => esc_html__('Apus Elements', 'greenorganic'),
				'description' => esc_html__( 'Show CountDown with banner', 'greenorganic' ),
				"params"      => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Widget title', 'greenorganic' ),
						'param_name' => 'title',
						'value'       => esc_html__( 'Title', 'greenorganic' ),
						'description' => esc_html__( 'Enter heading title.', 'greenorganic' ),
						"admin_label" => true
					),

					array(
						"type" => "textarea",
						'heading' => esc_html__( 'Description', 'greenorganic' ),
						"param_name" => "descript",
						"value" => '',
						'description' => esc_html__( 'Enter description for title.', 'greenorganic' )
				    ),
					array(
					    'type' => 'textfield',
					    'heading' => esc_html__( 'Date Expired', 'greenorganic' ),
					    'param_name' => 'input_datetime'
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Extra class name', 'greenorganic' ),
						'param_name' => 'el_class',
						'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'greenorganic' )
					),
				),
			));
			// Apus Brands
			vc_map( array(
			    "name" => esc_html__("Apus Brands",'greenorganic'),
			    "base" => "apus_brands",
			    "description"=> esc_html__('Display brands on front end', 'greenorganic'),
			    "category" => esc_html__('Apus Elements', 'greenorganic'),
			    "params" => array(
			    	array(
						"type" => "textfield",
						"heading" => esc_html__("Title", 'greenorganic'),
						"param_name" => "title",
						"value" => '',
						"admin_label"	=> true
					),
					array(
						'type' => 'param_group',
						'heading' => esc_html__('Brands', 'greenorganic' ),
						'param_name' => 'items',
						'params' => array(
							array(
								"type" => "attach_image",
								"description" => esc_html__("If you upload an brand image", 'greenorganic'),
								"param_name" => "image",
								"value" => '',
								'heading'	=> esc_html__('Image', 'greenorganic' )
							),
							array(
								"type" => "textfield",
								"heading" => esc_html__("Url", 'greenorganic'),
								"param_name" => "url"
							),
						),
			    	),
					array(
		                "type" => "dropdown",
		                "heading" => esc_html__('Columns','greenorganic'),
		                "param_name" => 'columns',
		                "value" => array(1,2,3,4,5,6,8),
		            ),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name", 'greenorganic'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'greenorganic')
					)
			   	)
			));
			// Apus Service
			vc_map( array(
			    "name" => esc_html__("Apus Service",'greenorganic'),
			    "base" => "apus_service",
			    "description"=> esc_html__('Display brands on front end', 'greenorganic'),
			    "category" => esc_html__('Apus Elements', 'greenorganic'),
			    "params" => array(
			    	array(
						"type" => "textfield",
						"heading" => esc_html__("Title", 'greenorganic'),
						"param_name" => "title",
						"value" => '',
						"admin_label"	=> true
					),
					array(
						'type' => 'param_group',
						'heading' => esc_html__('Brands', 'greenorganic' ),
						'param_name' => 'items',
						'params' => array(
							array(
								"type" => "attach_image",
								"description" => esc_html__("Upload image for service", 'greenorganic'),
								"param_name" => "image",
								"value" => '',
								'heading'	=> esc_html__('Image', 'greenorganic' )
							),
							array(
								"type" => "textfield",
								"heading" => esc_html__("Title", 'greenorganic'),
								"param_name" => "title"
							),
							array(
								"type" => "textfield",
								"heading" => esc_html__("Description", 'greenorganic'),
								"param_name" => "des"
							),
						),
			    	),
					array(
		                "type" => "dropdown",
		                "heading" => esc_html__('Columns','greenorganic'),
		                "param_name" => 'columns',
		                "value" => array(1,2,3,4,5),
		            ),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name", 'greenorganic'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'greenorganic')
					)
			   	)
			));

			vc_map( array(
			    "name" => esc_html__("Apus Socials link",'greenorganic'),
			    "base" => "apus_socials_link",
			    "description"=> esc_html__('Show socials link', 'greenorganic'),
			    "category" => esc_html__('Apus Elements', 'greenorganic'),
			    "params" => array(
			    	array(
						"type" => "textfield",
						"heading" => esc_html__("Title", 'greenorganic'),
						"param_name" => "title",
						"value" => '',
						"admin_label"	=> true
					),
					array(
						"type" => "textarea",
						"heading" => esc_html__("Description", 'greenorganic'),
						"param_name" => "description",
						"value" => '',
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Facebook Page URL", 'greenorganic'),
						"param_name" => "facebook_url",
						"value" => '',
						"admin_label"	=> true
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Twitter Page URL", 'greenorganic'),
						"param_name" => "twitter_url",
						"value" => '',
						"admin_label"	=> true
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Youtube Page URL", 'greenorganic'),
						"param_name" => "youtube_url",
						"value" => '',
						"admin_label"	=> true
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Pinterest Page URL", 'greenorganic'),
						"param_name" => "pinterest_url",
						"value" => '',
						"admin_label"	=> true
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Google Plus Page URL", 'greenorganic'),
						"param_name" => "google-plus_url",
						"value" => '',
						"admin_label"	=> true
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Instagram Page URL", 'greenorganic'),
						"param_name" => "instagram_url",
						"value" => '',
						"admin_label"	=> true
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Align", 'greenorganic'),
						"param_name" => "align",
						'value' 	=> array(
							esc_html__('Left', 'greenorganic') => '', 
							esc_html__('Right', 'greenorganic') => 'right'
						),
						'std' => ''
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Style", 'greenorganic'),
						"param_name" => "style",
						'value' 	=> array(
							esc_html__('Style 1', 'greenorganic') => '', 
							esc_html__('Style 2', 'greenorganic') => 'style2'
						),
						'std' => ''
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name", 'greenorganic'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'greenorganic')
					)
			   	)
			));
			// newsletter
			vc_map( array(
			    "name" => esc_html__("Apus Newsletter",'greenorganic'),
			    "base" => "apus_newsletter",
			    "class" => "",
			    "description"=> esc_html__('Show newsletter form', 'greenorganic'),
			    "category" => esc_html__('Apus Elements', 'greenorganic'),
			    "params" => array(
			    	array(
						"type" => "textfield",
						"heading" => esc_html__("Title", 'greenorganic'),
						"param_name" => "title",
						"value" => '',
						"admin_label"	=> true
					),
					array(
						"type" => "textarea",
						"heading" => esc_html__("Description", 'greenorganic'),
						"param_name" => "description",
						"value" => '',
					),
					array(
		                "type" => "dropdown",
		                "heading" => esc_html__('Layout','greenorganic'),
		                "param_name" => 'style',
		                'value' 	=> array(
							esc_html__('Default ', 'greenorganic') => '', 
							esc_html__('Dark ', 'greenorganic') => 'dark',
							esc_html__('Full  ', 'greenorganic') => 'st_full',
						),
						'std' => ''
		            ),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name", 'greenorganic'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'greenorganic')
					)
			   	)
			));
			// Address
			vc_map( array(
			    "name" => esc_html__("Apus Address",'greenorganic'),
			    "base" => "apus_address",
			    "class" => "",
			    "description"=> esc_html__('Show Address', 'greenorganic'),
			    "category" => esc_html__('Apus Elements', 'greenorganic'),
			    "params" => array(
			    	array(
						'type' => 'param_group',
						'heading' => esc_html__('Members Settings', 'greenorganic' ),
						'param_name' => 'members',
						'description' => '',
						'value' => '',
						'params' => array(
							array(
				                "type" => "textfield",
				                "class" => "",
				                "heading" => esc_html__('Name','greenorganic'),
				                "param_name" => "name",
				            ),
				            array(
				                "type" => "textarea",
				                "class" => "",
				                "heading" => esc_html__('Short Description','greenorganic'),
				                "param_name" => "des",
				            ),
						),
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name", 'greenorganic'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'greenorganic')
					)
			   	)
			));
			// google map
			$map_styles = array( esc_html__('Choose a map style', 'greenorganic') => '' );
			if ( is_admin() && class_exists('Greenorganic_Google_Maps_Styles') ) {
				$styles = Greenorganic_Google_Maps_Styles::styles();
				foreach ($styles as $style) {
					$map_styles[$style['title']] = $style['slug'];
				}
			}
			vc_map( array(
			    "name" => esc_html__("Apus Google Map",'greenorganic'),
			    "base" => "apus_googlemap",
			    "description" => esc_html__('Diplay Google Map', 'greenorganic'),
			    "category" => esc_html__('Apus Elements', 'greenorganic'),
			    "params" => array(
			    	array(
						"type" => "textfield",
						"heading" => esc_html__("Title", 'greenorganic'),
						"param_name" => "title",
						"admin_label" => true,
						"value" => '',
					),
					array(
		                "type" => "textarea",
		                "class" => "",
		                "heading" => esc_html__('Description','greenorganic'),
		                "param_name" => "des",
		            ),
		            array(
		                'type' => 'googlemap',
		                'heading' => esc_html__( 'Location', 'greenorganic' ),
		                'param_name' => 'location',
		                'value' => ''
		            ),
		            array(
		                'type' => 'hidden',
		                'heading' => esc_html__( 'Latitude Longitude', 'greenorganic' ),
		                'param_name' => 'lat_lng',
		                'value' => '21.0173222,105.78405279999993'
		            ),
		            array(
						"type" => "textfield",
						"heading" => esc_html__("Map height", 'greenorganic'),
						"param_name" => "height",
						"value" => '',
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Map Zoom", 'greenorganic'),
						"param_name" => "zoom",
						"value" => '13',
					),
		            array(
		                'type' => 'dropdown',
		                'heading' => esc_html__( 'Map Type', 'greenorganic' ),
		                'param_name' => 'type',
		                'value' => array(
		                    esc_html__( 'roadmap', 'greenorganic' ) 		=> 'ROADMAP',
		                    esc_html__( 'hybrid', 'greenorganic' ) 	=> 'HYBRID',
		                    esc_html__( 'satellite', 'greenorganic' ) 	=> 'SATELLITE',
		                    esc_html__( 'terrain', 'greenorganic' ) 	=> 'TERRAIN',
		                )
		            ),
		            array(
						"type" => "attach_image",
						"heading" => esc_html__("Custom Marker Icon", 'greenorganic'),
						"param_name" => "marker_icon"
					),
					array(
		                'type' => 'dropdown',
		                'heading' => esc_html__( 'Custom Map Style', 'greenorganic' ),
		                'param_name' => 'map_style',
		                'value' => $map_styles
		            ),
		            
					array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name", 'greenorganic'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'greenorganic')
					)
			   	)
			));
			// Testimonial
			vc_map( array(
	            "name" => esc_html__("Apus Testimonials",'greenorganic'),
	            "base" => "apus_testimonials",
	            'description'=> esc_html__('Display Testimonials In FrontEnd', 'greenorganic'),
	            "class" => "",
	            "category" => esc_html__('Apus Elements', 'greenorganic'),
	            "params" => array(
	              	array(
						"type" => "textfield",
						"heading" => esc_html__("Title", 'greenorganic'),
						"param_name" => "title",
						"admin_label" => true,
						"value" => '',
					),
	              	array(
		              	"type" => "textfield",
		              	"heading" => esc_html__("Number", 'greenorganic'),
		              	"param_name" => "number",
		              	"value" => '4',
		            ),
		            array(
		                "type" => "dropdown",
		                "heading" => esc_html__('Columns','greenorganic'),
		                "param_name" => 'columns',
		                "value" => array(1,2,3,4,5,6),
		            ),
		            array(
						"type" => "attach_image",
						"heading" => esc_html__("Image for Widget", 'greenorganic'),
						"param_name" => "image",
						'dependency' => array(
					       'element' => 'style',
					       'value' => array('style2'),
					    ),
					),
		            array(
		                "type" => "dropdown",
		                "heading" => esc_html__('Layout','greenorganic'),
		                "param_name" => 'style',
		                'value' 	=> array(
							esc_html__('Default ', 'greenorganic') => '', 
							esc_html__('White ', 'greenorganic') => 'white',
							esc_html__('White Style 2', 'greenorganic') => 'style2',
						),
						'std' => ''
		            ),
		            array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name", 'greenorganic'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'greenorganic')
					)
	            )
	        ));
	        // Our Team
			vc_map( array(
	            "name" => esc_html__("Apus Our Team",'greenorganic'),
	            "base" => "apus_ourteam",
	            'description'=> esc_html__('Display Our Team In FrontEnd', 'greenorganic'),
	            "class" => "",
	            "category" => esc_html__('Apus Elements', 'greenorganic'),
	            "params" => array(
	              	array(
						"type" => "textfield",
						"heading" => esc_html__("Title", 'greenorganic'),
						"param_name" => "title",
						"admin_label" => true,
						"value" => '',
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Sub Title", 'greenorganic'),
						"param_name" => "subtitle",
						"admin_label" => true,
						"value" => '',
					),
	              	array(
						'type' => 'param_group',
						'heading' => esc_html__('Members Settings', 'greenorganic' ),
						'param_name' => 'members',
						'description' => '',
						'value' => '',
						'params' => array(
							array(
				                "type" => "textfield",
				                "class" => "",
				                "heading" => esc_html__('Name','greenorganic'),
				                "param_name" => "name",
				            ),
				            array(
				                "type" => "textfield",
				                "class" => "",
				                "heading" => esc_html__('Short Description','greenorganic'),
				                "param_name" => "des",
				            ),
							array(
								"type" => "attach_image",
								"heading" => esc_html__("Image", 'greenorganic'),
								"param_name" => "image"
							),

				            array(
				                "type" => "textfield",
				                "class" => "",
				                "heading" => esc_html__('Facebook','greenorganic'),
				                "param_name" => "facebook",
				            ),

				            array(
				                "type" => "textfield",
				                "class" => "",
				                "heading" => esc_html__('Twitter Link','greenorganic'),
				                "param_name" => "twitter",
				            ),

				            array(
				                "type" => "textfield",
				                "class" => "",
				                "heading" => esc_html__('Google plus Link','greenorganic'),
				                "param_name" => "google",
				            ),

				            array(
				                "type" => "textfield",
				                "class" => "",
				                "heading" => esc_html__('Linkin Link','greenorganic'),
				                "param_name" => "linkin",
				            ),

						),
					),
					array(
		                "type" => "dropdown",
		                "heading" => esc_html__('Columns','greenorganic'),
		                "param_name" => 'columns',
		                "value" => array(1,2,3,4,5,6),
		            ),
		            array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name", 'greenorganic'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'greenorganic')
					)
	            )
	        ));

	        // Gallery Images
			vc_map( array(
	            "name" => esc_html__("Apus Gallery",'greenorganic'),
	            "base" => "apus_gallery",
	            'description'=> esc_html__('Display Gallery In FrontEnd', 'greenorganic'),
	            "class" => "",
	            "category" => esc_html__('Apus Elements', 'greenorganic'),
	            "params" => array(
	              	array(
						"type" => "textfield",
						"heading" => esc_html__("Title", 'greenorganic'),
						"param_name" => "title",
						"admin_label" => true,
						"value" => '',
					),
					array(
						'type' => 'param_group',
						'heading' => esc_html__('Images', 'greenorganic'),
						'param_name' => 'images',
						'params' => array(
							array(
								"type" => "attach_image",
								"param_name" => "image",
								'heading'	=> esc_html__('Image', 'greenorganic')
							),
							array(
				                "type" => "textfield",
				                "heading" => esc_html__('Title','greenorganic'),
				                "param_name" => "title",
				            ),
				            array(
				                "type" => "textarea",
				                "heading" => esc_html__('Description','greenorganic'),
				                "param_name" => "description",
				            ),
						),
					),
					array(
		                "type" => "dropdown",
		                "heading" => esc_html__('Columns','greenorganic'),
		                "param_name" => 'columns',
		                "value" => $columns,
		            ),
		            array(
		                "type" => "dropdown",
		                "heading" => esc_html__('Layout Type','greenorganic'),
		                "param_name" => 'layout_type',
		                'value' 	=> array(
							esc_html__('Grid', 'greenorganic') => 'grid', 
							esc_html__('Mansory 1', 'greenorganic') => 'mansory',
							esc_html__('Mansory 2', 'greenorganic') => 'mansory2',
						),
						'std' => 'grid'
		            ),
		            array(
		                "type" => "dropdown",
		                "heading" => esc_html__('Gutter Elements','greenorganic'),
		                "param_name" => 'gutter',
		                'value' 	=> array(
							esc_html__('Default ', 'greenorganic') => '', 
							esc_html__('Gutter 30', 'greenorganic') => 'gutter30',
						),
						'std' => ''
		            ),
		            array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name", 'greenorganic'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'greenorganic')
					)
	            )
	        ));
	        // Gallery Video
			vc_map( array(
	            "name" => esc_html__("Apus Video",'greenorganic'),
	            "base" => "apus_video",
	            'description'=> esc_html__('Display Video In FrontEnd', 'greenorganic'),
	            "class" => "",
	            "category" => esc_html__('Apus Elements', 'greenorganic'),
	            "params" => array(
	              	array(
						"type" => "textfield",
						"heading" => esc_html__("Title", 'greenorganic'),
						"param_name" => "title",
						"admin_label" => true,
						"value" => '',
					),
					array(
						"type" => "textarea_html",
						'heading' => esc_html__( 'Description', 'greenorganic' ),
						"param_name" => "content",
						"value" => '',
						'description' => esc_html__( 'Enter description for title.', 'greenorganic' )
				    ),
	              	array(
						"type" => "attach_image",
						"heading" => esc_html__("Icon Play Image", 'greenorganic'),
						"param_name" => "image"
					),
					array(
		                "type" => "textfield",
		                "heading" => esc_html__('Youtube Video Link','greenorganic'),
		                "param_name" => 'video_link'
		            ),
		           	array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Link Button', 'greenorganic' ),
						'param_name' => 'linkbutton',
						'description' => esc_html__( 'Link Button Join Us!', 'greenorganic' ),
						"admin_label" => true
					),
		            array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name", 'greenorganic'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'greenorganic')
					)
	            )
	        ));
	        // Features Box
			vc_map( array(
	            "name" => esc_html__("Apus Features Box",'greenorganic'),
	            "base" => "apus_features_box",
	            'description'=> esc_html__('Display Features In FrontEnd', 'greenorganic'),
	            "class" => "",
	            "category" => esc_html__('Apus Elements', 'greenorganic'),
	            "params" => array(
	            	array(
						"type" => "textfield",
						"heading" => esc_html__("Title", 'greenorganic'),
						"param_name" => "title",
						"admin_label" => true,
						"value" => '',
					),
					array(
						'type' => 'param_group',
						'heading' => esc_html__('Members Settings', 'greenorganic' ),
						'param_name' => 'items',
						'description' => '',
						'value' => '',
						'params' => array(
							array(
								"type" => "attach_image",
								"description" => esc_html__("Image for box.", 'greenorganic'),
								"param_name" => "image",
								"value" => '',
								'heading'	=> esc_html__('Image', 'greenorganic' )
							),
							array(
				                "type" => "textfield",
				                "class" => "",
				                "heading" => esc_html__('Title','greenorganic'),
				                "param_name" => "title",
				            ),
				            array(
				                "type" => "textarea",
				                "class" => "",
				                "heading" => esc_html__('Description','greenorganic'),
				                "param_name" => "description",
				            ),
							array(
								"type" => "textfield",
								"heading" => esc_html__("Material Design Icon and Awesome Icon", 'greenorganic'),
								"param_name" => "icon",
								"value" => '',
								'description' => esc_html__( 'This support display icon from Material Design and Awesome Icon, Please click', 'greenorganic' )
												. '<a href="' . ( is_ssl()  ? 'https' : 'http') . '://zavoloklom.github.io/material-design-iconic-font/icons.html" target="_blank">'
												. esc_html__( 'here to see the list', 'greenorganic' ) . '</a>'
							),
						),
					),
		           	array(
		                "type" => "dropdown",
		                "heading" => esc_html__('Style Layout','greenorganic'),
		                "param_name" => 'style',
		                'value' 	=> array(
							esc_html__('Default', 'greenorganic') => '', 
						),
						'std' => ''
		            ),
		            array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name", 'greenorganic'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'greenorganic')
					)
	            )
	        ));

			// information
			vc_map( array(
	            "name" => esc_html__("Apus Action Box",'greenorganic'),
	            "base" => "apus_action_box",
	            'description'=> esc_html__('Display Features In FrontEnd', 'greenorganic'),
	            "class" => "",
	            "category" => esc_html__('Apus Elements', 'greenorganic'),
	            "params" => array(
	            	array(
						"type" => "textfield",
						"heading" => esc_html__("Title", 'greenorganic'),
						"param_name" => "title",
						"admin_label" => true,
						"value" => '',
					),
					array(
		                "type" => "textarea",
		                "class" => "",
		                "heading" => esc_html__('Description','greenorganic'),
		                "param_name" => "description",
		            ),
		            array(
						"type" => "textfield",
						"heading" => esc_html__("Button Text Action", 'greenorganic'),
						"param_name" => "text_button",
						"value" => '',
					),
		            array(
						"type" => "textfield",
						"heading" => esc_html__("Button Link Action", 'greenorganic'),
						"param_name" => "link",
						"value" => '',
					),
					array(
						"type" => "attach_image",
						"description" => esc_html__("Background Image for box.", 'greenorganic'),
						"param_name" => "image",
						"value" => '',
						'heading'	=> esc_html__('Image', 'greenorganic' ),
						'dependency' => array(
					       'element' => 'style_box',
					       'value' => array('style1')
					    ),
					),
					array(
						"type" => "attach_image",
						"description" => esc_html__("Image for box.", 'greenorganic'),
						"param_name" => "image_box",
						"value" => '',
						'heading'	=> esc_html__('Image Box', 'greenorganic' ),
						'dependency' => array(
					       'element' => 'style_box',
					       'value' => array('style2')
					    ),
					),
					array(
						"type" => "colorpicker",
						"heading" => esc_html__("Background Color", 'greenorganic'),
						"param_name" => "bg_color",
						'value' 	=> '',
						'dependency' => array(
					       'element' => 'style_box',
					       'value' => array('style2')
					    ),
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Style", 'greenorganic'),
						"param_name" => "style_box",
						'value' 	=> array(
							esc_html__('Style 1', 'greenorganic') => 'style1', 
							esc_html__('Style 2', 'greenorganic') => 'style2', 
						),
						'std' => ''
					),
		            array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name", 'greenorganic'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'greenorganic')
					)
	            )
	        ));

			// FAQ
			vc_map( array(
	            "name" => esc_html__("Apus FAQ Box",'greenorganic'),
	            "base" => "apus_faq_box",
	            'description'=> esc_html__('Display FAQ In FrontEnd', 'greenorganic'),
	            "class" => "",
	            "category" => esc_html__('Apus Elements', 'greenorganic'),
	            "params" => array(
	            	array(
						"type" => "textfield",
						"heading" => esc_html__("Title", 'greenorganic'),
						"param_name" => "title",
						"admin_label" => true,
						"value" => '',
					),
					array(
						'type' => 'param_group',
						'heading' => esc_html__('Members Settings', 'greenorganic' ),
						'param_name' => 'items',
						'description' => '',
						'value' => '',
						'params' => array(
							array(
				                "type" => "textfield",
				                "class" => "",
				                "heading" => esc_html__('Title','greenorganic'),
				                "param_name" => "title",
				            ),
				            array(
				                "type" => "textarea",
				                "class" => "",
				                "heading" => esc_html__('Description','greenorganic'),
				                "param_name" => "description",
				            ),
						),
					),

		            array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name", 'greenorganic'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'greenorganic')
					)
	            )
	        ));



			$custom_menus = array();
			if ( is_admin() ) {
				$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
				if ( is_array( $menus ) && ! empty( $menus ) ) {
					foreach ( $menus as $single_menu ) {
						if ( is_object( $single_menu ) && isset( $single_menu->name, $single_menu->slug ) ) {
							$custom_menus[ $single_menu->name ] = $single_menu->slug;
						}
					}
				}
			}
			// Menu
			vc_map( array(
			    "name" => esc_html__("Apus Custom Menu",'greenorganic'),
			    "base" => "apus_custom_menu",
			    "class" => "",
			    "description"=> esc_html__('Show Custom Menu', 'greenorganic'),
			    "category" => esc_html__('Apus Elements', 'greenorganic'),
			    "params" => array(
			    	array(
						"type" => "textfield",
						"heading" => esc_html__("Title", 'greenorganic'),
						"param_name" => "title",
						"value" => '',
						"admin_label"	=> true
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Menu', 'greenorganic' ),
						'param_name' => 'nav_menu',
						'value' => $custom_menus,
						'description' => empty( $custom_menus ) ? esc_html__( 'Custom menus not found. Please visit Appearance > Menus page to create new menu.', 'greenorganic' ) : esc_html__( 'Select menu to display.', 'greenorganic' ),
						'admin_label' => true,
						'save_always' => true,
					),
					array(
		                "type" => "dropdown",
		                "heading" => esc_html__('Align','greenorganic'),
		                "param_name" => 'align',
		                'value' 	=> array(
							esc_html__('Inherit', 'greenorganic') => '', 
							esc_html__('Left', 'greenorganic') => 'left', 
							esc_html__('Right', 'greenorganic') => 'right', 
							esc_html__('Center', 'greenorganic') => 'center', 
						),
						'std' => ''
		            ),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name", 'greenorganic'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'greenorganic')
					)
			   	)
			));

			vc_map( array(
	            "name" => esc_html__("Apus Instagram",'greenorganic'),
	            "base" => "apus_instagram",
	            'description'=> esc_html__('Display Instagram In FrontEnd', 'greenorganic'),
	            "class" => "",
	            "category" => esc_html__('Apus Elements', 'greenorganic'),
	            "params" => array(
	            	array(
						"type" => "textfield",
						"heading" => esc_html__("Title", 'greenorganic'),
						"param_name" => "title",
						"admin_label" => true,
						"value" => '',
					),
					array(
		              	"type" => "textfield",
		              	"heading" => esc_html__("Instagram Username", 'greenorganic'),
		              	"param_name" => "username",
		            ),
					array(
		              	"type" => "textfield",
		              	"heading" => esc_html__("Number", 'greenorganic'),
		              	"param_name" => "number",
		              	'value' => '1',
		            ),
	             	array(
		              	"type" => "textfield",
		              	"heading" => esc_html__("Number Columns", 'greenorganic'),
		              	"param_name" => "columns",
		              	'value' => '1',
		            ),
		           	array(
		                "type" => "dropdown",
		                "heading" => esc_html__('Layout Type','greenorganic'),
		                "param_name" => 'layout_type',
		                'value' 	=> array(
							esc_html__('Grid', 'greenorganic') => 'grid', 
							esc_html__('Carousel', 'greenorganic') => 'carousel', 
						)
		            ),
		            array(
		                "type" => "dropdown",
		                "heading" => esc_html__('Photo size','greenorganic'),
		                "param_name" => 'size',
		                'value' 	=> array(
							esc_html__('Thumbnail', 'greenorganic') => 'thumbnail', 
							esc_html__('Small', 'greenorganic') => 'small', 
							esc_html__('Large', 'greenorganic') => 'large', 
							esc_html__('Original', 'greenorganic') => 'original', 
						)
		            ),
		            array(
		                "type" => "dropdown",
		                "heading" => esc_html__('Open links in','greenorganic'),
		                "param_name" => 'target',
		                'value' 	=> array(
							esc_html__('Current window (_self)', 'greenorganic') => '_self', 
							esc_html__('New window (_blank)', 'greenorganic') => '_blank',
						)
		            ),
		            array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name", 'greenorganic'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'greenorganic')
					)
	            )
	        ));
		}
	}
	add_action( 'vc_after_set_mode', 'greenorganic_load_load_theme_element', 99 );

	class WPBakeryShortCode_apus_title_heading extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_call_action extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_brands extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_socials_link extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_newsletter extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_googlemap extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_testimonials extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_banner_countdown extends WPBakeryShortCode {}

	class WPBakeryShortCode_apus_counter extends WPBakeryShortCode {
		public function __construct( $settings ) {
			parent::__construct( $settings );
			$this->load_scripts();
		}

		public function load_scripts() {
			wp_register_script('jquery-counterup', get_template_directory_uri().'/js/jquery.counterup.min.js', array('jquery'), false, true);
		}
	}
	class WPBakeryShortCode_apus_ourteam extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_gallery extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_video extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_features_box extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_faq_box extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_action_box extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_custom_menu extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_instagram extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_address extends WPBakeryShortCode {}
	class WPBakeryShortCode_apus_service extends WPBakeryShortCode {}
}