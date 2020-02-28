<?php
if ( !function_exists ('greenorganic_custom_styles') ) {
	function greenorganic_custom_styles() {
		global $post;	
		
		ob_start();	
		?>
		
			<?php
				$font_source = greenorganic_get_config('font_source');
				$main_font = greenorganic_get_config('main_font');
				$main_font = isset($main_font['font-family']) ? $main_font['font-family'] : false;
				$main_google_font_face = greenorganic_get_config('main_google_font_face');
			?>
			<?php if ( ($font_source == "1" && $main_font) || ($font_source == "2" && $main_google_font_face) ): ?>
				h1, h2, h3, h4, h5, h6, .widget-title,.widgettitle, .widget-text-heading .title, .testimonial-body .description, .feature-box-inner .ourservice-heading, .product-block.grid2 .name, .widget-action-box .title, .apus-breadscrumb .bread-title
				{
					font-family: 
					<?php if ( $font_source == "2" ) echo '\'' . $main_google_font_face . '\','; ?>
					<?php if ( $font_source == "1" ) echo '\'' . $main_font . '\','; ?> 
					sans-serif;
				}
			<?php endif; ?>
			/* Second Font */
			<?php
				$secondary_font = greenorganic_get_config('secondary_font');
				$secondary_font = isset($secondary_font['font-family']) ? $secondary_font['font-family'] : false;
				$secondary_google_font_face = greenorganic_get_config('secondary_google_font_face');
			?>
			<?php if ( ($font_source == "1" && $secondary_font) || ($font_source == "2" && $secondary_google_font_face) ): ?>
				body
				{
					font-family: 
					<?php if ( $font_source == "2" ) echo '\'' . $secondary_google_font_face . '\','; ?>
					<?php if ( $font_source == "1" ) echo '\'' . $secondary_font . '\','; ?> 
					sans-serif;
				}			
			<?php endif; ?>

			/* Custom Color (skin) */ 

			/* check main color */ 
			<?php if ( greenorganic_get_config('main_color') != "" ) : ?>
				/* seting background main */
				.wishlist-icon .count,
				.product-block.grid3 .groups-button > div:not(.clear) .yith-wcwl-wishlistexistsbrowse a, .product-block.grid3 .groups-button > div:not(.clear) .yith-wcwl-wishlistaddedbrowse a,
				.product-block.grid3 .groups-button > div:not(.clear) a:hover, .product-block.grid3 .groups-button > div:not(.clear) a:focus, .product-block.grid3 .groups-button > div:not(.clear) a.added,
				.woocommerce div.quantity .plus:hover, .woocommerce div.quantity .plus:active, .woocommerce div.quantity .minus:hover, .woocommerce div.quantity .minus:active,
				.apus-checkout-step ul li.active .step::before,
				.apus-checkout-step .active .step,
				.wpb-js-composer .vc_tta.vc_general.vc_tta-accordion .vc_active .vc_tta-panel-title::before,
				.tabs-v1 .nav-tabs li:focus > a:focus, .tabs-v1 .nav-tabs li:focus > a:hover, .tabs-v1 .nav-tabs li:focus > a, .tabs-v1 .nav-tabs li:hover > a:focus, .tabs-v1 .nav-tabs li:hover > a:hover, .tabs-v1 .nav-tabs li:hover > a, .tabs-v1 .nav-tabs li.active > a:focus, .tabs-v1 .nav-tabs li.active > a:hover, .tabs-v1 .nav-tabs li.active > a,
				.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
				.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
				.apus-filter .change-view:hover, .apus-filter .change-view.active,
				.widget-gallery .image::before,
				.bg-theme,
				.mini-cart .count, .apus-topbar, .nav-white .owl-controls .owl-nav .owl-prev:hover, .nav-white .owl-controls .owl-nav .owl-prev:active, .nav-white .owl-controls .owl-nav .owl-next:hover, .nav-white .owl-controls .owl-nav .owl-next:active, .owl-controls .owl-nav .owl-prev:active, .owl-controls .owl-nav .owl-prev:hover, .owl-controls .owl-nav .owl-next:active, .owl-controls .owl-nav .owl-next:hover, .woocommerce-account .woocommerce-MyAccount-navigation .woocommerce-MyAccount-navigation-link a:before
				{
					background-color: <?php echo esc_html( greenorganic_get_config('main_color') ) ?>;
				}
				/* setting color*/
				.apus-products-list .product-block:hover .name a,
				#order_review .woocommerce-Price-amount,
				.apus-checkout-step .active,
				.woocommerce table.shop_table tbody .product-subtotal,
				.woocommerce table.shop_table td.product-price,
				.woocommerce .cart_totals table.shop_table th .woocommerce-Price-amount, .woocommerce .cart_totals table.shop_table td .woocommerce-Price-amount,
				.header-v2 .apus-topbar a:hover, .header-v2 .apus-topbar a:active,
				.apus-search-top .button-show-search:hover, .apus-search-top .button-show-search:active,
				.woocommerce div.product form.cart .group_table .price, .woocommerce div.product form.cart .group_table .price ins,
				.detail-post .apus-social-share a:hover, .detail-post .apus-social-share a:active,
				.list-check i,
				.detail-post .top-info .meta .author a,
				.apus-pagination > span:hover, .apus-pagination > span.current, .apus-pagination > a:hover, .apus-pagination > a.current,
				.details-product .information .product_meta a,
				.details-product .list i,
				.apus-pagination .page-numbers li > span:hover, .apus-pagination .page-numbers li > span.current, .apus-pagination .page-numbers li > a:hover, .apus-pagination .page-numbers li > a.current, .apus-pagination .pagination li > span:hover, .apus-pagination .pagination li > span.current, .apus-pagination .pagination li > a:hover, .apus-pagination .pagination li > a.current,
				.widget_layered_nav ul li.current-cat-parent > .count, .widget_layered_nav ul li.current-cat > .count, .widget_layered_nav ul li:hover > .count, .product-categories li.current-cat-parent > .count, .product-categories li.current-cat > .count, .product-categories li:hover > .count,
				.widget_layered_nav ul li.current-cat-parent > a, .widget_layered_nav ul li.current-cat > a, .widget_layered_nav ul li:hover > a, .product-categories li.current-cat-parent > a, .product-categories li.current-cat > a, .product-categories li:hover > a,
				.woocommerce ul.product_list_widget .woocommerce-Price-amount,
				.widget_price_filter .price_slider_amount .price_label span,
				.widget-gallery .popup-image-gallery,
				.woocommerce div.product p.price, .woocommerce div.product span.price,
				.feature-box-inner .fbox-icon,
				.widget-newletter .title,
				.read-more,
				a:hover,a:active,a:focus,
				.tab-product-center .nav-tabs > li:hover a, .tab-product-center .nav-tabs > li.active a, .navbar-nav.megamenu > li:hover > a, .navbar-nav.megamenu > li.active > a, .navbar-nav.megamenu .dropdown-menu li.open > a, .navbar-nav.megamenu .dropdown-menu li.active > a, .navbar-nav.megamenu .dropdown-menu li > a:hover, .navbar-nav.megamenu .dropdown-menu li > a:active, .apus-footer .widget-social .social > li a:hover, .apus-footer .widget-social .social > li a:active, .widget-gallery .popup-image-gallery:hover, .widget-gallery .popup-image-gallery:active, .owl-controls .owl-nav .owl-prev, .owl-controls .owl-nav .owl-next, .header-v2 .navbar-nav.megamenu > li.active > a, .header-v2 .navbar-nav.megamenu > li:hover > a, .header-v2 .navbar-nav.megamenu > li:active > a, .apus-footer .footer-builder-wrapper.dark a:hover, .apus-footer .footer-builder-wrapper.dark a:focus, .apus-footer .footer-builder-wrapper.dark a:active, #add_payment_method #payment ul.payment_methods li .about_paypal, .woocommerce-cart #payment ul.payment_methods li .about_paypal, .woocommerce-checkout #payment ul.payment_methods li .about_paypal, .apus-breadscrumb .breadcrumb a:hover, .apus-breadscrumb .breadcrumb a:active, .mini-cart:hover, .wishlist-icon i:hover, .woocommerce-account .woocommerce-MyAccount-navigation .woocommerce-MyAccount-navigation-link.is-active > a, .woocommerce-account .woocommerce-MyAccount-navigation .woocommerce-MyAccount-navigation-link:hover > a, .woocommerce-account .woocommerce-MyAccount-navigation .woocommerce-MyAccount-navigation-link:active > a
				{
					color: <?php echo esc_html( greenorganic_get_config('main_color') ) ?>;
				}
				.text-theme{
					color: <?php echo esc_html( greenorganic_get_config('main_color') ) ?> !important;
				}
				/* setting border color*/
				.grid-banner-category .category-wrapper:hover .category-meta .category-meta-inner,
				.wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic .vc_active .vc_tta-panel-heading .vc_tta-controls-icon::after, .wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic .vc_active .vc_tta-panel-heading .vc_tta-controls-icon::before, .wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic .vc_tta-controls-icon::after, .wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic .vc_tta-controls-icon::before,
				.woocommerce div.product div.images .flex-control-thumbs li img:hover, .woocommerce div.product div.images .flex-control-thumbs li img:active, .woocommerce div.product div.images .flex-control-thumbs li img.flex-active,
				.apus-pagination > span:hover, .apus-pagination > span.current, .apus-pagination > a:hover, .apus-pagination > a.current,
				.apus-pagination .page-numbers li > span:hover, .apus-pagination .page-numbers li > span.current, .apus-pagination .page-numbers li > a:hover, .apus-pagination .page-numbers li > a.current, .apus-pagination .pagination li > span:hover, .apus-pagination .pagination li > span.current, .apus-pagination .pagination li > a:hover, .apus-pagination .pagination li > a.current,
				#apus-orderby .dropdown-menu,
				.apus-filter .change-view:hover, .apus-filter .change-view.active,
				.nav-white .owl-controls .owl-dots .owl-dot,
				.product-block.grid:hover,
				.times > div,
				.border-theme, .nav-white .owl-controls .owl-nav .owl-prev:hover, .nav-white .owl-controls .owl-nav .owl-prev:active, .nav-white .owl-controls .owl-nav .owl-next:hover, .nav-white .owl-controls .owl-nav .owl-next:active, .owl-controls .owl-nav .owl-prev, .owl-controls .owl-nav .owl-next, .owl-controls .owl-nav .owl-prev:active, .owl-controls .owl-nav .owl-prev:hover, .owl-controls .owl-nav .owl-next:active, .owl-controls .owl-nav .owl-next:hover
				{
					border-color: <?php echo esc_html( greenorganic_get_config('main_color') ) ?> !important;
				}
				.woocommerce .widget_price_filter .ui-slider .ui-slider-handle + .ui-slider-handle{
					box-shadow:0 0 0 5px <?php echo esc_html( greenorganic_get_config('main_color') ) ?>;
				}

			<?php endif; ?>


			<?php if ( greenorganic_get_config('button_color') != "" ) : ?>
				.owl-controls .owl-nav .owl-prev, .owl-controls .owl-nav .owl-next,
				.btn.btn-outline.btn-theme
				{
					color: <?php echo esc_html( greenorganic_get_config('button_color') ); ?>;
				}
				.btn.btn-outline.btn-theme{
					background:#fff;
				}
				/* check second background color */
				.woocommerce div.product div.images .woocommerce-product-gallery__trigger,
				.groups-button .add-cart .added_to_cart,
				.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,
				.viewmore-products-btn ,
				.btn.btn-theme
				{
					background-color: <?php echo esc_html( greenorganic_get_config('button_color') ); ?>;
				}
				.comment-list .comment-reply-link,
				.owl-controls .owl-nav .owl-prev, .owl-controls .owl-nav .owl-next,
				.viewmore-products-btn ,
				.woocommerce div.product div.images .woocommerce-product-gallery__trigger,
				.groups-button .add-cart .added_to_cart,
				.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,
				.btn.btn-theme,.btn.btn-outline.btn-theme
				{
					border-color: <?php echo esc_html( greenorganic_get_config('button_color') ); ?>;
				}

			<?php endif; ?>

			<?php if ( greenorganic_get_config('button_hover_color') != "" ) : ?>
				.text-theme-second
				{
					color: <?php echo esc_html( greenorganic_get_config('button_hover_color') ); ?>;
				}
				/* check second background color */
				.comment-list .comment-reply-link:hover, .comment-list .comment-reply-link:active,
				.detail-post .entry-tags-list a:hover, .detail-post .entry-tags-list a:active,
				.owl-controls .owl-nav .owl-prev:hover, 
				.owl-controls .owl-nav .owl-prev:active, 
				.owl-controls .owl-nav .owl-prev:focus, 
				.owl-controls .owl-nav .owl-next:hover,
				.owl-controls .owl-nav .owl-next:active,
				.owl-controls .owl-nav .owl-next:focus,
				.woocommerce div.product div.images .woocommerce-product-gallery__trigger:hover, .woocommerce div.product div.images .woocommerce-product-gallery__trigger:active,
				.groups-button .add-cart .added_to_cart:hover, .groups-button .add-cart .added_to_cart:active,
				.woocommerce #respond input#submit:hover, .woocommerce #respond input#submit:active, .woocommerce a.button:hover, .woocommerce a.button:active, .woocommerce button.button:hover, .woocommerce button.button:active, .woocommerce input.button:hover, .woocommerce input.button:active,
				.viewmore-products-btn:hover,
				.viewmore-products-btn:focus,
				.viewmore-products-btn:active,
				.btn.btn-outline.btn-themes:hover,
				.btn.btn-outline.btn-themes:active,
				.btn.btn-outline.btn-themes:focus,
				.btn.btn-theme:hover, .btn.btn-theme:focus, .btn.btn-theme:active, .btn.btn-theme.active
				{
					background-color: <?php echo esc_html( greenorganic_get_config('button_hover_color') ); ?>;
				}
				.btn.btn-outline.btn-themes:hover,
				.btn.btn-outline.btn-themes:active,
				.btn.btn-outline.btn-themes:focus,
				.btn.btn-theme:hover, .btn.btn-theme:focus, .btn.btn-theme:active, .btn.btn-theme.active{
					color:#fff;
				}
				.comment-list .comment-reply-link:hover, .comment-list .comment-reply-link:active,
				.detail-post .entry-tags-list a:hover, .detail-post .entry-tags-list a:active,
				.owl-controls .owl-nav .owl-prev:hover, 
				.owl-controls .owl-nav .owl-prev:active, 
				.owl-controls .owl-nav .owl-prev:focus, 
				.owl-controls .owl-nav .owl-next:hover,
				.owl-controls .owl-nav .owl-next:active,
				.owl-controls .owl-nav .owl-next:focus,
				.woocommerce div.product div.images .woocommerce-product-gallery__trigger:hover, .woocommerce div.product div.images .woocommerce-product-gallery__trigger:active,
				.groups-button .add-cart .added_to_cart:hover, .groups-button .add-cart .added_to_cart:active,
				.woocommerce #respond input#submit:hover, .woocommerce #respond input#submit:active, .woocommerce a.button:hover, .woocommerce a.button:active, .woocommerce button.button:hover, .woocommerce button.button:active, .woocommerce input.button:hover, .woocommerce input.button:active,
				.viewmore-products-btn:hover,
				.viewmore-products-btn:focus,
				.viewmore-products-btn:active,
				.btn-outline.btn-white:hover,
				.btn-outline.btn-white:active,
				.btn-outline.btn-white:focus,
				.btn.btn-theme:hover,
				.btn.btn-theme:active,
				.btn.btn-theme.active
				{
					border-color: <?php echo esc_html( greenorganic_get_config('button_hover_color') ); ?>;
				}
			<?php endif; ?>

			/***************************************************************/
			/* Top Bar *****************************************************/
			/***************************************************************/
			/* Top Bar Backgound */
			<?php $topbar_bg = greenorganic_get_config('topbar_bg'); ?>
			<?php if ( !empty($topbar_bg) ) :
				$image = isset($topbar_bg['background-image']) ? str_replace(array('http://', 'https://'), array('//', '//'), $topbar_bg['background-image']) : '';
				$topbar_bg_image = $image && $image != 'none' ? 'url('.esc_url($image).')' : $image;
			?>
				#apus-topbar {
					<?php if ( isset($topbar_bg['background-color']) && $topbar_bg['background-color'] ): ?>
				    background-color: <?php echo esc_html( $topbar_bg['background-color'] ) ?>;
				    <?php endif; ?>
				    <?php if ( isset($topbar_bg['background-repeat']) && $topbar_bg['background-repeat'] ): ?>
				    background-repeat: <?php echo esc_html( $topbar_bg['background-repeat'] ) ?>;
				    <?php endif; ?>
				    <?php if ( isset($topbar_bg['background-size']) && $topbar_bg['background-size'] ): ?>
				    background-size: <?php echo esc_html( $topbar_bg['background-size'] ) ?>;
				    <?php endif; ?>
				    <?php if ( isset($topbar_bg['background-attachment']) && $topbar_bg['background-attachment'] ): ?>
				    background-attachment: <?php echo esc_html( $topbar_bg['background-attachment'] ) ?>;
				    <?php endif; ?>
				    <?php if ( isset($topbar_bg['background-position']) && $topbar_bg['background-position'] ): ?>
				    background-position: <?php echo esc_html( $topbar_bg['background-position'] ) ?>;
				    <?php endif; ?>
				    <?php if ( $topbar_bg_image ): ?>
				    background-image: <?php echo esc_html( $topbar_bg_image ) ?>;
				    <?php endif; ?>
				}
			<?php endif; ?>
			/* Top Bar Color */
			<?php if ( greenorganic_get_config('topbar_text_color') != "" ) : ?>
				#apus-topbar {
					color: <?php echo esc_html(greenorganic_get_config('topbar_text_color')); ?>;
				}
			<?php endif; ?>
			/* Top Bar Link Color */
			<?php if ( greenorganic_get_config('topbar_link_color') != "" ) : ?>
				#apus-topbar a {
					color: <?php echo esc_html(greenorganic_get_config('topbar_link_color')); ?>;
				}
			<?php endif; ?>

			/***************************************************************/
			/* Header *****************************************************/
			/***************************************************************/
			/* Header Backgound */
			<?php $header_bg = greenorganic_get_config('header_bg'); ?>
			<?php if ( !empty($header_bg) ) :
				$image = isset($header_bg['background-image']) ? str_replace(array('http://', 'https://'), array('//', '//'), $header_bg['background-image']) : '';
				$header_bg_image = $image && $image != 'none' ? 'url('.esc_url($image).')' : $image;
			?>	
				#apus-header .header-middle,
				#apus-header .header-middle-inner,
				#apus-header {
					<?php if ( isset($header_bg['background-color']) && $header_bg['background-color'] ): ?>
				    background-color: <?php echo esc_html( $header_bg['background-color'] ) ?>;
				    <?php endif; ?>
				    <?php if ( isset($header_bg['background-repeat']) && $header_bg['background-repeat'] ): ?>
				    background-repeat: <?php echo esc_html( $header_bg['background-repeat'] ) ?>;
				    <?php endif; ?>
				    <?php if ( isset($header_bg['background-size']) && $header_bg['background-size'] ): ?>
				    background-size: <?php echo esc_html( $header_bg['background-size'] ) ?>;
				    <?php endif; ?>
				    <?php if ( isset($header_bg['background-attachment']) && $header_bg['background-attachment'] ): ?>
				    background-attachment: <?php echo esc_html( $header_bg['background-attachment'] ) ?>;
				    <?php endif; ?>
				    <?php if ( isset($header_bg['background-position']) && $header_bg['background-position'] ): ?>
				    background-position: <?php echo esc_html( $header_bg['background-position'] ) ?>;
				    <?php endif; ?>
				    <?php if ( $header_bg_image ): ?>
				    background-image: <?php echo esc_html( $header_bg_image ) ?>;
				    <?php endif; ?>
				}
			<?php endif; ?>
			/* Header Color */
			<?php if ( greenorganic_get_config('header_text_color') != "" ) : ?>
				#apus-header {
					color: <?php echo esc_html(greenorganic_get_config('header_text_color')); ?>;
				}
			<?php endif; ?>
			/* Header Link Color */
			<?php if ( greenorganic_get_config('header_link_color') != "" ) : ?>
				#apus-header a {
					color: <?php echo esc_html(greenorganic_get_config('header_link_color'));?> ;
				}
			<?php endif; ?>
			/* Header Link Color Active */
			<?php if ( greenorganic_get_config('header_link_color_active') != "" ) : ?>
				#apus-header .active > a,
				#apus-header a:active,
				#apus-header a:hover {
					color: <?php echo esc_html(greenorganic_get_config('header_link_color_active')); ?>;
				}
			<?php endif; ?>


			/* Menu Link Color */
			<?php if ( greenorganic_get_config('main_menu_link_color') != "" ) : ?>
				.navbar-nav.megamenu > li > a{
					color: <?php echo esc_html(greenorganic_get_config('main_menu_link_color'));?> !important;
				}
			<?php endif; ?>
			
			/* Menu Link Color Active */
			<?php if ( greenorganic_get_config('main_menu_link_color_active') != "" ) : ?>
				.navbar-nav.megamenu .dropdown-menu li.open > a, .navbar-nav.megamenu .dropdown-menu li.active > a,.navbar-nav.megamenu .dropdown-menu li:hover > a,
				.navbar-nav.megamenu > li:hover > a,
				.navbar-nav.megamenu > li.active > a,
				.navbar-nav.megamenu > li > a:hover,
				.navbar-nav.megamenu > li > a:active
				{
					color: <?php echo esc_html(greenorganic_get_config('main_menu_link_color_active')); ?> !important;
				}
			<?php endif; ?>

			/***************************************************************/
			/* Footer *****************************************************/
			/***************************************************************/
			/* Footer Backgound */
			<?php $footer_bg = greenorganic_get_config('footer_bg'); ?>
			<?php if ( !empty($footer_bg) ) :
				$image = isset($footer_bg['background-image']) ? str_replace(array('http://', 'https://'), array('//', '//'), $footer_bg['background-image']) : '';
				$footer_bg_image = $image && $image != 'none' ? 'url('.esc_url($image).')' : $image;
			?>
				#apus-footer {
					<?php if ( isset($footer_bg['background-color']) && $footer_bg['background-color'] ): ?>
				    background-color: <?php echo esc_html( $footer_bg['background-color'] ) ?>;
				    <?php endif; ?>
				    <?php if ( isset($footer_bg['background-repeat']) && $footer_bg['background-repeat'] ): ?>
				    background-repeat: <?php echo esc_html( $footer_bg['background-repeat'] ) ?>;
				    <?php endif; ?>
				    <?php if ( isset($footer_bg['background-size']) && $footer_bg['background-size'] ): ?>
				    background-size: <?php echo esc_html( $footer_bg['background-size'] ) ?>;
				    <?php endif; ?>
				    <?php if ( isset($footer_bg['background-attachment']) && $footer_bg['background-attachment'] ): ?>
				    background-attachment: <?php echo esc_html( $footer_bg['background-attachment'] ) ?>;
				    <?php endif; ?>
				    <?php if ( isset($footer_bg['background-position']) && $footer_bg['background-position'] ): ?>
				    background-position: <?php echo esc_html( $footer_bg['background-position'] ) ?>;
				    <?php endif; ?>
				    <?php if ( $footer_bg_image ): ?>
				    background-image: <?php echo esc_html( $footer_bg_image ) ?>;
				    <?php endif; ?>
				}
			<?php endif; ?>
			/* Footer Heading Color*/
			<?php if ( greenorganic_get_config('footer_heading_color') != "" ) : ?>
				#apus-footer h1, #apus-footer h2, #apus-footer h3, #apus-footer h4, #apus-footer h5, #apus-footer h6 ,#apus-footer .widget-title {
					color: <?php echo esc_html(greenorganic_get_config('footer_heading_color')); ?> !important;
				}
			<?php endif; ?>
			/* Footer Color */
			<?php if ( greenorganic_get_config('footer_text_color') != "" ) : ?>
				#apus-footer {
					color: <?php echo esc_html(greenorganic_get_config('footer_text_color')); ?>;
				}
			<?php endif; ?>
			/* Footer Link Color */
			<?php if ( greenorganic_get_config('footer_link_color') != "" ) : ?>
				#apus-footer a {
					color: <?php echo esc_html(greenorganic_get_config('footer_link_color')); ?>;
				}
			<?php endif; ?>

			/* Footer Link Color Hover*/
			<?php if ( greenorganic_get_config('footer_link_color_hover') != "" ) : ?>
				#apus-footer a:hover {
					color: <?php echo esc_html(greenorganic_get_config('footer_link_color_hover')); ?>;
				}
			<?php endif; ?>




			/***************************************************************/
			/* Copyright *****************************************************/
			/***************************************************************/
			/* Copyright Backgound */
			<?php $copyright_bg = greenorganic_get_config('copyright_bg'); ?>
			<?php if ( !empty($copyright_bg) ) :
				$image = isset($copyright_bg['background-image']) ? str_replace(array('http://', 'https://'), array('//', '//'), $copyright_bg['background-image']) : '';
				$copyright_bg_image = $image && $image != 'none' ? 'url('.esc_url($image).')' : $image;
			?>
				.apus-copyright {
					<?php if ( isset($copyright_bg['background-color']) && $copyright_bg['background-color'] ): ?>
				    background-color: <?php echo esc_html( $copyright_bg['background-color'] ) ?> !important;
				    <?php endif; ?>
				    <?php if ( isset($copyright_bg['background-repeat']) && $copyright_bg['background-repeat'] ): ?>
				    background-repeat: <?php echo esc_html( $copyright_bg['background-repeat'] ) ?>;
				    <?php endif; ?>
				    <?php if ( isset($copyright_bg['background-size']) && $copyright_bg['background-size'] ): ?>
				    background-size: <?php echo esc_html( $copyright_bg['background-size'] ) ?>;
				    <?php endif; ?>
				    <?php if ( isset($copyright_bg['background-attachment']) && $copyright_bg['background-attachment'] ): ?>
				    background-attachment: <?php echo esc_html( $copyright_bg['background-attachment'] ) ?>;
				    <?php endif; ?>
				    <?php if ( isset($copyright_bg['background-position']) && $copyright_bg['background-position'] ): ?>
				    background-position: <?php echo esc_html( $copyright_bg['background-position'] ) ?>;
				    <?php endif; ?>
				    <?php if ( $copyright_bg_image ): ?>
				    background-image: <?php echo esc_html( $copyright_bg_image ) ?> !important;
				    <?php endif; ?>
				}
			<?php endif; ?>

			/* Footer Color */
			<?php if ( greenorganic_get_config('copyright_text_color') != "" ) : ?>
				.apus-copyright {
					color: <?php echo esc_html(greenorganic_get_config('copyright_text_color')); ?>;
				}
			<?php endif; ?>
			/* Footer Link Color */
			<?php if ( greenorganic_get_config('copyright_link_color') != "" ) : ?>
				.apus-copyright a {
					color: <?php echo esc_html(greenorganic_get_config('copyright_link_color')); ?>;
				}
			<?php endif; ?>

			/* Footer Link Color Hover*/
			<?php if ( greenorganic_get_config('copyright_link_color_hover') != "" ) : ?>
				.apus-copyright a:hover {
					color: <?php echo esc_html(greenorganic_get_config('copyright_link_color_hover')); ?>;
				}
			<?php endif; ?>

			/* Woocommerce Breadcrumbs */
			<?php if ( greenorganic_get_config('breadcrumbs') == "0" ) : ?>
			.woocommerce .woocommerce-breadcrumb,
			.woocommerce-page .woocommerce-breadcrumb
			{
				display:none;
			}
			<?php endif; ?>


	<?php
		$content = ob_get_clean();
		$content = str_replace(array("\r\n", "\r"), "\n", $content);
		$lines = explode("\n", $content);
		$new_lines = array();
		foreach ($lines as $i => $line) {
			if (!empty($line)) {
				$new_lines[] = trim($line);
			}
		}
		
		return implode($new_lines);
	}
}
