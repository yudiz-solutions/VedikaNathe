<?php
get_header();







// echo "jhhgghjhjkjkjkj";
while (have_posts()):
    the_post();
    ?>
    <section>
        <figure>
            <?php the_post_thumbnail() ?>

        </figure>

        <div class="text-content">
            <?php
            $story_cat = get_the_terms(get_the_ID(), 'story-category');

            foreach ($story_cat as $cat) {
                ?>
                <h4>
                    <?php echo $cat->name; ?>
                </h4>
            <?php } ?>
            <p>
                <?php the_content(); ?>
            </p>
           
        </div>
        
        <?php
endwhile;
get_footer();