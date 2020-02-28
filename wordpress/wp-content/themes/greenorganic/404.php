<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Greenorganic
 * @since Greenorganic 1.0
 */
/*

*Template Name: 404 Page
*/
get_header();
greenorganic_render_breadcrumbs();
?>
<section class="page-404">
	<div id="main-container" class="inner">
		<div id="main-content" class="main-page">
			<section class="error-404 not-found text-center clearfix">
				<div class="slogan">
					<?php if(!empty(greenorganic_get_config('404_title', '404')) ) { ?>
						<h4 class="title-big"><?php echo greenorganic_get_config('404_title', '404'); ?></h4>
					<?php } else { ?>
						<img src="<?php echo esc_url_raw( get_template_directory_uri().'/images/404.jpg'); ?>" alt="<?php esc_attr_e('Image', 'greenorganic'); ?>">
					<?php } ?>
				</div>
				<h1 class="page-title"><?php echo greenorganic_get_config('404_subtitle', 'Opps! This page Could Not Be Found!'); ?></h1>
				<div class="page-content">
					<div class="sub-title">
						<?php echo greenorganic_get_config('404_description', 'Sorry bit the page you are looking for does not exist, have been removed or name changed'); ?>
					</div>
					<div class="back-home">
						<a class="btn btn-theme" href="<?php echo get_home_url(); ?>"><?php echo esc_html__('go to homepage','greenorganic') ?></a>
					</div>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</div><!-- .content-area -->
	</div>
</section>
<?php get_footer(); ?>