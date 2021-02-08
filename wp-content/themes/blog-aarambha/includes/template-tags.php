<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Blog_Aarambha
 */

if ( ! function_exists( 'blog_aarambha_posted_on' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function blog_aarambha_posted_on() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        $archive_year               = get_the_time('Y');
        $archive_month              = get_the_time('m');
        $archive_day                = get_the_time('d');

        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf(
            $time_string,
            esc_attr( get_the_date( DATE_W3C ) ),
            esc_html( get_the_date() ),
            esc_attr( get_the_modified_date( DATE_W3C ) ),
            esc_html( get_the_modified_date() )
        );

        $posted_on = sprintf(
        /* translators: %s: post date. */
            '<a href="' . esc_url( get_day_link( $archive_year, $archive_month, $archive_day))  . '" rel="bookmark">' . $time_string . '</a>');

        echo '<div class="posted-on">' . $posted_on . '</div>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

    }
endif;

if ( ! function_exists( 'blog_aarambha_posted_by' ) ) :
    /**
     * Prints HTML with meta information for the current author.
     */
    function blog_aarambha_posted_by() {
        $byline = sprintf(
        /* translators: %s: post author. */
            '<div class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></div>'
        );

        echo $byline; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

    }
endif;

if( ! function_exists('blog_aarambha_cat_list')):
    /**
     * Get Lists of Categories
     */

    function blog_aarambha_cat_list($enable_tag = true){
        ?>
        <div class="post-cat-list">
            <?php $post_categories = get_the_category(get_the_ID());
            foreach ($post_categories as $post_category):?>
                <span class="cat-link">
                <a href="<?php echo esc_url(get_category_link($post_category->term_id));?>"><?php echo esc_html($post_category->name)?></a>
            </span>
            <?php endforeach;?>

            <?php  /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'blog-aarambha') );

            if ($enable_tag == true) {
                if ($tags_list) {
                    /* translators: 1: list of tags. */
                    echo('<span class="tags-links">' . $tags_list . '</span>');
                }
            }?>
        </div>
        <?php

    }


endif;


if ( ! function_exists( 'blog_aarambha_post_thumbnail' ) ) :
    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     */
    function blog_aarambha_post_thumbnail() {
        if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
            return;
        }

        if ( is_singular() ) :
            ?>

            <div class="post-thumbnail">
                <?php the_post_thumbnail(); ?>
            </div><!-- .post-thumbnail -->

        <?php else : ?>

            <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                <?php
                the_post_thumbnail(
                    'post-thumbnail',
                    array(
                        'alt' => the_title_attribute(
                            array(
                                'echo' => false,
                            )
                        ),
                    )
                );
                ?>
            </a>

        <?php
        endif; // End is_singular().
    }
endif;
