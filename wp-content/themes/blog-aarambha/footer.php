<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blog_Aarambha
 */

if (is_front_page() && is_home()):
    /**
     * Checking whether Woocommerce is installed or not
     */
    if (class_exists( 'WooCommerce' )):
        if (get_theme_mod('product_section_checkbox',1)):
            ?>
            <section class="shop-section">
                <div class="container">
                    <?php
                    $blog_aarambha_product_section_title           = get_theme_mod('product_section_title','');
                    $blog_aarambha_product_per_page                = get_theme_mod('product_section_display_per_product','');
                    $blog_aarambha_filter_product_category         = get_theme_mod('product_section_category_select','');

                    $blog_aarambha_product_args = [
                        'post_type'      => 'product',
                        'posts_per_page' => absint($blog_aarambha_product_per_page),
                    ];

                    if ($blog_aarambha_filter_product_category) {
                        $blog_aarambha_product_args['tax_query'] = [
                            [
                                'taxonomy' => 'product_cat',
                                'terms'    => [absint($blog_aarambha_filter_product_category)]
                            ]
                        ];
                    }
                    $blog_aarambha_query_for_products = new WP_Query($blog_aarambha_product_args);
                    if ($blog_aarambha_query_for_products->have_posts()):
                        ?>
                        <div class="shop-wrapper">
                            <header class="entry-header">
                                <h4 class="entry-title"><?php echo esc_html($blog_aarambha_product_section_title)?> </h4>
                            </header>
                            <div class="shop-slide">
                                <?php
                                while ($blog_aarambha_query_for_products->have_posts()):
                                    $blog_aarambha_query_for_products->the_post();

                                    $blog_aarambha_product         = wc_get_product( get_the_ID() );
                                    $blog_aarambha_regular_price   = absint($blog_aarambha_product->get_regular_price());
                                    $blog_aarambha_sale_price      = absint($blog_aarambha_product->get_sale_price());
                                    ?>
                                    <div class="shop-item">
                                        <div class="product-list-wrapper">
                                            <div class="image-icon-wrapper">
                                                <figure class="featured-img">

                                                    <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID()))?>">
                                                    <?php if (get_theme_mod('product_section_discount_checkbox',1)):?>
                                                        <?php if($blog_aarambha_sale_price && $blog_aarambha_sale_price < $blog_aarambha_regular_price):
                                                            $blog_aarambha_discount            = $blog_aarambha_regular_price - $blog_aarambha_sale_price;
                                                            $blog_aarambha_discount_percentage = ($blog_aarambha_discount/$blog_aarambha_regular_price)*100;
                                                            $blog_aarambha_discount_percentage = round($blog_aarambha_discount_percentage);
                                                            ?>
                                                            <div class="sales-tag"><span><?php echo esc_html($blog_aarambha_discount_percentage);?><?php echo esc_html__('% off','blog-aarambha')?></span></div>
                                                        <?php endif; endif; ?>
                                                </figure>
                                                <div class="icons">
                                                    <a rel="nofollow" href="<?php the_permalink();?>" class="product_type_simple add_to_cart_button ajax_add_to_cart">
                                                        <?php echo  esc_html(get_theme_mod('product_section_title_product_shop',''))?>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="list-info">
                                                <div class="list-info-wrap">
                                                    <header class="entry-header">
                                                        <h4 class="entry-title">
                                                            <a href="<?php the_permalink();?>"><?php the_title()?></a>
                                                        </h4>
                                                    </header>
                                                    <div class="woocommerce-product-rating">
                                                        <?php woocommerce_template_loop_rating();?>
                                                    </div>
                                                </div>
                                                <span class="price">
                                                            <?php echo wp_kses_post($blog_aarambha_product->get_price_html())?>
                                                        </span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile;
                                ?>
                            </div>
                        </div>
                    <?php
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
            </section>
        <?php endif; endif;?>
    </main></div><!-- row--></div><!-- container --></div><!-- #content --></div>
<?php endif;?>

<footer id="colophon" class="site-footer"> <!-- footer starting from here -->
  <?php  if (is_active_sidebar('subscribe-footer-bar')) : ?>
    <div class="top-footer section-padding">
        <div class="container">
            <div class="widget-holder">
                <?php dynamic_sidebar('subscribe-footer-bar');?>
            </div>
        </div>
    </div>
    <?php endif;

    ?>
    <div class="middle-footer">
        <div class="container">
            <div class="middle-footer-wrapper">
                <?php if (is_active_sidebar('footer-bar-1')):?>
                    <div class="widget-holder">
                        <?php dynamic_sidebar('footer-bar-1');?>
                    </div>
                <?php endif;?>
                <?php if (is_active_sidebar('footer-bar-2') ==true) : ?>
                    <div class="widget-holder">
                        <?php dynamic_sidebar('footer-bar-2');?>
                    </div>
                <?php endif;?>
                <?php if (is_active_sidebar('footer-bar-3')) : ?>
                    <div class="widget-holder">
                        <?php dynamic_sidebar('footer-bar-3');?>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>

    <div class="bottom-footer">
        <div class="container">
            <div class="bottom-footer-wrapper">

                <div class="site-generator">
                    <?php if (get_theme_mod('footer_bar_copy_right','')):?>
                        <span><?php echo esc_html(get_theme_mod('footer_bar_copy_right',''))?></span>
                    <?php endif;?>
                    <div>
                            <span><?php printf( esc_html__( 'Powered By %1$s.', 'blog-aarambha' ),'<a href="'.esc_url( 'https://aarambhathemes.com/' ).'" rel="designer">'.'Aarambha Themes'.'</a>' );?>
                            </span>
                    </div>
                </div>
                <?php
                $blog_aarambha_footer_bar_option_radio_button = get_theme_mod('footer_bar_option_radio_button','menu');
                switch ($blog_aarambha_footer_bar_option_radio_button):
                    case 'menu';
                    default:
                        blog_aarambha_footer_menu();
                        break;
                    case 'icon';
                        blog_aarambha_icon();
                        break;
                    case 'tag':
                        echo esc_html(get_theme_mod('footer_bar_tag',''));
                        break;
                endswitch;
                ?>
            </div>
        </div>
    </div>
</footer>
<?php
if (get_theme_mod('scroll_to_top_button' ,1)):?>
    <div class="back-to-top">
        <a href="#masthead" title="<?php esc_attr_e('Go to Top','blog-aarambha');?>" class="fa-angle-up"></a>
    </div>
<?php endif; ?>
</div>

<?php wp_footer(); ?>
</body>
</html>

