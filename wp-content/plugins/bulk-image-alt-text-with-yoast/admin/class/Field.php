<?php

if (!class_exists('BIALTY_Field')) {

    class BIALTY_Field {

        public static function select($name = "", $class = "", $value = array() ) 
        {
            global $helper;
            
            echo "<select name='$name' class='$class'>";

                echo "<option>". esc_html__( 'Disabled', 'bulk-image-alt-text-with-yoast' ) ."</option>";
                
                foreach( $value as $key => $val) {
                    echo "<option value='$key'";
                    
                    if ( $helper->check($name) && $helper->option($name) == $key) echo "selected";
                    
                    echo ">". esc_html__( $val, 'bulk-image-alt-text-with-yoast' ) ."</option>";
                }
                
                echo "</select>";
        }

        public static function checkbox($name, $text = "", $label = "")
        {
            global $helper;

            echo "<label class='bialty-switch " . $label . "'><input type='checkbox' id='$name' name='$name'  value='$name' ";

            if ( $helper->check($name) ) echo "checked";
            
            echo " /><span class='bialty-slider bialty-round'></span></label>";

            $span = (isset($text) && !empty($text)) ? ' &nbsp; <span>' . esc_html__( $text, 'bulk-image-alt-text-with-yoast' ) . '</span>' : '';

            echo $span;
        }

    }

}