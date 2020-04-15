<?php
/*
 * Template Name: About Page
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
   <section class="review-section">
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
   <!-- review section end --> 

    <!-- team section start --> 
    <?php if(get_field('team_title')): ?>
    <section id="team" class="team-section">
      <div class="container">
        <h2 class="text-center mb-4"><?php echo get_field('team_title'); ?></h2>
        <div class="row align-items-start text-center">
          <?php while(have_rows('teams')): the_row(); ?>
          <div class="col-lg-4 col-md-6 pb-5">
            <div class="team-box">              
              <div class="team-user">
                <?php if(get_sub_field('image')): ?>
                  <img src="<?php echo get_sub_field('image'); ?>" alt="<?php echo bloginfo('name'); ?>"/>
                <?php endif; ?>
              </div>  
              <h3><?php echo get_sub_field('name'); ?></h3>
              <span class="post"><?php echo get_sub_field('role'); ?></span>
              <p><?php echo get_sub_field('description'); ?></p>
            </div>
          </div>
          <?php endwhile; ?>          
        </div>
      </div>
    </section>
    <?php endif; ?>
   <!-- team section start --> 

</div>

<?php
get_footer();
?>
