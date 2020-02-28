<?php if ( greenorganic_get_config('show_searchform') ):
	$class = greenorganic_get_config('enable_autocompleate_search', true) ? ' apus-autocompleate-input' : '';
?>

	<div class="apus-search-form">
		<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
		  	<input type="text" placeholder="<?php esc_html_e( 'Type here...', 'greenorganic' ); ?>" name="s" class="apus-search form-control <?php echo esc_attr($class); ?>"/>
			<?php if ( greenorganic_get_config('search_type') != 'all' ): ?>
				<input type="hidden" name="post_type" value="product" class="post_type" />
			<?php endif; ?>
		</form>
		<span class="hidden-search"><i class="ion-android-close"></i></span>
	</div>
<?php endif; ?>