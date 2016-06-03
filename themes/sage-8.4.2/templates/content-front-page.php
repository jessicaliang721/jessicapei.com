<!--Hello-->
<section class="container-fluid">
    <div class="container">
        <h3 class="text-center"><?php the_field("about_h3"); ?></h3>
        <img src="<?php the_field("about_picture"); ?>">
        <?php the_field("about_summary"); ?>
    </div>
</section>

<!--Skills-->
<section class="container-fluid section-background" style="background-image: url(<?php the_field('skills_background'); ?>)">
    <div class="container">
        <h3 class="text-center"><?php the_field("skills_h3"); ?></h3>
        <?php the_field("skills_summary"); ?>
        <div class="row text-center">
            <?php
            $fields = CFS()->get( 'skills' );
            foreach ( $fields as $field ) {?>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <?php echo $field['skill_percent']; ?>
                    <div>
                        <?php echo $field['skill_description']; ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<!--My Work-->
<section class="work container-fluid">
    <div class="container">
        <h3 class="text-center"><?php the_field("work_h3"); ?></h3>
        <?php
            $args = array(
                'post_type' => 'work',
                'posts_per_page' => 6
            );
            $loop = new WP_Query( $args );
            if ($loop->have_posts()) {
            $i = 0;
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
                <?php } ?>
        <?php endwhile;
            }
            wp_reset_query(); ?>
    </div>
    <div class="container">
        <div class="row text-center">
            <button>View More</button>
        </div>
    </div>
</section>

<!--Contact-->
<section class="container-fluid section-background contact" style="background-image: url(<?php the_field('contact_background'); ?>)">
    <div class="container">
        <h3 class="text-center"><?php the_field("contact_h3"); ?></h3>
        <div class="row">
            <div class="col-xs-12">
                <?php the_field("contact_summary"); ?>
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>