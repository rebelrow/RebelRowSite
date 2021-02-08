<?php
/**
 * Functions which enhance the theme
 *
 * @package Blog_Aarambha
 */

/**
 * Adds Sidebar In Blog Aarambha
 * @return string|null
 */
function blog_aarambha_sidebar()
{
    if (!is_404()) {

        if (is_page() && get_theme_mod('general_sidebar_page_checkbox',1) != true){
            return null;
        }

        if (is_archive() && get_theme_mod('general_sidebar_archive_checkbox',1) != true){
            return null;
        }

        if (is_singular() && get_theme_mod('general_sidebar_single_checkbox',1) != true){
            return null;
        }

        if (is_active_sidebar('sidebar-2')){
            $sidebar = get_theme_mod('blog_sidebar','right');

            if ($sidebar == 'left' && !is_home()) {
                return 'right-sidebar';
            } elseif ($sidebar == 'right' && !is_home()) {
                return 'left-sidebar';
            } elseif ($sidebar == 'both-sidebar' && !is_home()) {
                return 'both-sidebar';
            } elseif($sidebar == 'no-sidebar') {
                return 'no-sidebar';
            }
        }else{
            return null;
        }
    }
}

/**
 *  Social Icons
 */
function blog_aarambha_icon(){
    wp_nav_menu(array(
        'theme_location'  => 'social-icon',
        'container_class' => 'social-links',
    ));
}

/**
 * Search Bar and Mini Cart
 */
function blog_aarambha_search_bar_cart(){
    if (class_exists( 'WooCommerce' )):
        ?>
        <a href="JavaScript:void(0)" class="header-cart-views">
            <i class="fa fa-shopping-basket" aria-hidden="true"></i>
            <span class="cart-quantity"><?php echo wp_kses_data(wc()->cart->get_cart_contents_count()); ?></span>
            <div class="widget widget_shopping_cart">
                <div class="mini_cart_inner">
                    <?php
                    $args = [
                        'before_widget' => '<div class="widget woocommerce">',
                        'after_widget'  => '</div>'
                    ];
                    the_widget( 'WC_Widget_Cart','', $args ); ?>
                </div>
            </div>
        </a>
    <?php endif;?>
    <div class="search-section ">
        <a href="JavaScript:void(0)" class="search-toggle"><i class="fa fa-search" aria-hidden="true"></i></a>
        <?php get_search_form(); ?>
    </div><!-- .search-section -->
    <?php
}

/**
 * Top Header Menu
 */
function blog_aarambha_top_header_menu(){


    wp_nav_menu(array(
        'theme_location'  => 'header',
        'container_class' => 'top-header-menu',
        'menu_class'      => 'top-header-menu',
    ));
}

/**
 * Phone and Address
 */
function blog_aarambha_phone_address(){
    $number   = get_theme_mod('top_header_section_number','');
    $address  = get_theme_mod('top_header_section_address','');
    ?>
    <div class="number">
        <a href="tel: <?php echo absint($number)?>" target="_blank">
            <i class="fa fa-phone"></i><?php echo absint($number)?>
        </a>
    </div>
    <div class="phone">
        <i class="fa fa-address-card"></i><?php echo esc_html($address)?>
    </div>
    <?php
}

/**
 * Primary Menus
 */
function blog_aarambha_primary_menu(){
    if (wp_is_mobile()){
        return;
    }

    if (has_nav_menu('primary')){
        $arg = 'menu';
    }else{
        $arg =  'left-menu';

    }
    wp_nav_menu(array(
        'theme_location' => 'primary',
        'container_class' => 'left-menu',
        'menu_class' => esc_attr($arg)
    ));

}

/**
 * Secondary Menus
 */
function blog_aarambha_secondary_menu(){
    if (wp_is_mobile()){
        return;
    }
    if (has_nav_menu('secondary')){
        $arg = 'menu';
    }else{
        $arg =  'left-menu';

    }
    wp_nav_menu(array(
        'theme_location' => 'secondary',
        'container_class' => 'left-menu',
        'menu_class' => esc_attr($arg)
    ));
}

/**
 * Logo Section
 */
function blog_aarambha_logo(){
    ?>
    <section class="site-branding">
        <div class="brand-and-social-wrap">
            <div class="branding-wrap">
                <h1 class="site-title">
                    <?php the_custom_logo(); ?>
                </h1>
            </div><!-- branding-wrap ends here -->
            <?php if (display_header_text()):?>
                <div class="site-identity-wrap">
                    <?php
                    $description = get_bloginfo('description', 'display'); ?>
                    <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name');?></a>
                </div>
                <p class="site-description"><?php echo esc_html($description); ?></p>
            <?php endif;?>
        </div>
        <?php if (wp_is_mobile()):?>
            <div id="navbar" class="blog-mean-menu">
                <nav id="site-navigation" class="navigation main-navigation">
                    <?php   wp_nav_menu(array(
                        'theme_location'  => 'mobile',
                        'menu_class'      => 'menu'
                    ));?>
                </nav><!-- main-navigation ends here -->
            </div><!-- navbar ends here -->
        <?php endif;?>
    </section><!-- site branding ends here -->
    <?php
}

/**
 * Footer Menus
 */
function blog_aarambha_footer_menu(){
    if (has_nav_menu('footer')){
        $arg = 'menu';
    }else{
        $arg =  'footer-menu';

    }
    wp_nav_menu(array(
        'theme_location'  => 'footer',
        'container_class' => 'footer-menu',
        'menu_class'      => esc_attr($arg)
    ));
}

/**
 * Header Title
 */
function blog_aarambha_header_title(){
    if(is_archive()){
        the_archive_title();
    }elseif(!empty(get_the_title())){
        the_title();
    }else{
        esc_html_e( 'Nothing Found', 'blog-aarambha' );
    }
}

/**
 * Body Class
 * @param $classes
 * @return mixed
 */
function blog_aarambha_body_classes($classes){
    $sidebar = blog_aarambha_sidebar();
    if($sidebar){
        $classes[] = esc_attr($sidebar);
    }
    if (is_home() && !is_front_page()){
        $classes[] = 'home-template';
    }
    if (get_theme_mod('slider_section_checkbox',false) == false && is_home() && is_front_page()){
        $classes[] = 'slider-disable';
    }
    if(get_theme_mod('slider_section_checkbox',false) == true && is_home() && is_front_page()){
        $classes[] = 'slider-enable';
    }
    if (class_exists( 'WooCommerce' )) {
        $classes[] = 'woocommerce';
    }

    return $classes;
}
add_filter('body_class' , 'blog_aarambha_body_classes');

if ( ! function_exists( 'blog_aarambha_get_meta' ) ):
    /*
     *  Custom function to get the meta
     *
     */
    function blog_aarambha_get_meta( $post_id, $key, $default = null ) {
        $value = get_post_meta( $post_id, $key, true );
        if ( ! $value ) {
            $value = $default;
        }
        return $value;
    }
endif;


/**
 * Register the required plugins for this theme.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function blog_aarambha_register_required_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        array(
            'name'      => esc_html__( 'Aarambha Demo Sites', 'blog-aarambha' ), //The plugin name
            'slug'      => 'aarambha-demo-sites',  // The plugin slug (typically the folder name)
            'required'  => false,  // If false, the plugin is only 'recommended' instead of required.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
        ),

    );

    $config = array(
        'id'           => 'blog-aarambha',                  // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
    );

    tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'blog_aarambha_register_required_plugins' );

