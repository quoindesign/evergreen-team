<?php
/*
 * Template Name: Resources Page
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
              <div class="news-section">
                <?php
                $queryall = array(
                      'post_type' => 'resource_center',
                      'posts_per_page' => 10,
                      'post_status' => 'publish',
                      'paged' => get_query_var('paged'),
                  );
                $loopall = new WP_Query($queryall);

                while ( $loopall->have_posts() ) : $loopall->the_post();
                ?>
                <div class="news-box">
                  <?php if(get_the_post_thumbnail_url()): ?>
                  <div class="news-img mb-5">
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo bloginfo('name'); ?>"/>
                  </div>
                  <?php endif; ?>

                  <h2 class="news-title"><?php echo get_the_title(); ?></h2>

                  <?php echo get_field('short_description'); ?>

                  <a class="news-read-more" href="<?php echo get_the_permalink(); ?>">Read More</a>
                </div>
                <?php
                endwhile;
                ?>
              </div>

              <div class="nw-paginate">
                <?php
                wp_pagenavi( array( 'query' => $loopall ) );
                wp_reset_postdata();
                ?>
              </div>

            </div>
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
