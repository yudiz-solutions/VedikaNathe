<?php get_header();

// section class="afternav-section"
$after_nav_section = get_field('after_nav_section');
// content-box section
$content_box_section = get_field('content_box_section');
$content_box_section_repeater = $content_box_section['content_box_section_repeater'];
// brainstorm section
$brainstorm_section = get_field('brainstorm_section');
$gallery_section_3 = $brainstorm_section['gallery_section_3'];
// last section
$last_section = get_field('last_section');
// growfast
$grow_fast = get_field('grow_fast');
// find-similar
$find_similar = get_field('find_similar');


?>

<!-- After nav section -->
<section class="afternav-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>
                    <?php echo $after_nav_section['heading'] ?>
                </h1>
                <p>
                    <?php echo $after_nav_section['paragraph'] ?>
                </p>
                <a href="#" class="btn">
                    <?php echo $after_nav_section['btn']['title'] ?>
                </a>
            </div>
        </div>
        <div class="watch-demo text-center">
            <figure>
                <img src="<?php echo $after_nav_section['image_section_1']['url'] ?>" alt="watch demo">
            </figure>
            <a href="https://www.vecteezy.com/free-videos/nature" data-src="https://www.youtube.com/watch?v=BHACKCNDMW8"
                data-fancybox>
                <img src="<?php echo $after_nav_section['image_2_section_1']['url'] ?>" alt="icon">
                <?php echo $after_nav_section['video_name'] ?>
            </a>
        </div>
    </div>
