<!--Hello-->
<section class="container-fluid" id="intro-about" itemscope itemtype="http://schema.org/Person">
    <div class="container">
        <h3 class="text-center"><?php the_field("about_h3"); ?></h3>
        <span class="divider"></span>
        <img src="<?php the_field("about_picture"); ?>" itemprop="photo" class="prof-pic">
        <p itemprop="location alumniOf availability"><?php the_field("about_summary"); ?></p>
    </div>
</section>

<!--Skills-->
<section class="container-fluid section-background" itemscope itemtype="http://schema.org/Service" style="
<?php if (get_field('skills_background')) { ?>
    background-image: url(<?php the_field('skills_background')?>);
<?php } else { ?>
    background: <?php the_field('skills_background_color');?>
<?php } ?>
">
    <div class="container">
        <h3 class="text-center" itemprop="skills"><?php the_field("skills_h3"); ?></h3>
        <span class="divider"></span>
        <?php the_field("skills_summary"); ?>
        <div class="row text-center" itemprop="hasOfferCatalog" itemscope itemtype="http://schema.org/OfferCatalog">
            <?php
            $fields = CFS()->get( 'skills' );
            foreach ( $fields as $field ) {?>
                <div class="col-xs-6 col-sm-4 col-md-3 skill-icon" itemprop="itemOffered" itemscope itemtype="http://schema.org/Service">
                    <?php echo $field['skill_percent']; ?>
                    <div class="alt-font" itemprop="serviceType">
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