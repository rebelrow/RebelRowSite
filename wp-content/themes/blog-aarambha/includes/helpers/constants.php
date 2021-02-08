<?php
/**
 * All the constant use for blog defined here..
 *
 * @package Blog_aarambha
 */
$blog_aarambha_theme_root = trailingslashit( wp_normalize_path( get_template_directory() ));
$blog_aarambha_theme_uri  = esc_url(trailingslashit( get_template_directory_uri() ));

define( 'BLOG_AARAMBHA_THEME_URI'     , $blog_aarambha_theme_uri );

define( 'BLOG_AARAMBHA_ROOT_URI'      , $blog_aarambha_theme_root );

define( 'BLOG_AARAMBHA_ASSETS'        , BLOG_AARAMBHA_THEME_URI . 'assets/' );

define( 'BLOG_AARAMBHA_CSS_URI'       , BLOG_AARAMBHA_ASSETS . 'css/' );

define( 'BLOG_AARAMBHA_JS_URI'        , BLOG_AARAMBHA_ASSETS . 'js/' );

define( 'BLOG_AARAMBHA_IMAGE_URI'     , BLOG_AARAMBHA_ASSETS . 'img/' );

define( 'BLOG_AARAMBHA_FONT_URI'      , BLOG_AARAMBHA_ASSETS . 'fonts/' );

define( 'BLOG_AARAMBHA_INCLUDES'      , BLOG_AARAMBHA_ROOT_URI . 'includes/');

define( 'BLOG_AARAMBHA_HELPERS'       , BLOG_AARAMBHA_INCLUDES. 'helpers/');

define( 'BLOG_AARAMBHA_CUSTOMIZER_URI', BLOG_AARAMBHA_INCLUDES. 'customizer/');

define( 'BLOG_AARAMBHA_WALKER_URI'    , BLOG_AARAMBHA_INCLUDES. 'walker/');

define( 'BLOG_AARAMBHA_SANITIZATION'  , BLOG_AARAMBHA_CUSTOMIZER_URI.'sanitization/');

define( 'BLOG_AARAMBHA_PANELS'        , BLOG_AARAMBHA_CUSTOMIZER_URI.'panels/');

define('BLOG_AARAMBHA_SECTIONS'       , BLOG_AARAMBHA_CUSTOMIZER_URI.'sections/');

define('BLOG_AARAMBHA_WIDGETS'        , BLOG_AARAMBHA_INCLUDES . 'widgets/' );

define('BLOG_AARAMBHA_METABOX'        , BLOG_AARAMBHA_INCLUDES . 'metabox/');
