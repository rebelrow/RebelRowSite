<?php
/**
 * Theme Option >> Advertisement
 * Registers Advertisement Section
 * @package Blog_aarambha
 */

$wp_customize->add_section( 'advertisement_theme_option',
    array(
        'title'              => esc_html__( 'Advertisement ','blog-aarambha' ),
        'priority'           => 160,
        'panel'              => 'theme_option',
        'capability'         => 'edit_theme_options',
        'description_hidden' => 'false',
    )
);


$wp_customize->add_setting( 'advertisement_image',
    array(
        'default'           => '',
        'transport'         => 'refresh',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    )
);

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'advertisement_image',
    array(
        'label' => esc_html__('Edit My Image','blog-aarambha'),
        'settings'  => 'advertisement_image',
        'section'   => 'advertisement_theme_option'
    ) ));