<?php
get_header();
?>

<div class="main about-page">
   <!-- banner section start -->
   <section class="banner-section">
      <div class="banner">
        <div class="banner-img about-banner" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>
        <div class="banner-content">
            <div class="banner-desc">
                <h1><?php echo get_the_title(); ?></h1>
            </div>
        </div>
     </div>
   </section>
   <!-- banner section end -->

   <!-- review section start -->
   <section class="review-section services-sec">
      <div class="container">
        <div class="row">

          <div class="col-lg-8 pb-lg-0 pb-5">
            <div class="left-sec">
              <?php if(get_the_post_thumbnail_url()): ?>
              <div class="news-img mb-5">
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo bloginfo('name'); ?>"/>
              </div>
              <?php endif; ?>

              <h2 class="news-title"><?php echo get_the_title(); ?></h2>
              <?php echo get_field('full_content'); ?>
            </div>
            <?php
                the_post_navigation(
                  array(
                    'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next Post', 'twentynineteen' ) . '</span> ' .
                      '<span class="screen-reader-text">' . __( 'Next post:', 'twentynineteen' ) . '</span>',
                    'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous Post', 'twentynineteen' ) . '</span> ' .
                      '<span class="screen-reader-text">' . __( 'Previous post:', 'twentynineteen' ) . '</span>',
                  )
                );
              ?>
          </div>
          <div class="col-lg-4">
              <?php echo get_template_part( 'template-parts/content', 'sidebar_part_contact' ); ?>
          </div>

        </div>
      </div>
   </section>
   <!-- review section end -->

</div>

<?php
get_footer();
?>
