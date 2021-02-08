<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Blog_Aarambha
 */
get_header(); ?>

<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <section class="error-404 not-found" style="background-image:url('<?php echo esc_url(get_theme_mod('404_page_image',''))?>');">
                <div class="container">
                    <div class="error-heading">
                        <h4 class="entry-title"><?php esc_html_e('404','blog-aarambha');?></h4>
                        <span><?php esc_html_e('page not found','blog-aarambha');?></span>
                    </div>
                    <h4 class="entry-title">
                        <?php echo esc_html(get_theme_mod('404_page_title','')); ?>
                    </h4>

                    <?php
                    if (get_theme_mod('404_page_search_checkbox',1)) {
                        get_search_form();
                    } ?>
                    <?php if (get_theme_mod('404_page_back_home_checkbox',1)): ?>
                        <a class="link" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('or back to home page','blog-aarambha');?></a>
                    <?php endif; ?>
                </div>
            </section>
        </main><!--.site-main-->
    </div><!--#primary-->
</div><!--.site-content-->
<?php
get_footer(); ?>
