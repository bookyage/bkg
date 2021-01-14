<?php

if ( !class_exists('Bialty_Notes') ) {

    class Bialty_Notes {

        public function if_yoast_rankmath_doesnt_exist()
        {
            if ( !class_exists('WPSEO_Meta') && !class_exists('RankMath') ) { ?>
                <div class="bialty-alert bialty-warning"><span class="closebtn">&times;</span><?php echo esc_html__( 'Yoast SEO / Rank Math SEO is either not installed or disabled. "Focus Keyword" won\'t work (of course). "Both..." feature will add only Post titles to Alt tags', 'bulk-image-alt-text-with-yoast' ); ?></div>
            <?php }
        }

        public function how_does_it_work() 
        { ?>
            <div class="bialty-note">
                <h3><?php echo esc_html__( 'BIALTY, how does it work?', 'bulk-image-alt-text-with-yoast' ); ?></h3>
                <p><?php echo esc_html__( '1. Select what to do with missing alt tags', 'bulk-image-alt-text-with-yoast' ); ?><br>
                <?php echo esc_html__( '2. Select what to do with existing alt tags', 'bulk-image-alt-text-with-yoast' ); ?><br>
                <?php echo esc_html__( '3. Click on "save changes" and your settings will be applied everywhere.', 'bulk-image-alt-text-with-yoast' ); ?><br>
                <?php echo esc_html__( "4. Bialty will be active for all future publications which means that you won't have to worry anymore about Alt texts.", "bialty" ); ?></p>
            </div>
            <?php
        }

        public function warning_about_media_library()
        {
            ?>
            <div class="bialty-note" style="margin: 10px 0;">
                <h3><?php echo esc_html__( 'Warning:', 'bulk-image-alt-text-with-yoast' ); ?></h3>
                <p>●&nbsp; <?php echo __( 'Alt texts added/created by BIALTY plugin ARE NOT added to MEDIA LIBRARY (which is useless as not visible to search engines). All image Alt text are added to HTML code, on frontend. Please follow instructions below, at "How to check Alt Text now?", to see your settings applied.', 'bulk-image-alt-text-with-yoast');?></p>

                <p>●&nbsp; <?php echo sprintf( wp_kses( __( 'Alt texts (Alt attributes, Alt tags) are NOT Title attributes (title tags). Please use <a href="%s" target="_blank">BIGTA plugin</a> (by Pagup) if you need to add title tags to your images.', 'bulk-image-alt-text-with-yoast' ), array( 
                'a' => array( 
                    'href' => array(), 
                    'target' => array(), 
                ),
            ) ), esc_url( 'https://wordpress.org/plugins/bulk-image-title-attribute/' ) );?></p>
            </div>
            <?php            
        }

        public function custom_alt_text()
        {
            ?>
            <div class="bialty-note" style="margin: 10px 0;">
                <h3><?php echo esc_html__( 'Custom ALT Text?', 'bulk-image-alt-text-with-yoast' ); ?></h3>
                <p><?php echo sprintf( wp_kses( __( 'Please use <a href="%s" target="_blank">BIALTY META BOX</a> to either disable plugin locally or add Alt text other than Post titles or Yoast Keyword.', 'bulk-image-alt-text-with-yoast' ), array( 
                'a' => array( 
                    'href' => array(), 
                    'target' => array(), 
                ),
            ) ), esc_url( plugin_dir_url( __FILE__ ) . 'assets/imgs/meta-box.png' ) );?></p>
            </div>
            <?php
        }

        public function recommendation_for_bigta()
        {
            ?>
            <div class="bialty-alert bialty-info" style="margin-top: 10px;"><?php echo sprintf( wp_kses( __( 'We strongly recommend to combine BIALTY plugin with <a href="%s" target="_blank">BIGTA plugin</a> to auto-optimize your Image title attributes (Image title tags)', 'bulk-image-alt-text-with-yoast' ), array( 
                'a' => array( 
                    'href' => array(), 
                    'target' => array(), 
                ),
            ) ), esc_url( "https://wordpress.org/plugins/bulk-image-title-attribute/" ) );?>
            </div>
            <?php            
        }

        public function recommendation_for_baidu()
        {
            ?>
            <div class="bialty-note border" style="margin: 18px 0;"><p>😎 <i><?php echo sprintf( wp_kses( __( 'NEW - Get INSANE TRAFFIC with your website listed on <a href="%s" target="_blank">Baidu Webmaster Tools</a> for <a href="%s" target="_blank">Baidu.com</a>, the second largest search engine in the WORLD and the most used in China (more than 700 millions users).  <a href="%2s" target="_blank" class="note-link">SEE MORE ➤</a>', 'bulk-image-alt-text-with-yoast' ), array(  'a' => array( 'href' => array(), 'target' => array(), 'class' => array() ) ) ), esc_url( "https://ziyuan.baidu.com/" ), esc_url( "https://baidu.com/" ), esc_url( "https://better-robots.com/baidu-webmaster-tools/" ) ); ?></i></p></div>
            <?php
        }

        public function how_to_check_alt_tags()
        {
            ?>
            <div class="bialty-note">
                <h3><?php echo esc_html__( 'How to check your Alt texts now?', 'bulk-image-alt-text-with-yoast' ); ?></h3>
                <p><?php echo esc_html__( 'Go to your website, click right on a webpage and select "Show Page Source." (Firefox, Safari, Chrome, Internet Explorer,...). Scroll down to the appropriate section (displaying your content), after header area and before footer area. You will be able to identify your modified Alt Texts with your post title (if selected), your Yoast\'s Focus Keyword (if used) and your site name (if selected), separated with a comma. Please note that BIALTY modifies image Alt texts on Frontend (in your HTML code), not on backend (Media LIbrary, etc.), which would be useless for search engines. Want more details about this? Check our video :', 'bulk-image-alt-text-with-yoast' ); ?> <a href="https://vimeo.com/306421381">https://vimeo.com/306421381</a></p>
            </div>
            <?php
        }

        public function bialty_modifications_on_frontend()
        {
            ?>
            <div class="bialty-alert bialty-info" style="display: block;">
                <?php echo esc_html__( 'IMPORTANT: BIALTY plugin modifies image alt texts on front-end. Any empty or existing alt text will be replaced according to settings above. About Yoast SEO, please note that it "checks" content in real time inside text editor in Wordpress back-end, so even if Yoast does not display a green bullet for the "image alt attributes" line, BIALTY is still doing the job. For your information, Google Bot and other search engine bots see only image alt attributes on Front-end (not as Yoast reading content inside text editor)', 'bulk-image-alt-text-with-yoast' ); ?>
            </div>
            <?php
        }

        public function bialty_compatibility()
        {
            ?>
            <div class="bialty-note">
                <p><?php echo esc_html__( 'Note 1: BIALTY is fully compatible with most popular page builders (TinyMCE, SiteOrigin, Elementor, Gutenberg)', 'bulk-image-alt-text-with-yoast' ); ?><br />
                <?php echo esc_html__( 'Note 2: If you\'ve installed YOAST SEO but did not optimize yet, select "Both Focus Keyword & Post Title"', 'bulk-image-alt-text-with-yoast' ); ?><br />
                <?php echo esc_html__( 'Note 3: If you did not install YOAST SEO plugin, please keep default settings. BIALTY will add your post titles to Alt tags.', 'bulk-image-alt-text-with-yoast' ); ?></p>
            </div>
            <?php
        }

    }

}

$notes = new Bialty_Notes;