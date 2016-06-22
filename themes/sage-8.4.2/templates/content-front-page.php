<!--Hello-->
<section class="container-fluid" id="intro-about">
    <div class="container">
        <h3 class="text-center"><?php the_field("about_h3"); ?></h3>
        <span class="divider"></span>
        <img src="<?php the_field("about_picture"); ?>" class="prof-pic">
        <p><?php the_field("about_summary"); ?></p>
    </div>
</section>

<!--Skills-->
<section class="container-fluid section-background" style="
<?php if (get_field('skills_background')) { ?>
    background-image: url(<?php the_field('skills_background')?>);
<?php } else { ?>
    background: <?php the_field('skills_background_color');?>
<?php } ?>
">
    <div class="container">
        <h3 class="text-center"><?php the_field("skills_h3"); ?></h3>
        <span class="divider"></span>
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
<?php get_template_part('templates/section-work'); ?>


<!--Contact-->
<section class="container-fluid section-background contact" style="background-image: url(<?php the_field('contact_background'); ?>)">
    <div class="container">
        <h3 class="text-center"><?php the_field("contact_h3"); ?></h3>
        <span class="divider"></span>
        <div class="row">
            <div class="col-xs-12">
                <p><?php the_field("contact_summary"); ?></p>
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>