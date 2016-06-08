<?php use Roots\Sage\Titles; ?>

<?php if (is_front_page()) { ?>
  <div class="text-center container-fluid splash-background" style="background-image: url(<?php the_field('welcome_background'); ?>)" itemscope="">
    <div class="header-container">
      <h1><?php the_field('welcome_h1'); ?></h1>
      <h2><?php the_field('welcome_subtitle'); ?></h2>
      <?php get_template_part('templates/social'); ?>
      <span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
    </div>
  </div>

<?php } else { ?>
  <div class="page-header">
    <h1><?= Titles\title(); ?></h1>
  </div>
<?php } ?>