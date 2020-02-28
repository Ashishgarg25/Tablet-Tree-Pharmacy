<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$_id = greenorganic_random_key();
$lat_lng = explode(',', $lat_lng);
if (count($lat_lng) == 2) {
	wp_enqueue_script('google-maps-api', '//maps.google.com/maps/api/js?key=' . greenorganic_get_config('google_map_api_key', '') );
	$lat = $lat_lng[0];
	$lng = $lat_lng[1];

	
	$style = '';
	if ($map_style) {
		$style = Greenorganic_Google_Maps_Styles::get_style($map_style);
	}

	$icon_img = '';
	if ( $marker_icon ) {
		$img = wp_get_attachment_image_src($marker_icon,'full');
		if ( !empty($img) && isset($img[0]) ) {
			$icon_img = $img[0];
			$data_marker = 'data-marker_icon="'.esc_url($img[0]).'"';
		}
	}
?>
	<div class="widget-googlemap <?php echo esc_attr($el_class); ?>">
		<div class="widget-content">
			<div id="apus_gmap_canvas_<?php echo esc_attr( $_id ); ?>" class="map_canvas apus-google-map" style="height:<?php echo esc_attr( $height ); ?>px;width:100%;" data-lat="<?php echo esc_attr($lat); ?>" data-lng="<?php echo esc_attr($lng); ?>" data-zoom="<?php echo esc_attr($zoom); ?>" <?php echo trim($data_marker); ?> data-style="<?php echo esc_attr($style); ?>">
			</div>
			<?php if ($title!=''): ?>
		        <h3 class="widget-title">
		            <span><?php echo esc_attr( $title ); ?></span>
		            <?php if ( isset($subtitle) && $subtitle ): ?>
		                <span class="subtitle"><?php echo esc_html($subtitle); ?></span>
		            <?php endif; ?>
		        </h3>
		    <?php endif; ?>
		     <?php if ($des!=''): ?>
	            <div class="description"><?php echo trim( $des ); ?></div>
		    <?php endif; ?>
		</div>
	</div>
<?php } ?>
