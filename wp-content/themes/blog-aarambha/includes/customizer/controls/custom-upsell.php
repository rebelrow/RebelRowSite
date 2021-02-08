<?php
/**
 * Customizer Control: Blog_Aarambha_Upsell
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * Upsell control
 */
class Blog_Aarambha_Upsell_Section extends WP_Customize_Section {

    /**
     * The control type.
     *
     * @access public
     * @var string
     */
    public $type = 'blog-aarambha-upsell';
    public $url  = '';
    public $id = '';

    /**
     * JSON.
     */
    public function json() {
        $json 			= parent::json();
        $json['url'] 	= esc_url( $this->url );
        $json['id'] 	= $this->id;
        return $json;
    }

    /**
     * Render template
     *
     * @access protected
     */
    protected function render_template() {

        ?>
        <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
            <h3>
                <a href="{{{ data.url }}}" target="_blank">{{ data.title }}</a>
            </h3>
        </li>
        <?php
    }
}

/**
 * Enqueue control related scripts/styles.
 *
 * @access public
 */
function blog_aarambha_upsell_enqueue() {
    wp_enqueue_script( 'blog-aarambha-upsell-js', BLOG_AARAMBHA_JS_URI . 'upsell.js', array( 'customize-controls' ), false, true );
    wp_enqueue_style( 'blog-aarambha-upsell-css', BLOG_AARAMBHA_CSS_URI . 'upsell.css', null );
}
add_action( 'customize_controls_enqueue_scripts', 'blog_aarambha_upsell_enqueue' );