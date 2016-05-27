<?php use Roots\Sage\Titles; ?>

<?php if (is_front_page()) { ?>
    <h1><?php the_field('welcome_h1'); ?></h1>
    <h2><?php the_field('welcome_subtitle'); ?></h2>
<?php } else { ?>
  <div class="page-header">
    <h1><?= Titles\title(); ?></h1>
  </div>
<?php } ?>