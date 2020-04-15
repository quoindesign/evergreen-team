<?php
/*
 * Template Name: Page Template roofing
 */

get_header();
?>

<div class="main about-page">

  <!--
  Section map:
    .banner-section
    .offers-section
    .process-section
    .customer_service-section
    .testimonials-section
    .financing-section
 -->
   <!-- banner section start -->
   <section class="banner-section">
      <div class="banner">
        <div class="banner-img about-banner" style="background-image: url('<?php echo get_field('banner_image'); ?>')"></div>
        <div class="banner-content">
            <div class="banner-desc">
                <h1><?php echo get_field('banner_title'); ?></h1>
            </div>
        </div>
     </div>
   </section>
   <!-- banner section end -->

   <!-- offers section start -->
   <section class="offers-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-2">
            <h2><?php echo get_field('offer_area_title'); ?></h2>
          </div>
          <div class="col-lg-10 pb-lg-0 pb-5">
            <div class="container">
              <div class="offers">
                <?php if( have_rows('offer') ): ?>
                  <?
                  while( have_rows('repeater_field_name') ):
                    the_row();
                    $offer = "<h3 class="offer-line1">" . get_sub_field('offer_title_1') . "<br> <span class="line2">" . get_sub_field('offer_title_2') . "</span></h3>";
                    $offer += "<p>" . get_sub_field('offer_desc') . "</p>";

                  endif;
                  ?>
                <?php endif; // end offer val ?>
                <?php echo get_field('first_paragraph'); ?>
              </div>
              <?php echo get_field('content_area'); ?>
            </div>
          </div>
          <div class="col-lg-4">
              <?php echo get_template_part( 'template-parts/content', 'sidebar_about' ); ?>
          </div>
        </div>
      </div>
   </section>
   <!-- offers section end -->

   <!-- process section start -->
   <section class="process-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 pb-lg-0 pb-5">
            <div class="left-sec">
              <div class="first-pra">
                <?php echo get_field('first_paragraph'); ?>
              </div>
              <?php echo get_field('content_area'); ?>
            </div>
          </div>
          <div class="col-lg-4">
              <?php echo get_template_part( 'template-parts/content', 'sidebar_about' ); ?>
          </div>
        </div>
      </div>
   </section>
   <!-- process section end -->

   <!-- offers section start -->
   <section class="customer_service-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 pb-lg-0 pb-5">
            <div class="left-sec">
              <div class="first-pra">
                <?php echo get_field('first_paragraph'); ?>
              </div>
              <?php echo get_field('content_area'); ?>
            </div>
          </div>
          <div class="col-lg-4">
              <?php echo get_template_part( 'template-parts/content', 'sidebar_about' ); ?>
          </div>
        </div>
      </div>
   </section>
   <!-- customer-service_section end -->
   <!-- testimonials section start -->
   <section class="testimonials-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 pb-lg-0 pb-5">
            <div class="left-sec">
              <div class="first-pra">
                <?php echo get_field('first_paragraph'); ?>
              </div>
              <?php echo get_field('content_area'); ?>
            </div>
          </div>
          <div class="col-lg-4">
              <?php echo get_template_part( 'template-parts/content', 'sidebar_about' ); ?>
          </div>
        </div>
      </div>
   </section>
   <!-- testimonials section end -->
   <!-- financing section start -->
   <section class="financing-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 pb-lg-0 pb-5">
            <div class="left-sec">
              <div class="first-pra">
                <?php echo get_field('first_paragraph'); ?>
              </div>
              <?php echo get_field('content_area'); ?>
            </div>
          </div>
          <div class="col-lg-4">
              <?php echo get_template_part( 'template-parts/content', 'sidebar_about' ); ?>
          </div>
        </div>
      </div>
   </section>
   <!-- financing section end -->


</div>

<?php
get_footer();
?>
