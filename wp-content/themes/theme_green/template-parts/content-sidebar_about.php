<?php
/**
 * Template part for displaying page content in Sidebar
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme_green
 */

?>

<?php if(get_field('our_customer_title','option')): ?>
<div class="right-sec">  
  <h5 class="text-red"><?php echo get_field('our_customer_title','option'); ?></h5>
  <div class="customer-review-section side-br">
    <div class="review-sec">
      <ul>
        <?php while(have_rows('customer_rating_sb','option')): the_row(); ?>
        <li class="d-flex justify-content-between align-items-center">
          <div>
            <img src="<?php echo get_sub_field('icon'); ?>" alt="icon"/>
          </div>
          <div>
            <img class="str-img" src="<?php echo get_template_directory_uri(); ?>/images/redstar<?php echo get_sub_field('rating'); ?>.png"/>
          </div>
        </li>
        <?php endwhile; ?>            
      </ul>
    </div>
  </div>
</div>
<?php endif; ?>

<?php echo get_template_part( 'template-parts/content', 'sidebar_part_contact' ); ?>