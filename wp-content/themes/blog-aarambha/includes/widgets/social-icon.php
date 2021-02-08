<?php
/**
 * Register Social Icon Widget.
 *
 * @package Blog_Aarambha
 */

function Blog_Aarambha_Action_Social_Icon() {

    register_widget('Blog_Aarambha_Social_Icon');

}

add_action('widgets_init', 'Blog_Aarambha_Action_Social_Icon');


/**
 * Class Blog_Aarambha_Social_Icon
 */
class Blog_Aarambha_Social_Icon extends WP_Widget {

    /**
     * Blog_Aarambha_Social_Icon constructor.
     */
    function __construct()  {

        global $control_ops;

        $widget_ops = array(
            'description' => esc_html__( 'Add Social Icon', 'blog-aarambha' ),
        );

        parent::__construct( 'Blog_Aarambha_Social_Icon',esc_html__( 'Aarambha Social Icon', 'blog-aarambha' ), $widget_ops, $control_ops );

    }
    /**
     * Outputs the widget settings form.
     *
     *
     * @param array $instance Current settings.
     */
    function form( $instance ) {

        // Defaults.
        $instance = wp_parse_args( (array) $instance, array(
            'facebook_link'   	=> '',
            'twitter_link'    	=> '',
            'linkedIn_link'   	=> '',
            'instagram_link'  	=> '',
            'pinterest_link'  	=> '',
            'youtube_link'    	=> '',

        ) );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_name('facebook_link') ); ?>">
                <?php esc_html_e('Facebook:', 'blog-aarambha'); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('facebook_link') ); ?>" name="<?php echo esc_attr( $this->get_field_name('facebook_link') ); ?>" type="text" value="<?php echo esc_url( $instance['facebook_link'] ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_name('twitter_link') ); ?>">
                <?php esc_html_e('Twitter:', 'blog-aarambha'); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('twitter_link') ); ?>" name="<?php echo esc_attr( $this->get_field_name('twitter_link') ); ?>" type="text" value="<?php echo esc_url( $instance['twitter_link'] ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_name('linkedIn_link') ); ?>">
                <?php esc_html_e('LinkedIn:', 'blog-aarambha'); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('linkedIn_link') ); ?>" name="<?php echo esc_attr( $this->get_field_name('linkedIn_link') ); ?>" type="text" value="<?php echo esc_url( $instance['linkedIn_link'] ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_name('instagram_link') ); ?>">
                <?php esc_html_e('Instagram:', 'blog-aarambha'); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('instagram_link') ); ?>" name="<?php echo esc_attr( $this->get_field_name('instagram_link') ); ?>" type="text" value="<?php echo esc_url( $instance['instagram_link'] ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_name('pinterest_link') ); ?>">
                <?php esc_html_e('Pinterest:', 'blog-aarambha'); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('pinterest_link') ); ?>" name="<?php echo esc_attr( $this->get_field_name('pinterest_link') ); ?>" type="text" value="<?php echo esc_url( $instance['pinterest_link'] ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_name('youtube_link') ); ?>">
                <?php esc_html_e('Youtube:', 'blog-aarambha'); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('youtube_link') ); ?>" name="<?php echo esc_attr( $this->get_field_name('youtube_link') ); ?>" type="text" value="<?php echo esc_url( $instance['youtube_link'] ); ?>" />
        </p>
        <?php
    }

    function widget( $args, $instance ) {

        extract( $args );

        $facebook_link    = !empty( $instance['facebook_link'] ) ? esc_url( $instance['facebook_link'] ) : '';
        $twitter_link     = !empty( $instance['twitter_link'] ) ? esc_url( $instance['twitter_link'] ): '';
        $linkedIn_link    = !empty( $instance['linkedIn_link'] ) ? esc_url( $instance['linkedIn_link'] ): '';
        $instagram_link   = !empty( $instance['instagram_link'] ) ? esc_url( $instance['instagram_link'] ) : '';
        $pinterest_link   = !empty( $instance['pinterest_link'] ) ? esc_url( $instance['pinterest_link'] ) : '';
        $youtube_link     = !empty( $instance['youtube_link'] ) ? esc_url( $instance['youtube_link'] ) : '';


        echo $before_widget; ?>
        <section class="widget social_widget">
            <div class="social-links">

                <?php if( $facebook_link || $twitter_link || $linkedIn_link || $instagram_link || $pinterest_link || $youtube_link ) { ?>

                    <div class="inline-social-icons social-links"> <!-- inline social links starting from here -->
                        <ul>
                            <?php if( $facebook_link ){ ?>
                                <li>
                                    <a href="<?php echo esc_url( $facebook_link ); ?>" target="_blank"></a>
                                </li>
                            <?php } ?>
                            <?php if( $twitter_link ){ ?>
                                <li>
                                    <a href="<?php echo esc_url( $twitter_link ); ?>" target="_blank"></a>
                                </li>
                            <?php } ?>
                            <?php if( $instagram_link ){ ?>
                                <li>
                                    <a href="<?php echo esc_url( $instagram_link ); ?>" target="_blank"></a>
                                </li>
                            <?php } ?>
                            <?php if( $linkedIn_link ){ ?>
                                <li>
                                    <a href="<?php echo esc_url( $linkedIn_link ); ?>" target="_blank"></a>
                                </li>
                            <?php } ?>
                            <?php if( $pinterest_link ){ ?>
                                <li>
                                    <a href="<?php echo esc_url( $pinterest_link ); ?>" target="_blank"></a>
                                </li>
                            <?php } ?>
                            <?php if( $youtube_link ){ ?>
                                <li>
                                    <a href="<?php echo esc_url( $youtube_link ); ?>" target="_blank"></a>
                                </li>
                            <?php } ?>

                        </ul>
                    </div>
                <?php } ?>
            </div>
        </section>


        <?php echo $after_widget;
    }

    function update( $new_instance, $old_instance ) {

        $instance = $old_instance;

        $instance['facebook_link']    = esc_url_raw( $new_instance['facebook_link'] );

        $instance['twitter_link']     = esc_url_raw( $new_instance['twitter_link'] );

        $instance['linkedIn_link']    = esc_url_raw( $new_instance['linkedIn_link'] );

        $instance['instagram_link']   = esc_url_raw( $new_instance['instagram_link'] );

        $instance['pinterest_link']   = esc_url_raw( $new_instance['pinterest_link'] );

        $instance['youtube_link']     = esc_url_raw( $new_instance['youtube_link'] );


        return $instance;

    }


}


