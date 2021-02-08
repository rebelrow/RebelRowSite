<?php
/**
 * Widget API: Blog_Aarambha_Recent_Posts class
 *
 * @package Blog_Aarambha
 */

/**
 * Core class used to implement a Recent Posts widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
function Blog_Aarambha_Action_Recent_Posts() {

    register_widget('Blog_Aarambha_Recent_Posts');

}

add_action('widgets_init', 'Blog_Aarambha_Action_Recent_Posts');

class Blog_Aarambha_Recent_Posts extends WP_Widget {

    /**
     * Sets up a new Recent Posts widget instance.
     *
     */
    public function __construct() {
        $widget_ops = array(
            'classname'                   => 'widget_recent',
            'description'                 => esc_html__( 'Blog Aarambha recent Posts','blog-aarambha' ),
            'customize_selective_refresh' => true,
        );
        parent::__construct( 'blog-aarambha-recent-posts', esc_html__( 'Blog Aarambha Recent Posts','blog-aarambha' ), $widget_ops );
        $this->alt_option_name = 'widget_recent';
    }

    /**
     * Outputs the content for the current Recent Posts widget instance.
     *
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance Settings for the current Recent Posts widget instance.
     */
    public function widget( $args, $instance ) {
        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Aarambha Recent Posts','blog-aarambha' );

        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
        if ( ! $number ) {
            $number = 5;
        }
        $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

        $r = new WP_Query(
        /**
         * Filters the arguments for the Recent Posts widget.
         *
         *
         * @see WP_Query::get_posts()
         *
         * @param array $args     An array of arguments used to retrieve the recent posts.
         * @param array $instance Array of settings for the current widget.
         */
            apply_filters(
                'widget_posts_args',
                array(
                    'posts_per_page'      => absint($number),
                    'no_found_rows'       => true,
                    'post_status'         => 'publish',
                    'ignore_sticky_posts' => true,
                ),
                $instance
            )
        );

        if ( ! $r->have_posts() ) {
            return;
        }
        ?>
        <?php echo $args['before_widget']; ?>
        <section class="widget widget_recent-post">
            <?php
            if ( $title ) {
                echo $args['before_title'] . esc_html($title) . $args['after_title'];
            }

            ?>
            <div class="recent-post-wrap">
                <?php
                while ($r->have_posts()):$r->the_post();
                    global $post;
                    $post_title     = get_the_title( $post->ID );
                    $title          = ( ! empty( $post_title ) ) ? esc_html($post_title)  : esc_html__( '(no title)' ,'blog-aarambha' );

                    $aria_current = '';

                    if ( get_queried_object_id() === $post->ID ) {
                        $aria_current = ' aria-current="page"';
                    }

                    ?>
                    <article class="post">
                        <figure>
                            <?php echo get_the_post_thumbnail(absint($post->ID) ,'full',['alt' => esc_attr(get_the_title()) ])?>
                        </figure>
                        <div class="post-content">
                            <?php blog_aarambha_cat_list(); ?>
                            <header class="entry-header">
                                <h2 class="entry-title">
                                    <a href="<?php the_permalink( absint($post->ID) ); ?>">
                                        <?php echo esc_html($title)?>
                                    </a>
                                </h2>
                            </header>
                            <div class="entry-meta">
                                <?php blog_aarambha_posted_by() ?>
                                <?php if ( $show_date ) : ?>
                                    <?php blog_aarambha_posted_on(); ?>
                                <?php endif;?>
                            </div>
                        </div>

                    </article>
                <?php endwhile;?>

            </div>

        </section>
        <?php wp_reset_postdata();?>

        <?php
        echo $args['after_widget'];
    }

    /**
     * Handles updating the settings for the current Recent Posts widget instance.
     *
     * @param array $new_instance New settings for this instance as input by the user via
     *                            WP_Widget::form().
     * @param array $old_instance Old settings for this instance.
     * @return array Updated settings to save.
     */
    public function update( $new_instance, $old_instance ) {
        $instance              = $old_instance;
        $instance['title']     = sanitize_text_field( $new_instance['title'] );
        $instance['number']    = (int) $new_instance['number'];
        $instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
        return $instance;
    }

    /**
     * Outputs the settings form for the Recent Posts widget.
     *
     *
     * @param array $instance Current settings.
     */
    public function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
        $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
        ?>
        <p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:','blog-aarambha' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

        <p><label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php esc_html_e( 'Number of posts to show:','blog-aarambha' ); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="number" step="1" min="1" value="<?php echo absint($number); ?>" size="3" /></p>

        <p><input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo esc_attr($this->get_field_id( 'show_date' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_date' )); ?>" />
            <label for="<?php echo esc_attr($this->get_field_id( 'show_date' )); ?>"><?php esc_html_e( 'Display post date?','blog-aarambha' ); ?></label></p>
        <?php
    }
}
