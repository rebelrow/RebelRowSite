<?php
/**
 * Theme Option >> 404-page
 * Registers 404 Page Section
 * @package Blog_aarambha
 */

$wp_customize->add_section( '404_page_theme_option',
    array(
        'title'              => esc_html__( '404 Page ','blog-aarambha' ),
        'priority'           => 160,
        'panel'              => 'theme_option',
        'capability'         => 'edit_theme_options',
        'description_hidden' => 'false',
    )
);

$wp_customize->add_setting( '404_page_image',
    array(
        'default'           => '',
        'transport'         => 'refresh',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    )
);

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, '404_page_image',
    array(
        'label' => esc_html__('Upload Image','blog-aarambha'),
        'settings'  => '404_page_image',
        'section'   => '404_page_theme_option'
    ) ));


$wp_customize->add_setting( '404_page_title',
    array(
        'default'               => '',
        'transport'             => 'refresh',
        'capability'            => 'edit_theme_options',
        'sanitize_callback'     => 'sanitize_text_field'
    )
);

$wp_customize->add_control( '404_page_title',
    array(
        'label'         => esc_html__( 'Title','blog-aarambha' ),
        'section'       => '404_page_theme_option',
        'priority'      => 10,
        'type'          => 'text',
    )
);

$wp_customize->add_setting( '404_page_search_checkbox',
    array(
        'default'           => 1,
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'sanitize_callback' => 'blog_aarambha_sanitize_checkbox'

    )
);

$wp_customize->add_control( '404_page_search_checkbox',
    array(
        'label'         => esc_html__( 'Enable search bar', 'blog-aarambha' ),
        'section'       => '404_page_theme_option',
        'priority'      => 10,
        'type'          => 'checkbox',
    )
);

$wp_customize->add_setting( '404_page_back_home_checkbox',
    array(
        'default'           => 1,
        'capability'        => 'edit_theme_options',
        'transport'         => 'refresh',
        'sanitize_callback' => 'blog_aarambha_sanitize_checkbox'

    )
);

$wp_customize->add_control( '404_page_back_home_checkbox',
    array(
        'label'         => esc_html__( 'Enable back home', 'blog-aarambha' ),
        'section'       => '404_page_theme_option',
        'priority'      => 10,
        'type'          => 'checkbox',
    )
);
