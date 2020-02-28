<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
?>
<div class="widget-newletter <?php echo esc_attr($el_class.' '.$style);?>">
	<?php if($style == 'st_full'){ ?>
		<?php if ($title!=''): ?>
	        <h3 class="title">
	            <?php echo esc_attr( $title ); ?>
	        </h3>
	    <?php endif; ?>
	    <?php if (!empty($description)) { ?>
			<div class="description">
				<?php echo trim( $description ); ?>
			</div>
		<?php } ?>
		<div class="content"> 
			<?php
				if ( function_exists( 'mc4wp_show_form' ) ) {
				  	try {
				  	    $form = mc4wp_get_form(); 
						mc4wp_show_form( $form->ID );
					} catch( Exception $e ) {
					 	esc_html_e( 'Please create a newsletter form from Mailchip plugins', 'greenorganic' );	
					}
				}
			?>
		</div>
	<?php }else{ ?>
		<div class="row">
			<div class="col-md-8 col-xs-12">
			    <?php if ($title!=''): ?>
			        <h3 class="title">
			            <?php echo esc_attr( $title ); ?>
			        </h3>
			    <?php endif; ?>
			    <?php if (!empty($description)) { ?>
					<div class="description">
						<?php echo trim( $description ); ?>
					</div>
				<?php } ?>
		    </div>
		    <div class="col-md-4 col-xs-12">
			    <div class="content"> 
					<?php
						if ( function_exists( 'mc4wp_show_form' ) ) {
						  	try {
						  	    $form = mc4wp_get_form(); 
								mc4wp_show_form( $form->ID );
							} catch( Exception $e ) {
							 	esc_html_e( 'Please create a newsletter form from Mailchip plugins', 'greenorganic' );	
							}
						}
					?>
				</div>
			</div>
		</div>
	<?php } ?>
</div>