<?php
/**
 * Woocommerce Support
 * @package Blog_aarambha
 */

if (class_exists( 'WooCommerce' )) {

    /**
     * Class Blog_Aarambha_Woocommerce_Support
     *
     * All the action and filter for woocommerce are registered here
     */
    class Blog_Aarambha_Woocommerce_Support
    {
        /**
         * Blog_Aarambha_Woocommerce_Support constructor.
         */
        public function __construct()
        {

            add_action( 'after_setup_theme', [$this,'blog_aarambha_woocommerce_setup'] );
            add_filter('woocommerce_add_to_cart_fragments', [$this, 'blog_aarambha_cart_count_fragments'], 10, 1);
            add_action( 'woocommerce_before_main_content', [$this,'wocommerce_blog_aarambha_before_wrapper'],9 );
            add_action( 'woocommerce_sidebar', [$this,'woocommerce_blog_aarambha_after_wrapper'] ,50);


        }

        /**
         * @param $fragments
         * @return mixed
         *
         * Counting the Total Quantity using Ajax
         */
        public function blog_aarambha_cart_count_fragments($fragments)
        {

            $fragments['span.cart-quantity'] = '<span class="cart-quantity">' . absint( WC()->cart->get_cart_contents_count() ). '</span>';

            return $fragments;
        }

        /**
         * Adding Theme Support
         */
        public function blog_aarambha_woocommerce_setup() {
            add_theme_support( 'woocommerce' );
            add_theme_support( 'wc-product-gallery-zoom' );
            add_theme_support( 'wc-product-gallery-lightbox' );
            add_theme_support( 'wc-product-gallery-slider' );
        }

        /**
         * Before Theme Wrapper
         */
        public function wocommerce_blog_aarambha_before_wrapper(){

            ?>
            <div id="content" class="site-content">
                <div class="container">
            <?php
        }

        /**
         * After Theme Wrapper
         */
         public function woocommerce_blog_aarambha_after_wrapper(){

                 get_sidebar('both');
                 get_sidebar();

            ?>
                </div>
             </div>
                    <?php
         }
    }

    $blog_aarambha_wooocommerce = new Blog_Aarambha_Woocommerce_Support();

}

