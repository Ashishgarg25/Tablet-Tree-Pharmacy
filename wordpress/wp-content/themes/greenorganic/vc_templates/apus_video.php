<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
?>
<div class="widget-video">
	<?php if ($title!=''): ?>
        <h3 class="widget-title">
            <span><?php echo trim($title); ?></span>
        </h3>
    <?php endif; ?>
    <?php if(wpb_js_remove_wpautop( $content, true )){ ?>
        <div class="description">
            <?php echo wpb_js_remove_wpautop( $content, true ); ?>
        </div>
    <?php } ?>
    <div class="video-wrapper-inner">
    	<div class="video">
    		<?php $img = wp_get_attachment_image_src($image,'full'); ?>
    		<?php if ( !empty($img) && isset($img[0]) ): ?>
    			<a class="popup-video" href="<?php echo esc_url_raw($video_link); ?>">
            		<img src="<?php echo esc_url_raw($img[0]); ?>" alt="<?php esc_attr_e('Image', 'greenorganic'); ?>">
                    <span><?php echo esc_html__('Play Video','greenorganic'); ?></span>
            	</a>
            <?php endif; ?>
            <?php if ($linkbutton!=''): ?>
                <a href="<?php echo esc_attr( $linkbutton1 ); ?>" class="btn btn-theme btn-gradient" >
                    <span><?php echo esc_html__('Join Us!','greenorganic'); ?></span>
                </a>
            <?php endif; ?>
    	</div>
	</div>
</div>