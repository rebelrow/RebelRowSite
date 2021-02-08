<?php
/**
 * Customizer slider custom controls
 *
 * @package Blog_Aarambha
 */

class Blog_Aarambha_Slider_Custom_Control extends WP_Customize_Control {
    /**
     * Control type
     *
     * @var string
     */
    public $type = 'blog-aarambha-slider_control';
    /**
     * Control scripts and styles enqueue
     *
     * @since 1.0.0
     */
    public function enqueue() {

        wp_enqueue_script( 'blog-aarambha-customizer-custom-js', BLOG_AARAMBHA_JS_URI. 'customizer.js', array( 'jquery', 'jquery-ui-core' ), '1.0.0',true );
        wp_enqueue_style( 'blog-aarambha-custom-controls-css', BLOG_AARAMBHA_CSS_URI . 'customizer.css', array(), '1.0', 'all' );
    }
    /**
     * Control method
     *
     * @since 1.0.0
     */
    public function render_content() {
        ?>
        <div class="slider-custom-control">
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span><input type="number" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-slider-value" <?php echo $this->link(); ?> />
            <div class="slider" slider-min-value="<?php echo esc_attr( $this->input_attrs['min'] ); ?>" slider-max-value="<?php echo esc_attr( $this->input_attrs['max'] ); ?>" slider-step-value="<?php echo esc_attr( $this->input_attrs['step'] ); ?>"></div><span class="slider-reset dashicons dashicons-image-rotate" slider-reset-value="<?php echo esc_attr( $this->setting->default ); ?>"></span>
        </div>
        <?php
    }
}