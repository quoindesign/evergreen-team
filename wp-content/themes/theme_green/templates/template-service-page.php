<?php
/*
 * Template Name: Services Page
 */

get_header();
?>

<div class="main about-page">
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

   <!-- review section start --> 
   <section class="review-section services-sec">
      <div class="container">
        <div class="row">

          <div class="col-lg-8 pb-lg-0 pb-5">
            <div class="left-sec">              
              <?php if(get_field('first_paragraph')): ?>
                <div class="service-first-pra"><?php echo get_field('first_paragraph'); ?></div>
              <?php endif; ?>

              <?php if(get_field('content_part_1')): ?>
              <div class="services-second-sec mb-5">
                <?php echo get_field('content_part_1'); ?>
              </div>  
              <?php endif; ?>

              <?php if(get_field('video_embed_url')): ?>
              <div class="services-second-sec mb-5">  
                <div class="custom-iframe">
                  <iframe src="<?php echo get_field('video_embed_url'); ?>?controls=0" class="w-100 border-0"></iframe>
                </div>
                <div class="btn-call d-block text-center">
                  <a href="tel:<?php echo get_field('telephone_no','option'); ?>">Call Us! <?php echo get_field('telephone_no','option'); ?></a>
                </div>
              </div>  
              <?php endif; ?>

              <?php if(get_field('content_part_2')): ?>
              <div class="services-third-sec mb-md-5 mb-3">
                <?php echo get_field('content_part_2'); ?>                
              </div> 
              <?php endif; ?>

              <?php while(have_rows('testimonials')): the_row(); ?>
                <?php if(get_sub_field('view')=='full'){ ?>
                <div class="testimonial-full-sec mb-md-5 mb-3">
                  <div class="testimonial-box">
                    <div class="custom-testimonial">
                      <p class="custom-quote"><?php echo get_sub_field('description'); ?></p>
                    </div>
                  </div>
                  <div class="tetimonial-name">
                    <p><?php echo get_sub_field('by_name'); ?></p>
                  </div>
                </div>
                  <?php if(get_sub_field('image')): ?>      
                  <div class="full-testimonial-img mb-5">
                    <img src="<?php echo get_sub_field('image'); ?>" class="mw-100 w-100" />
                  </div>
                  <?php endif; ?>
                <?php }elseif(get_sub_field('view')=='half_half'){ ?>
                <div class="testimonial-two-sec mb-md-5 mb-3">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="testimonial-full-sec">
                        <div class="testimonial-box">
                          <div class="custom-testimonial">
                            <p class="custom-quote"><?php echo get_sub_field('description'); ?></p>
                          </div>
                        </div>
                        <div class="tetimonial-name">
                          <p><?php echo get_sub_field('by_name'); ?></p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="testimonial-full-sec">
                        <div class="testimonial-box">
                          <div class="custom-testimonial">
                            <p class="custom-quote"><?php echo get_sub_field('description2'); ?></p>
                          </div>
                        </div>
                        <div class="tetimonial-name">
                          <p><?php echo get_sub_field('by_name2'); ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>  
                <?php }elseif(get_sub_field('view')=='half_left'){ ?>  
                <div class="testimonial-left-img-content-sec mb-md-5 mb-3">
                  <div class="row">
                    <div class="col-md-5 pb-md-0 pb-3">
                      <div class="testimonila-img-left">
                        <img src="<?php echo get_sub_field('image'); ?>" class="mw-100 w-100" />
                      </div>
                    </div>
                    <div class="col-md-7">
                      <div class="testimonial-full-sec">
                        <div class="testimonial-box">
                          <div class="custom-testimonial">
                            <p class="custom-quote"><?php echo get_sub_field('description'); ?></p>
                          </div>
                        </div>
                        <div class="tetimonial-name">
                          <p><?php echo get_sub_field('by_name'); ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> 
                <?php }elseif(get_sub_field('view')=='half_right'){ ?> 
                <div class="testimonial-right-img-content-sec mb-5">
                  <div class="row">
                    <div class="col-md-7">
                      <div class="testimonial-full-sec">
                        <div class="testimonial-box">
                          <div class="custom-testimonial">
                            <p class="custom-quote"><?php echo get_sub_field('description'); ?></p>
                          </div>
                        </div>
                        <div class="tetimonial-name">
                          <p><?php echo get_sub_field('by_name'); ?></p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="testimonila-img-left">
                        <img src="<?php echo get_sub_field('image'); ?>" class="mw-100 w-100" />
                      </div>
                    </div>
                  </div>
                </div>
                <?php } ?> 
              
              <?php endwhile; ?>

              <?php if(get_field('payment_content') || get_field('payment_content2')): ?>
                <div class="line-arrow-img mb-md-5 mb-3">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/line-arrow-img.png" class="mw-100 w-100" />
                </div>
                <?php if(get_field('payment_content')): ?>
                <div class="ease-payment mb-md-5 mb-3">
                  <?php echo get_field('payment_content'); ?>                
                </div>
                <?php endif; ?>

                <?php if(get_field('payment_content2')): ?>
                <div class="ease-payment mb-md-5 mb-3">
                  <h3 class="mb-3"><?php echo get_field('payment_part_2_title'); ?></h3>
                  <div class="row">
                    <div class="col-md-5">
                      <?php if(get_field('payment_part_left_side_image')): ?>
                      <div class="left-ease-img">
                        <img src="<?php echo get_field('payment_part_left_side_image'); ?>" class="mw-100 w-100" alt=""/>
                      </div>
                      <?php endif; ?>
                    </div>
                    <div class="col-md-7">
                        <div class="right-ease-content">
                          <?php echo get_field('payment_content2'); ?>                          
                        </div>
                      </div>
                  </div>
                </div>
                <?php endif; ?>
                
              <?php endif; ?>

              <?php if(get_field('satisfaction_title') || get_field('satisfaction_content')): ?>
                <div class="graphic-img mb-md-5 mb-3">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/SawGraphic.png" class="mw-100 w-100" />
                </div>
                <div class="satisfaction-sec text-center">
                  <h3 class="font-weight-bold"><?php echo get_field('satisfaction_title'); ?></h3>
                  <?php echo get_field('satisfaction_content'); ?>                  
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-lg-4">            
              <?php echo get_template_part( 'template-parts/content', 'sidebar_service' ); ?>
          </div>

        </div>
      </div>
   </section>
   <!-- review section end -->      

</div>

<?php
get_footer();
?>
