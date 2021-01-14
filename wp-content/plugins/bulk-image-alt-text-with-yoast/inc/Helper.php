<?php

if ( !class_exists('Bialty_Helper') ) {

    class Bialty_Helper {

        // Convert image name
        public function bialty_fileName($string) {

            $string = preg_replace("/[\s-]+/", " ", $string); // clean dashes/whitespaces
            $string = preg_replace("/[_]/", " ", $string); // convert whitespaces/underscore to space
            $string = ucwords($string); // convert first letter of each word to capital
            return $string;
        }

        public function dom_with_container($content)
        {
            return "<div class='bialty-container'>$content</div>";
        }

        public function dom_without_container($content)
        {
            return $content;
        }

        public function focus_keyword()
        {
            global $post;

            $focus_keyword = "";
            
            if ( class_exists('WPSEO_Meta') ) {

                // define focus keyword for Yoast SEO
                $focus_keyword = WPSEO_Meta::get_value('focuskw', $post->ID);

            } elseif ( class_exists('RankMath') ) {
        
                // define focus keyword for Rank Math
                $focus_keyword = get_post_meta( $post->ID, 'rank_math_focus_keyword', true );

            }

            return $focus_keyword;
        }

        public function post_title()
        {
            global $post;
            return get_the_title( $post->ID );
        }

        public function image_name($url)
        {
            $path = pathinfo($url);

            return $this->bialty_fileName($path['filename']);
        }

        public function site_title()
        {
            $site_title = "";
            
            if ( $this->check('add_site_title') ) {
                $site_title = ', ' . get_bloginfo( 'name' );
            }

            return $site_title;
            
        }

        public function custom_alt()
        {
            global $post;
            return get_post_meta($post->ID, 'use_bialty_alt', true);
        }

        public function custom_alt_keyword()
        {
            global $post;
            return get_post_meta($post->ID, 'bialty_cs_alt', true);
        }

        public function disable()
        {
            global $post;
            return get_post_meta($post->ID, 'disable_bialty', true);
        }

        public function option($val) 
        {
            global $bialty;

            $bialty_options = $bialty->bialty_options();

            return $bialty_options[$val];

        }

        public function check($val) 
        {
            global $bialty;

            $bialty_options = $bialty->bialty_options();

            return isset( $bialty_options[$val] ) && !empty( $bialty_options[$val] );

        }

        public function request($val, $safe)
        {

            if( isset( $_POST[$val] ) && in_array( $_POST[$val], $safe ) ) 
            { 
                $request = sanitize_text_field( $_POST[$val] ); 
            } 
            
            return $request ?? false;
        }
        
    }
}

$helper = new Bialty_Helper;