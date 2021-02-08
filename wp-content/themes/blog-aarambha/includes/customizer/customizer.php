<?php
/**
 * Blog_Aarambha_Customizer
 * @package Blog_aarambha
 */
class Blog_Aarambha_Customizer{


    public function __construct()
    {
        add_action( 'customize_register' ,[ $this,'blog_aarambha_customize_register'] );

    }

    /**
     * @param $wp_customize
     */
    public function blog_aarambha_customize_register( $wp_customize ) {

        /**
         * Including custom controls
         */
        require_once  BLOG_AARAMBHA_CUSTOMIZER_URI  . 'controls/select-category.php';
        require_once  BLOG_AARAMBHA_CUSTOMIZER_URI  . 'controls/custom-slider.php';
        require_once  BLOG_AARAMBHA_CUSTOMIZER_URI  . 'controls/custom-sidebar.php';
        require_once  BLOG_AARAMBHA_CUSTOMIZER_URI  . 'controls/custom-upsell.php';

        /**
         * Storing Panels File Name
         * @var array $panels
         */
        $panels = ['theme-option'];

        foreach ($panels as $panel){

            require_once BLOG_AARAMBHA_PANELS . $panel . '.php';
        }

        /**
         * Registering Blog_Aarambha_Upsell_Section.
         */
        $wp_customize->register_section_type( 'Blog_Aarambha_Upsell_Section' );
        $wp_customize->add_section( new Blog_Aarambha_Upsell_Section($wp_customize,'blog_aarambha_upsell_section',
                array(
                    'priority' => 0,
                    'title'    => esc_html__( 'View Pro Version', 'blog-aarambha' ),
                    'url'      => 'https://aarambhathemes.com/themes/blog-aarambha-pro/'
                ))
        );
    }
}

$blog_aarambha_customizer = new Blog_Aarambha_Customizer();



