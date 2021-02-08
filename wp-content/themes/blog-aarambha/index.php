<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blog_Aarambha
 */
get_header();?>
    <div class="section-wrap section-padding">
        <div class="container">
            <div class="section-wrap-inner">
                <div class="section-left">
                    <section class="blog-section <?php if (get_theme_mod('blog_post_layout_radio_button','single') == 'grid') echo esc_attr('layout-grid')?> ">
                        <div class="blog-section-wrap">
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
                    </section>

                </div>
                <?php get_sidebar('home');?>
            </div>
        </div>
    </div>

<?php get_footer();?>