<?php
/**
 * The template for displaying all single Project
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package theme_green
 */

get_header();
?>

<div class="main">
    <!-- banner section start -->
   <section class="banner-section">
     <div class="banner">
	    <div class="banner-img about-banner" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>
	    <div class="banner-content">
          <div class="banner-desc">
              <h1>Our Work</h1>
              <span><?php echo get_the_title(); ?></span>
          </div>
	    </div>
     </div>
   </section>
   <!-- banner section end -->

   <!-- single-page section start -->
   <section class="single-page-sec">
    <div class="container">
      <div class="row">
        <?php if(get_field('content_title') && get_field('content_description') ): ?>

          <div class="col-lg-7 pb-lg-0 pb-4">
          <?php if(get_field('content_title')) : ?>
            <p class="desc1"><?php echo get_field('content_title'); ?></p>
        	<?php endif; ?>
            <div class="desc2"><?php echo get_field('content_description'); ?></div>
          </div>


          <div class="col-lg-5 pb-lg-0 pb-4">
            <div class="right-sec-work">
                <div class="desc">
                    <!-- <h3>Work Done</h3>
                    <p>ROOFING, INTERIOR DESIGN, KITCHEN REMODEL, BATH REMODEL, BASEMENT REMODEL</p> -->
                </div>
                <div class="btn-start-sec">
  	              <div class="btn-sec">
  	                <a href="<?php echo get_the_permalink(18); ?>" class="btn btn-project">START YOUR PROJECT</a>
  	              </div>
                </div>
            </div>
          </div>
        <?php else : ?>
          <div class="col-lg-12 pb-lg-0 pb-4">
            <div class="btn-start-sec center">
              <div class="btn-sec">
                <a href="<?php echo get_the_permalink(18); ?>" class="btn btn-project">START YOUR PROJECT</a>
              </div>
            </div>
          </div>
        <?php endif; ?>
      </div>

      <?php if(have_rows('gallery')): ?>
      <div class="img-sec mt-3">
          <ul class="row text-center">
          	<?php while(have_rows('gallery')): the_row(); ?>
          		<?php if(get_sub_field('view') == 'full'): ?>
		            <li class="col-md-12 pb-5">
		              <img src="<?php echo get_sub_field('image_full') ?>" class="mw-100" alt="<?php echo bloginfo('name'); ?>"/>
		            </li>
	            <?php else: ?>
	            	<li class="col-md-6 pb-5">
		              <img src="<?php echo get_sub_field('image_half_left') ?>" class="mw-100" alt="<?php echo bloginfo('name'); ?>"/>
		            </li>
		            <li class="col-md-6 pb-5">
		              <img src="<?php echo get_sub_field('image_half_right') ?>" class="mw-100" alt="<?php echo bloginfo('name'); ?>"/>
		            </li>
	            <?php endif; ?>
        	<?php endwhile; ?>
      </div>
  	  <?php endif; ?>
      <div class="col-lg-12 pb-lg-0 pb-4">
        <div class="btn-start-sec center">
          <div class="btn-sec">
            <a href="<?php echo get_the_permalink(18); ?>" class="btn btn-project">START YOUR PROJECT</a>
          </div>
        </div>
      </div>
      <?php
          the_post_navigation(
            array(
              'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next Post', 'twentynineteen' ) . '</span> ' .
                '<span class="screen-reader-text">' . __( 'Next post:', 'twentynineteen' ) . '</span> <br/>' .
                '<span class="post-title">%title</span>',
              'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous Post', 'twentynineteen' ) . '</span> ' .
                '<span class="screen-reader-text">' . __( 'Previous post:', 'twentynineteen' ) . '</span> <br/>' .
                '<span class="post-title">%title</span>',
            )
          );
        ?>
    </div>

   </section>
   <!--single-page section end -->

</div>

<?php
get_footer();
