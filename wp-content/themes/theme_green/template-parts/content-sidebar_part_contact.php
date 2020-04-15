<?php
/**
 * Template part for displaying page content in Sidebar
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme_green
 */

?>

<div class="small-contact-form contactus-section side-br2">
    <div class="con-top-bg"></div>
    <div class="contactus">
      <div class="contact-form px-3">
        <h2><?php echo get_field('contact_us_title_sb','option'); ?></h2>
        <p><?php echo get_field('contact_us_sub_title_sb','option'); ?></p>
        <div class="form-detail">
          <div class="form-row mx-auto">
              <?php
              $cnt_sbr = get_field('contact_us_form_sb','option');
              echo do_shortcode($cnt_sbr); ?>
          </div>
        </div>
      </div>

      <?php if(get_field('call_us_text','option')): ?>
      <div class="contact-call d-flex justify-content-center align-items-center mt-0">
        <img src="<?php echo get_field('call_us_icon','option'); ?>" class="mw-100" alt=""/>
        <p class="call-text mb-0 ml-2"><?php echo get_field('call_us_text','option'); ?> <a href="tel:<?php echo get_field('telephone_no','option'); ?>"><?php echo get_field('display_tel_no_as','option'); ?></a></p>            
      </div>
      <?php endif; ?>
    </div>
    <div class="con-btm-bg"></div>
</div>
