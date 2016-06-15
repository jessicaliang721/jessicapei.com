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
        if ($loop->have_posts()) {
            $i = 0;
            $count = 0;
            while ($loop->have_posts()) : $loop->the_post();
                if ($i % 2 == 0 && $i % 3 === 0) { ?>
                    <div class="row text-center">
                <?php } ?>
                <div class="col-xs-12 col-sm-6 col-md-4 single-tile">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium'); ?>
                        <div class="caption"><?php the_title(); ?></div>
                    </a>
                </div>
                <?php
                // increment the loop BEFORE we test the variable
                $i++;
                if ($i != 0 && $i % 2 == 0 && $i % 3 === 0) { ?>
                    </div>
                    <div class="clearfix"></div>
                <?php }
            $count++;
            endwhile;
            if (is_front_page() && $count < 6) { ?>
                    <div class="row text-center">
                        <button class="btn btn-default" type="button">View More</button>
                    </div>
            <?php }
        }
        wp_reset_query(); ?>
    </div>
</section>