<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */

if (!class_exists('Greenorganic_Redux_Framework_Config')) {

    class Greenorganic_Redux_Framework_Config
    {
        public $args = array();
        public $sections = array();
        public $theme;
        public $ReduxFramework;

        public function __construct()
        {
            if (!class_exists('ReduxFramework')) {
                return;
            }
            add_action('init', array($this, 'initSettings'), 10);
        }

        public function initSettings()
        {
            // Just for demo purposes. Not needed per say.
            $this->theme = wp_get_theme();

            // Set the default arguments
            $this->setArguments();

            // Create the sections and fields
            $this->setSections();

            if (!isset($this->args['opt_name'])) { // No errors please
                return;
            }

            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

        public function setSections()
        {
            global $wp_registered_sidebars;
            $sidebars = array();

            if ( !empty($wp_registered_sidebars) ) {
                foreach ($wp_registered_sidebars as $sidebar) {
                    $sidebars[$sidebar['id']] = $sidebar['name'];
                }
            }
            $columns = array( '1' => esc_html__('1 Column', 'greenorganic'),
                '2' => esc_html__('2 Columns', 'greenorganic'),
                '3' => esc_html__('3 Columns', 'greenorganic'),
                '4' => esc_html__('4 Columns', 'greenorganic'),
                '6' => esc_html__('6 Columns', 'greenorganic')
            );
            
            $general_fields = array();
            if ( !function_exists( 'wp_site_icon' ) ) {
                $general_fields[] = array(
                    'id' => 'media-favicon',
                    'type' => 'media',
                    'title' => esc_html__('Favicon Upload', 'greenorganic'),
                    'desc' => esc_html__('', 'greenorganic'),
                    'subtitle' => esc_html__('Upload a 16px x 16px .png or .gif image that will be your favicon.', 'greenorganic'),
                );
            }
            $general_fields[] = array(
                'id' => 'preload',
                'type' => 'switch',
                'title' => esc_html__('Preload Website', 'greenorganic'),
                'default' => true,
            );
            $general_fields[] = array(
                'id' => 'image_lazy_loading',
                'type' => 'switch',
                'title' => esc_html__('Image Lazy Loading', 'greenorganic'),
                'default' => true,
            );
            $general_fields[] = array(
                'id' => 'google_map_api_key',
                'type' => 'text',
                'title' => esc_html__('Google Map API Key', 'greenorganic'),
            );
            // General Settings Tab
            $this->sections[] = array(
                'icon' => 'el-icon-cogs',
                'title' => esc_html__('General', 'greenorganic'),
                'fields' => $general_fields
            );
            // Header
            $this->sections[] = array(
                'icon' => 'el el-website',
                'title' => esc_html__('Header', 'greenorganic'),
                'fields' => array(
                    array(
                        'id' => 'media-logo',
                        'type' => 'media',
                        'title' => esc_html__('Logo Upload', 'greenorganic'),
                        'subtitle' => esc_html__('Upload a .png or .gif image that will be your logo.', 'greenorganic'),
                    ),
                    array(
                        'id' => 'media-mobile-logo',
                        'type' => 'media',
                        'title' => esc_html__('Mobile Logo Upload', 'greenorganic'),
                        'subtitle' => esc_html__('Upload a .png or .gif image that will be your logo.', 'greenorganic'),
                    ),
                    array(
                        'id' => 'header_type',
                        'type' => 'select',
                        'title' => esc_html__('Header Layout Type', 'greenorganic'),
                        'subtitle' => esc_html__('Choose a header for your website.', 'greenorganic'),
                        'options' => greenorganic_get_header_layouts()
                    ),
                    array(
                        'id' => 'keep_header',
                        'type' => 'switch',
                        'title' => esc_html__('Keep Header', 'greenorganic'),
                        'default' => false
                    ),
                    array(
                        'id' => 'show_searchform',
                        'type' => 'switch',
                        'title' => esc_html__('Search Header', 'greenorganic'),
                        'default' => false
                    ),
                    array(
                        'id' => 'enable_autocompleate_search',
                        'type' => 'switch',
                        'title' => esc_html__('Enable Autocompleate Search', 'greenorganic'),
                        'default' => true,
                        'required' => array('show_searchform','=',true)
                    ),
                    array(
                        'id' => 'show_cartbtn',
                        'type' => 'switch',
                        'title' => esc_html__('Show Cart Button', 'greenorganic'),
                        'default' => true
                    ),
                    array(
                        'id' => 'show_settingmenu',
                        'type' => 'switch',
                        'title' => esc_html__('Show Settings Menu', 'greenorganic'),
                        'default' => true
                    ),
                )
            );
            // Footer
            $this->sections[] = array(
                'icon' => 'el el-website',
                'title' => esc_html__('Footer', 'greenorganic'),
                'fields' => array(
                    array(
                        'id' => 'footer_type',
                        'type' => 'select',
                        'title' => esc_html__('Footer Layout Type', 'greenorganic'),
                        'subtitle' => esc_html__('Choose a footer for your website.', 'greenorganic'),
                        'options' => greenorganic_get_footer_layouts()
                    ),
                    array(
                        'id' => 'copyright_text',
                        'type' => 'editor',
                        'title' => esc_html__('Copyright Text', 'greenorganic'),
                        'default' => 'Powered by Redux Framework.',
                        'required' => array('footer_type','=','')
                    ),
                    array (
                        'title' => esc_html__('Logo Copyright For Footer Default', 'greenorganic'),
                        'subtitle' => '<em>'.esc_html__('Logo Copyright of the site.', 'greenorganic').'</em>',
                        'id' => 'logo_copyright',
                        'type' => 'media',
                    ),
                    array(
                        'id' => 'back_to_top',
                        'type' => 'switch',
                        'title' => esc_html__('Back To Top Button', 'greenorganic'),
                        'subtitle' => esc_html__('Toggle whether or not to enable a back to top button on your pages.', 'greenorganic'),
                        'default' => true,
                    ),
                )
            );

            // Blog settings
            $this->sections[] = array(
                'icon' => 'el el-pencil',
                'title' => esc_html__('Blog', 'greenorganic'),
                'fields' => array(
                    array(
                        'id' => 'show_blog_breadcrumbs',
                        'type' => 'switch',
                        'title' => esc_html__('Breadcrumbs', 'greenorganic'),
                        'default' => 1
                    ),
                    array (
                        'title' => esc_html__('Breadcrumbs Background Color', 'greenorganic'),
                        'subtitle' => '<em>'.esc_html__('The breadcrumbs background color of the site.', 'greenorganic').'</em>',
                        'id' => 'blog_breadcrumb_color',
                        'type' => 'color',
                        'transparent' => false,
                    ),
                    array(
                        'id' => 'blog_breadcrumb_image',
                        'type' => 'media',
                        'title' => esc_html__('Breadcrumbs Background', 'greenorganic'),
                        'subtitle' => esc_html__('Upload a .jpg or .png image that will be your breadcrumbs.', 'greenorganic'),
                    ),
                )
            );
            // Archive Blogs settings
            $this->sections[] = array(
                'subsection' => true,
                'title' => esc_html__('Blog & Post Archives', 'greenorganic'),
                'fields' => array(
                    array(
                        'id' => 'blog_archive_layout',
                        'type' => 'image_select',
                        'compiler' => true,
                        'title' => esc_html__('Layout', 'greenorganic'),
                        'subtitle' => esc_html__('Select the variation you want to apply on your store.', 'greenorganic'),
                        'options' => array(
                            'main' => array(
                                'title' => esc_html__('Main Only', 'greenorganic'),
                                'alt' => esc_html__('Main Only', 'greenorganic'),
                                'img' => get_template_directory_uri() . '/inc/assets/images/screen1.png'
                            ),
                            'left-main' => array(
                                'title' => esc_html__('Left - Main Sidebar', 'greenorganic'),
                                'alt' => esc_html__('Left - Main Sidebar', 'greenorganic'),
                                'img' => get_template_directory_uri() . '/inc/assets/images/screen2.png'
                            ),
                            'main-right' => array(
                                'title' => esc_html__('Main - Right Sidebar', 'greenorganic'),
                                'alt' => esc_html__('Main - Right Sidebar', 'greenorganic'),
                                'img' => get_template_directory_uri() . '/inc/assets/images/screen3.png'
                            ),
                        ),
                        'default' => 'left-main'
                    ),
                    array(
                        'id' => 'blog_archive_fullwidth',
                        'type' => 'switch',
                        'title' => esc_html__('Is Full Width?', 'greenorganic'),
                        'default' => false
                    ),
                    array(
                        'id' => 'blog_archive_left_sidebar',
                        'type' => 'select',
                        'title' => esc_html__('Archive Left Sidebar', 'greenorganic'),
                        'subtitle' => esc_html__('Choose a sidebar for left sidebar.', 'greenorganic'),
                        'options' => $sidebars
                    ),
                    array(
                        'id' => 'blog_archive_right_sidebar',
                        'type' => 'select',
                        'title' => esc_html__('Archive Right Sidebar', 'greenorganic'),
                        'subtitle' => esc_html__('Choose a sidebar for right sidebar.', 'greenorganic'),
                        'options' => $sidebars
                        
                    ),
                    array(
                        'id' => 'blog_display_mode',
                        'type' => 'select',
                        'title' => esc_html__('Display Mode', 'greenorganic'),
                        'options' => array(
                            'grid' => esc_html__('Grid Layout', 'greenorganic'),
                            'list' => esc_html__('List Layout', 'greenorganic')
                        ),
                        'default' => 'grid'
                    ),
                    array(
                        'id' => 'blog_columns',
                        'type' => 'select',
                        'title' => esc_html__('Blog Columns', 'greenorganic'),
                        'options' => $columns,
                        'default' => 1,
                        'required' => array('blog_display_mode', '=', 'grid'),
                    ),
                    array(
                        'id' => 'blog_item_thumbsize',
                        'type' => 'text',
                        'title' => esc_html__('Thumbnail Size', 'greenorganic'),
                        'subtitle' => esc_html__('This featured for the site is using Visual Composer.', 'greenorganic'),
                        'desc' => esc_html__('Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) .', 'greenorganic'),
                    ),

                )
            );
            // Single Blogs settings
            $this->sections[] = array(
                'subsection' => true,
                'title' => esc_html__('Blog', 'greenorganic'),
                'fields' => array(
                    
                    array(
                        'id' => 'blog_single_layout',
                        'type' => 'image_select',
                        'compiler' => true,
                        'title' => esc_html__('Archive Blog Layout', 'greenorganic'),
                        'subtitle' => esc_html__('Select the variation you want to apply on your store.', 'greenorganic'),
                        'options' => array(
                            'main' => array(
                                'title' => esc_html__('Main Only', 'greenorganic'),
                                'alt' => esc_html__('Main Only', 'greenorganic'),
                                'img' => get_template_directory_uri() . '/inc/assets/images/screen1.png'
                            ),
                            'left-main' => array(
                                'title' => esc_html__('Left - Main Sidebar', 'greenorganic'),
                                'alt' => esc_html__('Left - Main Sidebar', 'greenorganic'),
                                'img' => get_template_directory_uri() . '/inc/assets/images/screen2.png'
                            ),
                            'main-right' => array(
                                'title' => esc_html__('Main - Right Sidebar', 'greenorganic'),
                                'alt' => esc_html__('Main - Right Sidebar', 'greenorganic'),
                                'img' => get_template_directory_uri() . '/inc/assets/images/screen3.png'
                            ),
                        ),
                        'default' => 'left-main'
                    ),
                    array(
                        'id' => 'blog_single_fullwidth',
                        'type' => 'switch',
                        'title' => esc_html__('Is Full Width?', 'greenorganic'),
                        'default' => false
                    ),
                    array(
                        'id' => 'blog_single_left_sidebar',
                        'type' => 'select',
                        'title' => esc_html__('Single Blog Left Sidebar', 'greenorganic'),
                        'subtitle' => esc_html__('Choose a sidebar for left sidebar.', 'greenorganic'),
                        'options' => $sidebars
                    ),
                    array(
                        'id' => 'blog_single_right_sidebar',
                        'type' => 'select',
                        'title' => esc_html__('Single Blog Right Sidebar', 'greenorganic'),
                        'subtitle' => esc_html__('Choose a sidebar for right sidebar.', 'greenorganic'),
                        'options' => $sidebars
                    ),
                    array(
                        'id' => 'show_blog_social_share',
                        'type' => 'switch',
                        'title' => esc_html__('Show Social Share', 'greenorganic'),
                        'default' => 1
                    ),
                    array(
                        'id' => 'show_blog_releated',
                        'type' => 'switch',
                        'title' => esc_html__('Show Releated Posts', 'greenorganic'),
                        'default' => 1
                    ),
                    array(
                        'id' => 'number_blog_releated',
                        'type' => 'text',
                        'title' => esc_html__('Number of related posts to show', 'greenorganic'),
                        'required' => array('show_blog_releated', '=', '1'),
                        'default' => 3,
                        'min' => '1',
                        'step' => '1',
                        'max' => '20',
                        'type' => 'slider'
                    ),
                    array(
                        'id' => 'releated_blog_columns',
                        'type' => 'select',
                        'title' => esc_html__('Releated Blogs Columns', 'greenorganic'),
                        'required' => array('show_blog_releated', '=', '1'),
                        'options' => $columns,
                        'default' => 3
                    ),

                )
            );
            // Shop
            if( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                $attributes = array();
                if ( is_admin() ) {
                    $attrs = wc_get_attribute_taxonomies();
                    if ( $attrs ) {
                        foreach ( $attrs as $tax ) {
                            $attributes[wc_attribute_taxonomy_name( $tax->attribute_name )] = $tax->attribute_label;
                        }
                    }
                }
                $this->sections[] = array(
                    'icon' => 'el el-shopping-cart',
                    'title' => esc_html__('Shop Settings', 'greenorganic'),
                    'fields' => array(
                        array (
                            'id' => 'products_brand_setting',
                            'icon' => true,
                            'type' => 'info',
                            'raw' => '<h3 style="margin: 0;"> '.esc_html__('Brands Setting', 'greenorganic').'</h3>',
                        ),
                        array(
                            'id' => 'product_brand_attribute',
                            'type' => 'select',
                            'title' => esc_html__( 'Brand Attribute', 'greenorganic' ),
                            'subtitle' => esc_html__( 'Choose a product attribute that will be used as brands', 'greenorganic' ),
                            'desc' => esc_html__( 'When you have choosed a brand attribute, you will be able to add brand image to the attributes', 'greenorganic' ),
                            'options' => $attributes
                        ),
                        array (
                            'id' => 'products_breadcrumb_setting',
                            'icon' => true,
                            'type' => 'info',
                            'raw' => '<h3 style="margin: 0;"> '.esc_html__('Breadcrumbs Setting', 'greenorganic').'</h3>',
                        ),
                        array(
                            'id' => 'show_product_breadcrumbs',
                            'type' => 'switch',
                            'title' => esc_html__('Breadcrumbs', 'greenorganic'),
                            'default' => 1
                        ),
                        array (
                            'title' => esc_html__('Breadcrumbs Background Color', 'greenorganic'),
                            'subtitle' => '<em>'.esc_html__('The breadcrumbs background color of the site.', 'greenorganic').'</em>',
                            'id' => 'woo_breadcrumb_color',
                            'type' => 'color',
                            'transparent' => false,
                        ),
                        array(
                            'id' => 'woo_breadcrumb_image',
                            'type' => 'media',
                            'title' => esc_html__('Breadcrumbs Background', 'greenorganic'),
                            'subtitle' => esc_html__('Upload a .jpg or .png image that will be your breadcrumbs.', 'greenorganic'),
                        ),
                    )
                );
                // Archive settings
                $this->sections[] = array(
                    'subsection' => true,
                    'title' => esc_html__('Product Archives', 'greenorganic'),
                    'fields' => array(
                        array (
                            'id' => 'products_general_setting',
                            'icon' => true,
                            'type' => 'info',
                            'raw' => '<h3 style="margin: 0;"> '.esc_html__('General Setting', 'greenorganic').'</h3>',
                        ),
                        array(
                            'id' => 'show_products_breadcrumbs',
                            'type' => 'switch',
                            'title' => esc_html__('Breadcrumbs', 'greenorganic'),
                            'default' => 1
                        ),
                        array(
                            'id' => 'product_display_mode',
                            'type' => 'select',
                            'title' => esc_html__('Products Layout', 'greenorganic'),
                            'subtitle' => esc_html__('Choose a default layout archive product.', 'greenorganic'),
                            'options' => array(
                                'grid' => esc_html__('Grid', 'greenorganic'),
                                'list' => esc_html__('List', 'greenorganic')
                            ),
                            'default' => 'grid'
                        ),
                        array(
                            'id' => 'product_display_mode_grid_style',
                            'type' => 'select',
                            'title' => esc_html__('Grid Style', 'greenorganic'),
                            'subtitle' => esc_html__('Choose a default product style.', 'greenorganic'),
                            'options' => array(
                                'inner' => esc_html__('Style 1', 'greenorganic'),
                                'inner3' => esc_html__('Style 2', 'greenorganic')
                            ),
                            'default' => 'inner',
                            'required' => array('product_display_mode', '=', 'grid'),
                        ),
                        array(
                            'id' => 'number_products_per_page',
                            'type' => 'text',
                            'title' => esc_html__('Number of Products Per Page', 'greenorganic'),
                            'default' => 12,
                            'min' => '1',
                            'step' => '1',
                            'max' => '100',
                            'type' => 'slider'
                        ),
                        array(
                            'id' => 'product_columns',
                            'type' => 'select',
                            'title' => esc_html__('Product Columns', 'greenorganic'),
                            'options' => $columns,
                            'default' => 4,
                            'required' => array('product_display_mode', '=', 'grid'),
                        ),
                        array(
                            'id' => 'show_quickview',
                            'type' => 'switch',
                            'title' => esc_html__('Show Quick View', 'greenorganic'),
                            'default' => 1
                        ),
                        array(
                            'id' => 'product_image_display',
                            'type' => 'select',
                            'title' => esc_html__('Product Image', 'greenorganic'),
                            'options' => array(
                                'mainimage' => esc_html__('Main Image', 'greenorganic'),
                                'swap' => esc_html__('Swap Image', 'greenorganic'),
                            ),
                            'default' => 'mainimage'
                        ),
                        array(
                            'id' => 'product_pagination',
                            'type' => 'select',
                            'title' => esc_html__('Pagination Type', 'greenorganic'),
                            'options' => array(
                                'default' => esc_html__('Default', 'greenorganic'),
                                'loadmore' => esc_html__('Load More Button', 'greenorganic'),
                                'infinite' => esc_html__('Infinite Scrolling', 'greenorganic'),
                            ),
                            'default' => 'default'
                        ),
                        array (
                            'id' => 'products_top_setting',
                            'icon' => true,
                            'type' => 'info',
                            'raw' => '<h3 style="margin: 0;"> '.esc_html__('Top Sidebar Setting', 'greenorganic').'</h3>',
                        ),
                        array(
                            'id' => 'product_archive_top_sidebar',
                            'type' => 'switch',
                            'title' => esc_html__('Show Top Sidebar?', 'greenorganic'),
                            'default' => true,
                        ),
                        array(
                            'id' => 'product_archive_filter_sidebar',
                            'type' => 'switch',
                            'title' => esc_html__('Show Top Filter Sidebar?', 'greenorganic'),
                            'default' => true,
                            'required' => array('product_archive_top_sidebar', '=', true),
                        ),
                        array(
                            'id' => 'product_archive_orderby',
                            'type' => 'switch',
                            'title' => esc_html__('Show Top Orderby?', 'greenorganic'),
                            'default' => true,
                            'required' => array('product_archive_top_sidebar', '=', true),
                        ),
                        array(
                            'id' => 'product_archive_top_categories',
                            'type' => 'switch',
                            'title' => esc_html__('Show Top Categories?', 'greenorganic'),
                            'default' => true,
                            'required' => array('product_archive_top_sidebar', '=', true),
                        ),
                        array(
                            'id' => 'product_archive_categories_type',
                            'type' => 'select',
                            'title' => esc_html__('Top Categories Type', 'greenorganic'),
                            'options' => array(
                                'list' => esc_html__('List', 'greenorganic'),
                                'dropdown' => esc_html__('Dropdown', 'greenorganic'),
                            ),
                            'default' => 'list',
                            'required' => array('product_archive_top_sidebar', '=', true),
                        ),
                        array (
                            'id' => 'products_sidebar_setting',
                            'icon' => true,
                            'type' => 'info',
                            'raw' => '<h3 style="margin: 0;"> '.esc_html__('Sidebar Setting', 'greenorganic').'</h3>',
                        ),
                        array(
                            'id' => 'product_archive_fullwidth',
                            'type' => 'switch',
                            'title' => esc_html__('Is Full Width?', 'greenorganic'),
                            'default' => false
                        ),
                        array(
                            'id' => 'product_archive_layout',
                            'type' => 'image_select',
                            'compiler' => true,
                            'title' => esc_html__('Archive Product Layout', 'greenorganic'),
                            'subtitle' => esc_html__('Select the layout you want to apply on your archive product page.', 'greenorganic'),
                            'options' => array(
                                'main' => array(
                                    'title' => esc_html__('Main Content', 'greenorganic'),
                                    'alt' => esc_html__('Main Content', 'greenorganic'),
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen1.png'
                                ),
                                'left-main' => array(
                                    'title' => esc_html__('Left Sidebar - Main Content', 'greenorganic'),
                                    'alt' => esc_html__('Left Sidebar - Main Content', 'greenorganic'),
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen2.png'
                                ),
                                'main-right' => array(
                                    'title' => esc_html__('Main Content - Right Sidebar', 'greenorganic'),
                                    'alt' => esc_html__('Main Content - Right Sidebar', 'greenorganic'),
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen3.png'
                                ),
                            ),
                            'default' => 'left-main'
                        ),
                        array(
                            'id' => 'product_archive_left_sidebar',
                            'type' => 'select',
                            'title' => esc_html__('Archive Left Sidebar', 'greenorganic'),
                            'subtitle' => esc_html__('Choose a sidebar for left sidebar.', 'greenorganic'),
                            'options' => $sidebars
                        ),
                        array(
                            'id' => 'product_archive_right_sidebar',
                            'type' => 'select',
                            'title' => esc_html__('Archive Right Sidebar', 'greenorganic'),
                            'subtitle' => esc_html__('Choose a sidebar for right sidebar.', 'greenorganic'),
                            'options' => $sidebars
                        ),
                    )
                );
                // Product Page
                $this->sections[] = array(
                    'subsection' => true,
                    'title' => esc_html__('Single Product', 'greenorganic'),
                    'fields' => array(
                        array (
                            'id' => 'product_general_setting',
                            'icon' => true,
                            'type' => 'info',
                            'raw' => '<h3 style="margin: 0;"> '.esc_html__('General Setting', 'greenorganic').'</h3>',
                        ),
                        array(
                            'id' => 'show_product_breadcrumbs',
                            'type' => 'switch',
                            'title' => esc_html__('Breadcrumbs', 'greenorganic'),
                            'default' => 1
                        ),
                        array(
                            'id' => 'show_product_social_share',
                            'type' => 'switch',
                            'title' => esc_html__('Show Social Share', 'greenorganic'),
                            'default' => 1
                        ),
                        array(
                            'id' => 'show_product_review_tab',
                            'type' => 'switch',
                            'title' => esc_html__('Show Product Review Tab', 'greenorganic'),
                            'default' => 1
                        ),
                        array(
                            'id' => 'show_product_releated',
                            'type' => 'switch',
                            'title' => esc_html__('Show Products Releated', 'greenorganic'),
                            'default' => 1
                        ),
                        array(
                            'id' => 'show_product_upsells',
                            'type' => 'switch',
                            'title' => esc_html__('Show Products upsells', 'greenorganic'),
                            'default' => 1
                        ),
                        array(
                            'id' => 'number_product_releated',
                            'title' => esc_html__('Number of related/upsells products to show', 'greenorganic'),
                            'default' => 4,
                            'min' => '1',
                            'step' => '1',
                            'max' => '20',
                            'type' => 'slider'
                        ),
                        array(
                            'id' => 'releated_product_columns',
                            'type' => 'select',
                            'title' => esc_html__('Releated Products Columns', 'greenorganic'),
                            'options' => $columns,
                            'default' => 4
                        ),
                        array (
                            'id' => 'product_sidebar_setting',
                            'icon' => true,
                            'type' => 'info',
                            'raw' => '<h3 style="margin: 0;"> '.esc_html__('Sidebar Setting', 'greenorganic').'</h3>',
                        ),
                        array(
                            'id' => 'product_single_layout',
                            'type' => 'image_select',
                            'compiler' => true,
                            'title' => esc_html__('Single Product Layout', 'greenorganic'),
                            'subtitle' => esc_html__('Select the layout you want to apply on your Single Product Page.', 'greenorganic'),
                            'options' => array(
                                'main' => array(
                                    'title' => esc_html__('Main Only', 'greenorganic'),
                                    'alt' => esc_html__('Main Only', 'greenorganic'),
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen1.png'
                                ),
                                'left-main' => array(
                                    'title' => esc_html__('Left - Main Sidebar', 'greenorganic'),
                                    'alt' => esc_html__('Left - Main Sidebar', 'greenorganic'),
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen2.png'
                                ),
                                'main-right' => array(
                                    'title' => esc_html__('Main - Right Sidebar', 'greenorganic'),
                                    'alt' => esc_html__('Main - Right Sidebar', 'greenorganic'),
                                    'img' => get_template_directory_uri() . '/inc/assets/images/screen3.png'
                                ),
                            ),
                            'default' => 'left-main'
                        ),
                        array(
                            'id' => 'product_single_fullwidth',
                            'type' => 'switch',
                            'title' => esc_html__('Is Full Width?', 'greenorganic'),
                            'default' => false
                        ),
                        array(
                            'id' => 'product_single_left_sidebar',
                            'type' => 'select',
                            'title' => esc_html__('Single Product Left Sidebar', 'greenorganic'),
                            'subtitle' => esc_html__('Choose a sidebar for left sidebar.', 'greenorganic'),
                            'options' => $sidebars
                        ),
                        array(
                            'id' => 'product_single_right_sidebar',
                            'type' => 'select',
                            'title' => esc_html__('Single Product Right Sidebar', 'greenorganic'),
                            'subtitle' => esc_html__('Choose a sidebar for right sidebar.', 'greenorganic'),
                            'options' => $sidebars
                        ),
                        

                    )
                );
            }
            // 404 page
            $this->sections[] = array(
                'title' => esc_html__('404 Page', 'greenorganic'),
                'fields' => array(
                    array(
                        'id' => '404_title',
                        'type' => 'text',
                        'title' => esc_html__('Title', 'greenorganic'),
                        'default' => '404'
                    ),
                    array(
                        'id' => '404_subtitle',
                        'type' => 'text',
                        'title' => esc_html__('SubTitle', 'greenorganic'),
                        'default' => 'Opps! Page Not Be Found'
                    ),
                    array(
                        'id' => '404_description',
                        'type' => 'editor',
                        'title' => esc_html__('Description', 'greenorganic'),
                        'default' => 'Sorry but the page you are looking for does not exist, have been removed, name changed or is temporarity unavailable.'
                    )
                )
            );
            
            // Style
            $this->sections[] = array(
                'icon' => 'el el-icon-css',
                'title' => esc_html__('Style', 'greenorganic'),
                'fields' => array(
                    array (
                        'title' => esc_html__('Main Theme Color', 'greenorganic'),
                        'subtitle' => '<em>'.esc_html__('The main color of the site.', 'greenorganic').'</em>',
                        'id' => 'main_color',
                        'type' => 'color',
                        'transparent' => false,
                    ),
                    array (
                        'title' => esc_html__('Button Theme Color', 'greenorganic'),
                        'subtitle' => '<em>'.esc_html__('Button color of the site.', 'greenorganic').'</em>',
                        'id' => 'button_color',
                        'type' => 'color',
                        'transparent' => false,
                    ),
                    array (
                        'title' => esc_html__('Button Hover Theme Color', 'greenorganic'),
                        'subtitle' => '<em>'.esc_html__('Button Hover color of the site.', 'greenorganic').'</em>',
                        'id' => 'button_hover_color',
                        'type' => 'color',
                        'transparent' => false,
                    ),
                )
            );
            $this->sections[] = array(
                'subsection' => true,
                'title' => esc_html__('Typography', 'greenorganic'),
                'fields' => array(
                    array(
                        'title'    => esc_html__('Font Source', 'greenorganic'),
                        'subtitle' => '<em>'.esc_html__('Choose the Font Source', 'greenorganic').'</em>',
                        'id'       => 'font_source',
                        'type'     => 'radio',
                        'options'  => array(
                            '1' => 'Standard + Google Webfonts',
                            '2' => 'Google Custom'
                        ),
                        'default' => '2'
                    ),
                    array(
                        'id'=>'font_google_code',
                        'type' => 'text',
                        'title' => esc_html__('Google Code', 'greenorganic'), 
                        'subtitle' => '<em>'.esc_html__('Paste the provided Google Code', 'greenorganic').'</em>',
                        'default' => 'https://fonts.googleapis.com/css?family=Yantramanav|Poppins:400,700',
                        'required' => array('font_source','=','2')
                    ),
                    array (
                        'id' => 'main_font_info',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style="margin: 0;"> '.esc_html__('Main Font', 'greenorganic').'</h3>',
                    ),
                    // Standard + Google Webfonts
                    array (
                        'title' => esc_html__('Font Face', 'greenorganic'),
                        'subtitle' => '<em>'.esc_html__('Pick the Main Font for your site.', 'greenorganic').'</em>',
                        'id' => 'main_font',
                        'type' => 'typography',
                        'line-height' => false,
                        'text-align' => false,
                        'font-style' => false,
                        'font-weight' => false,
                        'all_styles'=> true,
                        'font-size' => false,
                        'color' => false,
                        'default' => array (
                            'font-family' => 'Montserrat',
                            'subsets' => '',
                        ),
                        'required' => array('font_source','=','1')
                    ),
                    
                    // Google Custom                        
                    array (
                        'title' => esc_html__('Google Font Face', 'greenorganic'),
                        'subtitle' => '<em>'.esc_html__('Enter your Google Font Name for the theme\'s Main Typography', 'greenorganic').'</em>',
                        'desc' => esc_html__('e.g.: open sans', 'greenorganic'),
                        'id' => 'main_google_font_face',
                        'type' => 'text',
                        'default' => 'Poppins',
                        'required' => array('font_source','=','2')
                    ),

                    array (
                        'id' => 'secondary_font_info',
                        'icon' => true,
                        'type' => 'info',
                        'raw' => '<h3 style="margin: 0;"> '.esc_html__(' Secondary Font', 'greenorganic').'</h3>',
                    ),
                    
                    // Standard + Google Webfonts
                    array (
                        'title' => esc_html__('Font Face', 'greenorganic'),
                        'subtitle' => '<em>'.esc_html__('Pick the Secondary Font for your site.', 'greenorganic').'</em>',
                        'id' => 'secondary_font',
                        'type' => 'typography',
                        'line-height' => false,
                        'text-align' => false,
                        'font-style' => false,
                        'font-weight' => false,
                        'all_styles'=> true,
                        'font-size' => false,
                        'color' => false,
                        'default' => array (
                            'font-family' => 'Pontano Sans',
                            'subsets' => '',
                        ),
                        'required' => array('font_source','=','1')
                    ),
                    
                    // Google Custom                        
                    array (
                        'title' => esc_html__('Google Font Face', 'greenorganic'),
                        'subtitle' => '<em>'.esc_html__('Enter your Google Font Name for the theme\'s Secondary Typography', 'greenorganic').'</em>',
                        'desc' => esc_html__('e.g.: open sans', 'greenorganic'),
                        'id' => 'secondary_google_font_face',
                        'type' => 'text',
                        'default' => 'Yantramanav',
                        'required' => array('font_source','=','2')
                    ),
                )
            );
            $this->sections[] = array(
                'subsection' => true,
                'title' => esc_html__('Top Bar', 'greenorganic'),
                'fields' => array(
                    array(
                        'id'=>'topbar_bg',
                        'type' => 'background',
                        'title' => esc_html__('Background', 'greenorganic'),
                        'default' => array(
                            'background-color' => ''
                        )
                    ),
                    array(
                        'title' => esc_html__('Text Color', 'greenorganic'),
                        'id' => 'topbar_text_color',
                        'type' => 'color',
                        'transparent' => false,
                        'default' => '',
                    ),
                    array(
                        'title' => esc_html__('Link Color', 'greenorganic'),
                        'id' => 'topbar_link_color',
                        'type' => 'color',
                        'transparent' => false,
                        'default' => '',
                    ),
                )
            );
            $this->sections[] = array(
                'subsection' => true,
                'title' => esc_html__('Header', 'greenorganic'),
                'fields' => array(
                    array(
                        'id'=>'header_bg',
                        'type' => 'background',
                        'title' => esc_html__('Background', 'greenorganic'),
                        'default' => array(
                            'background-color' => ''
                        )
                    ),
                    array(
                        'title' => esc_html__('Text Color', 'greenorganic'),
                        'id' => 'header_text_color',
                        'type' => 'color',
                        'transparent' => false,
                        'default' => '',
                    ),
                    array(
                        'title' => esc_html__('Link Color', 'greenorganic'),
                        'id' => 'header_link_color',
                        'type' => 'color',
                        'transparent' => false,
                        'default' => '',
                    ),
                    array(
                        'title' => esc_html__('Link Color Active', 'greenorganic'),
                        'id' => 'header_link_color_active',
                        'type' => 'color',
                        'transparent' => false,
                        'default' => '',
                    ),
                )
            );
            $this->sections[] = array(
                'subsection' => true,
                'title' => esc_html__('Main Menu', 'greenorganic'),
                'fields' => array(
                    array(
                        'title' => esc_html__('Link Color', 'greenorganic'),
                        'id' => 'main_menu_link_color',
                        'type' => 'color',
                        'transparent' => false,
                        'default' => '',
                    ),
                    array(
                        'title' => esc_html__('Link Color Active', 'greenorganic'),
                        'id' => 'main_menu_link_color_active',
                        'type' => 'color',
                        'transparent' => false,
                        'default' => '',
                    ),
                )
            );
            $this->sections[] = array(
                'subsection' => true,
                'title' => esc_html__('Footer', 'greenorganic'),
                'fields' => array(
                    array(
                        'id'=>'footer_bg',
                        'type' => 'background',
                        'title' => esc_html__('Background', 'greenorganic'),
                        'default' => array(
                            'background-color' => ''
                        )
                    ),
                    array(
                        'title' => esc_html__('Heading Color', 'greenorganic'),
                        'id' => 'footer_heading_color',
                        'type' => 'color',
                        'transparent' => false,
                        'default' => '',
                    ),
                    array(
                        'title' => esc_html__('Text Color', 'greenorganic'),
                        'id' => 'footer_text_color',
                        'type' => 'color',
                        'transparent' => false,
                        'default' => '',
                    ),
                    array(
                        'title' => esc_html__('Link Color', 'greenorganic'),
                        'id' => 'footer_link_color',
                        'type' => 'color',
                        'transparent' => false,
                        'default' => '',
                    ),
                    array(
                        'title' => esc_html__('Link Color Hover', 'greenorganic'),
                        'id' => 'footer_link_color_hover',
                        'type' => 'color',
                        'transparent' => false,
                        'default' => '',
                    ),
                )
            );
            
            $this->sections[] = array(
                'subsection' => true,
                'title' => esc_html__('Copyright', 'greenorganic'),
                'fields' => array(
                    array(
                        'id'=>'copyright_bg',
                        'type' => 'background',
                        'title' => esc_html__('Background', 'greenorganic'),
                        'default' => array(
                            'background-color' => ''
                        )
                    ),
                    array(
                        'title' => esc_html__('Text Color', 'greenorganic'),
                        'id' => 'copyright_text_color',
                        'type' => 'color',
                        'transparent' => false,
                        'default' => '',
                    ),
                    array(
                        'title' => esc_html__('Link Color', 'greenorganic'),
                        'id' => 'copyright_link_color',
                        'type' => 'color',
                        'transparent' => false,
                        'default' => '',
                    ),
                    array(
                        'title' => esc_html__('Link Color Hover', 'greenorganic'),
                        'id' => 'copyright_link_color_hover',
                        'type' => 'color',
                        'transparent' => false,
                        'default' => '',
                    ),
                )
            );

            // Social Media
            $this->sections[] = array(
                'icon' => 'el el-file',
                'title' => esc_html__('Social Media', 'greenorganic'),
                'fields' => array(
                    array(
                        'id' => 'facebook_share',
                        'type' => 'switch',
                        'title' => esc_html__('Enable Facebook Share', 'greenorganic'),
                        'default' => 1
                    ),
                    array(
                        'id' => 'twitter_share',
                        'type' => 'switch',
                        'title' => esc_html__('Enable twitter Share', 'greenorganic'),
                        'default' => 1
                    ),
                    array(
                        'id' => 'linkedin_share',
                        'type' => 'switch',
                        'title' => esc_html__('Enable linkedin Share', 'greenorganic'),
                        'default' => 1
                    ),
                    array(
                        'id' => 'tumblr_share',
                        'type' => 'switch',
                        'title' => esc_html__('Enable tumblr Share', 'greenorganic'),
                        'default' => 1
                    ),
                    array(
                        'id' => 'google_share',
                        'type' => 'switch',
                        'title' => esc_html__('Enable google plus Share', 'greenorganic'),
                        'default' => 1
                    ),
                    array(
                        'id' => 'pinterest_share',
                        'type' => 'switch',
                        'title' => esc_html__('Enable pinterest Share', 'greenorganic'),
                        'default' => 1
                    )
                )
            );
            
            $this->sections[] = array(
                'title' => esc_html__('Import / Export', 'greenorganic'),
                'desc' => esc_html__('Import and Export your Redux Framework settings from file, text or URL.', 'greenorganic'),
                'icon' => 'el-icon-refresh',
                'fields' => array(
                    array(
                        'id' => 'opt-import-export',
                        'type' => 'import_export',
                        'title' => 'Import Export',
                        'subtitle' => 'Save and restore your Redux options',
                        'full_width' => false,
                    ),
                ),
            );

            $this->sections[] = array(
                'type' => 'divide',
            );


        }
        /**
         * All the possible arguments for Redux.
         * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
         * */
        public function setArguments()
        {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.
            
            $preset = greenorganic_get_demo_preset();
            $this->args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name' => 'greenorganic_theme_options'.$preset,
                // This is where your data is stored in the database and also becomes your global variable name.
                'display_name' => $theme->get('Name'),
                // Name that appears at the top of your panel
                'display_version' => $theme->get('Version'),
                // Version that appears at the top of your panel
                'menu_type' => 'menu',
                //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu' => true,
                // Show the sections below the admin menu item or not
                'menu_title' => esc_html__('Theme Options', 'greenorganic'),
                'page_title' => esc_html__('Theme Options', 'greenorganic'),

                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'google_api_key' => '',
                // Set it you want google fonts to update weekly. A google_api_key value is required.
                'google_update_weekly' => false,
                // Must be defined to add google fonts to the typography module
                'async_typography' => true,
                // Use a asynchronous font on the front end or font string
                //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
                'admin_bar' => true,
                // Show the panel pages on the admin bar
                'admin_bar_icon' => 'dashicons-portfolio',
                // Choose an icon for the admin bar menu
                'admin_bar_priority' => 50,
                // Choose an priority for the admin bar menu
                'global_variable' => 'apus_options',
                // Set a different name for your global variable other than the opt_name
                'dev_mode' => false,
                // Show the time the page took to load, etc
                'update_notice' => true,
                // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
                'customizer' => true,
                // Enable basic customizer support
                //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
                //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

                // OPTIONAL -> Give you extra features
                'page_priority' => null,
                // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent' => 'themes.php',
                // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                'page_permissions' => 'manage_options',
                // Permissions needed to access the options panel.
                'menu_icon' => '',
                // Specify a custom URL to an icon
                'last_tab' => '',
                // Force your panel to always open to a specific tab (by id)
                'page_icon' => 'icon-themes',
                // Icon displayed in the admin panel next to your menu_title
                'page_slug' => '_options',
                // Page slug used to denote the panel
                'save_defaults' => true,
                // On load save the defaults to DB before user clicks save or not
                'default_show' => false,
                // If true, shows the default value next to each field that is not the default value.
                'default_mark' => '',
                // What to print by the field's title if the value shown is default. Suggested: *
                'show_import_export' => true,
                // Shows the Import/Export panel when not used as a field.

                // CAREFUL -> These options are for advanced use only
                'transient_time' => 60 * MINUTE_IN_SECONDS,
                'output' => true,
                // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag' => true,
                // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database' => '',
                // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                'system_info' => false,
                // REMOVE
                'use_cdn' => true,
                // HINTS
                'hints' => array(
                    'icon' => 'icon-question-sign',
                    'icon_position' => 'right',
                    'icon_color' => 'lightgray',
                    'icon_size' => 'normal',
                    'tip_style' => array(
                        'color' => 'light',
                        'shadow' => true,
                        'rounded' => false,
                        'style' => '',
                    ),
                    'tip_position' => array(
                        'my' => 'top left',
                        'at' => 'bottom right',
                    ),
                    'tip_effect' => array(
                        'show' => array(
                            'effect' => 'slide',
                            'duration' => '500',
                            'event' => 'mouseover',
                        ),
                        'hide' => array(
                            'effect' => 'slide',
                            'duration' => '500',
                            'event' => 'click mouseleave',
                        ),
                    ),
                )
            );

            $this->args['intro_text'] = '';

            // Add content after the form.
            $this->args['footer_text'] = '';
            return $this->args;
        }

    }

    global $reduxConfig;
    $reduxConfig = new Greenorganic_Redux_Framework_Config();
}