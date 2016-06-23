<section class="work container-fluid">
    <div class="container">
        <h3 class="text-center"><?php the_field("work_h3"); ?></h3>
        <span class="divider"></span>
        <?php
        $args = array(
            'post_type' => 'work',
            'posts_per_page' => 6
        );
        $loop = new WP_Query( $args );
        $count = 0;
        if ($loop->have_posts()) { ?>
        <div class="row text-center">
            <?php
            while ($loop->have_posts()) : $loop->the_post(); ?>
                <div class="col-xs-12 col-sm-6 col-md-4 single-tile">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium'); ?>
                        <div class="caption"><?php the_title(); ?></div>
                    </a>
                </div>

            <?php
            $count ++;
            endwhile; ?>
        </div>
        <div class="clearfix"></div>
            <?php
            if (is_front_page()) { ?>
                    <div class="row text-center">
                        <a href="<?php echo get_post_type_archive_link( 'work' ); ?>" class="btn btn-default">View All</a>
                    </div>
            <?php }
        }
        wp_reset_query(); ?>
    </div>
</section>