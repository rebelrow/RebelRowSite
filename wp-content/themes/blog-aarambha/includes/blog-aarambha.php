<?php
/**
 * Blog_Aarambha_Raw
 * @package Blog_aarambha
 */
class Blog_Aarambha_Raw
{
    /**
     * Blog_Aarambha_Raw constructor.
     */
    public function __construct()
    {
        $this->loads_actions();
        $this->loads_customizer();
        $this->loads_widgets();
        $this->loads_metabox();
        $this->register_menu();
        $this->theme_sidebar();
        $this->blog_aarambha_add_image_size();

    }

    /**
     * Loads Actions
     */
    public function loads_actions()
    {
        add_action( 'wp_enqueue_scripts', [ $this ,'blog_aarambha_enqueue_scripts' ] );
        add_action( 'wp_enqueue_scripts', [ $this ,'add_inline_styles'] );
        add_action( 'widgets_init', [ $this,'theme_sidebar'] );
        add_action( 'after_setup_theme',  [ $this ,'blog_aarambha_custom_logo_setup'] );
        add_action( 'after_setup_theme',  [ $this ,'blog_aarambha_custom_header'] );
        add_action( 'after_setup_theme', [ $this,'blog_aarambha_content_width'], 0 );

    }

    /**
     * Loads Customizer
     */
    public function loads_customizer(){

        $customizers = ['customizer'];

        foreach ($customizers as $customizer){

            require_once  BLOG_AARAMBHA_CUSTOMIZER_URI . $customizer . '.php';
        }

        /**
         * Loading custom sanitizer
         */
        $sanitizers = ['customizer-sanitization'];

        foreach ($sanitizers as $sanitizer){

            require_once BLOG_AARAMBHA_SANITIZATION . $sanitizer .'.php';
        }
    }

    /**
     * Loads Widgets
     */
    public function loads_widgets(){
        //File Name
        $widgets = ['blog','recent-posts','social-icon'];

        foreach ($widgets as $widget){

            require_once BLOG_AARAMBHA_WIDGETS . $widget . '.php';
        }
    }
    /**
     * Loads Metaboxes
     */

    public function loads_metabox(){
        $metaboxes = ['metabox-page'];

        foreach ($metaboxes as $metabox){
            require_once BLOG_AARAMBHA_METABOX . $metabox . '.php';
        }
    }

    /**
     * Set the content width in pixels, based on the theme's design and stylesheet.
     *
     * Priority 0 to make it available to lower priority callbacks.
     *
     * @global int $content_width
     */
    function blog_aarambha_content_width() {
        load_theme_textdomain( 'blog-aarambha', BLOG_AARAMBHA_ROOT_URI . '/languages' );

        // This variable is intended to be overruled from themes.
        // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
        // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
        $GLOBALS['content_width'] = apply_filters( 'blog_aarambha_content_width', 640 );
    }

