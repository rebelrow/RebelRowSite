<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
        <?php if (get_theme_mod('blog_category_checkbox',1)){
            blog_aarambha_cat_list();
        }?>
        <header class="entry-header">
            <h2 class="entry-title">
                <a href="<?php the_permalink();?>">
                    <?php the_title()?>
                </a>
            </h2>
        </header>
        <div class="entry-meta">
            <?php if (get_theme_mod('blog_author_checkbox',1)){
                blog_aarambha_posted_by();
            }
            ?>
            <?php if(get_theme_mod('blog_date_checkbox',1)){
                blog_aarambha_posted_on();
            }
            ?>
        </div>
        <div class="entry-content">
            <?php
            if(get_theme_mod('content_type_radio_button','content') == 'content'){
                the_content();
            }else{
                the_excerpt();
            }?>
        </div>

    </div>
</article>

