<?php
/**
 * Theme Option >> Blog/Index
 * Registers Blog/Index Section
 * @package Blog_aarambha
 */

$wp_customize->add_section( 'blog_theme_option',
    array(
        'title'              => esc_html__( 'Blog/Index','blog-aarambha' ),
        'description'        => esc_html__( 'Add blog_theme_option','blog-aarambha' ),
        'priority'           => 160,
        'panel'              => 'theme_option',
        'capability'         => 'edit_theme_options',
        'description_hidden' => 'false',
    )
);
$wp_customize->add_setting('blog_sidebar',
    array(
        'default'           => 'right',
        'sanitize_callback' => 'blog_aarambha_sanitize_select'
    ));

$wp_customize->add_control(
    new Blog_Aarambha_Customize_Sidebar_Control($wp_customize, 'blog_sidebar',
        array(
            'label'       => esc_html__('Sidebar', 'blog-aarambha' ),
            'description' => esc_html__( 'It only works if sidebar is active','blog-aarambha' ),
            'type'        => 'radio-image',
            'section'     => 'blog_theme_option',
            'settings'    => 'blog_sidebar',
            'choices'     => array(
                'left'         => BLOG_AARAMBHA_THEME_URI . '/includes/customizer/images/sidebar-right.png',
                'no-sidebar'   => BLOG_AARAMBHA_THEME_URI . '/includes/customizer/images/without-sidebar.png',
                'both-sidebar' => BLOG_AARAMBHA_THEME_URI . '/includes/customizer/images/sidebar-both.png',
                'right'        => BLOG_AARAMBHA_THEME_URI . '/includes/customizer/images/sidebar-left.png',

            )
        )
    )
);
$wp_customize->add_setting( 'blog_category_checkbox',
    array(
        'default'           => true,
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'sanitize_callback' => 'blog_aarambha_sanitize_checkbox',

    )
);

$wp_customize->add_control( 'blog_category_checkbox',
    array(
        'label'         => esc_html__( 'Enable to see category', 'blog-aarambha' ),
        'section'       => 'blog_theme_option',
        'priority'      => 10,
        'type'          => 'checkbox',
    )
);

$wp_customize->add_setting( 'blog_author_checkbox',
    array(
        'default'           => true,
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'sanitize_callback' => 'blog_aarambha_sanitize_checkbox',

    )
);

$wp_customize->add_control( 'blog_author_checkbox',
    array(
        'label'         => esc_html__( 'Enable to see Author', 'blog-aarambha' ),
        'section'       => 'blog_theme_option',
        'priority'      => 10,
        'type'          => 'checkbox',
    )
);
$wp_customize->add_setting( 'blog_date_checkbox',
    array(
        'default'           => true,
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'sanitize_callback' => 'blog_aarambha_sanitize_checkbox',

    )
);

$wp_customize->add_control( 'blog_date_checkbox',
    array(
        'label'         => esc_html__( 'Enable to see Date', 'blog-aarambha' ),
        'section'       => 'blog_theme_option',
        'priority'      => 10,
        'type'          => 'checkbox',
    )
);

$wp_customize->add_setting( 'blog_paginate_radio_button',
    array(
        'capability' => 'edit_theme_options',
        'default' => 'post_pagination',
        'sanitize_callback' => 'blog_aarambha_sanitize_select',
    )
);

$wp_customize->add_control( 'blog_paginate_radio_button',
    array(
        'type'        => 'radio',
        'section'     => 'blog_theme_option',
        'label'       => esc_html__( 'Pagination Type','blog-aarambha' ),
        'choices' => array(
            'post_pagination' => esc_html__( 'Pagination' ,'blog-aarambha'),
            'post_navigation' => esc_html__( 'Newer and older' ,'blog-aarambha'),
        ),
    ) );


$wp_customize->add_setting( 'blog_post_layout_radio_button',
    array(
        'capability'        => 'edit_theme_options',
        'default'           => 'single',
        'sanitize_callback' => 'blog_aarambha_sanitize_select',
    )
);

$wp_customize->add_control( 'blog_post_layout_radio_button',
    array(
        'type'        => 'radio',
        'section'     => 'blog_theme_option',
        'label'       => esc_html__( 'Layout','blog-aarambha' ),
        'choices' => array(
            'single'  => esc_html__( 'Single' ,'blog-aarambha'),
            'grid'    => esc_html__( 'Grid','blog-aarambha' ),
        ),
    ) );


$wp_customize->add_setting( 'content_type_radio_button',
    array(
        'capability'        => 'edit_theme_options',
        'default'           => 'single',
        'sanitize_callback' => 'blog_aarambha_sanitize_select',
    )
);

$wp_customize->add_control( 'content_type_radio_button',
    array(
        'type'        => 'radio',
        'section'     => 'blog_theme_option',
        'label'       => esc_html__( 'Content Type','blog-aarambha' ),
        'description' => esc_html__('Content Shows all the text whereas excerpt shows only 55 character ','blog-aarambha'),
        'choices'     => array(
            'single'         => esc_html__( 'Content' ,'blog-aarambha'),
            'grid'           => esc_html__( 'Excerpt','blog-aarambha' ),
        ),
    ) );

// Test of Slider Custom Control
$wp_customize->add_setting( 'blog_border_slider_range',
    array(
        'default'   => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'blog_aarambha_sanitize_number_range'
    )
);
$wp_customize->add_control( new Blog_Aarambha_Slider_Custom_Control( $wp_customize, 'blog_border_slider_range',
    array(
        'label' => esc_html__( 'Border Size (px)', 'blog-aarambha' ),
        'section' => 'blog_theme_option',
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
            'step' => 1,
        ),
    )
) );
