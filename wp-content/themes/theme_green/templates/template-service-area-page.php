<?php
/*
 * Template Name: Service Areas Page
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
   <!--service area page section start-->
   <section class="services-area-page-section review-section services-sec">
     <div class="container">
       <div class="services-area-page">
         <div class="row mb-4">
           <div class="col-12 left-sec">
             <?php echo get_field('content'); ?>
           </div>
         </div>
         
         <div class="services-area-box-section">
           <div class="row">
              <?php while(have_rows('service_areas')): the_row(); ?>
              <div class="col-md-4">
                <a href="<?php echo get_sub_field('link'); ?>" class="services-area-box">
                  <span class="area-box-name"><?php echo get_sub_field('title'); ?></span>
                </a>
              </div>
              <?php endwhile; ?>
           </div>
         </div>
         <?php echo do_shortcode('[serviceareareviewcombo  showmap="yes" checkincount="20" reviewcount="20" zoomlevel="9"]'); ?>
       </div>
     </div>
   </section>
   <!--service area page section ends-->     

</div>

<?php
get_footer();
?>
