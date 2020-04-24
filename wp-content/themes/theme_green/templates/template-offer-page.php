<?php
/*
 * Template Name: Offer Page Template
 */

get_header();
?>

<div class="main about-page">



   <!-- offers section start -->
   <section class="offer-section">
      <div class="container">
        <div class="row">
          <div class="col-md-3 mb-5">
            <h1><?php echo get_field('offer_title_1'); ?><br>
              <span class="line2"><?php echo get_field('offer_title_2');?></span></h1>
              <h3><?php echo get_field('subhead'); ?></h3>
              <p class="d-none d-md-block"><?php echo get_field('offer_details'); ?></p>

          </div>
          <div class="col-md-6 offset-md-1">
            <!-- contactus section start -->
            <section class="contactus-section footer-cnt-frm dashed">
              <div class="contactus">
                <div class="contact-form text-center px-3">
                  <h2><?php echo get_field('form_title'); ?></h2>
                  <p class="contact-desc-text"><?php echo get_field('form_subtitle'); ?></p>
                  <div class="form-detail">
                    <div class="form-row mx-auto">
                        <?php
                        $frm_cnt = get_field('contact_from','option');
                        echo do_shortcode($frm_cnt); ?>
                    </div>
                  </div>

                  <?php if(get_field('call_us_text','option')): ?>
                  <div class="contact-call d-flex justify-content-center align-items-center mt-0">
                    <img src="<?php echo get_field('call_us_icon','option'); ?>" class="mw-100" alt=""/>
                    <p class="call-text mb-0 ml-2"><?php echo get_field('call_us_text','option'); ?> <a href="tel:<?php echo get_field('telephone_no','option'); ?>"><?php echo get_field('display_tel_no_as','option'); ?></a></p>
                  </div>
                  <?php endif; ?>
                </div>
              </div>
            </section>
            <!-- contactus section start -->
            <p class="d-md-none"><?php echo get_field('offer_details'); ?></p>

        </div>
      </div>
   </section>
   <!-- offers section end -->

   <!-- testimonial section start -->
   <?php if(have_rows('testimonials')): ?>
   <section class="testimonial-section white">
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
   </section>
   <?php endif; ?>
   <!-- testimonial section start -->


</div>

<?php
get_footer('nocontact');
?>
