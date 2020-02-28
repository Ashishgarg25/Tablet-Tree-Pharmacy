<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Greenorganic
 * @since Greenorganic 1.0
 */

$footer = apply_filters( 'greenorganic_get_footer_layout', 'default' );
?>

	</div><!-- .site-content -->

	<footer id="apus-footer" class="apus-footer" role="contentinfo">
		<?php if ( !empty($footer) ): ?>
			<div class="container">
				<?php greenorganic_display_footer_builder($footer); ?>
			</div>
		<?php else: ?>
			<div class="apus-copyright">
				<div class="container">
					<div class="copyright-content clearfix">
						<div class="text-copyright pull-right">
							<?php
								
								$allowed_html_array = array( 'a' => array('href' => array()) );
								echo wp_kses(__('&copy; 2017 - Greenorganic. All Rights Reserved. <br/> Powered by <a href="//apusthemes.com">ApusThemes</a>', 'greenorganic'), $allowed_html_array);
							?>

						</div>
					</div>
				</div>
			</div>
		
		<?php endif; ?>
		
	</footer><!-- .site-footer -->

	<?php
	if ( greenorganic_get_config('back_to_top') ) { ?>
		<a href="#" id="back-to-top" class="add-fix-top btn btn-theme">
			<i class="fa fa-angle-up" aria-hidden="true"></i>
		</a>
	<?php
	}
	?>

	<?php get_template_part('sidebar'); ?>
	
</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>