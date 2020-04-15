<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package theme_green
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">

  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-P6ZCZQW');</script>
  <!-- End Google Tag Manager -->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P6ZCZQW"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'theme_green' ); ?></a>

  <div class="main-body">
    <div class="scroll-body">
      <div class="layerblack"></div>

	    <header>
        <div class="container">
              <div class="header">
                  <?php if(get_field('header_logo','option')): ?>
                  <a href="<?php  echo get_home_url(); ?>" id="logo">
                      <img src="<?php echo get_field('header_logo','option'); ?>" class="img-responsive" alt="<?php echo bloginfo('name'); ?>">
                  </a>
                  <?php endif; ?>

                  <?php if(get_field('free_estimate_text','option')): ?>
                  <div class="header-phone">
                      <a href="tel:<?php echo get_field('telephone_no','option'); ?>"><?php echo get_field('free_estimate_text','option'); ?> <?php echo get_field('display_tel_no_as','option'); ?></a>
                  </div>
                  <?php endif; ?>
                  <nav>
                      <div class="sidebar-menu-icon d-inline-flex">
                          <div class="button" id="btn">
                              <div class="bar top"></div>
                              <div class="bar middle"></div>
                              <div class="bar bottom"></div>
                          </div>
                          <div class="btn-close"></div>
                      </div>
                      <?php wp_nav_menu( array( 'theme_location' => 'menu-1','menu_class'=>'header-menu-list menu-section','container'=>'ul' ) ); ?>
                  </nav>
              </div>
        </div>
      </header><!-- #masthead -->

	<div id="content" class="site-content">
