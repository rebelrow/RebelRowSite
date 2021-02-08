<?php
/**
 * Theme Option >> General
 * Registers General Section
 * @package Blog_aarambha
 */
$wp_customize->add_section( 'general_theme_option',
    array(
        'title'                 => esc_html__( 'General','blog-aarambha' ),
        'priority'              => 160,
        'panel'                 =>'theme_option',
        'capability'            => 'edit_theme_options',
        'description_hidden'    => 'false',
    )
);

$wp_customize->add_setting( 'general_sidebar_archive_checkbox',
    array(
        'default'           => 1,
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'sanitize_callback' => 'blog_aarambha_sanitize_checkbox'

    )
);

$wp_customize->add_control( 'general_sidebar_archive_checkbox',
    array(
        'label'         => esc_html__( 'Enable sidebar in archive', 'blog-aarambha' ),
        'section'       => 'general_theme_option',
        'priority'      => 10,
        'type'          => 'checkbox',
    )
);
$wp_customize->add_setting( 'general_sidebar_single_checkbox',
    array(
        'default'           => 1,
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'sanitize_callback' => 'blog_aarambha_sanitize_checkbox'

    )
);

$wp_customize->add_control( 'general_sidebar_single_checkbox',
    array(
        'label'         => esc_html__( 'Enable sidebar in Single Post', 'blog-aarambha' ),
        'section'       => 'general_theme_option',
        'priority'      => 10,
        'type'          => 'checkbox',
    )
);

$wp_customize->add_setting( 'general_sidebar_page_checkbox',
    array(
        'default'           => 1,
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'sanitize_callback' => 'blog_aarambha_sanitize_checkbox'

    )
);

$wp_customize->add_control( 'general_sidebar_page_checkbox',
    array(
        'label'         => esc_html__( 'Enable sidebar in page', 'blog-aarambha' ),
        'section'       => 'general_theme_option',
        'priority'      => 10,
        'type'          => 'checkbox',
    )
);
