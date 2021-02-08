<?php
/**
 * Registers Blog Author Details
 *
 * @package Blog_Aarambha
 */

/**
 * Blog_Aarambha_Action
 */
function Blog_Aarambha_Action_Author() {

    register_widget('Blog_Aarambha_Author');

}

add_action('widgets_init', 'Blog_Aarambha_Action_Author');

/**
 * Class Blog_Aarambha_Author
 */
class Blog_Aarambha_Author extends WP_Widget {

    public $number = false;


    /**
     * Blog_Aarambha_Author constructor.
     */
    function __construct()  {

        global $control_ops;

        $widget_ops = array(
            'classname'   => 'widget-post-author',
            'description' => esc_html__( 'Displays Author Details', 'blog-aarambha' ),
        );

        parent::__construct( 'Blog_Aarambha_Author',esc_html__( 'Blog Aarambha:- Author Details', 'blog-aarambha' ), $widget_ops, $control_ops );
        add_action( 'admin_enqueue_scripts', [$this ,'blog_aarambha_author_scripts'] );


    }
    /**
     * Outputs the widget settings form.
     *
     * @since 1.0.0
     *
     * @param array $instance Current settings.
     */
    function form( $instance ) {

        // Defaults.
        $instance = wp_parse_args( (array) $instance, array(
            'title'                 => '',
            'description'           => '',
            'category1'             => '',
            'category2'             => '',
            'image_url'             => '',
            'author_facebook'   	=> '',
            'author_twitter'    	=> '',
            'author_linkedin'   	=> '',
            'author_instagram'  	=> '',
            'author_pinterest'  	=> '',
            'author_youtube'    	=> '',
            'social_title'          => '',

        ) );
        $image_url = '';
        $image_url  = esc_url( $instance[ 'image_url' ] );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
                <?php echo esc_html__( 'Name:', 'blog-aarambha' ); ?>:
            </label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>">
                <?php echo esc_html__( 'Description', 'blog-aarambha' ); ?>:
            </label>
            <textarea class="widefat" rows="4" id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>"><?php echo esc_textarea( $instance['description'] ); ?></textarea>
        </p>

        <div class="cover-image">
            <label for="<?php echo esc_attr( $this->get_field_id( 'image_url' ) ); ?>">
                <?php esc_html_e( 'Cover Image:', 'blog-aarambha' ); ?>
            </label><br />
            <input type="text" class="img widefat" name="<?php echo esc_attr( $this->get_field_name( 'image_url' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'image_url' ) ); ?>" value="<?php echo esc_url( $instance['image_url'] ); ?>" /><br />
            <input type="button" class="select-img button button-primary" value="<?php esc_attr_e( 'Upload', 'blog-aarambha' ); ?>" data-uploader_title="<?php esc_attr_e( 'Select Cover Photo', 'blog-aarambha' ); ?>" data-uploader_button_text="<?php esc_attr_e( 'Choose Image', 'blog-aarambha' ); ?>" style="margin-top:5px;" />

            <?php
            $image_url = '';

            if ( ! empty( $instance['image_url'] ) ) {

                $image_url = $instance['image_url'];

            }

            $wrap_style = '';

            if ( empty( $image_url ) ) {

                $wrap_style = ' style="display:none;" ';
            }
            ?>
            <?php if (isset($image_url) && !empty($image_url)): ?>
                <div class="rtam-preview-wrap" <?php echo esc_attr($wrap_style); ?>>
                    <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php esc_attr_e( 'Preview', 'blog-aarambha' ); ?>" style="max-width: 100%;"  />
                </div><!-- .rtam-preview-wrap -->
            <?php endif; ?>
        </div>


        <p>
            <label for="<?php echo esc_attr( $this->get_field_name('category1') ); ?>">
                <?php esc_html_e('Category 1:', 'blog-aarambha'); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('category1') ); ?>" name="<?php echo esc_attr( $this->get_field_name('category1') ); ?>" type="text" value="<?php echo esc_attr( $instance['category1'] ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_name('category2') ); ?>">
                <?php esc_html_e('Category 2:', 'blog-aarambha'); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('category2') ); ?>" name="<?php echo esc_attr( $this->get_field_name('category2') ); ?>" type="text" value="<?php echo esc_attr( $instance['category2'] ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_name('social_title') ); ?>">
                <?php esc_html_e('Title', 'blog-aarambha'); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('social-title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('social_title') ); ?>" type="text" value="<?php echo esc_attr( $instance['social_title'] ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_name('author_facebook') ); ?>">
                <?php esc_html_e('Facebook:', 'blog-aarambha'); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('author_facebook') ); ?>" name="<?php echo esc_attr( $this->get_field_name('author_facebook') ); ?>" type="text" value="<?php echo esc_url( $instance['author_facebook'] ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_name('author_twitter') ); ?>">
                <?php esc_html_e('Twitter:', 'blog-aarambha'); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('author_twitter') ); ?>" name="<?php echo esc_attr( $this->get_field_name('author_twitter') ); ?>" type="text" value="<?php echo esc_url( $instance['author_twitter'] ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_name('author_linkedin') ); ?>">
                <?php esc_html_e('LinkedIn:', 'blog-aarambha'); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('author_linkedin') ); ?>" name="<?php echo esc_attr( $this->get_field_name('author_linkedin') ); ?>" type="text" value="<?php echo esc_url( $instance['author_linkedin'] ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_name('author_instagram') ); ?>">
                <?php esc_html_e('Instagram:', 'blog-aarambha'); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('author_instagram') ); ?>" name="<?php echo esc_attr( $this->get_field_name('author_instagram') ); ?>" type="text" value="<?php echo esc_url( $instance['author_instagram'] ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_name('author_pinterest') ); ?>">
                <?php esc_html_e('Pinterest:', 'blog-aarambha'); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('author_pinterest') ); ?>" name="<?php echo esc_attr( $this->get_field_name('author_pinterest') ); ?>" type="text" value="<?php echo esc_url( $instance['author_pinterest'] ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_name('author_youtube') ); ?>">
                <?php esc_html_e('Youtube:', 'blog-aarambha'); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('author_youtube') ); ?>" name="<?php echo esc_attr( $this->get_field_name('author_youtube') ); ?>" type="text" value="<?php echo esc_url( $instance['author_youtube'] ); ?>" />
        </p>
        <?php
    }

    function widget( $args, $instance ) {

        extract( $args );

        $title              = !empty( $instance['title'] ) ? esc_html($instance['title']) : '';
        $image_url          = !empty( $instance['image_url'] ) ? esc_url($instance['image_url']) : '';
        $description        = !empty( $instance['description'] ) ? $instance['description'] : '';
        $author_facebook    = !empty( $instance['author_facebook'] ) ? esc_url( $instance['author_facebook'] ) : '';
        $author_twitter     = !empty( $instance['author_twitter'] ) ? esc_url( $instance['author_twitter'] ): '';
        $author_linkedin    = !empty( $instance['author_linkedin'] ) ? esc_url( $instance['author_linkedin'] ): '';
        $author_instagram   = !empty( $instance['author_instagram'] ) ? esc_url( $instance['author_instagram'] ) : '';
        $author_pinterest   = !empty( $instance['author_pinterest'] ) ? esc_url( $instance['author_pinterest'] ) : '';
        $author_youtube     = !empty( $instance['author_youtube'] ) ? esc_url( $instance['author_youtube'] ) : '';
        $category1          = !empty( $instance['category1'] ) ? esc_html( $instance['category1'] ) : '';
        $category2          = !empty( $instance['category2'] ) ? esc_html( $instance['category2'] ) : '';
        $social_title       = !empty( $instance['social_title']) ? esc_html( $instance['social_title']) : '';


        echo $before_widget; ?>

        <section class="widget widget_about_me">
            <article>

                <figure>
                    <img src="<?php echo esc_url( $image_url);?>">
                </figure>

                <div class="about-contain">

                    <div class="author-details">
                        <div class="title-position-wrap">

                            <?php if ( !empty( $title ) ): ?>
                                <h4 class="entry-title">
                                    <?php echo esc_html($title);?>
                                </h4>
                            <?php endif; ?>
                            <div class="position">
                                    <span>
                                        <a href="#"><?php echo esc_html($category1)?></a>
                                    </span>
                                <span>
                                        <a href="#"><?php echo esc_html($category2)?></a>
                                    </span>
                            </div>

                        </div>

                        <?php if ( !empty( $description ) ): ?>

                            <div class="entry-content">
                                <p><?php echo esc_html( $description );?></p>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </article>
        </section>
        <section class="widget widget_follow_me">
            <h4 class="widget-title">
                <?php echo esc_html($social_title);?>
            </h4>
            <div class="social-links">

                <?php if( $author_facebook || $author_twitter || $author_linkedin || $author_instagram || $author_pinterest || $author_youtube ) { ?>

                    <ul>
                        <?php if( $author_facebook ){ ?>
                            <li>
                                <a href="<?php echo esc_url( $author_facebook ); ?>" target="_blank"></a>
                            </li>
                        <?php } ?>
                        <?php if( $author_twitter ){ ?>
                            <li>
                                <a href="<?php echo esc_url( $author_twitter ); ?>" target="_blank"></a>
                            </li>
                        <?php } ?>
                        <?php if( $author_instagram ){ ?>
                            <li>
                                <a href="<?php echo esc_url( $author_instagram ); ?>" target="_blank"></a>
                            </li>
                        <?php } ?>
                        <?php if( $author_linkedin ){ ?>
                            <li>
                                <a href="<?php echo esc_url( $author_linkedin ); ?>" target="_blank"></a>
                            </li>
                        <?php } ?>
                        <?php if( $author_pinterest ){ ?>
                            <li>
                                <a href="<?php echo esc_url( $author_pinterest ); ?>" target="_blank"></a>
                            </li>
                        <?php } ?>
                        <?php if( $author_youtube ){ ?>
                            <li>
                                <a href="<?php echo esc_url( $author_youtube ); ?>" target="_blank"></a>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            </div>
        </section>


        <?php echo $after_widget;
    }
    function update( $new_instance, $old_instance ) {

        $instance = $old_instance;

        $instance['title']          = sanitize_text_field( $new_instance['title'] );

        $instance['image_url'] 		= isset($new_instance['image_url']) ? esc_url_raw($new_instance['image_url']) : '';

        if ( current_user_can( 'unfiltered_html' ) ) {
            $instance['description'] = $new_instance['description'];
        } else {
            $instance['description'] = wp_kses_post( $new_instance['description'] );
        }

        $instance['author_facebook']    = esc_url_raw( $new_instance['author_facebook'] );

        $instance['author_twitter']     = esc_url_raw( $new_instance['author_twitter'] );

        $instance['author_linkedin']    = esc_url_raw( $new_instance['author_linkedin'] );

        $instance['author_instagram']   = esc_url_raw( $new_instance['author_instagram'] );

        $instance['author_pinterest']   = esc_url_raw( $new_instance['author_pinterest'] );

        $instance['author_youtube']     = esc_url_raw( $new_instance['author_youtube'] );

        $instance['category1']         = sanitize_text_field($new_instance['category1']);

        $instance['category2']         = sanitize_text_field($new_instance['category2']);

        $instance['social_title']      = sanitize_text_field($new_instance['social_title']);



        return $instance;

    }
    function blog_aarambha_author_scripts( ) {

        wp_enqueue_media();
        wp_enqueue_script('blog-aarambha-custom-widget', BLOG_AARAMBHA_JS_URI . 'custom-widget.js',array(),false,true);

    }


}


