<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

add_action( 'after_setup_theme', 'lalita_background_setup' );
/**
 * Overwrite parent theme background defaults and registers support for WordPress features.
 *
 */
function lalita_background_setup() {
	add_theme_support( "custom-background",
		array(
			'default-color' 		 => '222222',
			'default-image'          => get_stylesheet_directory_uri().'/img/mainbg.gif',
			'default-repeat'         => 'repeat',
			'default-position-x'     => 'left',
			'default-position-y'     => 'top',
			'default-size'           => 'auto',
			'default-attachment'     => '',
			'wp-head-callback'       => '_custom_background_cb',
			'admin-head-callback'    => '',
			'admin-preview-callback' => ''
		)
	);
}

/**
 * Overwrite theme URL
 *
 */
function lalita_theme_uri_link() {
	return 'https://wpkoi.com/durvasa-wpkoi-wordpress-theme/';
}

/**
 * Overwrite parent theme's blog header function
 *
 */
add_action( 'lalita_after_header', 'lalita_blog_header_image', 11 );
function lalita_blog_header_image() {

	if ( ( is_front_page() && is_home() ) || ( is_home() ) ) { 
		$blog_header_image 			=  lalita_get_setting( 'blog_header_image' ); 
		$blog_header_title 			=  lalita_get_setting( 'blog_header_title' ); 
		$blog_header_text 			=  lalita_get_setting( 'blog_header_text' ); 
		$blog_header_button_text 	=  lalita_get_setting( 'blog_header_button_text' ); 
		$blog_header_button_url 	=  lalita_get_setting( 'blog_header_button_url' ); 
		if ( $blog_header_image != '' ) { ?>
		<div class="page-header-image grid-parent page-header-blog">
            <div class="page-header-blog-inner-img"><img src="<?php echo esc_url($blog_header_image); ?>" /></div>
            <div class="page-header-blog-content-h grid-container">
                <div class="page-header-blog-content">
                <?php if ( ( $blog_header_title != '' ) || ( $blog_header_text != '' ) ) { ?>
                    <div class="page-header-blog-text">
                        <?php if ( $blog_header_title != '' ) { ?>
                        <h2><?php echo wp_kses_post( $blog_header_title ); ?></h2>
                        <div class="clearfix"></div>
                        <?php } ?>
                        <?php if ( $blog_header_title != '' ) { ?>
                        <p><?php echo wp_kses_post( $blog_header_text ); ?></p>
                        <div class="clearfix"></div>
                        <?php } ?>
                    </div>
                    <div class="page-header-blog-button">
                        <?php if ( $blog_header_button_text != '' ) { ?>
                        <a class="read-more button" href="<?php echo esc_url( $blog_header_button_url ); ?>"><?php echo esc_html( $blog_header_button_text ); ?></a>
                        <?php } ?>
                    </div>
                <?php } ?>
                </div>
            </div>
		</div>
		<?php
		}
	}
}

if ( ! function_exists( 'durvasa_remove_parent_dynamic_css' ) ) {
	add_action( 'init', 'durvasa_remove_parent_dynamic_css' );
	/**
	 * The dynamic styles of the parent theme added inline to the parent stylesheet.
	 * For the customizer functions it is better to enqueue after the child theme stylesheet.
	 */
	function durvasa_remove_parent_dynamic_css() {
		remove_action( 'wp_enqueue_scripts', 'lalita_enqueue_dynamic_css', 50 );
	}
}

if ( ! function_exists( 'durvasa_enqueue_parent_dynamic_css' ) ) {
	add_action( 'wp_enqueue_scripts', 'durvasa_enqueue_parent_dynamic_css', 50 );
	/**
	 * Enqueue this CSS after the child stylesheet, not after the parent stylesheet.
	 *
	 */
	function durvasa_enqueue_parent_dynamic_css() {
		$css = lalita_base_css() . lalita_font_css() . lalita_advanced_css() . lalita_spacing_css() . lalita_no_cache_dynamic_css();

		// escaped secure before in parent theme
		wp_add_inline_style( 'lalita-child', $css );
	}
}

