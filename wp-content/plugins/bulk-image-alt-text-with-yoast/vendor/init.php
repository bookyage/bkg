<?php

function bialty_fs() {
    global $bialty_fs;

    if ( ! isset( $bialty_fs ) ) {
        // Include Freemius SDK.
        require_once dirname(__FILE__) . '/freemius/start.php';

        $bialty_fs = fs_dynamic_init( array(
            'id'                  => '2602',
            'slug'                => 'bulk-image-alt-text-with-yoast',
            'type'                => 'plugin',
            'public_key'          => 'pk_a805c7e6685744c85d7e720fd230d',
            'is_premium'          => true,
            // If your plugin is a serviceware, set this option to false.
            'has_premium_version' => true,
            'has_addons'          => false,
            'has_paid_plans'      => true,
            'trial'               => array(
                'days'               => 7,
                'is_require_payment' => true,
            ),
            'has_affiliation'     => 'all',
            'menu'                => array(
                'slug'           => 'bialty',
                'first-path'     => 'admin.php?page=bialty',
                'support'        => false,
            ),
            // Set the SDK to work in a sandbox mode (for development & testing).
            // IMPORTANT: MAKE SURE TO REMOVE SECRET KEY BEFORE DEPLOYMENT.
            'secret_key'          => 'sk_dEt^UphF=nss>wrxs*IdVP@0uI7YW',
        ) );
    }

    return $bialty_fs;
}

// Init Freemius.
bialty_fs();
// Signal that SDK was initiated.
do_action( 'bialty_fs_loaded' );

function bialty_fs_settings_url() {
    return admin_url( 'options-general.php?page=bialty&tab=bialty-settings' );
}

bialty_fs()->add_filter( 'connect_url', 'bialty_fs_settings_url' );
bialty_fs()->add_filter( 'after_skip_url', 'bialty_fs_settings_url' );
bialty_fs()->add_filter( 'after_connect_url', 'bialty_fs_settings_url' );
bialty_fs()->add_filter( 'after_pending_connect_url', 'bialty_fs_settings_url' );

// freemius opt-in
function bialty_fs_custom_connect_message (
    $message,
    $user_first_name,
    $product_title,
    $user_login,
    $site_link,
    $freemius_link
) {
    $break = "<br><br>";
    return sprintf(
        esc_html__( 'Hey %1$s, %2$s Click on Allow & Continue to start optimizing your images with ALT tags :)!  Don\'t spend hours at adding manually alt tags to your images. BIALTY will use your YOAST settings automatically to get better results on search engines and improve your SEO. %2$s Never miss an important update -- opt-in to our security and feature updates notifications. %2$s See you on the other side.', 'bulk-image-alt-text-with-yoast' ),
        $user_first_name,
        $break
    );
}

bialty_fs()->add_filter('connect_message', 'bialty_fs_custom_connect_message', 10, 6);
