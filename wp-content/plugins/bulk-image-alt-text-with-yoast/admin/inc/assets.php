<?php 
function bialty_assets() {

    BIALTY_Enqueue::style('bialty_admin-styles', BIALTY_PLUGIN_DIR . '/assets/bialty-styles-admin.css', BIALTY_PLUGIN_PATH . '/assets/bialty-styles-admin.css');


    BIALTY_Enqueue::script('bialty_admin-script', BIALTY_PLUGIN_DIR . '/assets/bialty-script-admin.js', BIALTY_PLUGIN_PATH . '/assets/bialty-script-admin.js', false);

    wp_enqueue_media ();

}
add_action( 'admin_enqueue_scripts', 'bialty_assets' );