<!--Who Am I-->
<section>
    <h3><?php the_field("about_h3"); ?></h3>
    <?php the_field("about_summary"); ?>
</section>

<!--What I Do-->
<section>
    <h3><?php the_field("skills_h3"); ?></h3>
    <?php the_field("skills_summary"); ?>
    <div class="row text-center">
        <?php
        $fields = CFS()->get( 'skills' );
        foreach ( $fields as $field ) {?>
        <div class="col-xs-12 col-sm-6 col-md-3">
            <?php
                echo $field['skill_image'];
                echo $field['skill_description'];
            ?>
        </div>
        <?php } ?>
    </div>
</section>

<!--My Work-->
<section>
    
</section>
<!--Link to Resume-->