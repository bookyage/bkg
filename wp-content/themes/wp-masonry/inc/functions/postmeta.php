<?php
/**
* Post meta functions
*
* @package WP Masonry WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

if ( ! function_exists( 'wp_masonry_post_tags' ) ) :
/**
 * Prints HTML with meta information for the tags.
 */
function wp_masonry_post_tags() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'wp-masonry' ) );
        if ( $tags_list ) {
            /* translators: 1: list of tags. */
            printf( '<span class="wp-masonry-tags-links"><i class="fa fa-tags" aria-hidden="true"></i> ' . esc_html__( 'Tagged %1$s', 'wp-masonry' ) . '</span>', $tags_list ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
        }
    }
}
endif;


if ( ! function_exists( 'wp_masonry_grid_cats' ) ) :
function wp_masonry_grid_cats() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space */
        $categories_list = get_the_category_list( esc_html__( '&nbsp;', 'wp-masonry' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            printf( '<div class="wp-masonry-grid-post-categories">' . __( '<span class="screen-reader-text">Posted in </span>%1$s', 'wp-masonry' ) . '</div>', $categories_list ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
        }
    }
}
endif;


if ( ! function_exists( 'wp_masonry_grid_postmeta' ) ) :
function wp_masonry_grid_postmeta() { ?>
    <?php if ( !(wp_masonry_get_option('hide_post_author_home')) || !(wp_masonry_get_option('hide_posted_date_home')) || !(wp_masonry_get_option('hide_comments_link_home')) ) { ?>
    <div class="wp-masonry-grid-post-footer">
    <?php if ( !(wp_masonry_get_option('hide_post_author_home')) ) { ?><span class="wp-masonry-grid-post-author wp-masonry-grid-post-meta"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span class="screen-reader-text"><?php esc_html_e('Author: ', 'wp-masonry'); ?></span><?php echo esc_html( get_the_author() ); ?></a></span><?php } ?>
    <?php if ( !(wp_masonry_get_option('hide_posted_date_home')) ) { ?><span class="wp-masonry-grid-post-date wp-masonry-grid-post-meta"><span class="screen-reader-text"><?php esc_html_e('Published Date: ', 'wp-masonry'); ?></span><?php echo get_the_date(); ?></span><?php } ?>
    <?php if ( !(wp_masonry_get_option('hide_comments_link_home')) ) { ?><?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
    <span class="wp-masonry-grid-post-comment wp-masonry-grid-post-meta"><?php comments_popup_link( sprintf( wp_kses( /* translators: %s: post title */ __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'wp-masonry' ), array( 'span' => array( 'class' => array(), ), ) ), get_the_title() ) ); ?></span>
    <?php } ?><?php } ?>
    </div>
    <?php } ?>
<?php }
endif;


if ( ! function_exists( 'wp_masonry_single_cats' ) ) :
function wp_masonry_single_cats() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space */
        $categories_list = get_the_category_list( esc_html__( ', ', 'wp-masonry' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            printf( '<div class="wp-masonry-entry-meta-single wp-masonry-entry-meta-single-top"><span class="wp-masonry-entry-meta-single-cats"><i class="fa fa-folder-open-o" aria-hidden="true"></i>&nbsp;' . __( '<span class="screen-reader-text">Posted in </span>%1$s', 'wp-masonry' ) . '</span></div>', $categories_list ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
        }
    }
}
endif;


if ( ! function_exists( 'wp_masonry_single_postmeta' ) ) :
function wp_masonry_single_postmeta() { ?>
    <?php if ( !(wp_masonry_get_option('hide_post_author')) || !(wp_masonry_get_option('hide_posted_date')) || !(wp_masonry_get_option('hide_comments_link')) || !(wp_masonry_get_option('hide_post_edit')) ) { ?>
    <div class="wp-masonry-entry-meta-single">
    <?php if ( !(wp_masonry_get_option('hide_post_author')) ) { ?><span class="wp-masonry-entry-meta-single-author"><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;<span class="author vcard" itemscope="itemscope" itemtype="http://schema.org/Person" itemprop="author"><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span class="screen-reader-text"><?php esc_html_e('Author: ', 'wp-masonry'); ?></span><?php echo esc_html( get_the_author() ); ?></a></span></span><?php } ?>
    <?php if ( !(wp_masonry_get_option('hide_posted_date')) ) { ?><span class="wp-masonry-entry-meta-single-date"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;<span class="screen-reader-text"><?php esc_html_e('Published Date: ', 'wp-masonry'); ?></span><?php echo get_the_date(); ?></span><?php } ?>
    <?php if ( !(wp_masonry_get_option('hide_comments_link')) ) { ?><?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
    <span class="wp-masonry-entry-meta-single-comments"><i class="fa fa-comments-o" aria-hidden="true"></i>&nbsp;<?php comments_popup_link( sprintf( wp_kses( /* translators: %s: post title */ __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'wp-masonry' ), array( 'span' => array( 'class' => array(), ), ) ), get_the_title() ) ); ?></span>
    <?php } ?><?php } ?>
    <?php if ( !(wp_masonry_get_option('hide_post_edit')) ) { ?><?php edit_post_link( sprintf( wp_kses( /* translators: %s: Name of current post. Only visible to screen readers */ __( 'Edit<span class="screen-reader-text"> %s</span>', 'wp-masonry' ), array( 'span' => array( 'class' => array(), ), ) ), get_the_title() ), '<span class="edit-link">&nbsp;&nbsp;<i class="fa fa-pencil" aria-hidden="true"></i> ', '</span>' ); ?><?php } ?>
    </div>
    <?php } ?>
<?php }
endif;