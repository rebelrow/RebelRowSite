<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blog_Aarambha
 */

get_header();?>
    <div id="content" class="site-content" xmlns="http://www.w3.org/1999/html">
        <div class="container">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">

                    <div class="blog-wrap">
                        <?php
                        while(have_posts()):
                            the_post();
                            /*
                             * Include the Post-Type-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                             */
                            get_template_part('template-parts/content',get_post_type());
                            ?>
                        <?php endwhile ;?>
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
                    ?>

                </main><!--.site-main-->
            </div><!--#primary-->
            <?php
            if(get_theme_mod('general_sidebar_archive_checkbox',1)){
                get_sidebar('both');
                get_sidebar();
            }
            ?>

        </div>
    </div><!--.site-content-->

<?php
get_footer();