<?php use Roots\Sage\Titles; ?>

<?php if (is_front_page()) { ?>
  <div class="text-center container-fluid splash-background" style="background-image: url(<?php the_field('welcome_background'); ?>)" itemscope itemtype="http://schema.org/Person">
    <div class="header-container">
      <h1 itemprop="name brand"><?php the_field('welcome_h1'); ?></h1>
      <h2 itemprop="jobTitle"><?php the_field('welcome_subtitle'); ?></h2>
      <?php get_template_part('templates/social'); ?>
      <a href="#intro-about"><span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></a>
    </div>
  </div>

<?php }
elseif (is_post_type_archive()) { ?>
  <div class="page-header">
    <h1><?php post_type_archive_title(); ?></h1>
  </div>
<?php } else { ?>
  <div class="page-header">
    <h1><?= Titles\title(); ?></h1>
  </div>
<?php } ?>