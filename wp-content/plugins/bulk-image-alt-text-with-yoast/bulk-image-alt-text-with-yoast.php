<?php

/*
* Plugin Name: BIALTY - Bulk Image Alt Text (Alt tag, Alt Attribute) with Yoast SEO + WooCommerce
* Description: Auto-add Alt texts, also called Alt Tags or Alt Attributes, from YOAST SEO Focus Keyword field (or page/post/product title) with your page/post/product title, to all images contained on your pages, posts, products, portfolios for better Google Ranking on search engines – Fully compatible with Woocommerce
* Author: Pagup
* Version: 1.4.3
* Author URI: https://pagup.com/
* Text Domain: bulk-image-alt-text-with-yoast
* Domain Path: /languages/
*/


if ( !defined( 'ABSPATH' ) ) {
    exit;
}

if ( !defined('BIALTY_PLUGIN_DIR') ) {
    define( 'BIALTY_PLUGIN_DIR', plugins_url('', __FILE__ ) );
}

if ( !defined('BIALTY_PLUGIN_PATH') ) {
    define( 'BIALTY_PLUGIN_PATH', plugin_dir_path(__FILE__ ) );
}

/******************************************
                Freemius Init
*******************************************/
require BIALTY_PLUGIN_PATH . '/vendor/init.php';

/******************************************
            Bialty Helper & DOM
*******************************************/
require BIALTY_PLUGIN_PATH . '/inc/Helper.php';
require BIALTY_PLUGIN_PATH . '/inc/Dom.php';

/******************************************
            Bialty Init
*******************************************/
class Bialty {

    public function __construct() {

        if ( is_admin() ) {
            $plugin = plugin_basename( __FILE__ );
            // delete plugin option on plugin deactivation if set true
            register_deactivation_hook( __FILE__, array( &$this, 'bialty_deactivate' ) );
            //add quick links to plugin settings
            add_filter( "plugin_action_links_{$plugin}", array( &$this, 'bialty_setting_link' ) );
        }
        
    } // end function __construct()
    
    // quick setting link in plugin section
    public function bialty_setting_link( $links ) {
        $settings_link = '<a href="options-general.php?page=bialty">Settings</a>';
        array_unshift( $links, $settings_link );
        return $links;
    } // end function setting_link()
    
    // register options
    public function bialty_options() {
        $bialty_options = get_option( 'bialty' );
        return $bialty_options;
    } // end function bialty_options()
    
    // removed settings (if checked) on plugin deactivation
    public function bialty_deactivate() {
        $bialty_options = $this->bialty_options();
        if ( $bialty_options['remove_settings'] ) {
            delete_option( 'bialty' );
        }
    } // end function bialty_deactivate()

} // end class

$bialty = new Bialty;


// admin notifications
include_once dirname( __FILE__ ).'/inc/notices.php';

add_action( 'init', 'bialty_textdomain' );
function bialty_textdomain() {
    load_plugin_textdomain( 'bulk-image-alt-text-with-yoast', false, basename( dirname( __FILE__ ) ) . '/languages' );
}

/*-----------------------------------------
                Admin
------------------------------------------*/
if ( is_admin() ) {
    include_once BIALTY_PLUGIN_PATH . '/admin/settings.php';
}