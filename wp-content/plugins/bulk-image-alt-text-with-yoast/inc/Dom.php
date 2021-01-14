<?php

if ( !class_exists( 'Bialty_Dom' ) ) {
    class Bialty_Dom
    {
        public function __construct()
        {
            add_filter( 'the_content', array( &$this, 'alt_main' ), 100 );
            add_filter( 'woocommerce_single_product_image_thumbnail_html', array( &$this, 'alt_without_container' ), 100 );
            add_filter( 'post_thumbnail_html', array( &$this, 'alt_main' ), 100 );
        }
        
        // end function __construct()
        public function alt_main( $content )
        {
            global  $helper ;
            $bialty_dom = new DOMDocument( '1.0', 'UTF-8' );
            
            if ( $helper->check( 'debug_mode' ) ) {
                @$bialty_dom->loadHTML( mb_convert_encoding( $helper->dom_without_container( $content ), 'HTML-ENTITIES', 'UTF-8' ), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD );
            } else {
                @$bialty_dom->loadHTML( mb_convert_encoding( $helper->dom_with_container( $content ), 'HTML-ENTITIES', 'UTF-8' ), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD );
            }
            
            $bialty_html = new DOMXPath( $bialty_dom );
            foreach ( $bialty_html->query( "//img" ) as $img_node ) {
                // Return image URL
                $img_url = $img_node->getAttribute( "src" );
                // Set empty alt tags only
                
                if ( empty($img_node->getAttribute( 'alt' )) ) {
                    if ( $helper->check( 'alt_empty' ) ) {
                        switch ( $helper->option( 'alt_empty' ) ) {
                            case $helper->option( 'alt_empty' ) == 'alt_empty_fkw':
                                $img_node->setAttribute( "alt", $helper->focus_keyword() . $helper->site_title() );
                                break;
                            case $helper->option( 'alt_empty' ) == 'alt_empty_title':
                                $img_node->setAttribute( "alt", $helper->post_title() . $helper->site_title() );
                                break;
                            case $helper->option( 'alt_empty' ) == 'alt_empty_imagename':
                                $img_node->setAttribute( "alt", $helper->image_name( $img_url ) . $helper->site_title() );
                                break;
                            case $helper->option( 'alt_empty' ) == 'alt_empty_both':
                                $img_node->setAttribute( "alt", $helper->focus_keyword() . ', ' . $helper->post_title() . $helper->site_title() );
                                break;
                        }
                    }
                } else {
                    if ( $helper->check( 'alt_not_empty' ) ) {
                        switch ( $helper->option( 'alt_not_empty' ) ) {
                            case $helper->option( 'alt_not_empty' ) == 'alt_not_empty_fkw':
                                $img_node->setAttribute( "alt", $helper->focus_keyword() . $helper->site_title() );
                                break;
                            case $helper->option( 'alt_not_empty' ) == 'alt_not_empty_title':
                                $img_node->setAttribute( "alt", $helper->post_title() . $helper->site_title() );
                                break;
                            case $helper->option( 'alt_not_empty' ) == 'alt_not_empty_imagename':
                                $img_node->setAttribute( "alt", $helper->image_name( $img_url ) . $helper->site_title() );
                                break;
                            case $helper->option( 'alt_not_empty' ) == 'alt_not_empty_both':
                                $img_node->setAttribute( "alt", $helper->focus_keyword() . ', ' . $helper->post_title() . $helper->site_title() );
                                break;
                        }
                    }
                }
                
                // Set custom keyword for all alt tags
                if ( $helper->custom_alt() == true && !empty($helper->custom_alt_keyword()) ) {
                    $img_node->setAttribute( "alt", $helper->custom_alt_keyword() );
                }
            }
            
            if ( is_singular( array( 'post', 'page' ) ) ) {
                // $saveDom condition @since 1.3.4
                $saveDom = true;
                // BuddyPress Profile Image Upload Fix @since 1.3.1
                if ( class_exists( 'BuddyPress' ) ) {
                    if ( bp_is_my_profile() ) {
                        $saveDom = false;
                    }
                }
                // WCFM - Frontend Manager Compatibility Fixed @since 1.3.2
                if ( class_exists( 'WCFM' ) ) {
                    if ( is_wcfm_page() ) {
                        $saveDom = false;
                    }
                }
                // Disabled on Woocommerce Checkout @since 1.3.3.1
                if ( class_exists( 'WooCommerce' ) ) {
                    if ( is_checkout() ) {
                        $saveDom = false;
                    }
                }
                if ( $saveDom ) {
                    $content = $bialty_dom->saveHtml();
                }
            }
            
            return $content;
        }
        
        public function alt_without_container( $content )
        {
            return $content;
        }
    
    }
}
$bialty_dom = new Bialty_Dom();