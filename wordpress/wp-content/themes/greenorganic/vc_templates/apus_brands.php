<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$bcol = 12/$columns;
if($columns == 5) $bcol='c5';

$items = (array) vc_param_group_parse_atts( $items );
if ( !empty($items) ):
?>
<div class="widget widget-brands <?php echo esc_attr($el_class); ?>">
    <?php if ($title!=''): ?>
        <h3 class="widget-title">
            <span><?php echo esc_attr( $title ); ?></span>
        </h3>
    <?php endif; ?>
    <div class="widget-content">
    	<div class="owl-carousel posts" data-smallmedium="2" data-extrasmall="2" data-verysmall="1" data-items="<?php echo esc_attr($columns); ?>" data-carousel="owl" data-pagination="false" data-nav="true">
    		<?php foreach ($items as $item): ?>
    			<div class="item">
	                <?php $link = !empty($item['url']) ? $item['url'] : '#'; ?>
	                <?php $img_full = wp_get_attachment_image_src($item['image'], 'full'); ?>
					<a href="<?php echo esc_url($link); ?>" target="_blank">
						<?php if( !empty($item['image']) ) { ?>
							<?php greenorganic_display_image($img_full); ?>
						<?php } ?>
					</a>
		        </div>
    		<?php endforeach; ?>
		</div>
    </div>
</div>
<?php endif; ?>