</section>
<!-- After nav section ends-->
<!-- content-box section -->
<section class="content-box">
    <div class="container">
        <div class="innercontainer">
            <div class="row">
                <?php
                foreach ($content_box_section_repeater as $box_section) { ?>

                    <div class="col-md-6 col-sm-12 col-lg-3">
                        <div class="content-1">
                            <figure>
                                <img src="<?php echo $box_section['image_section_2']['url'] ?>" alt="image">
                            </figure>
                            <h3>
                                <?php echo $box_section['heading_section_2'] ?>
                            </h3>
                            <p>
                                <?php echo $box_section['paragraph_section_2'] ?>
                            </p>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</section>
<!-- content-box section ends-->
<!-- brainstorm section-->
<section class="brainstorm">
    <div class="brainstorm-wrapper">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-6 col-xxl-6 brain-img">
                <figure>
                    <img src="<?php echo $brainstorm_section['image_1_section_3']['url'] ?>" alt="brainstorm-img">
                </figure>
            </div>
            <div class="col-md-12 col-lg-12 col-xl-6 col-xxl-6 brain-text">
                <div class="brainright">
                    <h4>
                        <?php echo $brainstorm_section['heading_1'] ?>
                    </h4>
                    <h2>
                        <?php echo $brainstorm_section['heading_2'] ?>
                    </h2>
                    <p>
                        <?php echo $brainstorm_section['paragraph_3'] ?>
                    </p>
                    <a href="#" class="btn">
                        <?php echo $brainstorm_section['button_1']['title'] ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row bottompart">
        <div class="col-md-12">
            <div class="row">

                <?php
                $counter = 0;
                foreach ($gallery_section_3 as $gallery) {
                    $image = ['url'];
                    // echo '<pre>';
                    // print_r($gallery);
                    // echo '</pre>';
                
                    if ($counter % 2 == 0) { ?>
                        <div class="col-md-4 col-sm-12 col-12">
                            <img src="<?php echo $gallery['url'] ?>" alt="brainstorm-img">
                        </div>
                    <?php } else { ?>

                        <div class="col-md-2 col-sm-12 col-12">
                            <img src="<?php echo $gallery['url'] ?>" alt="brainstorm-img">
                        </div>
                    <?php }
                    $counter++ ?>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<!-- brainstorm section ends-->
<!-- find similar section starts-->
<?php
$args = array(
    'post_type' => 'story',
);
$story_data = new wp_Query($args);

// echo '<pre>';
// print_r($story_data);
// die;

?>

<section class="find-similar">
    <div class="container">
        <div class="find-top text-center common-padding">
            <h2>
                <?php echo $find_similar['heading'] ?>
            </h2>
            <p>
                <?php echo $find_similar['paragraph'] ?>
            </p>
        </div>
        <div class="find-similar-parent single-item">
            <?php if ($story_data->have_posts()): ?>
                <?php while ($story_data->have_posts()):
                    $story_data->the_post(); ?>

                    <div class="inner-find-similar ">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12 col-xl-6">
                                <figure>
                                    <?php the_post_thumbnail() ?>

                                </figure>
                            </div>
                            <div class="col-12 col-md-12 col-lg-12 col-xl-6 d-flex">
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
                                       <?php the_excerpt(); ?>
                                    </p>
                                    <a href="<?php the_permalink();?>">Read Full Story</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>


            <!-- <div class="inner-find-similar">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12 col-xl-6">
                        <figure>
                            <img src="<?php //echo get_template_directory_uri() ?>/images/slider-1.svg"
                                alt="slider-image">
                        </figure>
                    </div>
                    <div class="col-12 col-md-12 col-lg-12 col-xl-6 d-flex">
                        <div class="text-content">
                            <h4>Artist & Investor</h4>
                            <p>
                                Enim sagittis, sit porttitor morbi lobortis amet, libero adipiscing auctor. Malesuada
                                tristique libero, id netus tincidunt. Egestas ac arcu amet nisl quis est ...
                            </p>
                            <a href="#">Read Full Story</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="inner-find-similar">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12 col-xl-6">
                        <figure>
                            <img src="<?php //echo get_template_directory_uri() ?>/images/slider-1.svg"
                                alt="slider-image">
                        </figure>
                    </div>
                    <div class="col-12 col-md-12 col-lg-12 col-xl-6 d-flex">
                        <div class="text-content">
                            <h4>Artist & Investor</h4>
                            <p>
                                Enim sagittis, sit porttitor morbi lobortis amet, libero adipiscing auctor. Malesuada
                                tristique libero, id netus tincidunt. Egestas ac arcu amet nisl quis est ...
                            </p>
                            <a href="#">Read Full Story</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="inner-find-similar">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12 col-xl-6">
                        <figure>
                            <img src="<?php //echo get_template_directory_uri() ?>/images/slider-1.svg"
                                alt="slider-image">
                        </figure>
                    </div>
                    <div class="col-12 col-md-12 col-lg-12 col-xl-6 d-flex">
                        <div class="text-content">
                            <h4>Artist & Investor</h4>
                            <p>
                                Enim sagittis, sit porttitor morbi lobortis amet, libero adipiscing auctor. Malesuada
                                tristique libero, id netus tincidunt. Egestas ac arcu amet nisl quis est ...
                            </p>
                            <a href="#">Read Full Story</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="inner-find-similar"> -->
            <!-- <div class="row">
                    <div class="col-12 col-md-12 col-lg-12 col-xl-6">
                        <figure>
                            <img src="<?php //echo get_template_directory_uri() ?>/images/slider-1.svg"
                                alt="slider-image">
                        </figure>
                    </div>
                    <div class="col-12 col-md-12 col-lg-12 col-xl-6 d-flex">
                        <div class="text-content">
                            <h4>Artist & Investor</h4>
                            <p>
                                Enim sagittis, sit porttitor morbi lobortis amet, libero adipiscing
                                auctor. Malesuada
                                tristique libero, id netus tincidunt. Egestas ac arcu amet nisl quis
                                est ...
                            </p>
                            <a href="#">Read Full Story</a>
                        </div>
                    </div>
                </div> -->
        </div>
    </div>
    </div>
</section>
<!-- find similar section ends-->
<!-- get your business section -->
<section class="growfast">
    <div class="container">
        <div class="grow-wrapper">

            <div class="grow-top text-center common-padding">
                <h2>
                    <?php echo $grow_fast['heading_1'] ?>
                </h2>
                <p>
                    <?php echo $grow_fast['paragraph_1'] ?>
                </p>
                <a href="#" class="btn">
                    <?php echo $last_section['button']['title'] ?>
                </a>
            </div>
            <div class="row right-grow-side">
                <div class="col-md-12 col-lg-12 col-12 col-xl-6 only-for-position">
                    <img src="<?php echo $grow_fast['image_1']['url'] ?>" alt="desktop">
                    <img src="<?php echo $grow_fast['image_2']['url'] ?>" alt="image">
                    <img src="<?php echo $grow_fast['image_3']['url'] ?>" alt="mobile-image"
                        class="onlyfor-smallscreen">
                    <img src="<?php echo $grow_fast['image_4']['url'] ?>" alt="image">
                </div>
                <div class="col-md-12 col-lg-12 col-12 col-xl-6 align-self-center">
                    <h4>
                        <?php echo $grow_fast['heading_2'] ?>
                    </h4>
                    <h2>
                        <?php echo $grow_fast['heading_3'] ?>
                    </h2>
                    <p>
                        <?php echo $grow_fast['paragraph_2'] ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- get your business section ends-->
<!-- <section class="multi-images">
        <div class="container">
            <div class="inner-multi-images">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-12 col-xl-12 no-limits-parent">
                        <div class="row">
                            <div class="col-lg-12 multi-img-text-content">
                                <h4>NO LIMITS</h4>
                                <h2>Unlimited ideas for your projects</h2>
                                <p>Scelerisque auctor dolor diam tortor, fames faucibus non interdum nunc. Ultrices nibh sapien elit gravida ac, rutrum molestie adipiscing lacinia.</p>
                                <a href="#" class="btn">Start For First</a>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <img src="./images/multiple-images.svg" alt="multiple images" class="hidden">
    </section> -->
<!-- Above code is main -->

<!-- Demo code here starts -->
<!-- <section class="multi-images-2">
        <div class="container">
            <div class="inner-multi-images-2">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xl-6 multiimgs-left-content">
                        
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-9">
                                <div class="multi-img-text-content-2">
                                    <h4>NO LIMITS</h4>
                                    <h2>Unlimited ideas for your projects</h2>
                                    <p>Scelerisque auctor dolor diam tortor, fames faucibus non interdum nunc. Ultrices nibh sapien elit gravida ac, rutrum molestie adipiscing lacinia.</p>
                                    <a href="#" class="btn">Start For Free</a>
                                </div>
                            </div>
                            <div class="col-3 col-md-3 col-lg-3">
                                <div><img src="./images/picture-1.svg" alt="image"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div><img src="./images/picture-3.svg" alt=""></div>
                            </div>
                            <div class="col-9">
                                <div><img src="./images/picture-2.svg" alt="image"></div>

                            </div>
                        </div>
                    
                    </div>
                    <div class="col-md-12 col-lg-12 col-xl-6 multiimgs-right-content">
                        <div class="row">
                            <div class="col-3">
                                <div>
                                    <img src="./images/right-side-img-1.svg" alt="image">
                                </div>
                            </div>
                            <div class="col-9">
                                <div>
                                    <img src="./images/right-side-img-2.svg" alt="image">
                                </div>
                            </div>
                            <div class="col-12">
                                <div>
                                    <img src="./images/right-side-img-3.svg" alt="image">
                                </div>
                            </div>
                            <div class="col-3">
                                <div>
                                    <img src="./images/right-side-img-4.svg" alt="image">
                                </div>
                            </div>
                            <div class="col-9">
                                <div>
                                    <img src="./images/right-side-img-5.svg" alt="image">
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

<!-- Demo code here ends -->
<!-- Get your business ends -->
<!-- Last section -->
<section class="brainstorm-now common-padding">
    <div class="container">
        <div class="row">
            <div class="co-md-12 text-center">
                <h4>
                    <?php echo $last_section['heading_1'] ?>
                </h4>
                <h2>
                    <?php echo $last_section['heading_2'] ?>
                </h2>
                <p>
                    <?php echo $last_section['paragraph'] ?>
                </p>
                <a href="#" class="btn">
                    <?php echo $last_section['button']['title'] ?>
                </a>

            </div>
        </div>

    </div>
</section>
<?php get_footer(); ?>