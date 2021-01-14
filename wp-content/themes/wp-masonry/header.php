<?php
/**
* The header for WP Masonry theme.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package WP Masonry WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-131226321-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-131226321-1');
</script>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class('wp-masonry-animated wp-masonry-fadein'); ?> id="wp-masonry-site-body" itemscope="itemscope" itemtype="https://schema.org/WebPage">
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#wp-masonry-posts-wrapper"><?php esc_html_e( 'Skip to content', 'wp-masonry' ); ?></a>

<div class="wp-masonry-outer-wrapper">
<div class="wp-masonry-container" id="wp-masonry-header" itemscope="itemscope" itemtype="https://schema.org/WPHeader" role="banner">
<div class="wp-masonry-head-content clearfix" id="wp-masonry-head-content">

<?php if ( !(wp_masonry_get_option('hide_header_content')) ) { ?>
<div class="wp-masonry-header-inside clearfix">

<div id="wp-masonry-logo">
<?php if ( has_custom_logo() ) : ?>
    <div class="site-branding">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="wp-masonry-logo-img-link">
        <img src="<?php echo esc_url( wp_masonry_custom_logo() ); ?>" alt="" class="wp-masonry-logo-img"/>
    </a>
    </div>
<?php else: ?>
    <div class="site-branding">
      <h1 class="wp-masonry-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
      <p class="wp-masonry-site-description"><?php bloginfo( 'description' ); ?></p>
    </div>
<?php endif; ?>
</div><!--/#wp-masonry-logo -->

</div>
<?php } ?>

<?php wp_masonry_featured_header_image(); ?>

</div><!--/#wp-masonry-head-content -->
</div><!--/#wp-masonry-header -->
</div>

<?php if ( !(wp_masonry_get_option('disable_primary_menu')) ) { ?>
<div class="wp-masonry-outer-wrapper">
<div class="wp-masonry-container wp-masonry-primary-menu-container clearfix">
<div class="wp-masonry-primary-menu-container-inside clearfix">
<nav class="wp-masonry-nav-primary" id="wp-masonry-primary-navigation" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'wp-masonry' ); ?>">
<button class="wp-masonry-primary-responsive-menu-icon" aria-controls="wp-masonry-menu-primary-navigation" aria-expanded="false"><?php esc_html_e( 'Menu', 'wp-masonry' ); ?></button>
<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'wp-masonry-menu-primary-navigation', 'menu_class' => 'wp-masonry-primary-nav-menu wp-masonry-menu-primary', 'fallback_cb' => 'wp_masonry_fallback_menu', 'container' => '', ) ); ?>
</div>
</nav>
</div>
</div>
<?php } ?>

<?php if ( !(wp_masonry_get_option('hide_social_bar')) ) { ?>
<div class="wp-masonry-outer-wrapper">
<div class="wp-masonry-top-social-bar">
<?php if ( !(wp_masonry_get_option('hide_header_social_buttons')) ) { wp_masonry_header_social_buttons(); } ?>
</div>
</div>
<?php } ?>

<div id="wp-masonry-search-overlay-wrap" class="wp-masonry-search-overlay">
  <button class="wp-masonry-search-closebtn" aria-label="<?php esc_attr_e( 'Close Search', 'wp-masonry' ); ?>" title="<?php esc_attr_e('Close Search','wp-masonry'); ?>">&#xD7;</button>
  <div class="wp-masonry-search-overlay-content">
    <?php get_search_form(); ?>
  </div>
</div>

<div class="wp-masonry-outer-wrapper">
<?php wp_masonry_top_wide_widgets(); ?>
</div>

<div class="wp-masonry-outer-wrapper">
<div class="wp-masonry-container clearfix" id="wp-masonry-wrapper">
<div class="wp-masonry-content-wrapper clearfix" id="wp-masonry-content-wrapper">