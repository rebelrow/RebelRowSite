<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Blog_Aarambha
 */

get_header();
?>
<div id="content" class="site-content">
    <div class="container">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <div class="blog-detail-wrap">
                    <?php
                    while (have_posts()) : the_post();
                        get_template_part('template-parts/content','single');
                        the_post_navigation(['screen_reader_text' => esc_html__( 'Post navigation' ,'blog-aarambha')]); ?>
                        <?php
                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif; endwhile;?>
                </div>
            </main><!--.site-main-->
        </div><!--#primary-->

        <?php
        if(get_theme_mod('general_sidebar_single_checkbox',1)){
            get_sidebar('both');
            get_sidebar();
        }
        ?>
    </div>
</div>

<?php
get_footer();?>
