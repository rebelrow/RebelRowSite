<?php
/**
 * Theme Option >> Quotes
 * Register Quotes section
 * @package Blog_aarambha
 */

$wp_customize->add_section( 'quotes_theme_option',
    array(
        'title'              => esc_html__( 'Quotes','blog-aarambha' ),
        'priority'           => 160,
        'panel'              => 'theme_option',
        'capability'         => 'edit_theme_options',
        'description_hidden' => 'false',
    )
);
$wp_customize->add_setting( 'quotes_section_checkbox',
    array(
        'default'           => true,
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'sanitize_callback' => 'blog_aarambha_sanitize_checkbox',
    )
);

$wp_customize->add_control( 'quotes_section_checkbox',
    array(
        'label'         => esc_html__( 'Enable to see quotes', 'blog-aarambha' ),
        'section'       => 'quotes_theme_option',
        'priority'      => 10,
        'type'          => 'checkbox',
    )
);
$wp_customize->add_setting( 'quotes_section_select_page',
    array(
        'transport'         => 'refresh',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'absint'
    )
);

$wp_customize->add_control( 'quotes_section_select_page',
    array(
        'label'          => esc_html__( 'Select the Page to see in homepage' ,'blog-aarambha'),
        'section'        => 'quotes_theme_option',
        'priority'       => 10,
        'type'           => 'dropdown-pages',

    )
);
$wp_customize->add_setting( 'quotes_section_title_color',
    array(
        'default'               => '#111111',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_hex_color'

    )
);

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'quotes_section_title_color',
    array(
        'label'      => esc_html__( 'Change Title Color', 'blog-aarambha' ),
        'section'    => 'quotes_theme_option',
        'settings'   => 'quotes_section_title_color',
    ) ) );


$wp_customize->add_setting( 'quotes_section_content_color',
    array(
        'default'               => '#111111',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_hex_color'

    )
);

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'quotes_section_content_color',
    array(
        'label'      => esc_html__( 'Change Content Color', 'blog-aarambha' ),
        'section'    => 'quotes_theme_option',
        'settings'   => 'quotes_section_content_color',
    ) ) );
