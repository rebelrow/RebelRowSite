<?php
/**
 * Theme Option >> Footer
 * Register Footer Section
 * @package Blog_aarambha
 */
$wp_customize->add_section( 'footer_bar_theme_option',
    array(
        'title'                 => esc_html__( 'Footer','blog-aarambha' ),
        'description'           => esc_html__( 'Footer Bar is edited from here','blog-aarambha' ),
        'priority'              => 200,
        'panel'                 =>'theme_option',
        'capability'            => 'edit_theme_options',
        'description_hidden'    => 'false',
    )
);


$wp_customize->add_setting( 'footer_bar_copy_right',
    array(
        'transport'             => 'refresh',
        'default'               => '',
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'sanitize_text_field'
    )
);

$wp_customize->add_control( 'footer_bar_copy_right',
    array(
        'label'         => esc_html__( 'Copy Right Text','blog-aarambha' ),
        'section'       => 'footer_bar_theme_option',
        'priority'      => 10,
        'type'          => 'text',

    )
);


$wp_customize->add_setting( 'footer_bar_option_radio_button',
    array(
        'capability'        => 'edit_theme_options',
        'default'           => 'menu',
        'sanitize_callback' => 'blog_aarambha_sanitize_select',
    )
);

$wp_customize->add_control( 'footer_bar_option_radio_button',
    array(
        'type'        => 'radio',
        'section'     => 'footer_bar_theme_option',
        'label'       => esc_html__( 'Bottom right','blog-aarambha' ),
        'choices'     => array(
            'menu'       => esc_html__( 'Menu','blog-aarambha' ),
            'icon'       => esc_html__( 'Icon' ,'blog-aarambha'),
            'tag'        => esc_html__( 'Tag','blog-aarambha'),
        ),
    ) );
$wp_customize->add_setting( 'footer_bar_tag',
    array(
        'transport'             => 'refresh',
        'default'               => '',
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'sanitize_text_field'
    )
);

$wp_customize->add_control( 'footer_bar_tag',
    array(
        'label'         => esc_html__( 'Tag','blog-aarambha' ),
        'section'       => 'footer_bar_theme_option',
        'priority'      => 10,
        'type'          => 'text',
    ));



$wp_customize->add_setting( 'footer_bar_background_color',
    array(
        'default'               => '#f4f3f3',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_hex_color'

    )
);

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bar_background_color',
    array(
        'label'      => esc_html__( 'Footer Bar Background Color', 'blog-aarambha' ),
        'section'    => 'footer_bar_theme_option',
        'settings'   => 'footer_bar_background_color',
    ) ) );


$wp_customize->add_setting( 'footer_bar_copy_right_color',
    array(
        'default'               => '#111111',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_hex_color'

    )
);

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bar_copy_right_color',
    array(
        'label'      => esc_html__( 'CopyRight Color', 'blog-aarambha' ),
        'section'    => 'footer_bar_theme_option',
        'settings'   => 'footer_bar_copy_right_color',
    ) ) );

$wp_customize->add_setting( 'footer_bar_menu_color',
    array(
        'default'               => '#111111',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_hex_color'

    )
);

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bar_menu_color',
    array(
        'label'      => esc_html__( 'Footer Menu Color', 'blog-aarambha' ),
        'section'    => 'footer_bar_theme_option',
        'settings'   => 'footer_bar_menu_color',
    ) ) );
