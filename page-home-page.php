<?php

/**
 * Template Name: Home Page
 *
 * @package RBH WP
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
?>

<section class="container-fw home-hero">
    <div class="container">
        <div class="row">
            <div class="col-md-7 hero-content">
                <h1><?php echo wp_kses_post(get_field('hero_heading')); ?></h1>
                <h2 class="intro">
                    <?php echo wp_kses_post(get_field('hero_intro')); ?>
                </h2>
                <div class="button-box">
                    <?php
                    if (get_field('button_link') && get_field('button_text')) {
                        $button_link = esc_url(get_field('button_link'));
                        $button_text = esc_html(get_field('button_text'));
                        echo '<a href="' . $button_link . '" class="rbh-btn"><span>' . $button_text . '</span></a>';
                    }
                    ?>
                </div>
            </div>

            <div class="col-md-5 hero-image">
                <?php 
                // Get the file array from ACF
                $hero_video = get_field('hero_video'); 
                if ($hero_video) {
                    // Get the URL of the video from the array
                    $video_url = esc_url($hero_video['url']);
                    echo '<video class="hero-video" autoplay muted loop playsinline>
                            <source src="' . $video_url . '" type="video/mp4">
                            Your browser does not support the video tag.
                          </video>';
                } else {
                    echo '<p>Video not available.</p>'; // Optional message if the video is missing
                }
                ?>
            </div>
        </div><!-- .row -->
    </div>
</section>
<!-- About -->
<section id="about" class="container-fw home-about dark-bg">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10 align-center">
                <?php 
                $about_content = get_field('about'); 
                if( $about_content ):
                    echo wp_kses_post($about_content); 
                endif; 
                ?>
            </div>
        </div>
    </div>
</section>
<!-- Services -->
<section id="services" class="services">
    <?php get_template_part('template-parts/services'); ?>
</section>

<section class="container-fw gallery-bg">
    <?php while (have_posts()) : the_post();
        $images = get_field('hp_gallery');
        if ($images) : ?>
            <div class="owl-carousel hp-slider owl-theme hp-gallery-carousel">
                <?php foreach ($images as $image) : ?>
                    <div class="item">
                        <img src="<?php echo wp_get_attachment_image_url( $image['id'], 'hp-gallery-img' ); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    </div>
                <?php endforeach; ?>
            </div>
    <?php endif;
    endwhile; ?>
</section>
<section id="cta" class="contaner-fw cta map">
    <div class="container-fw">
        <?php get_template_part('template-parts/call-to-action'); ?>
    </div>
    <div class="container-fw">
        <h2 class="align-center text-center">Serivce Area</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d336024.22959043615!2d1.2686312347254036!3d52.58673247255744!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1725996292900!5m2!1sen!2sus" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    
</section>
<?php
get_footer();