    /**
     * Registers Sidebar
     */
    public function theme_sidebar(){

        register_sidebar( array(
            'name'          => esc_html__( 'Home Sidebar', 'blog-aarambha' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Sidebar for homepage', 'blog-aarambha' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4 class="widget-title" >',
            'after_title'   => '</h4>',
        ) );
        register_sidebar( array(
            'name'          => esc_html__( 'Sidebar', 'blog-aarambha' ),
            'id'            => 'sidebar-2',
            'description'   => esc_html__( 'Sidebar for other page', 'blog-aarambha' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4 class="widget-title" >',
            'after_title'   => '</h4>',
        ) );
        register_sidebar( array(
            'name'          => esc_html__( 'Both Sidebar', 'blog-aarambha' ),
            'id'            => 'sidebar-3',
            'description'   => esc_html__( 'Sidebar both', 'blog-aarambha' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4 class="widget-title" >',
            'after_title'   => '</h4>',
        ) );


        register_sidebar( array(
            'name'          => esc_html__( 'Subscribe news', 'blog-aarambha' ),
            'id'            => 'subscribe-footer-bar',
            'description'   => esc_html__( 'Adds subscription news on footer', 'blog-aarambha' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s widget widget_subscription">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4 class="widget-title" >',
            'after_title'   => '</h4>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Footer bar 1', 'blog-aarambha' ),
            'id'            => 'footer-bar-1',
            'description'   => esc_html__( 'Adds subscription news on footer', 'blog-aarambha' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4 class="widget-title" >',
            'after_title'   => '</h4>',
        ) );
        register_sidebar( array(
            'name'          => esc_html__( 'Footer bar 2', 'blog-aarambha' ),
            'id'            => 'footer-bar-2',
            'description'   => esc_html__( 'Adds subscription news on footer', 'blog-aarambha' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4 class="widget-title" >',
            'after_title'   => '</h4>',
        ) );
        register_sidebar( array(
            'name'          => esc_html__( 'Footer bar 3', 'blog-aarambha' ),
            'id'            => 'footer-bar-3',
            'description'   => esc_html__( 'Adds subscription news on footer', 'blog-aarambha' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4 class="widget-title" >',
            'after_title'   => '</h4>',
        ) );

    }

    /**
     * Adds Inline Style
     */
    public function add_inline_styles(){
        wp_enqueue_style(
            'blog-aarambha-style',
            BLOG_AARAMBHA_CSS_URI . '/style.css'
        );
        $top_bar_background_color                = get_theme_mod('top_header_section_background_color', '#404040' );
        $top_menu_color                          = get_theme_mod('top_header_section_menu_color' ,'#fff');
        $main_bar_background_color               = get_theme_mod('main_header_navbar_background_color','#f4f3f3');
        $quotes_section_title_color              = get_theme_mod('quotes_section_title_color' ,'#111111');
        $quotes_section_content_color            = get_theme_mod('quotes_section_content_color','#111111');
        $footer_bar_background_color             = get_theme_mod('footer_bar_background_color','#f4f3f3');
        $copy_right_color                        = get_theme_mod('footer_bar_copy_right_color','#111111');
        $footer_menu_color                       = get_theme_mod('footer_bar_menu_color','#111111');
        $border_width                            = get_theme_mod('blog_border_slider_range',1);
        $blog_aarambha_sidebar_show_checkbox     = get_theme_mod('blog_sidebar' , 'right');
        $phone_address_color                     = get_theme_mod('top_header_section_phone_address_color','#fffff');
        $header_text_color                       = get_theme_mod('header_textcolor' ,'#111111');

        $custom_css = '
                .top-header{
                        background: '. esc_attr($top_bar_background_color).'
                }
                .top-header-menu ul li a{
                        color:'.esc_attr($top_menu_color).'
                }
                .hgroup-wrap{
                        background:'.esc_attr($main_bar_background_color).'
                }
                .quote-section h4.entry-title{
                        color:'.esc_attr($quotes_section_title_color).'
                }
                .quote-section q{
                        color:'.esc_attr($quotes_section_content_color).'
                }
                .bottom-footer {
                        background: '.esc_attr($footer_bar_background_color).'
                }
                .bottom-footer span{
                        color:'.esc_attr($copy_right_color).'
                }
                .footer-menu ul li a {
                        color:'.esc_attr($footer_menu_color).'
                }
                .blog-section .post-content {
                       border-width: '.esc_attr($border_width).'px
                }
                .section-left, .section-wrap-sidebar{
                           float: '.esc_attr($blog_aarambha_sidebar_show_checkbox).'
                }
                .top-header-right{
                           color:'.esc_attr($phone_address_color).'
                }
                .brand-and-social-wrap{
                           color:#'.esc_attr($header_text_color).'
                }
                ';
        wp_add_inline_style( 'blog-aarambha-style', $custom_css );

    }

    /**
     * Registers Menus and Adds theme support
     */
    public function register_menu(){

        add_theme_support('title-tag');
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'custom-background', apply_filters( 'blog_aarambha_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        register_nav_menus( array(

            'header'      => esc_html__('Header menus','blog-aarambha'),
            'primary'     => esc_html__('Primary menus','blog-aarambha'),
            'secondary'   => esc_html__('Secondary menus','blog-aarambha'),
            'social-icon' => esc_html__('Social Icons','blog-aarambha'),
            'mobile'      => esc_html__('Mobile menus' ,'blog-aarambha'),
            'footer'      => esc_html__('Footers menus','blog-aarambha'),
        ));
    }

    /**
     * Registers Custom Logo
     */
    public function blog_aarambha_custom_logo_setup() {
        $defaults = array(
            'height'      => 100,
            'width'       => 400,
            'flex-height' => true,
            'flex-width'  => true,
        );
        add_theme_support( 'custom-logo', $defaults );
    }

    /**
     * Registers Custom Header Image
     */
    public function blog_aarambha_custom_header(){
        $defaults = array(
            'height'      => 570,
            'width'       => 1850,
            'flex-height' => true,
            'flex-width'  => true,
        );
        add_theme_support( 'custom-header', $defaults );

    }

    /**
     *  Register image size
     */
    public function blog_aarambha_add_image_size(){

        add_image_size('blog-aarambha_slider',1400,600,true);
        add_image_size('blog-aarambha_featured_post',360,260,true);

    }

    /**
     * Loads scripts and styles
     */
    public function blog_aarambha_enqueue_scripts()
    {
        wp_enqueue_style('font-awesome'         ,BLOG_AARAMBHA_CSS_URI . 'font-awesome.min.css');
        wp_enqueue_style('slick'                ,BLOG_AARAMBHA_CSS_URI . 'slick.css');
        wp_enqueue_style('slick-theme'          ,BLOG_AARAMBHA_CSS_URI . 'slick-theme.css');
        wp_enqueue_style('meanmenu'             ,BLOG_AARAMBHA_CSS_URI . 'meanmenu.css');
        wp_enqueue_style('magnific-popup'       ,BLOG_AARAMBHA_CSS_URI . 'magnific-popup.css');
        wp_enqueue_style('font-google'          ,'https://fonts.googleapis.com/css?family=Pathway+Gothic+One|Roboto+Condensed:300,300i,400,400i,700,700i');
        wp_enqueue_style('blog-aarambha-style'  ,BLOG_AARAMBHA_THEME_URI. 'style.css');
        wp_enqueue_style('blog-aarambha-responsive'  ,BLOG_AARAMBHA_CSS_URI . 'responsive.css');

        wp_enqueue_script('jquery-slick'            ,BLOG_AARAMBHA_JS_URI .'slick.min.js',array('jquery'),'1.8.1',true);
        wp_enqueue_script('jquery-meanmenu.'        ,BLOG_AARAMBHA_JS_URI .'jquery.meanmenu.js',array(),'2.0.8',true);
        wp_enqueue_script('theia-sticky-sidebar'    ,BLOG_AARAMBHA_JS_URI.'theia-sticky-sidebar.js',array(),'1.7.0',true);
        wp_enqueue_script('jquery.magnific-popup'   ,BLOG_AARAMBHA_JS_URI.'jquery.magnific-popup.js',array(),'1.1.0',true);
        wp_enqueue_script('blog-aarambha-navigation',BLOG_AARAMBHA_JS_URI .'navigation.js',array(), false , true);
        wp_enqueue_script('blog-aarambha-skip-link' ,BLOG_AARAMBHA_JS_URI .'skip-link-focus-fix.js',array(), false , true);
        wp_enqueue_script('blog-aarambha-custom'    ,BLOG_AARAMBHA_JS_URI.'custom.js',array(),false,true);

        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }

    }


}

$blog_aarambha_raw = new Blog_Aarambha_Raw();