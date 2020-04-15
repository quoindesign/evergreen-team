<?php
/*
 * Template Name: Home Page
 */

get_header();
?>

<div class="main">
    <!-- banner section start -->
    <section class="banner-section">
      <div class="banner">
        <div class="banner-img" style="background-image: url('<?php echo get_field('banner_image'); ?>')">
        </div>
        <div class="banner-content">
            <div class="banner-border">
                <h1><?php echo get_field('banner_title'); ?></h1>
                <p><?php echo get_field('banner_sub_title'); ?></p>
                <?php if(get_field('banner_lear_more_text')): ?>
                <div>
                  <a href="<?php echo get_field('banner_lear_more_link'); ?>" class="btn btn-red"><?php echo get_field('banner_lear_more_text'); ?></a>
                </div>
                <?php endif; ?>
            </div>
        </div>
      </div>
    </section>
    <!-- banner section end -->

    <!-- service section start -->
    <section class="services-section">
        <div class="container">
          <div class="our-service">
            <ul class="row justify-content-center text-center">
              <?php if(get_field('service_title')): ?>
              <li class="col-lg-3 pb-lg-0 pb-4">
                <div class="service-box">
                  <div class="box-img">
                    <h2 class="box-title title-1"><?php echo get_field('service_title'); ?></h2>
                  </div>
                </div>
              </li>
              <?php endif; ?>
              <?php while(have_rows('services')): the_row(); ?>
              <li class="col-lg-3 col-md-4">
                  <div class="service-box">
                    <div class="box-img">
                      <div class="circle-box">
                        <?php if(get_sub_field('icon')): ?>
                          <img src="<?php echo get_sub_field('icon'); ?>" class="mw-100" alt="services"/>
                        <?php endif; ?>
                      </div>
                      <h3 class="box-title"><?php echo get_sub_field('title'); ?></h3>
                    </div>
                    <p class="box-desc"><?php echo get_sub_field('description'); ?></p>
                    <?php if(get_sub_field('more_text')): ?>
                    <div class="learn-more">
                      <a href="<?php echo get_sub_field('more_link'); ?>" class="btn btn-learn-more"><?php echo get_sub_field('more_text'); ?></a>
                    </div>
                    <?php endif; ?>
                  </div>
              </li>
              <?php endwhile; ?>
            </ul>
          </div>
        </div>
    </section>
    <!-- service section start -->

    <!-- video section start -->
    <section class="video-section">
        <div class="video-bottom-img">
          <div class="container">
            <div class="row align-items-center justify-content-center">
              <div class="col-lg-6 col-md-7 pb-md-0 pb-5">
                <div class="video-desc">
                  <?php if(get_field('service_intro_title')): ?>
                    <h2 class="mb-md-4 mb-3"><?php echo get_field('service_intro_title'); ?></h2>
                  <?php endif; ?>
                  <div class="mb-md-4"><?php echo get_field('service_intro_description'); ?></div>

                  <?php if(get_field('service_intro_more_text')): ?>
                  <div class="btn-quote">
                    <a href="<?php echo get_field('service_intro_more_link'); ?>"><?php echo get_field('service_intro_more_text'); ?></a>
                  </div>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-lg-6 col-md-5">
                <div class="video-sec w-100 h-100">
                  <iframe src="<?php echo get_field('service_intro_video'); ?>?controls=0" class="w-100 border-0"></iframe>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    <!-- video section start -->

    <!-- testimonial section start -->
    <?php if(have_rows('testimonials')): ?>
    <section class="testimonial-section">
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
                                     <img src="<?php echo get_template_directory_uri(); ?>/images/star<?php echo get_sub_field('star'); ?>.svg" />
                                   </span>
                              </p>
                              <?php if(get_field('testimonial_more_text')): ?>
                              <div class="btn-start">
                                <a href="<?php echo get_field('testimonial_more_link'); ?>" class="btn btn-outline-orange"><?php echo get_field('testimonial_more_text'); ?></a>
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

    <!-- roofing section start -->
    <section class="video-section">
        <div class="video-bottom-img">
          <div class="container">
            <div class="row align-items-center justify-content-center">
              <div class="col-lg-6 col-md-5">
                <div class="video-sec w-100 h-100">
                  <img src="<?php echo get_field('roofing_intro_image'); ?>">
                  <!-- <iframe src="<?php echo get_field('roofing_intro_video'); ?>?controls=0" class="w-100 border-0"></iframe> -->
                </div>
              </div>
              <div class="col-lg-6 col-md-7 pb-md-0 pb-5">
                <div class="video-desc">
                  <?php if(get_field('roofing_intro_title')): ?>
                    <h2 class="mb-md-4 mb-3"><?php echo get_field('roofing_intro_title'); ?></h2>
                  <?php endif; ?>
                  <div class="mb-md-4"><?php echo get_field('roofing_intro_description'); ?></div>

                  <?php if(get_field('roofing_intro_more_text')): ?>
                  <div class="btn-quote">
                    <a href="<?php echo get_field('roofing_intro_more_link'); ?>"><?php echo get_field('roofing_intro_more_text'); ?></a>
                  </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    <!-- roofing section small-uncentered -->

    <!-- customer satisfaction section start -->
    <section class="cust-sats">
        <div class="image-slide-section">
          <div class="container">
            <h2 class="text-center text-white mb-4"><?php echo get_field('project_title'); ?></h2>

            <?php if(have_rows('projects')): ?>
            <div id="demo1" class="carousel slide" data-ride="carousel">
              <!-- The slideshow -->
              <div class="carousel-inner">
                <?php while(have_rows('projects')): the_row(); ?>
                <div class="carousel-item <?php if(get_row_index()=='1'){echo 'active';} ?>">
                  <a href="<?php echo get_sub_field('link'); ?>">
                    <img src="<?php echo get_sub_field('image'); ?>" alt="<?php echo bloginfo('name'); ?>" class="mw-100 w-100"/>

                    <?php if(get_sub_field('title')): ?>
                    <div class="slide-text">
                      <p><?php echo get_sub_field('title'); ?><?php if(get_sub_field('type')){ echo ', '.get_sub_field('type'); } ?></p>
                    </div>
                    <?php endif; ?>
                  </a>
                </div>
                <?php endwhile; ?>
              </div>

              <!-- Left and right controls -->
              <a class="carousel-control-prev" href="#demo1" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
              </a>
              <a class="carousel-control-next" href="#demo1" data-slide="next">
                <span class="carousel-control-next-icon"></span>
              </a>
            </div>

            <div class="cust-sats-btn text-right mt-2 my-3">
              <a href="<?php echo get_field('more_project_link'); ?>"><?php echo get_field('project_more_text'); ?> ❯</a>
            </div>
            <?php endif; ?>

            <div class="desc-sec">
              <div class="row">
                <?php echo get_field('project_description'); ?>
              </div>
            </div>

            <div class="img-slide-btm-sec">
              <div class="design-img my-3">
                <img src="<?php echo get_template_directory_uri(); ?>/images/fdesign.png" class="mw-100 w-100"/>
              </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="logo-text d-flex">
                        <?php if(get_field('design_consultation_icon')): ?>
                        <div class="design-logo">
                          <img src="<?php echo get_field('design_consultation_icon'); ?>" class="mw-100" alt="icon"/>
                        </div>
                        <?php endif; ?>
                        <div>
                            <div class="logo-title">
                                <h2 class="px-md-3 px-2"><?php echo get_field('design_consultation_title'); ?></h2>
                            </div>
                            <div class="email-area d-flex px-3">
                                <div class="w-100">
                                    <div class="form-row mx-auto">
                                        <?php
                                        $hm_cnslt_frm = get_field('design_consultation_form');
                                        echo do_shortcode($hm_cnslt_frm); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="rightlogo">
                        <p><?php echo get_field('design_consultation_description'); ?></p>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
    </section>
    <!-- customer satisfaction section end -->

    <!-- customer satisfaction section2 start -->
    <section class="cust-sats-2">
      <div class="sats-2">
        <div class="container">
          <div class="cust-sats2-img text-center">
            <img src="<?php echo get_template_directory_uri(); ?>/images/cust-top.gif" class="mw-100"/>
          </div>
          <h2 class="text-center mt-4"><?php echo get_field('customer_satisfaction_title'); ?></h2>
          <div class="row">
            <div class="col-md-6">
              <?php echo get_field('customer_satisfaction_description'); ?>
            </div>
            <div class="col-md-6">
              <div class="custm-review-sec review-section">
                  <div class="customer-review-section">
                      <div class="review-sec">
                        <ul>
                          <?php while(have_rows('customer_rating')): the_row(); ?>
                          <li class="d-flex justify-content-between align-items-center">
                            <div>
                              <img src="<?php echo get_sub_field('icon'); ?>" alt="icon"/>
                            </div>
                            <div>
                              <img src="<?php echo get_template_directory_uri(); ?>/images/redstar<?php echo get_sub_field('rating'); ?>.png" class="mw-100"/>
                            </div>
                          </li>
                          <?php endwhile; ?>
                        </ul>
                      </div>
                  </div>
              </div>
            </div>
          </div>

          <?php if(have_rows('all_services')): ?>
          <div class="services-sec">
            <div class="row">
              <?php while(have_rows('all_services')): the_row(); ?>
              <div class="col-lg-4 col-md-6 pb-5">
                <div class="services-box">
                  <div class="box-img">
                    <?php if(get_sub_field('image')): ?>
                    <a href="<?php echo get_sub_field('link'); ?>">
                      <img src="<?php echo get_sub_field('image'); ?>" class="mw-100 w-100" alt="<?php echo bloginfo('name'); ?>"/>
                    </a>
                    <?php endif; ?>
                  </div>
                  <div class="box-title my-3">
                    <a href="<?php echo get_sub_field('link'); ?>" class="btn-link"><?php echo get_sub_field('title'); ?></a>
                  </div>
                  <div class="box-desc">
                    <p><?php echo get_sub_field('description'); ?></p>
                  </div>
                </div>
              </div>
              <?php endwhile; ?>
            </div>
          </div>
          <?php endif; ?>

        </div>
      </div>
    </section>
    <!-- customer satisfaction section2 end -->

</div>

<?php
get_footer();
?>
