<?php
/**
 * Theme Option >> Main Header
 * Registers Main Header Section
 * @package Blog_aarambha
 */

$wp_customize->add_section( 'main_header_theme_option',
    array(
        'title'              => esc_html__( 'Main Header','blog-aarambha' ),
        'description'        => esc_html__( 'Add main_header','blog-aarambha' ),
        'priority'           => 160,
        'panel'              => 'theme_option',
        'capability'         => 'edit_theme_options',
        'description_hidden' => 'false',
    )
);

$wp_customize->add_setting('main_header_logo_layout_radio_image',
    array(
        'default'           => 'center',
        'sanitize_callback' => 'blog_aarambha_sanitize_select'
    )
);

$wp_customize->add_control(
    new Blog_Aarambha_Customize_Sidebar_Control($wp_customize, 'main_header_logo_layout_radio_image',
        array(
            'type'      => 'radio-image',
            'label'     => esc_html__('Logo Layout', 'blog-aarambha' ),
            'section'   => 'main_header_theme_option',
            'settings'  => 'main_header_logo_layout_radio_image',
            'choices'   => array(
                'left'     	 => BLOG_AARAMBHA_THEME_URI . '/includes/customizer/images/left-align.png',
                'right'      => BLOG_AARAMBHA_THEME_URI . '/includes/customizer/images/right-align.png',
                'center'     => BLOG_AARAMBHA_THEME_URI . '/includes/customizer/images/center-align.png',
            )
        )
    )
);

$wp_customize->add_setting( 'main_header_navbar_background_color',
    array(
        'default'               => '#f4f3f3',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_hex_color'

    )
);

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_header_navbar_background_color',
    array(
        'label'      => esc_html__( 'Nav Bar Background Color', 'blog-aarambha' ),
        'section'    => 'main_header_theme_option',
        'settings'   => 'main_header_navbar_background_color',
    )
) );
