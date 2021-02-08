<?php
/**
 * Theme Option >> Slider
 * Registers Slider Section
 * @package Blog_aarambha
 */

$wp_customize->add_section( 'slider_theme_option',
    array(
        'title'              => esc_html__( 'Slider','blog-aarambha' ),
        'description'        => esc_html__( 'Add slider_section','blog-aarambha' ),
        'priority'           => 160,
        'panel'              => 'theme_option',
        'capability'         => 'edit_theme_options',
        'description_hidden' => 'false',
    )
);

$wp_customize->add_setting( 'slider_box_position', array (
    'default'           => 'center_right',
    'capability'        => 'edit_theme_options',
    'transport'         => 'refresh',
    'sanitize_callback' => 'sanitize_key'

) );
$wp_customize->add_control( 'slider_box_position', array (
    'label'     => esc_html__('Box Position','blog-aarambha'),
    'type'      => 'select',
    'choices'   =>[
        'top_left'           => esc_html__('Top left','blog-aarambha'),
        'top_right'          => esc_html__('Top right','blog-aarambha'),
        'bottom_left'        => esc_html__('Bottom left','blog-aarambha'),
        'bottom_right'       => esc_html__('Bottom right','blog-aarambha'),
        'center center'      => esc_html__('center center','blog-aarambha'),
        'center_left'        => esc_html__('Center Left','blog-aarambha'),
        'center_right'       => esc_html__('Center Right','blog-aarambha'),
    ],
    'section'   => 'slider_theme_option',

));


$wp_customize->add_setting( 'slider_section_checkbox',
    array(
        'default'           => false,
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'sanitize_callback' => 'blog_aarambha_sanitize_checkbox',

    )
);

$wp_customize->add_control( 'slider_section_checkbox',
    array(
        'label'         => esc_html__( 'Enable to see slider', 'blog-aarambha' ),
        'section'       => 'slider_theme_option',
        'priority'      => 10,
        'type'          => 'checkbox',
    )
);
$wp_customize->add_setting( 'slider_section_box_checkbox',
    array(
        'default'           => true,
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'sanitize_callback' => 'blog_aarambha_sanitize_checkbox',

    )
);

$wp_customize->add_control( 'slider_section_box_checkbox',
    array(
        'label'         => esc_html__( 'Enable to see slider content', 'blog-aarambha' ),
        'section'       => 'slider_theme_option',
        'priority'      => 10,
        'type'          => 'checkbox',
    )
);
$wp_customize->add_setting( 'slider_section_category_checkbox',
    array(
        'default'           => true,
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'sanitize_callback' => 'blog_aarambha_sanitize_checkbox',

    )
);

$wp_customize->add_control( 'slider_section_category_checkbox',
    array(
        'label'         => esc_html__( 'Enable to see category', 'blog-aarambha' ),
        'section'       => 'slider_theme_option',
        'priority'      => 10,
        'type'          => 'checkbox',
    )
);
$wp_customize->add_setting( 'slider_section_author_checkbox',
    array(
        'default'           => true,
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'sanitize_callback' => 'blog_aarambha_sanitize_checkbox',

    )
);

$wp_customize->add_control( 'slider_section_author_checkbox',
    array(
        'label'         => esc_html__( 'Enable to see author', 'blog-aarambha' ),
        'section'       => 'slider_theme_option',
        'priority'      => 10,
        'type'          => 'checkbox',
    )
);
$wp_customize->add_setting( 'slider_section_date_checkbox',
    array(
        'default'           => true,
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'sanitize_callback' => 'blog_aarambha_sanitize_checkbox',
    )
);

$wp_customize->add_control( 'slider_section_date_checkbox',
    array(
        'label'         => esc_html__( 'Enable to see date', 'blog-aarambha' ),
        'section'       => 'slider_theme_option',
        'priority'      => 10,
        'type'          => 'checkbox',
    )
);

$wp_customize->add_setting( 'slider_section_select_category',
    array(
        'default'           => '',
        'sanitize_callback' => 'absint',
    ) );

$wp_customize->add_control( new Blog_Aarambha_Category( $wp_customize, 'slider_section_select_category',
    array(
        'section'       => 'slider_theme_option',
        'label'         => esc_html__( 'Posts category', 'blog-aarambha' ),
        'description'   => esc_html__( 'Filter Posts According to Category', 'blog-aarambha' ),
        'dropdown_args' => array(
            'taxonomy' => 'category'
        )
    )
) );


$wp_customize->add_setting( 'slider_section_per_post',
    array(
        'default'               => '',
        'transport'             => 'refresh',
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'absint'
    )
);

$wp_customize->add_control( 'slider_section_per_post',
    array(
        'label'         => esc_html__( 'See Per Post','blog-aarambha' ),
        'section'       => 'slider_theme_option',
        'priority'      => 10,
        'type'          => 'number',

    )
);
