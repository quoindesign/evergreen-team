<?php
/*
 * Template Name: Our Work Page
 */

get_header();
?>

<div class="main">
    <!-- banner section start -->
   <section class="banner-section">
      <div class="banner">
        <div class="banner-img about-banner" style="background-image: url('<?php echo get_field('banner_image'); ?>')">
        </div>
        <div class="banner-content">
          <div class="banner-desc">
            <h1><?php echo get_field('banner_title'); ?></h1>
          </div>
        </div>
     </div>
   </section>
   <!-- banner section end -->

   <!-- tab section start -->
   <section class="tab-section">
      <div class="container">
          <div class="custom-tab">
                <ul class="nav">
                    <li><a>Filter by:</a></li>
                    <li><a class="active" data-toggle="tab" href="#all">All</a></li>

                    <?php
                    $cats = get_field('filters');
                    $i = 1;
                    foreach($cats as $val_c):
                    ?>
                      <li>
                        <a class="" data-toggle="tab" href="#<?php echo $val_c->slug; ?>"><?php echo $val_c->name; ?></a>
                      </li>
                    <?php
                    $i++;
                    endforeach; ?>
                </ul>

                <div class="tab-content mt-3">
                    <?php
                    $queryall = array(
                          'post_type' => 'project',
                          'posts_per_page' => -1,
                          'post_status' => 'publish',
                      );
                    $loopall = new WP_Query($queryall);
                    ?>
                    <div id="all" class="tab-pane active">
                        <div class="row">
                            <?php
                            while ( $loopall->have_posts() ) : $loopall->the_post(); ?>
                              <div class="col-md-6 pb-3">
                                <a href="<?php echo get_the_permalink(); ?>">
                                  <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="mw-100 project-thumb"/>
                                  <p class="prj-lnk"><?php echo get_the_title(); ?><?php if(get_field('prj_type')){ echo ', '.get_field('prj_type'); } ?></p>
                                </a>
                              </div>
                            <?php
                            endwhile;
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>

                    <?php
                    $j = 1;
                    foreach ($cats as $val)
                    {
                      //echo $val->slug;
                      $query = array(
                          'post_type' => 'project',
                          'posts_per_page' => -1,
                          'post_status' => 'publish',
                          'tax_query' => array(
                                          array (
                                              'taxonomy' => 'project_cat',
                                              'field' => 'slug',
                                              'terms' => $val->slug,
                                          )
                                      ),
                      );
                      $loop = new WP_Query($query);
                      //print_r($loop);
                    ?>
                    <div id="<?php echo $val->slug; ?>" class="tab-pane">
                        <div class="row">
                            <?php
                            while ( $loop->have_posts() ) : $loop->the_post(); ?>
                              <div class="col-md-6 pb-3">
                                <a href="<?php echo get_the_permalink(); ?>">
                                  <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="mw-100"/>
                                  <p class="prj-lnk"><?php echo get_the_title(); ?><?php if(get_field('prj_type')){ echo ', '.get_field('prj_type'); } ?></p>
                                </a>
                              </div>
                            <?php
                            endwhile;
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                    <?php
                      $j++;
                    } ?>

                </div>
          </div>
      </div>
   </section>
   <!-- tab section end -->

</div>

<?php
get_footer();
?>
