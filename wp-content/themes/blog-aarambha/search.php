<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Blog_Aarambha
 */

get_header();
?>
<div id="content" class="site-content" xmlns="http://www.w3.org/1999/html">
    <div class="container">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">

                <div class="blog-wrap">
                    <?php
                    if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/content', 'search' );

                    endwhile; // End of the loop.?>
                </div>
                <?php
                $blog_aarambha_arg = [
                    'screen_reader_text' => esc_html__( 'Post navigation','blog-aarambha' ),
                    'prev_text'          =>  '',
                    'next_text'          =>  '',
                ];
                if (get_theme_mod('blog_paginate_radio_button','post_pagination') == 'post_pagination'):
                    the_posts_pagination($blog_aarambha_arg);
                else:
                    the_posts_navigation(['screen_reader_text' => esc_html__( 'Post navigation','blog-aarambha' )]);
                endif;

                else :
                    get_template_part( 'template-parts/content', 'none' );
                endif;
                ?>
            </main><!--.site-main-->
        </div><!--#primary-->

        <?php
        if(get_theme_mod('general_sidebar_archive_checkbox',1) == true){
            get_sidebar('both');
            get_sidebar();
        }
        ?>
    </div>
</div>



<?php get_footer(); ?>
