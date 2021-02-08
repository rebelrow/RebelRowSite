<?php
/**
 * Theme Option >> Product
 * Registers Product Section
 * @package Blog_aarambha
 */

/**
 * Checking whether Woocommerce exists or not
 * Visible only when Woocommerce activated
 */
if ( class_exists( 'WooCommerce' ) ) {

    $wp_customize->add_section('product_theme_option',
        array(
            'title'                 => esc_html__('Products', 'blog-aarambha'),
            'description'           => esc_html__('Add Product Section', 'blog-aarambha'),
            'priority'              => 160,
            'panel'                 => 'theme_option',
            'capability'            => 'edit_theme_options',
            'description_hidden'    => 'false',
        )
    );

    $wp_customize->add_setting( 'product_section_checkbox',
        array(
            'default'           => 1,
            'capability'        => 'edit_theme_options',
            'transport'         => 'refresh',
            'sanitize_callback' => 'blog_aarambha_sanitize_checkbox'

        )
    );

    $wp_customize->add_control( 'product_section_checkbox',
        array(
            'label'         => esc_html__( 'Enable Products', 'blog-aarambha' ),
            'section'       => 'product_theme_option',
            'priority'      => 10,
            'type'          => 'checkbox',
        )
    );

    $wp_customize->add_setting( 'product_section_discount_checkbox',
        array(
            'default'           => 1,
            'capability'        => 'edit_theme_options',
            'transport'         => 'refresh',
            'sanitize_callback' => 'blog_aarambha_sanitize_checkbox'

        )
    );

    $wp_customize->add_control( 'product_section_discount_checkbox',
        array(
            'label'         => esc_html__( 'Enable Discount Percentage', 'blog-aarambha' ),
            'section'       => 'product_theme_option',
            'priority'      => 10,
            'type'          => 'checkbox',
        )
    );

    $wp_customize->add_setting( 'product_section_title',
        array(
            'default'               => '',
            'transport'             => 'refresh',
            'capability'            => 'edit_theme_options',
            'sanitize_callback'     => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control( 'product_section_title',

        array(
            'label'         => esc_html__( 'Title','blog-aarambha' ),
            'section'       => 'product_theme_option',
            'priority'      => 10,
            'type'          => 'text',
        )
    );

    $wp_customize->add_setting( 'product_section_title_product_shop',
        array(
            'default'               => '',
            'transport'             => 'refresh',
            'capability'            => 'edit_theme_options',
            'sanitize_callback'     => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control( 'product_section_title_product_shop',
        array(
            'label'         => esc_html__( 'Title Shop Now','blog-aarambha' ),
            'section'       => 'product_theme_option',
            'priority'      => 10,
            'type'          => 'text',
        )
    );
    $wp_customize->add_setting('product_section_category_select',
        array(
            'default'               => '',
            'sanitize_callback'     => 'absint',
        ));

    $wp_customize->add_control(new Blog_Aarambha_Category($wp_customize, 'product_section_category_select',
        array(
            'section'           => 'product_theme_option',
            'label'             => esc_html__('Product category', 'blog-aarambha'),
            'description'       => esc_html__('Filter Products According To Category', 'blog-aarambha'),
            'dropdown_args'     => array(
                'taxonomy'      => 'product_cat',

            )
        )));


    $wp_customize->add_setting('product_section_display_per_product',
        array(
            'default'           => '',
            'transport'         => 'refresh',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_control('product_section_display_per_product',
        array(
            'label'         => esc_html__('See Per Post', 'blog-aarambha'),
            'section'       => 'product_theme_option',
            'priority'      => 10,
            'type'          => 'number',
        )
    );
}