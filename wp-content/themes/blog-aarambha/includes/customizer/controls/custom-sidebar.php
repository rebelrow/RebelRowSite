<?php
/**
 * Blog_Aarambha Customize sidebar layout control
 *
 * @package Blog_aarambha
 */

if (class_exists('WP_Customize_Control') && ! class_exists( 'Blog_Aarambha_Customize_Sidebar_Control' ) ) {

    class Blog_Aarambha_Customize_Sidebar_Control extends WP_Customize_Control {

        /**
         * Control scripts and styles enqueue
         *
         * @since 1.0.0
         */
        public function enqueue() {

            wp_enqueue_script( 'blog-aarambha-customizer-custom-js', BLOG_AARAMBHA_JS_URI. 'customizer.js', array( 'jquery', 'jquery-ui-core' ), '1.0.0',true );
            wp_enqueue_style( 'blog-aarambha-custom-controls-css', BLOG_AARAMBHA_CSS_URI . 'customizer.css', array(), '1.0', 'all' );
        }
        public function render_content() {

            if ( empty( $this->choices ) )
                return;

            $name = '_customize-radio-' . $this->id;

            ?>

            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <ul class="controls" id='blog-aarambha-layouts-container'>
                <?php
                foreach ( $this->choices as $value => $label ) :

                    $class = ($this->value() == $value) ? 'blog-aarambha-sidebar-img-selected blog-aarambha-sidebar-img' : 'blog-aarambha-sidebar-img';
                    ?>
                    <li>
                        <label>
                            <input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
                            <img src = '<?php echo esc_url( $label ); ?>' class = '<?php echo esc_attr($class); ?>' />
                        </label>
                    </li>
                <?php
                endforeach;
                ?>
            </ul>

            <?php
        }
    }
}