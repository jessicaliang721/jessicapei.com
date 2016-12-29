<section class="work container-fluid" itemscope itemtype="http://schema.org/WebSite">
    <div class="container">
        <h3 class="text-center"><?php the_field("work_h3"); ?></h3>
        <span class="divider"></span>
        <?php
        $count_posts = wp_count_posts( 'work' )->publish;
        if (is_front_page()) {
            $args = array(
                'post_type' => 'work',
                'posts_per_page' => 6,
            );
        } else {
            $args = array(
                'post_type' => 'work',
                'posts_per_page' => -1,
            );
        }
        
        $loop = new WP_Query( $args );

        //$count = 0;
        if ($loop->have_posts()) { ?>
        <div class="row text-center">
            <?php
            while ($loop->have_posts()) : $loop->the_post(); ?>
                <div class="col-xs-12 col-sm-6 col-md-4 single-tile">
                    <div class="block-container" itemprop="thumbnailUrl">
                        <?php the_post_thumbnail('medium'); ?>
                        <div class="overlay">
                            <div>
                                <a href="<?php the_permalink(); ?>" itemprop="url" class="caption">
                                   <?php the_title(); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            //$count ++;
            endwhile; ?>
        </div>
        <div class="clearfix"></div>
            <?php
            if (is_front_page() && $count_posts > 6) { ?>
                    <div class="row text-center">
                        <a href="<?php echo get_post_type_archive_link( 'work' ); ?>" class="btn btn-default margin-top">View All Work</a>
                    </div>
            <?php }
        }
        wp_reset_query(); ?>
    </div>
</section>