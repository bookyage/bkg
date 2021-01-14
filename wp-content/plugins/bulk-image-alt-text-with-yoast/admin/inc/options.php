<?php

function bialty_settings_page()
{
    global 
        $bialty,
        $partial,
        $notes,
        $helper
    ;
    $bialty_options = $bialty->bialty_options();
    require BIALTY_PLUGIN_PATH . '/admin/inc/form_request.php';
    ?>

    <div class="wrap bialty-containter">
        
        <!-- <pre><?php 
    //var_dump($bialty_options);
    ?></pre> -->

        <h2><span class="dashicons dashicons-media-text" style="margin-top: 6px; font-size: 24px;"></span> Bulk Image Alt Texts
            <?php 
    echo  esc_html__( 'Settings', 'bulk-image-alt-text-with-yoast' ) ;
    ?>
        </h2>

        <?php 
    $partial->tabs();
    
    if ( $partial->active_tab == 'bialty-settings' ) {
        ?>

        <!-- start main settings column -->
        <div class="bialty-row">
            <div class="bialty-column col-9">
                <div class="bialty-main">
                    <form method="post">

                        <?php 
        if ( function_exists( 'wp_nonce_field' ) ) {
            wp_nonce_field( 'bialty_settings' );
        }
        // Note for Yoast & RankMath
        $notes->if_yoast_rankmath_doesnt_exist();
        if ( isset( $progress_bar ) ) {
            echo  $progress_bar ;
        }
        // Note for How does it work
        $notes->how_does_it_work();
        $partial->heading( 'About Page and Post Alt texts' );
        $partial->rowStart( 'Replace Missing Alt Tags with' );
        BIALTY_Field::select( 'alt_empty', 'bialty-select', array(
            'alt_empty_fkw'       => 'Yoast / Rank Math Focus Keyword',
            'alt_empty_title'     => 'Post Title',
            'alt_empty_imagename' => 'Image Name',
            'alt_empty_both'      => 'Yoast / Rank Math Focus Keyword & Post Title',
        ) );
        $partial->rowEnd();
        $partial->rowStart( 'Replace Defined Alt Tags with' );
        BIALTY_Field::select( 'alt_not_empty', 'bialty-select', array(
            'alt_not_empty_fkw'       => 'Yoast / Rank Math Focus Keyword',
            'alt_not_empty_title'     => 'Post Title',
            'alt_not_empty_imagename' => 'Image Name',
            'alt_not_empty_both'      => 'Yoast / Rank Math Focus Keyword & Post Title',
        ) );
        $partial->rowEnd();
        $partial->heading( 'About Product Alt texts (for Woocommerce)' );
        $partial->rowStart( 'Replace Missing Alt Tags with' );
        $partial->wooDisabled();
        $partial->rowEnd();
        $partial->rowStart( 'Replace Defined Alt Tags with' );
        $partial->wooDisabled();
        $partial->getPro();
        $partial->rowEnd();
        $partial->rowStart( 'Add Site Title' );
        BIALTY_Field::checkbox( 'add_site_title', 'Add website title defined in Settings &raquo; General to alt text as well' );
        $partial->rowEnd();
        // Note for Warning abour Media Library
        $notes->warning_about_media_library();
        $partial->rowStart( 'Debug Mode' );
        BIALTY_Field::checkbox( 'debug_mode', 'Advanced Usage: Only turn it ON if you have styling issues on front-end, otherwise leave it disabled' );
        $partial->rowEnd();
        $partial->rowStart( 'Delete Settings' );
        BIALTY_Field::checkbox( 'remove_settings', 'Checking this box will remove all settings when you deactivate plugin.' );
        $partial->rowEnd();
        // Note for Custom Alt Text
        $notes->custom_alt_text();
        // Recommendation about Bigta Plugin
        $notes->recommendation_for_bigta();
        // Boost Recommendations for Better Robots.txt, Mobilook & VidSEO
        require BIALTY_PLUGIN_PATH . "/admin/inc/boost_recs.php";
        // Note for Biadu Tools
        $notes->recommendation_for_baidu();
        ?>

                    <p class="submit"><input type="submit" name="update" class="button-primary" value="<?php 
        echo  esc_html__( 'Save Changes', 'bulk-image-alt-text-with-yoast' ) ;
        ?>" /></p>

                    </form>

                    <?php 
        // Note for How to Check Alt Tags
        $notes->how_to_check_alt_tags();
        // Note about Bialty Modifications
        $notes->bialty_modifications_on_frontend();
        // Note for Bialty Compatbility Status
        $notes->bialty_compatibility();
        // SEO Recommendations Section
        include BIALTY_PLUGIN_PATH . '/inc/seo-recommendations.php';
        ?>

                </div>
                <!-- end bialty-main -->
            </div>
            <!-- end main settings bialty-column col-8 -->

            <?php 
        include BIALTY_PLUGIN_PATH . '/inc/sidebar.php';
    }
    
    if ( $partial->active_tab == 'bialty-faq' ) {
        include BIALTY_PLUGIN_PATH . '/inc/faq.php';
    }
    if ( $partial->active_tab == 'bialty-recs' ) {
        include BIALTY_PLUGIN_PATH . '/inc/recommendations.php';
    }
    ?>

        </div>

        <?php 
}