// Extra cutomizer functions
if ( ! function_exists( 'durvasa_customize_register' ) ) {
	add_action( 'customize_register', 'durvasa_customize_register' );
	function durvasa_customize_register( $wp_customize ) {
		
		// Blog image effect
		$wp_customize->add_setting(
			'durvasa_settings[img_effect]',
			array(
				'default' => 'enable',
				'type' => 'option',
				'sanitize_callback' => 'durvasa_sanitize_choices'
			)
		);

		$wp_customize->add_control(
			'durvasa_settings[img_effect]',
			array(
				'type' => 'select',
				'label' => __( 'Blog image effect', 'durvasa' ),
				'choices' => array(
					'enable' => __( 'Enable', 'durvasa' ),
					'disable' => __( 'Disable', 'durvasa' )
				),
				'settings' => 'durvasa_settings[img_effect]',
				'section' => 'lalita_blog_section',
				'priority' => 29
			)
		);
		
		// Logo flickr
		$wp_customize->add_setting(
			'durvasa_settings[logo_effect]',
			array(
				'default' => 'enable',
				'type' => 'option',
				'sanitize_callback' => 'durvasa_sanitize_choices'
			)
		);

		$wp_customize->add_control(
			'durvasa_settings[logo_effect]',
			array(
				'type' => 'select',
				'label' => __( 'Logo hover flickr', 'durvasa' ),
				'choices' => array(
					'enable' => __( 'Enable', 'durvasa' ),
					'disable' => __( 'Disable', 'durvasa' )
				),
				'settings' => 'durvasa_settings[logo_effect]',
				'section' => 'title_tagline',
				'priority' => 2
			)
		);
		
		// Nav hover effect
		$wp_customize->add_setting(
			'durvasa_settings[nav_effect]',
			array(
				'default' => 'enable',
				'type' => 'option',
				'sanitize_callback' => 'durvasa_sanitize_choices'
			)
		);

		$wp_customize->add_control(
			'durvasa_settings[nav_effect]',
			array(
				'type' => 'select',
				'label' => __( 'Durvasa navigation effect', 'durvasa' ),
				'choices' => array(
					'enable' => __( 'Enable', 'durvasa' ),
					'disable' => __( 'Disable', 'durvasa' )
				),
				'settings' => 'durvasa_settings[nav_effect]',
				'section' => 'lalita_layout_navigation',
				'priority' => 29
			)
		);
		
		// Magic cursor
		$wp_customize->add_setting(
			'durvasa_settings[magic_cursor]',
			array(
				'default' => 'enable',
				'type' => 'option',
				'sanitize_callback' => 'durvasa_sanitize_choices'
			)
		);

		$wp_customize->add_control(
			'durvasa_settings[magic_cursor]',
			array(
				'type' => 'select',
				'label' => __( 'Magic cursor', 'durvasa' ),
				'choices' => array(
					'enable' => __( 'Enable', 'durvasa' ),
					'disable' => __( 'Disable', 'durvasa' )
				),
				'settings' => 'durvasa_settings[magic_cursor]',
				'section' => 'lalita_layout_container',
				'priority' => 20
			)
		);
		
	}
}

if ( ! function_exists( 'durvasa_sanitize_choices' ) ) {
	/**
	 * Sanitize choices.
	 *
	 */
	function durvasa_sanitize_choices( $input, $setting ) {
		// Ensure input is a slug
		$input = sanitize_key( $input );

		// Get list of choices from the control
		// associated with the setting
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it;
		// otherwise, return the default
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
}

if ( ! function_exists( 'durvasa_body_classes' ) ) {
	add_filter( 'body_class', 'durvasa_body_classes' );
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 */
	function durvasa_body_classes( $classes ) {
		// Get Customizer settings
		$durvasa_settings = get_option( 'durvasa_settings' );
		
		$img_effect  = 'enable';
		$logo_effect = 'enable';
		$nav_effect  = 'enable';
		if ( isset( $durvasa_settings['img_effect'] ) ) {
			$img_effect = $durvasa_settings['img_effect'];
		}
		if ( isset( $durvasa_settings['logo_effect'] ) ) {
			$logo_effect = $durvasa_settings['logo_effect'];
		}
		if ( isset( $durvasa_settings['nav_effect'] ) ) {
			$nav_effect = $durvasa_settings['nav_effect'];
		}
		
		// Blog image function
		if ( $img_effect != 'disable' ) {
			$classes[] = 'durvasa-img-effect';
		}
		
		// Logo hover function
		if ( $logo_effect != 'disable' ) {
			$classes[] = 'durvasa-logo-effect';
		}
		
		// Nav hover function
		if ( $nav_effect != 'disable' ) {
			$classes[] = 'durvasa-nav-effect';
		}
		
		return $classes;
	}
}

if ( ! function_exists( 'durvasa_scripts' ) ) {
	add_action( 'wp_enqueue_scripts', 'durvasa_scripts' );
	/**
	 * Enqueue scripts and styles
	 */
	function durvasa_scripts() {

		$dir_uri = get_stylesheet_directory_uri();
		// Get Customizer settings
		$durvasa_settings = get_option( 'durvasa_settings' );
		$magic_cursor  = 'enable';
		if ( isset( $durvasa_settings['magic_cursor'] ) ) {
			$magic_cursor = $durvasa_settings['magic_cursor'];
		}
		
		if ( $magic_cursor != 'disable' ) {
			wp_enqueue_style( 'durvasa-magic-mouse', esc_url( $dir_uri ) . "/inc/magic-mouse/magic-mouse.min.css", false, LALITA_VERSION, 'all' );
			wp_enqueue_script( 'durvasa-magic-mouse', esc_url( $dir_uri ) . "/inc/magic-mouse/magic-mouse.min.js", array( 'jquery'), LALITA_VERSION, true );
		}
	}
}