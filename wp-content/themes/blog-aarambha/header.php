<?php
/**
 * The header for blog aarambha
 *
 * This is the template that displays all of the <head> section as well as <body>.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blog_aarambha
 */
?>
<!DOCTYPE html> <html <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <?php wp_head(); ?>
    </head>

<body <?php body_class(); ?>>
    <?php if ( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
    }else
    { do_action( 'wp_body_open' ); }?>

    <div id="page" class="hfeed-site">
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'blog-aarambha' ); ?></a>
        <header id="masthead" class="site-header">
        <div class="top-header">
            <div class="container">
                <div class="top-header-wrap">
                    <div class="top-header-left">
                        <?php
                        $blog_aarambha_top_header_section_left_element = get_theme_mod('top_header_section_left_element','menu');

                        switch ($blog_aarambha_top_header_section_left_element):
                            case 'menu':
                            default:
                                blog_aarambha_top_header_menu();
                                break;
                            case 'icon':
                                blog_aarambha_icon();
                                break;
                            case 'search-cart':
                                blog_aarambha_search_bar_cart();
                                break;
                            case 'phone-addr':
                                blog_aarambha_phone_address();
                                break;
                        endswitch;
                        ?>
                    </div><!-- .top-header-left ends here -->
                    <div class="top-header-right">
                        <?php
                        $blog_aarambha_top_header_section_right_element = get_theme_mod('top_header_section_right_element','search-cart');
                        switch ($blog_aarambha_top_header_section_right_element):
                            case 'menu':
                            default:
                                blog_aarambha_top_header_menu();
                                break;
                            case 'icon':
                                blog_aarambha_icon();
                                break;
                            case 'search-cart':
                                blog_aarambha_search_bar_cart();
                                break;
                            case 'phone-addr':
                                blog_aarambha_phone_address();
                                break;
                        endswitch;
                        ?>
                    </div><!-- .top-header-right ends here -->
                </div>
            </div><!-- .container ends here -->
        </div><!-- .top-header ends here -->
        <div class="hgroup-wrap">
            <div class="container">
                <?php
                $blog_aarambha_header_layout = get_theme_mod('main_header_logo_layout_radio_image','center');
                switch($blog_aarambha_header_layout){
                    case 'center':
                    default:
                        blog_aarambha_primary_menu();
                        blog_aarambha_logo();
                        blog_aarambha_secondary_menu();
                        break;
                    case 'left':
                        echo "<div class='logo-layout-left'>";
                        blog_aarambha_logo();
                        blog_aarambha_primary_menu();
                        echo "</div>";
                        break;
                    case 'right':
                        echo "<div class='logo-layout-right'>";
                        blog_aarambha_primary_menu();
                        blog_aarambha_logo();
                        echo "</div>";
                        break;
                }
                ?>
            </div>
        </div><!-- .hgroup-wrap ends here -->
           <?php  if ( is_front_page() || is_home() ){?>
                <?php if (get_theme_mod('slider_section_checkbox',false)): ?>
                    <section class="main-slider <?php echo esc_attr(get_theme_mod('slider_box_position','center_right'))?>">
                        <div class="main-slider-wrap">
                            <?php
                            $blog_aarambha_category_id                = get_theme_mod('slider_section_select_category','');
                            $blog_aarambha_slider_section_per_post    = get_theme_mod('slider_section_per_post','');
                            $blog_aarambha_args = [
                                'post_type'      => 'post',
                            ];
                            if ($blog_aarambha_category_id > 0){
                                $blog_aarambha_args['cat'] = absint($blog_aarambha_category_id);
                            }
                            if ($blog_aarambha_slider_section_per_post > 0){
                                $blog_aarambha_args['posts_per_page'] = absint($blog_aarambha_slider_section_per_post);
                            }
                            $blog_aarambha_query_for_post_slider      = new WP_Query($blog_aarambha_args);
                            if ($blog_aarambha_query_for_post_slider->have_posts()):
                                while($blog_aarambha_query_for_post_slider->have_posts()):
                                    $blog_aarambha_query_for_post_slider->the_post();
                                    $blog_aarambha_image_id = get_post_thumbnail_id();
                                    $blog_aarambha_image_url = wp_get_attachment_image_src($blog_aarambha_image_id,'blog-aarambha_slider', false);
                                    if (has_post_thumbnail()):
                                        ?>
                                        <article class="post">
                                            <figure>
                                                <img src="<?php echo esc_url( $blog_aarambha_image_url[0] );?>">
                                            </figure>
                                            <?php if (get_theme_mod('slider_section_box_checkbox',true)):?>
                                                <div class="main-slider-contain">
                                                    <div class="post-content">
                                                        <?php if(get_theme_mod('slider_section_category_checkbox',true)){
                                                            blog_aarambha_cat_list();
                                                        }?>
                                                        <header class="entry-header">
                                                            <h2 class="entry-title">
                                                                <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                                            </h2>
                                                        </header>
                                                        <div class="entry-meta">
                                                            <?php if(get_theme_mod('slider_section_author_checkbox',true)){
                                                                blog_aarambha_posted_by();
                                                            }?>
                                                            <?php if (get_theme_mod('slider_section_date_checkbox',true)){
                                                                blog_aarambha_posted_on();
                                                            }?>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif;?>
                                        </article>
                                    <?php endif; endwhile;
                            endif;
                            wp_reset_postdata();
                            ?>
                        </div>
                    </section>
                <?php endif; }?>
            <?php if(!is_404() && !is_home() && !is_front_page() ) {
               if (get_header_image()):?>
               <section class="page-title-wrap" style="background-image: url(<?php header_image();?>)">
                   <div class="container">
                       <h4 class="entry-title"><?php blog_aarambha_header_title()?></h4>
                   </div>
               </section>
               <?php endif;}?>
        </header><!-- header ends here -->
        <div id="content" class="site-content">
            <?php if(is_front_page() && is_home()):?>
                <div class="container">
                <div class="row">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">
                           <?php
                            if(get_theme_mod('quotes_section_checkbox' , 1)):
                                $blog_aarambha_quotes_page   = get_theme_mod('quotes_section_select_page');
                                if($blog_aarambha_quotes_page):
                                    $blog_aarambha_query_for_Page = new WP_Query(['page_id' => absint($blog_aarambha_quotes_page) ]);
                                    while ($blog_aarambha_query_for_Page->have_posts()):
                                        $blog_aarambha_query_for_Page->the_post();?>
                                            <section class="quote-section section-padding">
                                                <div class="container">
                                                    <div class="quote-wrap">
                                                        <h4 class="entry-title"><?php the_title()?></h4>
                                                        <q><?php  the_content();?></q>
                                                    </div>
                                                </div>
                                            </section>
                                    <?php endwhile; wp_reset_postdata();
                                endif;
                             endif;

                            if(get_theme_mod('featured_post_checkbox',false)):
                                $blog_aarambha_category_id                 = get_theme_mod('featured_posts_filter_category','');
                                $blog_aarambha_featured_option_per_posts   = get_theme_mod('featured_option_per_posts','');
                                $blog_aarambha_query_for_featured_posts    = new WP_Query(
                                    [
                                        'post_type'         => 'post',
                                        'cat'               => absint($blog_aarambha_category_id),
                                        'posts_per_page'    => absint($blog_aarambha_featured_option_per_posts),
                                    ]
                                );
                                if ($blog_aarambha_query_for_featured_posts->have_posts()): ?>
                                    <section class="category-section section-padding">
                                        <div class="container">
                                            <div class="category-section-wrap">
                                                <?php
                                                while ($blog_aarambha_query_for_featured_posts->have_posts()):
                                                    $blog_aarambha_query_for_featured_posts->the_post();
                                                    if ( has_post_thumbnail() ):
                                                        ?>
                                                        <article class="post">
                                                            <figure>
                                                                <?php the_post_thumbnail('blog-aarambha_featured_post',['alt' => esc_attr(get_the_title()) ]);?>
                                                            </figure>
                                                            <?php if (get_theme_mod('featured_post_category_checkbox',true)):?>
                                                                <div class="post-content">
                                                                    <?php blog_aarambha_cat_list(false);?>
                                                                </div>
                                                            <?php endif;?>
                                                        </article>
                                                    <?php endif;
                                                endwhile;
                                                ?>
                                            </div>
                                        </div>
                                    </section>
                                <?php endif; wp_reset_postdata();?>
                            <?php endif;
                            $blog_aarambha_advertisement_img = get_theme_mod('advertisement_image','');
                            if ($blog_aarambha_advertisement_img):?>
                                <section class="blog-aarambha-vert">
                                    <div class="container">
                                        <figure>
                                            <?php
                                            $blog_aarambha_advertisement_id  = attachment_url_to_postid($blog_aarambha_advertisement_img);
                                            $blog_aarambha_advertisement_alt = get_post_meta($blog_aarambha_advertisement_id,'_wp_attachment_image_alt',true);
                                            ?>
                                            <img src="<?php echo esc_url($blog_aarambha_advertisement_img); ?>" alt="<?php echo esc_attr($blog_aarambha_advertisement_alt); ?>">
                                        </figure>
                                    </div>
                                </section>
                            <?php
                            endif;
                             ?>
            <?php endif;
