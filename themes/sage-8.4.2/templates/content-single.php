<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header class="container-fluid text-center section-background" style="background-image: url(<?php the_field('work_background'); ?>)">
      <h1 class="entry-title"><?php the_title(); ?></h1>
<!--      --><?php //get_template_part('templates/entry-meta'); ?>
    </header>
    <div class="entry-content">
      <div class="container">
        <?php the_content(); ?>
      </div>
    </div>
<!--    <footer>-->
<!--      --><?php //wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
<!--    </footer>-->
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>