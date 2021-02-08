<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blog_Aarambha
 */
if (is_active_sidebar('sidebar-1') && get_theme_mod('blog_sidebar','right') != 'no-sidebar'){ ?>
    <div class="section-wrap-sidebar widget-area">
        <?php dynamic_sidebar('sidebar-1'); ?>
    </div>
<?php }
