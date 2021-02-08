<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blog_Aarambha
 */
if (is_active_sidebar('sidebar-3') && get_theme_mod('blog_sidebar','right') == 'both-sidebar'){
    if (get_theme_mod('blog_sidebar') == 'no-sidebar') {
        return null;
    }
    ?>
    <aside id="secondary" class="widget-area-left">
        <?php dynamic_sidebar('sidebar-3'); ?>
    </aside>
<?php }
