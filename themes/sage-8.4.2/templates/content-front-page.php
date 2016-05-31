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
<section class="work">
    <h3><?php the_field("work_h3"); ?></h3>
    <div class="row text-center">
        <?php
        $fields = CFS()->get( 'work' );
        foreach ( $fields as $field ) {?>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <?php
                $values = CFS()->get( 'work_url' );
                foreach ( $values as $post_id ) {
                    $the_post = get_post( $post_id );
                    var_dump($values);
                    echo $the_post->post_title;
                } ?>
                <a href=""><img src="<?php echo $field['work_image']; ?>"></a>
                <p><?php echo $field['work_title']; ?></p>
            </div>
        <?php } ?>
    </div>
    <div class="row text-center">
        <button>View More</button>
    </div>
</section>

<section>
    <h3><?php the_field("contact_h3"); ?></h3>
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <?php the_field("contact_summary"); ?>
        </div>
    </div>
</section>