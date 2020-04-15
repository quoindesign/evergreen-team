<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package theme_green
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="main about-page">
			   <!-- banner section start -->
			   <section class="banner-section">
			      <div class="banner">
			        <div class="banner-img about-banner" style="background-image: url('<?php echo get_field('banner_image'); ?>')https://evergreenteam.com//wp-content/uploads/2020/02/DJI_0048-2-banner.jpg"></div>
			        <div class="banner-content">
			            <div class="banner-desc">
			                <h1>Sorry, we couldn't find that page.</h1>
			                <span>Please check menus below to find links that might work for you.</span>
			            </div>
			        </div>
			     </div>
			   </section>
				 <div class="menu-404">
					 <?php if(has_nav_menu('ftr_part1')): ?>
						 <div class="footer-menu">
							 <?php wp_nav_menu( array( 'theme_location' => 'ftr_part1','menu_class'=>'','container'=>'ul' ) ); ?>
						 </div>
					 <?php endif; ?>
					 <?php if(has_nav_menu('ftr_part2')): ?>
						 <div class="footer-menu">
							 <?php wp_nav_menu( array( 'theme_location' => 'ftr_part2','menu_class'=>'','container'=>'ul' ) ); ?>
						 </div>
					 <?php endif; ?>
				 </div>
			   <!-- banner section end -->
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
