<?php

// Load HTML5 Blank scripts (header.php)
function siglo21_styles_scripts()
{
    // CSS

    wp_register_style('lato-font', 'https://fonts.googleapis.com/css?family=Lato:300,400,700', [], '1.0.1', 'all');
    wp_register_style('oswald-font', 'https://fonts.googleapis.com/css?family=Oswald:300,400,700', [], '1.0.1', 'all');
    wp_register_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', [], '1.0.0', 'all');
    wp_register_style('font-awesome', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', [], '1.0.0', 'all');
    wp_register_style('jquery.vegas-css', get_template_directory_uri() . '/css/jquery.vegas.css', [], '1.0.0', 'all');
    wp_register_style('animations', get_template_directory_uri() . '/css/animations.css', [], '1.0.0', 'all');
    wp_register_style('bigvideo', get_template_directory_uri() . '/css/bigvideo.css', [], '1.0.0', 'all');
    wp_register_style('jquery.mCustomScrollbar-css', get_template_directory_uri() . '/css/jquery.mCustomScrollbar.css', [], '1.0.0', 'all');
    wp_register_style('swiper-css', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css', [], '4.5.0', 'all');
    wp_register_style('style', get_stylesheet_uri(), [], '2.0.9', 'all');
  
    wp_enqueue_style('lato-font');
    wp_enqueue_style('oswald-font');
    wp_enqueue_style('bootstrap-css');
    wp_enqueue_style('font-awesome');
    wp_enqueue_style('jquery.vegas-css');
    wp_enqueue_style('animations');
    wp_enqueue_style('bigvideo');
    wp_enqueue_style('jquery.mCustomScrollbar-css');
    wp_enqueue_style('swiper-css');
    wp_enqueue_style('style');

    // JS

    wp_register_script('jpreloader', get_template_directory_uri() . '/js/jpreloader.min.js', [], '1.0.0', true);
    wp_register_script('jquery.mousewheel', get_template_directory_uri() . '/js/jquery.mousewheel.min.js', ['jquery'], '1.0.0', true);
    wp_register_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', [], '1.0.0', true);
    wp_register_script('jquery.easing-1.3.pack', get_template_directory_uri() . '/js/jquery.easing-1.3.pack.js', ['jquery'], '1.0.0', true);
    wp_register_script('jquery.stellar', get_template_directory_uri() . '/js/jquery.stellar.min.js', ['jquery'], '1.0.0', true);
    // wp_register_script('owl.carousel-js', get_template_directory_uri() . '/js/owl.carousel.min.js', [], '1.0.0', true);
    // wp_register_script('jquery.carouFredSel-6.2.1-packed', get_template_directory_uri() . '/js/jquery.carouFredSel-6.2.1-packed.js', ['jquery'], '1.0.0', true);
    wp_register_script('tweetie', get_template_directory_uri() . '/js/tweetie.min.js', [], '1.0.0', true);
    wp_register_script('jquery.sticky', get_template_directory_uri() . '/js/jquery.sticky.js', ['jquery'], '1.0.0', true);
    wp_register_script('jquery.jplayer', get_template_directory_uri() . '/js/jPlayer/jquery.jplayer.min.js', ['jquery'], '1.0.0', true);
    wp_register_script('jplayer.playlist', get_template_directory_uri() . '/js/jPlayer/add-on/jplayer.playlist.min.js', [], '1.0.0', true);
    wp_register_script('jquery.vegas', get_template_directory_uri() . '/js/jquery.vegas.min.js', ['jquery'], '1.0.0', true);
    wp_register_script('css3-animate-it', get_template_directory_uri() . '/js/css3-animate-it.js', [], '1.0.0', true);
    // wp_register_script('jquery.fractionslider', get_template_directory_uri() . '/js/jquery.fractionslider.min.js', ['jquery'], '1.0.0', true);
    wp_register_script('jquery.mCustomScrollbar', get_template_directory_uri() . '/js/jquery.mCustomScrollbar.min.js', ['jquery'], '1.0.0', true);
    wp_register_script('jquery.waitforimages.js', get_template_directory_uri() . '/js/jquery.waitforimages.js', ['jquery'], '1.0.0', true);
    wp_register_script('video-js', get_template_directory_uri() . '/js/video.js', [], '1.0.0', true);
    wp_register_script('bigvideo-js', get_template_directory_uri() . '/js/bigvideo.js', [], '1.0.0', true);
    wp_register_script('swiper-js', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js', [], '4.5.0', true);
    wp_register_script('swiper-js-init', get_template_directory_uri() . '/js/swiper-init.js', [], '1.0.1', true);
    wp_register_script('main-js', get_template_directory_uri() . '/js/main.js', [], '1.1.7', true);
    wp_register_script('header', get_template_directory_uri() . '/js/app.js', [], '1.2.0', true);
    wp_register_script('twitch-sdk', 'https://player.twitch.tv/js/embed/v1.js', [], '1.0.0', true);
    wp_register_script('twitch-player-init', get_template_directory_uri() . '/js/twitch-player-init.js', ['twitch-sdk'], '1.0.0', true);

    wp_enqueue_script('jpreloader');
    wp_enqueue_script('jquery.mousewheel');
    wp_enqueue_script('bootstrap-js');
    wp_enqueue_script('jquery.easing-1.3.pack');
    wp_enqueue_script('jquery.stellar');
    // wp_enqueue_script('owl.carousel-js');
    // wp_enqueue_script('jquery.carouFredSel-6.2.1-packed');
    wp_enqueue_script('tweetie');
    wp_enqueue_script('jquery.sticky');
    wp_enqueue_script('jquery.jplayer');
    wp_enqueue_script('jplayer.playlist');
    wp_enqueue_script('jquery.vegas');
    wp_enqueue_script('css3-animate-it');
    // wp_enqueue_script('jquery.fractionslider');
    wp_enqueue_script('jquery.mCustomScrollbar');
    wp_enqueue_script('jquery.waitforimages.js');
    wp_enqueue_script('video-js');
    wp_enqueue_script('bigvideo-js');
    wp_enqueue_script('swiper-js');
    wp_enqueue_script('swiper-js-init');
    wp_enqueue_script('main-js');
    wp_enqueue_script('header');
    wp_enqueue_script('twitch-sdk');
    wp_enqueue_script('twitch-player-init');
}

// Sobrescribir jquery de WP por el que utiliza el theme 
function modify_jquery() {
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', get_template_directory_uri() . '/js/jquery-1.11.0.min.js', [], '1.0.0', false);
        wp_enqueue_script('jquery');
    }
}
add_action('init', 'modify_jquery');