<?php

if ( !class_exists('Bialty_Partial') ) {

    class Bialty_Partial 
    {
        public $active_tab;

        public function tabs()
        {
            //set active class for navigation tabs
            $this->active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'bialty-settings';
            
            ?>
            <h2 class="nav-tab-wrapper">
                <a href="<?php echo esc_url( '?page=bialty&tab=bialty-settings' ); ?>" class="nav-tab <?php echo $this->active_tab == 'bialty-settings' ? 'nav-tab-active' : ''; ?>">Settings</a>
                <a href="<?php echo esc_url( '?page=bialty&tab=bialty-faq' ); ?>" class="nav-tab <?php echo $this->active_tab == 'bialty-faq' ? 'nav-tab-active' : ''; ?>">FAQ</a>
                <a href="?page=bialty&tab=bialty-recs" class="nav-tab <?php echo $this->active_tab == 'bialty-recs' ? 'nav-tab-active' : ''; ?>">Recommendations</a>
            </h2>
            <?php
        }

        public function heading($text)
        {
            echo "<h2>" . esc_html__( $text, 'bulk-image-alt-text-with-yoast' ) . "</h2>";
        }
        public function rowStart($label)
        {
            ?>
            <div class="bialty-row">

                <div class="bialty-column col-4">
                    <span class="bialty-label"><?php echo esc_html__( $label, 'bulk-image-alt-text-with-yoast' ); ?></span>
                </div>

                <div class="bialty-column col-8">
            <?php
        }

        public function rowEnd()
        {
            ?>
                </div>

            </div>
            <?php
        }

        public function wooDisabled()
        {
            ?>
            <select class="bialty-select" disabled><option>Disabled</option><option selected><?php echo esc_html__( 'Yoast / Rank Math Focus Keyword', 'bulk-image-alt-text-with-yoast' ); ?></option><option>Post Title</option><option>Image Name</option><option>Focus Keyword &amp; Post Title</option></select>
            <?php
        }

        public function getPro() {
            
            $get_pro = sprintf( wp_kses( __( '<a href="%s">Get Pro version</a> to enable', 'bulk-image-alt-text-with-yoast' ), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( 'options-general.php?page=bialty-pricing' ) );

            ?>
            <div class="bialty-alert bialty-info" style="display: block;">
                <span class="closebtn">&times;</span>
                <?php echo $get_pro . " " . esc_html__( 'Bulk Image Alt Text for Woocommerce Products', 'bulk-image-alt-text-with-yoast' ); ?>
            </div>
            <?php
        }
    }
}

$partial = new Bialty_Partial;