<?php
/**
 * Featured Posts
 * @package Blog_aarambha
 */
$wp_customize->add_section( 'featured_post_theme_option',
    array(
        'title'              => esc_html__( 'Featured Posts','blog-aarambha' ),
        'priority'           => 160,
        'panel'              => 'theme_option',
        'capability'         => 'edit_theme_options',
        'description_hidden' => 'false',
    )
);
$wp_customize->add_setting( 'featured_post_checkbox',
    array(
        'default'           => false,
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'sanitize_callback' => 'blog_aarambha_sanitize_checkbox',

    )
);

$wp_customize->add_control( 'featured_post_checkbox',
    array(
        'label'         => esc_html__( 'Enable to see category section', 'blog-aarambha' ),
        'section'       => 'featured_post_theme_option',
        'priority'      => 10,
        'type'          => 'checkbox',
    )
);
$wp_customize->add_setting( 'featured_post_category_checkbox',
    array(
        'default'           => true,
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'sanitize_callback' => 'blog_aarambha_sanitize_checkbox',

    )
);

$wp_customize->add_control( 'featured_post_category_checkbox',
    array(
        'label'         => esc_html__( 'Enable to see category', 'blog-aarambha' ),
        'section'       => 'featured_post_theme_option',
        'priority'      => 10,
        'type'          => 'checkbox',
    )
);
$wp_customize->add_setting( 'featured_posts_filter_category',
    array(
        'default'           => '',
        'sanitize_callback' => 'absint',
    )
);

$wp_customize->add_control( new Blog_Aarambha_Category( $wp_customize, 'featured_posts_filter_category',
        array(
            'section'       => 'featured_post_theme_option',
            'label'         => esc_html__( 'Posts category', 'blog-aarambha' ),
            'description'   => esc_html__( 'Filter Posts According To Category', 'blog-aarambha' ),
            'dropdown_args' => array(
                'taxonomy' => 'category')
        )
    )
);

$wp_customize->add_setting( 'featured_option_per_posts',
    array(
        'default'               => '',
        'transport'             => 'refresh',
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'absint'
    )
);

$wp_customize->add_control( 'featured_option_per_posts',
    array(
        'label'         => esc_html__( 'See Per Post','blog-aarambha' ),
        'section'       => 'featured_post_theme_option',
        'priority'      => 10,
        'type'          => 'number',

    )
);
