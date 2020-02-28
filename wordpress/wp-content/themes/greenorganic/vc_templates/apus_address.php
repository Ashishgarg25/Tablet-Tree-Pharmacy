<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$members = (array) vc_param_group_parse_atts( $members );
if ( !empty($members) ):
?>
	<div class="widget widget-address <?php echo esc_attr($el_class); ?>">
		<div class="row">
		    <?php foreach ($members as $item): ?>
		    	<div class="col-xs-12 col-sm-<?php echo 12/count($members) ?>">
					<?php if ( isset($item['name']) && !empty($item['name']) ): ?>
		            	<h3 class="name-team"><?php echo trim($item['name']); ?></h3>
		            <?php endif; ?>

		            <?php if ( isset($item['des']) && !empty($item['des']) ): ?>
		            	<div class="des">
		        			<?php echo trim($item['des']); ?>
		            	</div>
		         	<?php endif; ?>
	         	</div>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>