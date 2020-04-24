<!-- contactus section start -->
<section class="contactus-section footer-cnt-frm">
  <div class="con-top-bg"></div>
  <div class="contactus">
    <div class="contact-form text-center px-3">
      <h2><?php echo get_field('contact_title','option'); ?></h2>
      <p class="contact-desc-text"><?php echo get_field('contact_sub_title','option'); ?></p>
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
  <div class="con-btm-bg"></div>
</section>
<!-- contactus section start -->
