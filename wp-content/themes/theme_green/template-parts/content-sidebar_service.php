<?php
/**
 * Template part for displaying page content in Sidebar
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme_green
 */

?>

<?php 
$side_br_select = get_field('select_sidebar');

if(have_rows($side_br_select,'option')): ?>
<div class="services-right-sec">
  <?php while(have_rows($side_br_select,'option')): the_row(); ?>
  <div class="services-types-sec">
    <h6 class="font-weight-bold"><?php echo get_sub_field('title'); ?></h6>
    <ul>
      <?php while(have_rows('links','option')): the_row(); ?>
      <li>
        <a href="<?php echo get_sub_field('link'); ?>"><?php echo get_sub_field('text'); ?></a>
      </li>
      <?php endwhile; ?>
    </ul>
  </div>
  <?php endwhile; ?>  
</div>
<?php endif; ?>

<?php echo get_template_part( 'template-parts/content', 'sidebar_part_contact' ); ?>
