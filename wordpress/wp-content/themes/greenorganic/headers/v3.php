<header id="apus-header" class="apus-header header-v3 hidden-sm hidden-xs" role="banner">
    <div id="apus-topbar" class="apus-topbar">
        <div class="container">
            <?php if ( is_active_sidebar( 'sidebar-slogan' ) ) { ?>
                <div class="pull-left">
                    <div class="slogan">
                        <?php dynamic_sidebar( 'sidebar-slogan' ); ?>
                    </div>
                </div>
            <?php } ?> 
            <div class="pull-right">
                <?php if ( greenorganic_get_config('show_settingmenu') && has_nav_menu( 'top-menu' ) ): ?>
                    <div class="pull-left">
                        <?php
                            $args = array(
                                'theme_location'  => 'top-menu',
                                'menu_class'      => 'nav navbar-nav top-menu',
                                'fallback_cb'     => '',
                                'menu_id'         => 'top-menu'
                            );
                            wp_nav_menu($args);
                        ?>
                    </div>
                <?php endif; ?>
                <?php if ( is_active_sidebar( 'sidebar-socials' ) ) { ?>
                    <div class="pull-left">
                        <?php dynamic_sidebar( 'sidebar-socials' ); ?>
                    </div>
                <?php } ?>    
            </div>
        </div>
    </div>
    <div class="<?php echo (greenorganic_get_config('keep_header') ? 'main-sticky-header-wrapper' : ''); ?>">
        <div class="<?php echo (greenorganic_get_config('keep_header') ? 'main-sticky-header' : ''); ?>">
            <div class="header-middle">
                <div class="container">
                    <div class="p-relative header-middle-inner">
                        <div class="row">
                            <div class="table-visiable-dk">
                                <div class="col-xs-12 col-md-3 col-sm-2">
                                    <div class="logo-in-theme ">
                                        <?php get_template_part( 'page-templates/parts/logo' ); ?>
                                    </div>
                                </div>
                                <?php if ( has_nav_menu( 'primary' ) ) : ?>
                                <div class="col-xs-12 col-md-7 col-sm-8 p-static">
                                    <div class="main-menu">
                                        <nav data-duration="400" class="hidden-xs hidden-sm apus-megamenu slide animate navbar p-static" role="navigation">
                                        <?php   $args = array(
                                                'theme_location' => 'primary',
                                                'container_class' => 'collapse navbar-collapse no-padding',
                                                'menu_class' => 'nav navbar-nav megamenu',
                                                'fallback_cb' => '',
                                                'menu_id' => 'primary-menu',
                                                'walker' => new Greenorganic_Nav_Menu()
                                            );
                                            wp_nav_menu($args);
                                        ?>
                                        </nav>
                                    </div>
                                </div>
                                <?php endif; ?>
                                
                                <div class="col-md-2 col-xs-12 hidden-xs header-right">
                                    <?php if ( class_exists( 'YITH_WCWL' ) ):
                                        $wishlist_url = YITH_WCWL()->get_wishlist_url();
                                    ?>
                                        <div class="pull-right">
                                            <a class="wishlist-icon" href="<?php echo esc_url($wishlist_url);?>" title="<?php esc_html_e( 'View Your Wishlist', 'greenorganic' ); ?>"><i class="fa fa-heart" aria-hidden="true"></i>
                                                <?php if ( function_exists('yith_wcwl_count_products') ) { ?>
                                                    <span class="count"><?php echo yith_wcwl_count_products(); ?></span>
                                                <?php } ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <?php if ( defined('GREENORGANIC_WOOCOMMERCE_ACTIVED') && greenorganic_get_config('show_cartbtn') ): ?>
                                        <div class="pull-right">
                                            <?php get_template_part( 'woocommerce/cart/mini-cart-button' ); ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ( greenorganic_get_config('show_searchform') ): ?>
                                        <div class="pull-right">
                                            <div class="apus-search-top dropdown clearfix">
                                                <button type="button" class="button-show-search dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>