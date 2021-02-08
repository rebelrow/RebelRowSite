<?php
/**
 * Theme Option >> Top Header
 * Registers Top Header Section
 * @package Blog_aarambha
 */

$wp_customize->add_section( 'top_header_theme_option',
    array(
        'title'                 => esc_html__( 'Top Header','blog-aarambha' ),
        'description'           => esc_html__( 'Top Header Section','blog-aarambha' ),
        'priority'              => 150,
        'panel'                 =>'theme_option',
        'capability'            => 'edit_theme_options',
        'description_hidden'    => 'false',
    )
);

$wp_customize->add_setting( 'top_header_section_checkbox',
    array(
        'default'           => 1,
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'sanitize_callback' => 'blog_aarambha_sanitize_checkbox'

    )
);

$wp_customize->add_control( 'top_header_section_checkbox',
    array(
        'label'         => esc_html__( 'Enable Top bar section', 'blog-aarambha' ),
        'section'       => 'top_header_theme_option',
        'priority'      => 10,
        'type'          => 'checkbox',
    )
);

$wp_customize->add_setting( 'top_header_section_left_element',
    array(
        'capability'        => 'edit_theme_options',
        'default'           => 'menu',
        'sanitize_callback' => 'blog_aarambha_sanitize_select',
    )
);

$wp_customize->add_control( 'top_header_section_left_element',
    array(
        'type'        => 'radio',
        'section'     => 'top_header_theme_option',
        'label'       => esc_html__( 'Top Bar Left Element','blog-aarambha' ),
        'choices'     => array(
            'menu'              => esc_html__('Menu','blog-aarambha'),
            'icon'              => esc_html__( 'Icon','blog-aarambha' ),
            'search-cart'       => esc_html__( 'Search + Cart','blog-aarambha' ),
            'phone-addr'        => esc_html__('Phone + Address','blog-aarambha'),

        ),
    ) );
$wp_customize->add_setting( 'top_header_section_right_element',
    array(
        'capability' => 'edit_theme_options',
        'default' => 'search-cart',
        'sanitize_callback' => 'blog_aarambha_sanitize_select',
    )
);

$wp_customize->add_control( 'top_header_section_right_element',
    array(
        'type'        => 'radio',
        'section'     => 'top_header_theme_option',
        'label'       => esc_html__( 'Top Bar Right Element','blog-aarambha' ),
        'choices'     => array(
            'menu'               => esc_html__( 'Menu','blog-aarambha'),
            'icon'               => esc_html__( 'Icon','blog-aarambha' ),
            'search-cart'        => esc_html__( 'Search + Cart','blog-aarambha' ),
            'phone-addr'         => esc_html__( 'Phone + Address','blog-aarambha'),
        ),
    ) );

$wp_customize->add_setting( 'top_header_section_number',
    array(
        'transport'             => 'refresh',
        'default'               => '',
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'sanitize_key'

    )
);

$wp_customize->add_control( 'top_header_section_number',
    array(
        'label'         => esc_html__( 'Number','blog-aarambha' ),
        'section'       => 'top_header_theme_option',
        'priority'      => 10,
        'type'          => 'text',

    )
);

$wp_customize->add_setting( 'top_header_section_address',
    array(
        'transport'             => 'refresh',
        'default'               => '',
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'sanitize_text_field'
    )
);

$wp_customize->add_control( 'top_header_section_address',
    array(
        'label'         => esc_html__( 'Address','blog-aarambha' ),
        'section'       => 'top_header_theme_option',
        'priority'      => 10,
        'type'          => 'text',

    )
);

$wp_customize->add_setting( 'top_header_section_phone_address_color',
    array(
        'default'               => '#fffff',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_hex_color'

    )
);

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_header_section_phone_address_color',
    array(
        'label'      => esc_html__( 'Phone/Address Text Color', 'blog-aarambha' ),
        'section'    => 'top_header_theme_option',
        'settings'   => 'top_header_section_phone_address_color',
    ) ) );

$wp_customize->add_setting( 'top_header_section_menu_color',
    array(
        'default'               => '#fff',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_hex_color'

    )
);

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_header_section_menu_color',
    array(
        'label'      => esc_html__( 'Menu Text Color', 'blog-aarambha' ),
        'section'    => 'top_header_theme_option',
        'settings'   => 'top_header_section_menu_color',
    ) ) );

$wp_customize->add_setting( 'top_header_section_background_color',
    array(
        'default'               => '#404040',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_hex_color'

    )
);

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_header_section_background_color',
    array(
        'label'      => esc_html__( 'Top Header Background Color', 'blog-aarambha' ),
        'section'    => 'top_header_theme_option',
        'settings'   => 'top_header_section_background_color',
    ) ) );



