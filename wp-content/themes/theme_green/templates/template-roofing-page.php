<?php
/*
 * Template Name: Roofing Page Template
 */

get_header();
?>

<div class="main about-page">

  <!--
  Section map:
    .banner-section
    .offers-section
    .process-section
    .master_elite-section
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
          <div class="col-lg-10 pb-lg-0 pb-5"> <!-- pb- sets bottom padding -->
            <div class="container">
              <div class="row">
                 <!-- output offer repeater -->
                  <?php if( have_rows('offer') ):
                    while( have_rows('offer') ):
                      the_row();
                      $offer = "<div class=\"col-sm-10 col-lg-4 offers \"><a href=\"" . get_sub_field('offer_page_link') . "\"><div class=\"offer-text\"><h3 class=\"offer-line1\">" . get_sub_field('offer_title_1') . "<br> <span class=\"line2\">" . get_sub_field('offer_title_2') . "</span></h3><p>" . get_sub_field('offer_desc') . "</p></div><div class=\"offer-link\"><p><a href=\"" . get_sub_field('offer_page_link') . "\">Click Here</a></div></a></div>";
                      echo $offer;
                    endwhile;
                    ?>
                  <?php endif; // end offer val ?>
                </div>
            </div>
          </div>
          <div class="col-md-10 offset-md-2 pt-md-4 restrictions">
            <p><?php echo get_field('offer_restrictions_text'); ?></p>
          </div>
        </div>
      </div>
   </section>
   <!-- offers section end -->

   <!-- process section start -->
 <?php if(have_rows('process_step')): ?>
   <section class="d-md-none">
     <img src="<?php echo get_field('process_bkg_image'); ?> ">
   </section>
   <section class="process-section" style="background-image: url('<?php echo get_field('process_bkg_image'); ?>')">
      <div class="container">
        <div class="row">
          <div class="col-md-5 pb-5">
            <h2 class="d-sm" style="color:white"><?php echo get_field('process_title'); ?></h2>

            <?php
            $i = 0;
            while(have_rows('process_step')): the_row(); $i = $i+1 ?>
              <div class="row">

                <div class="col-md-2 offset-md-1">
                  <img src="<?php echo get_sub_field('process_step_icon'); ?>">
                </div>
                <div class="col-md-8 offset-md-1">
                  <h4><?php echo get_sub_field('process_step_title'); ?></h4>
                  <p><?php echo get_sub_field('process_step_text'); ?></p>

                  <?php if(count(get_field('process_step')) == $i ): ?>
                  <a href="<?php echo get_field('cta_link'); ?>" class="btn btn-red">
                    <?php echo get_field('cta_text'); ?>
                  </a>
                  <?php endif; ?>


                </div>

              </div>
              <?php endwhile; ?>





            </div>
          </div>
      </div>
   </section>
 <?php endif; ?>
   <!-- process section end -->

   <!-- master_elite section start -->
   <section class="master_elite-section" style="background-image: url('<?php echo get_field(''); ?>')">
      <div class="container">
        <div class="row">
          <div class="col-md-4 offset-md-1 pb-lg-0 pb-5">
            <h2><?php echo get_field('master_title'); ?></h2>
            <img src="<?php echo get_field('master_logo'); ?>">
          </div>
          <div class="col-lg-6 pb-lg-0 pb-5">
            <p><?php echo get_field('master_text'); ?></p>

                <a href="<?php echo "tel:" . get_field('telephone_no','option'); ?>" class="btn btn-red">
                  <?php echo get_field('master_cta_text') . " " . get_field('display_tel_no_as','option'); ?>
                </a>

            </div>
          </div>
      </div>
   </section>
   <!-- master_elite section end -->

   <!-- customer_service section start -->

   <section class="customer_service-mobile-image">
     <img src="<?php echo get_field('cs_background_image'); ?>">
   </section>
   <section class="customer_service-section" style="background-image: url('<?php echo get_field('cs_background_image'); ?>')">
      <div class="container">
        <div class="row">
          <div class="col-md-10 offset-md-1 pb-5">
            <div class="row">
              <div class="col-md-10 offset-md-1">
                <!-- Title -->
                <h2><?php echo get_field('cs_title'); ?></h2>
              </div>
              <div class="col-md-5 offset-md-1">
                <!-- intro -->
                <p><strong><?php echo get_field('cs_intro'); ?></strong></p>
                <!-- CTA -->

                  <a href="<?php echo get_field('cs_cta_link'); ?>" class="btn btn-red">
                    <?php echo get_field('cs_cta_text'); ?>
                  </a>

              </div>
              <div class="col-md-5 " >
                <!-- text -->
                <p><?php echo get_field('cs_text'); ?></p>
                <!-- logos -->
              </div>
              <div class="col-md-6 offset-md-6">
                <p>We install only the best roofing materials:</p>
                <?php
                if(have_rows('mfr_logos')): ?>
                  <div class="row mfr_wrapper">
                <?php  while(have_rows('mfr_logos')): the_row(); ?>

                      <div class="mfr_logo">
                        <img src="<?php
                          echo get_sub_field('logo');
                        ?>">
                      </div>

                    <?php endwhile; ?>
                    </div>
                  <?php endif; ?>

              </div>





            </div>
          </div>
      </div>
   </section>

   <!-- customer_service section end -->

   <!-- testimonial section start -->
   <?php if(have_rows('testimonials')): ?>
   <section class="testimonial-section white">
     <div class="testimonial-top-bg"></div>
       <div class="testimonial">
           <div class="testimonial-sec">
               <div id="demo" class="carousel slide" data-ride="carousel">
                   <div class="carousel-inner">
                     <?php while(have_rows('testimonials')): the_row(); ?>
                     <div class="carousel-item <?php if(get_row_index()=='1'){echo 'active';} ?>">
                       <div class="carousel-caption">
                           <h3 class="title">"<?php echo get_sub_field('description'); ?>"</h3>
                             <p class="desc white-clr">
                                 <span class="text-name"><?php echo get_sub_field('name'); ?></span>
                                  <span class="white-star d-md-inline-block d-block">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/star<?php echo get_sub_field('star'); ?>-orange.svg" />
                                  </span>
                             </p>
                             <?php if(get_field('testimonial_more_text')): ?>
                             <div class="btn-start">
                               <a href="<?php echo get_field('testimonial_more_link'); ?>" class="btn btn-red"><?php echo get_field('testimonial_more_text'); ?></a>
                             </div>
                             <?php endif; ?>
                       </div>
                     </div>
                     <?php endwhile; ?>
                   </div>
                   <a class="carousel-control-prev" href="#demo" data-slide="prev">
                   <span class="carousel-control-prev-icon"></span>
                 </a>
                 <a class="carousel-control-next" href="#demo" data-slide="next">
                   <span class="carousel-control-next-icon"></span>
                 </a>
                 </div>
           </div>
       </div>
       <div class="testimonial-btm-bg"></div>
   </section>
   <?php endif; ?>
   <!-- testimonial section start -->

   <!-- financing section start -->
   <section class="financing-section">
      <div class="container">
        <div class="row">
          <div class="col-md-3 offset-md-1 pb-lg-0 pb-5">
            <div class="row">
              <div class="col-md-3 financing_icon">
                <img src="<?php echo get_field('financing_icon'); ?>">
              </div>
              <div class="col-md-9">
                <h2><?php echo get_field('financing_title'); ?></h2>
                <p><?php echo get_field('financing_intro'); ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-8 justify-content-center">
            <div class="container h-100">
              <div class="row align-items-center h-100">
              <?php if( have_rows('financing_logo')) : ?>
                <?php while(have_rows('financing_logo')): the_row(); ?>
                  <div class="col-md-4 ml-5 mr-5 mb-5">
                    <img src="<?php echo get_sub_field('image'); ?>">
                  </div>
                <?php endwhile; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
   </section>
   <!-- financing section end -->


</div>

<?php
get_footer('photo');
?>
