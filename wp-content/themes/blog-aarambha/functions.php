<?php
/**
 * Blog Aarambha functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Blog_Aarambha
 */

$blog_aarambha_theme_root = get_template_directory();

/**
 *  Loading defined constant file
 */
require_once trailingslashit(wp_normalize_path($blog_aarambha_theme_root)) . '/includes/helpers/constants.php';

/**
 * Loading Blog Aarambha
 */
require BLOG_AARAMBHA_INCLUDES.'blog-aarambha.php';

/**
 * Loading Woocommerce extra features
 */
require_once BLOG_AARAMBHA_INCLUDES.'compatibility/woocommerce-support.php';

/**
 * Custom template tags for this theme.
 */
require_once BLOG_AARAMBHA_INCLUDES. 'template-tags.php';

/**
 * Custom template functions for this theme
 */
require_once  BLOG_AARAMBHA_INCLUDES.'template-functions.php';

/**
 * Plugin Activation Section
 */
require_once  BLOG_AARAMBHA_INCLUDES.'class-tgm-plugin-activation.php';


