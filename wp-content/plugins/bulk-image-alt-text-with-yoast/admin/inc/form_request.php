<?php

if ( isset( $_POST['update'] ) ) {
    // check if user is authorised
    if ( function_exists( 'current_user_can' ) && !current_user_can( 'manage_options' ) ) {
        die( 'Sorry, not allowed...' );
    }
    check_admin_referer( 'bialty_settings' );
    $alt_safe = array(
        "alt_empty_fkw",
        "alt_empty_title",
        "alt_empty_imagename",
        "alt_empty_both",
        "disabled",
        "alt_not_empty_fkw",
        "alt_not_empty_title",
        "alt_not_empty_imagename",
        "alt_not_empty_both",
        "alt_not_empty_disable",
        "woo_alt_empty_fkw",
        "woo_alt_empty_title",
        "woo_alt_empty_imagename",
        "woo_alt_empty_both",
        "woo_alt_empty_disable",
        "woo_alt_not_empty_fkw",
        "woo_alt_not_empty_title",
        "woo_alt_not_empty_imagename",
        "woo_alt_not_empty_both",
        "woo_alt_not_empty_disable",
        "custom_alt_text_yes",
        "custom_alt_text_no",
        "bialty-vidseo",
        "boost-robot",
        "bialty-mobilook",
        "debug_mode",
        "remove_settings",
        "add_site_title"
    );
    // if alt empty
    $alt_empty = sanitize_text_field( $_POST['alt_empty'] );
    $bialty_options['alt_empty'] = ( isset( $_POST['alt_empty'] ) && in_array( $alt_empty, $alt_safe ) ? $alt_empty : false );
    // if alt not empty
    $alt_not_empty = sanitize_text_field( $_POST['alt_not_empty'] );
    $bialty_options['alt_not_empty'] = ( isset( $_POST['alt_not_empty'] ) && in_array( $alt_not_empty, $alt_safe ) ? $alt_not_empty : false );
    // add site title
    $bialty_options['add_site_title'] = $helper->request( 'add_site_title', $alt_safe );
    // enable debug mode to remove bialty div container
    $bialty_options['debug_mode'] = $helper->request( 'debug_mode', $alt_safe );
    // remove settings on plugin deactivation
    $bialty_options['remove_settings'] = $helper->request( 'remove_settings', $alt_safe );
    // install robots.txt notice
    $bialty_options['boost-robot'] = $helper->request( 'boost-robot', $alt_safe );
    // install mobilook notice
    $bialty_options['bialty-mobilook'] = $helper->request( 'bialty-mobilook', $alt_safe );
    // install vidseo notice
    $bialty_options['bialty-vidseo'] = $helper->request( 'bialty-vidseo', $alt_safe );
    update_option( 'bialty', $bialty_options );
    // update options
    echo  '<div class="notice notice-success is-dismissible"><p><strong>' . esc_html__( 'Settings saved.', 'bulk-image-alt-text-with-yoast' ) . '</strong></p></div>' ;
    $progress_bar = '<div class="meter animate"><span style="width: 100%"><span>All Done</span></span></div>';
}
