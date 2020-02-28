<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$bcol = 12/$columns;
if($columns == 5) $bcol='c5';

$items = (array) vc_param_group_parse_atts( $items );
if ( !empty($items) ):
?>
<div class="widget-service <?php echo esc_attr($el_class); ?>">
    <?php if ($title!=''): ?>
        <h3 class="widget-title">
            <?php echo esc_attr( $title ); ?>
        </h3>
    <?php endif; ?>
    <div class="widget-content">
    	<div class="owl-carousel posts" data-medium="3" data-smallmedium="2" data-extrasmall="2" data-verysmall="1" data-items="<?php echo esc_attr($columns); ?>" data-carousel="owl" data-pagination="false" data-nav="true">
    		<?php foreach ($items as $item): ?>
    			<div class="item service-inner media">
	                <?php $img_full = wp_get_attachment_image_src($item['image'], 'full'); ?>
					<?php if( !empty($item['image']) ) { ?>
                        <div class="icon media-left media-middle">
						  <?php greenorganic_display_image($img_full); ?>
                        </div>
					<?php } ?>
                    <div class="right-inner media-body media-middle">
                        <?php if ($item['title']!=''): ?>
                            <h3 class="widget-title">
                                <?php echo trim($item['title']); ?>
                            </h3>
                        <?php endif; ?>
                        <?php if ($item['des']!=''): ?>
                            <div class="des">
                                <?php echo trim($item['des']); ?>
                            </div>
                        <?php endif; ?>
                    </div>      
		        </div>
    		<?php endforeach; ?>
		</div>
    </div>
</div>
<?php endif; ?>