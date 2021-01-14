<?php

add_action( 'add_meta_boxes', 'bialty_post_options' );
function bialty_post_options()
{
    $post_types = array( 'post', 'page' );
    foreach ( $post_types as $post_type ) {
        add_meta_box(
            'bialty_post_options',
            // id, used as the html id att
            __( 'Bulk image Alt texts' ),
            // meta box title
            'bialty_post_alt',
            // callback function, spits out the content
            $post_type,
            // post type or page. This adds to posts only
            'side',
            // context, where on the screen
            'low'
        );
    }
}

// end pro
function bialty_post_alt( $post )
{
    global  $wpdb ;
    $use_bialty_alt = get_post_meta( $post->ID, 'use_bialty_alt', true );
    $bialty_alt_value = get_post_meta( $post->ID, 'bialty_cs_alt', true );
    $disable_bialty = get_post_meta( $post->ID, 'disable_bialty', true );
    ?>

    <div class="misc-pub-section misc-pub-section-last"><span id="timestamp">

        <p class="post-attributes-label-wrapper"><label class="post-attributes-label" for="alt_text"><?php 
    echo  esc_html__( 'Use Custom Alt Text for all images?*', 'bulk-image-alt-text-with-yoast' ) ;
    ?></label></p>

        <div class="bialty-switch-radio">

            <input type="radio" id="use_bialty_alt_btn1" name="use_bialty_alt" value="use_bialty_alt_yes" <?php 
    if ( isset( $use_bialty_alt ) ) {
        echo  'checked="checked"' ;
    }
    ?> />
            <label for="use_bialty_alt_btn1"><?php 
    echo  esc_html__( 'Yes', 'bulk-image-alt-text-with-yoast' ) ;
    ?></label>

            <input type="radio" id="use_bialty_alt_btn2" name="use_bialty_alt" value="use_bialty_alt_no" <?php 
    if ( empty($use_bialty_alt) ) {
        echo  'checked="checked"' ;
    }
    ?> />
            <label for="use_bialty_alt_btn2"><?php 
    echo  esc_html__( 'No', 'bulk-image-alt-text-with-yoast' ) ;
    ?></label>  

        </div>


        <p class="post-attributes-label-wrapper"><label class="post-attributes-label" for="alt_text"><?php 
    echo  esc_html__( 'Insert your custom Alt text (other than Yoast Focus Keyword + Page title)', 'bulk-image-alt-text-with-yoast' ) ;
    ?></label></p>

        <input type="text" name="bialty_cs_alt" value="<?php 
    if ( !empty($bialty_alt_value) ) {
        echo  $bialty_alt_value ;
    }
    ?>">


        <p class="post-attributes-label-wrapper"><label class="post-attributes-label" for="alt_text"><?php 
    echo  esc_html__( 'Disable Bialty?', 'bulk-image-alt-text-with-yoast' ) ;
    ?></label></p>

        <div class="bialty-switch-radio">

            <input type="radio" id="disable_bialty_btn1" name="disable_bialty" value="disable_bialty_yes" <?php 
    if ( isset( $disable_bialty ) ) {
        echo  'checked="checked"' ;
    }
    ?> />
            <label for="disable_bialty_btn1"><?php 
    echo  esc_html__( 'Yes', 'bulk-image-alt-text-with-yoast' ) ;
    ?></label>

            <input type="radio" id="disable_bialty_btn2" name="disable_bialty" value="disable_bialty_no" <?php 
    if ( empty($disable_bialty) ) {
        echo  'checked="checked"' ;
    }
    ?> />
            <label for="disable_bialty_btn2"><?php 
    echo  esc_html__( 'No', 'bulk-image-alt-text-with-yoast' ) ;
    ?></label>  

        </div>

        <p style="margin-top: 20px;"><?php 
    echo  esc_html__( '*If NO, default Bialty settings will be applied', 'bulk-image-alt-text-with-yoast' ) ;
    ?></p>

    </div>

    <?php 
}

add_action( 'save_post', 'bialty_metadata' );
function bialty_metadata( $postid )
{
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return false;
    }
    if ( !current_user_can( 'edit_page', $postid ) ) {
        return false;
    }
    if ( empty($postid) ) {
        return false;
    }
    if ( isset( $_POST['use_bialty_alt'] ) ) {
        $use_custom_alt = sanitize_text_field( $_POST['use_bialty_alt'] );
    }
    if ( isset( $_POST['disable_bialty'] ) ) {
        $disable_bialty_alt = sanitize_text_field( $_POST['disable_bialty'] );
    }
    $alt_safe = array( "use_bialty_alt_yes", "disable_bialty_yes" );
    ( isset( $_POST['use_bialty_alt'] ) && in_array( $use_custom_alt, $alt_safe ) ? update_post_meta( $postid, 'use_bialty_alt', true ) : delete_post_meta( $postid, 'use_bialty_alt' ) );
    ( isset( $_POST['bialty_cs_alt'] ) ? update_post_meta( $postid, 'bialty_cs_alt', $_REQUEST['bialty_cs_alt'] ) : delete_post_meta( $postid, 'bialty_cs_alt' ) );
    ( isset( $_POST['disable_bialty'] ) && in_array( $disable_bialty_alt, $alt_safe ) ? update_post_meta( $postid, 'disable_bialty', true ) : delete_post_meta( $postid, 'disable_bialty' ) );
}
