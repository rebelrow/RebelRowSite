<?php
/**
 *  Metabox for Pages
 *
 * @package Blog_Aarambha
 */

/**
 * Registering Metabox
 */
function blog_aarambha_add_metabox_for_page() {

        add_meta_box('checkbox-meta-box', esc_html__('Enable Title', 'blog-aarambha'), 'blog_aarambha_meta_box_markup', 'page', 'side', 'default', null);

}
add_action('add_meta_boxes', 'blog_aarambha_add_metabox_for_page');

/**
 * Creating Metabox field
 * @param $post
 */
function blog_aarambha_meta_box_markup($post) {
    $checkbox_stored_meta = get_post_meta( $post->ID );
    if(isset($checkbox_stored_meta['_checkbox_check'][0]) == ''){
        $checkbox_stored_meta['_checkbox_check'][0] = 'yes';
    }
    ?>

    <label for="_checkbox_check">
        <input type="checkbox" name="_checkbox_check" id="_checkbox_check" value="yes" <?php if ( isset ( $checkbox_stored_meta ['_checkbox_check'] ) ) checked( $checkbox_stored_meta['_checkbox_check'][0], 'yes' ); ?> />
        <?php esc_html_e( 'Enable title in page ', 'blog-aarambha' )?>
    </label>

    <?php
    wp_nonce_field( 'checkbox_nonce_action', 'checkbox_nonce' );

}

/**
 *  Saving Metabox Value
 */

function blog_aarambha_save_meta_box( $post_id ) {
    if ( ! isset( $_POST['checkbox_nonce'] ) || ! wp_verify_nonce( sanitize_key($_POST['checkbox_nonce']), 'checkbox_nonce_action' ) )
        return $post_id;

    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
        return $post_id;

    if ( ! current_user_can('edit_post', $post_id) )
        return $post_id;
    // Checks for input and saves
    if( isset( $_POST[ '_checkbox_check' ] ) ) {
        update_post_meta( $post_id, '_checkbox_check', 'yes');
    }
    else {
        update_post_meta( $post_id, '_checkbox_check', 'no' );
    }
}
add_action('save_post', 'blog_aarambha_save_meta_box', 10, 2);

