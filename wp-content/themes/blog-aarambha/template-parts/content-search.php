<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blog_Aarambha
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if (has_post_thumbnail()):?>
        <figure>
            <?php blog_aarambha_post_thumbnail()?>
        </figure>
    <?php endif;?>
    <div class="post-content">
        <?php
        blog_aarambha_cat_list();
        ?>
        <header class="entry-header">
            <h2 class="entry-title">
                <a href="<?php the_permalink();?>">
                    <?php the_title()?>
                </a>
            </h2>
        </header>
        <div class="entry-meta">
            <?php
            blog_aarambha_posted_by();

            ?>
            <?php
            blog_aarambha_posted_on();
            ?>
        </div>
        <div class="entry-content">
            <?php the_content();?>
        </div>

    </div>
</article>