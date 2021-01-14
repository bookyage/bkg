<?php

require BIALTY_PLUGIN_PATH . '/vendor/persist-admin-notices-dismissal/persist-admin-notices-dismissal.php';
add_action( 'admin_init', array( 'PAnD', 'init' ) );
/******************************************
                Template Partial
*******************************************/
require BIALTY_PLUGIN_PATH . '/admin/inc/Partial.php';
/******************************************
                Admin Classes
*******************************************/
require BIALTY_PLUGIN_PATH . '/admin/class/Enqueue.php';
require BIALTY_PLUGIN_PATH . '/admin/class/Field.php';
/******************************************
                Setting Assets
*******************************************/
require BIALTY_PLUGIN_PATH . '/admin/inc/assets.php';
/******************************************
                Setting Notes
*******************************************/
require BIALTY_PLUGIN_PATH . '/admin/inc/Notes.php';
/******************************************
                Setting Page
*******************************************/
function bialty_admin_menu()
    {
        add_menu_page (
			__( 'Bulk Image Alt Text Settings', 'bulk-image-alt-text-with-yoast' ),
			__( 'Bulk Image Alt Text','bulk-image-alt-text-with-yoast' ),
			'manage_options',
			'bialty',
			'bialty_settings_page',
			'dashicons-editor-textcolor'
        );
        
        // add_options_page(
        //     'Bulk Image Alt Text Settings',
        //     'Bulk Image Alt Text',
        //     'manage_options',
        //     'bialty',
        //     'bialty_settings_page'
        // );
    }
add_action( 'admin_menu', 'bialty_admin_menu' );

/******************************************
                Setting Options
*******************************************/
require BIALTY_PLUGIN_PATH . '/admin/inc/options.php';

/******************************************
            Metabox for Post Types
*******************************************/
require BIALTY_PLUGIN_PATH . '/admin/metabox.php';