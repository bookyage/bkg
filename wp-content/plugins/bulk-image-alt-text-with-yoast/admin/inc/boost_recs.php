<?php 

// Better Robots.txt Recommendation
$partial->rowStart('Boost your ranking on Search engines');

BIALTY_Field::checkbox('boost-robot', 'Optimize site\'s crawlability with an optimized robots.txt', 'bialty-boost-label');

?>
<div class="bialty-boost" <?php echo (( $helper->check('boost-robot') ) ? 'style="display: inline;"' : 'style="display: none;"');?> >

    <div class="bialty-alert bialty-success" style="margin-top: 10px;"><?php echo sprintf( wp_kses( __( 'Click <a href="%s" target="_blank">HERE</a> to Install <a href="%2s" target="_blank">Better Robots.txt plugin</a> to boost your robots.txt', 'bulk-image-alt-text-with-yoast' ), array( 
            'a' => array( 
                'href' => array(), 
                'target' => array(), 
            ), 
            'a' => array( 
                'href' => array(), 
                'target' => array(), 
            ),
        ) ), esc_url( "https://wordpress.org/plugins/bulk-image-alt-text-with-yoast/" ), esc_url( "https://wordpress.org/plugins/bulk-image-alt-text-with-yoast/" ) ); ?>
    </div>

</div>
<?php
$partial->rowEnd();

// Mobilook Recommendation
$partial->rowStart('Mobile-Friendly & responsive design');

BIALTY_Field::checkbox('bialty-mobilook', 'Get dynamic mobile previews of your pages/posts/products + Facebook debugger', 'bialty-mobi-label');

?>
<div class="bialty-mobi" <?php echo (( $helper->check('bialty-mobilook') ) ? 'style="display: inline;"' : 'style="display: none;"');?> >

    <div class="bialty-alert bialty-success" style="margin-top: 10px;"><?php echo sprintf( wp_kses( __( 'Click <a href="%s" target="_blank">HERE</a> to Install <a href="%2s" target="_blank">Mobilook</a> and test your website on Dualscreen format (Galaxy fold)', 'bulk-image-alt-text-with-yoast' ), array( 
            'a' => array( 
                'href' => array(), 
                'target' => array(), 
            ), 
            'a' => array( 
                'href' => array(), 
                'target' => array(), 
            ),
        ) ), esc_url( "https://wordpress.org/plugins/mobilook/" ), esc_url( "https://wordpress.org/plugins/mobilook/" ) ); ?>
    </div>

</div>
<?php
$partial->rowEnd();

// VidSEO Recommendation
$partial->rowStart('Looking for FREE unlimited content for SEO?');

BIALTY_Field::checkbox('bialty-vidseo', 'Get access to billions of non-indexed content with Video transcripts (Youtube)', 'bialty-vidseo-label');

?>
<div class="bialty-vidseo" <?php echo (( $helper->check('bialty-vidseo') ) ? 'style="display: inline;"' : 'style="display: none;"');?> >

    <div class="bialty-alert bialty-success" style="margin-top: 10px;"><?php echo sprintf( wp_kses( __( 'Click <a href="%s" target="_blank">HERE</a> to learn more about <a href="%2s" target="_blank">VidSEO</a> Wordpress plugin & how to skyrocket your SEO', 'bulk-image-alt-text-with-yoast' ), array( 
            'a' => array( 
                'href' => array(), 
                'target' => array(), 
            ), 
            'a' => array( 
                'href' => array(), 
                'target' => array(), 
            ),
        ) ), esc_url( "https://wordpress.org/plugins/vidseo/" ), esc_url( "https://wordpress.org/plugins/vidseo/" ) ); ?>
    </div>

</div>
<?php

$partial->rowEnd();