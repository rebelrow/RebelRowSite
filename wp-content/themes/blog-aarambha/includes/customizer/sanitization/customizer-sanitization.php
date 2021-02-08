<?php
/**
 * Sanitization functions.
 *
 * @package Blog_Aarambha
 */

if ( ! function_exists( 'blog_aarambha_sanitize_select' ) ) :
    /**
     * Sanitize select.
     * @since 1.0.0
     * @param mixed                $input The value to sanitize.
     * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
     * @return mixed Sanitized value.
     */

    function blog_aarambha_sanitize_select( $input, $setting ) {

        // Ensure input is a slug.
        if (gettype($input) == 'string'){

            $input = esc_attr( $input );

        }else{
            $input = sanitize_key( $input );

        }

        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control( $setting->id )->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
    }

endif;


if ( ! function_exists( 'blog_aarambha_sanitize_checkbox' ) ) :

    /**
     * Sanitize checkbox.
     * @since 1.0.0
     *
     * @param bool $checked Whether the checkbox is checked.
     * @return bool Whether the checkbox is checked.
     */

    function blog_aarambha_sanitize_checkbox( $checked ) {

        return ( ( isset( $checked ) && true === $checked ) ? true : false );
    }

endif;

if ( ! function_exists( 'blog_aarambha_sanitize_number_range' ) ) :

    /**
     * Sanitize number range.
     * @since 1.0.0
     * @see absint() https://developer.wordpress.org/reference/functions/absint/
     * @param int                  $input Number to check within the numeric range defined by the setting.
     * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
     * @return int|string The number, if it is zero or greater and falls within the defined range; otherwise, the setting default.
     */

    function blog_aarambha_sanitize_number_range( $input, $setting ) {

        // Ensure input is an absolute integer.
        $input = absint( $input );

        // Get the input attributes associated with the setting.
        $atts = $setting->manager->get_control( $setting->id )->input_attrs;

        // Get min.
        $min = ( isset( $atts['min'] ) ? $atts['min'] : $input );

        // Get max.
        $max = ( isset( $atts['max'] ) ? $atts['max'] : $input );

        // Get Step.
        $step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

        // If the input is within the valid range, return it; otherwise, return the default.
        return ( $min <= $input && $input <= $max && is_int( $input / $step ) ? $input : $setting->default );
    }

endif;
