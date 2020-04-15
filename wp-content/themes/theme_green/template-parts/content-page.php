<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme_green
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="main about-page">
	   <!-- banner section start -->
	   <section class="banner-section" style="<?php if ( get_field('hide_page_banner')) : echo 'display:none;'; endif; ?>">
	      <div class="banner">
	        <div class="banner-img about-banner" style="background-image: url('<?php echo get_field('banner_image'); ?>')"></div>
	        <div class="banner-content">
	            <div class="banner-desc">
	                <h1><?php the_title(); ?></h1>
	            </div>
	        </div>
	     </div>
	   </section>
	   <!-- banner section end -->

	   <!-- review section start -->
	   <section class="review-section">
	      <div class="container">
	        <div class="row">
	          <div class="col-md-12">
	            <div class="left-sec">
	              <?php the_content(); ?>
	            </div>
	          </div>
	        </div>
	      </div>
	   </section>
	   <!-- review section end -->

	</div>
</article><!-- #post-<?php the_ID(); ?> -->
