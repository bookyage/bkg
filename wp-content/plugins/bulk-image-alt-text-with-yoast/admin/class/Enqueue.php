<?php 
if (!class_exists('BIALTY_Enqueue')) {
    class BIALTY_Enqueue {

        public static function style($name, $pluginUrlWithFilePath, $pluginDirWithFilePath) {

            wp_register_style( $name,  $pluginUrlWithFilePath, array(), filemtime( $pluginDirWithFilePath ) );
            wp_enqueue_style( $name );
        }

        public static function script($name, $pluginUrlWithFilePath, $pluginDirWithFilePath, $footer) {

            wp_register_script( $name, $pluginUrlWithFilePath, array(), filemtime( $pluginDirWithFilePath ), $footer );
            wp_enqueue_script( $name );

        }
        
    }
}