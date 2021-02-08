<?php
/**
 * Customize >> Theme Option
 * Registers Theme Option Panel
 * @package Blog_aarambha
 */

$wp_customize->add_panel( 'theme_option',
    array(
        'title'           => esc_html__( 'Theme option' ,'blog-aarambha'),
        'description'     => esc_html__( 'Theme options','blog-aarambha' ),
        'priority'        => 100,
        'capability'      => 'edit_theme_options',
    )
);


/**
 * Storing Sections File Name
 * @var array $blog_aarambha_sections
 */
$blog_aarambha_sections = [
    'top-header',
    'main-header' ,
    'slider',
    'quotes' ,
    'featured-posts',
    'advertisement',
    'blog',
    'general',
    'products',
    '404-page',
    'footer'];

/**
 * Looping Through Files
 */
foreach ($blog_aarambha_sections as $blog_aarambha_section){
    require_once BLOG_AARAMBHA_SECTIONS . $blog_aarambha_section .'.php';
}

