<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blog_Aarambha
 */
if (is_active_sidebar('sidebar-2') && get_theme_mod('blog_sidebar','right') != 'no-sidebar'){?>
    <aside id="secondary" class="widget-area-right">
        <?php dynamic_sidebar('sidebar-2'); ?>
    </aside>
<?php }
