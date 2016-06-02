<?php use Roots\Sage\Titles; ?>

<?php if (is_front_page()) { ?>
  <div class="text-center container-fluid splash-background" style="background-image: url(<?php the_field('welcome_background'); ?>)">
    <h1><?php the_field('welcome_h1'); ?></h1>
    <h2><?php the_field('welcome_subtitle'); ?></h2>
  </div>

<?php } else { ?>
  <div class="page-header">
    <h1><?= Titles\title(); ?></h1>
  </div>
<?php } ?>