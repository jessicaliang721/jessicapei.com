<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header class="single-post container-fluid text-center section-background" style="<?php if(get_field('work_background')) { ?>background-image: url(<?php the_field('work_background'); ?>)<?php } else { ?>background: #d6e1e4;<?php } ?>">
      <h1 class="entry-title"><?php the_title(); ?></h1>
<!--      --><?php //get_template_part('templates/entry-meta'); ?>
    </header>
    <div class="entry-content">
      <div class="container">
        <?php if (has_category()) { echo "Category: "; get_the_category(); }?>
        <?php the_content(); ?>
      </div>
    </div>
    <footer class="text-center">
      <div class="container">
        <div class="row page-links">
          <span class="next-post">
            <?php next_post_link('&laquo; %link'); ?>
          </span>
          <span class="prev-post">
            <?php previous_post_link('%link &raquo;');?>
          </span>
        </div>
        <div class="row">
          <a href="<?php echo get_post_type_archive_link( 'work' ); ?>" class="btn btn-default">See all <?php echo get_post_type(); ?></a>
        </div>
      </div>
    </footer>
<!--    --><?php //comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>