<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package theme_green
 */

?>

      <?php include('inc/footer-contact-2.php'); ?>

	  </div><!-- #content -->

  	  <footer>
        <div class="footer">
            <div class="container">
                <div class="footer-top">
                    <div class="row">
                      <div class="col-lg-4 col-md-6 pb-md-0 pb-4">
                        <div class="left1">
                          <?php if(get_field('footer_logo','option')): ?>
                          <div class="footer-logo mb-4">
                            <a href="<?php  echo get_home_url(); ?>">
                                <img src="<?php echo get_field('footer_logo','option'); ?>" class="mw-100" alt="<?php echo bloginfo('name'); ?>" />
                            </a>
                          </div><?php endif; ?>

                          <div class="contect-detail">
                            <a href="tel:<?php echo get_field('telephone_no','option'); ?>" class="footer-link"><?php echo get_field('display_tel_no_as','option'); ?></a>
                            <div class="address"><?php echo get_field('address','option'); ?></div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-2 d-lg-block d-none">
                        <div class="left2">
                          <?php if(has_nav_menu('ftr_part1')): ?>
                          <div class="footer-menu">
                            <?php wp_nav_menu( array( 'theme_location' => 'ftr_part1','menu_class'=>'','container'=>'ul' ) ); ?>
                          </div>
                          <?php endif; ?>
                        </div>
                      </div>
                      <div class="col-md-2 d-lg-block d-none">
                        <div class="left3">
                          <?php if(has_nav_menu('ftr_part2')): ?>
                          <div class="footer-menu">
                            <?php wp_nav_menu( array( 'theme_location' => 'ftr_part2','menu_class'=>'','container'=>'ul' ) ); ?>
                          </div>
                          <?php endif; ?>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-6">
                        <div class="left4">
                          <div class="social-sec">
                            <?php if(have_rows('social_icon','option')): ?>
                            <ul>
                              <?php while(have_rows('social_icon','option')): the_row(); ?>
                              <li>
                                <a target="_blank" href="<?php echo get_sub_field('link','option'); ?>" class="social-link">
                                  <img src="<?php echo get_sub_field('icon','option'); ?>" alt="social-icon"/>
                                </a>
                              </li>
                              <?php endwhile; ?>
                            </ul>
                            <?php endif; ?>

                            <?php echo get_field('company_code','option'); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
      </footer><!-- #colophon -->

      <?php if(get_field('footer_fixed_call_button','option')): ?>
      <div class="call-sticky">
        <div>
          <a href="<?php echo get_field('footer_fixed_link','option'); ?>">
            <img src="<?php echo get_field('footer_fixed_call_button','option'); ?>" class="img-responsive" alt="<?php echo bloginfo('name'); ?>" title="Call Us <?php echo bloginfo('name'); ?>">
          </a>
        </div>
      </div>
      <?php endif; ?>

    </div>
  </div>
</div><!-- #page -->

<?php wp_footer(); ?>
<!-- Firechat -->
<script id="chatBT" chatKey="dqkLC2Iwb4apemFzTZ7i" src="https://bit.ly/2ABWViG" type="text/javascript"></script>

</body>
</html>
