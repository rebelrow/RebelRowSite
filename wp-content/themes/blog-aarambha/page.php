<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blog_Aarambha
 */
get_header();
?>
<div class="container">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php
            while ( have_posts() ) :
                the_post();
                get_template_part( 'template-parts/content', 'page' );
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
            endwhile; // End of the loop.
            ?>
        </main><!--.site-main-->
    </div><!--#primary-->

    <?php
    if(get_theme_mod('general_sidebar_page_checkbox',1) == true){
        get_sidebar('both');
        get_sidebar();
    }
    ?>
</div>

<?php
get_footer()?>
