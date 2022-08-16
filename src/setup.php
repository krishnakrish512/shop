<?php
function shop_setup()
{
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');

    add_theme_support('woocommerce');


    register_nav_menus([
        'primary' => 'Primary',
        'footer'=> 'Footer'
    ]);
    add_image_size('category-thumb', 350, 250, true);
    add_image_size('thumb-crazy', 375, 275, true);

}

add_action('after_setup_theme', 'shop_setup');

function shop_scripts()
{
    wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap.css');
    wp_enqueue_style('dark-style', get_template_directory_uri() . '/assets/css/dark.css');
    
    wp_enqueue_style('swiper-style', get_template_directory_uri() . '/assets/css/swiper.css');
    wp_enqueue_style('shop-style', get_template_directory_uri() . '/demos/shop/shop.css');
    wp_enqueue_style('fonts-style', get_template_directory_uri() . '/demos/shop/css/fonts.css');
    wp_enqueue_style('icons-style', get_template_directory_uri() . '/assets/css/font-icons.css');
    wp_enqueue_style('animate-style', get_template_directory_uri() . '/assets/css/animate.css');
    wp_enqueue_style('magnific-style', get_template_directory_uri() . '/assets/css/magnific-popup.css');
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css');
    wp_enqueue_style('custom', get_template_directory_uri() . '/assets/css/custom.css');

    wp_enqueue_script('jquery-script', get_template_directory_uri() . '/assets/js/jquery.js', [], '1.0', true);
    wp_enqueue_script('plugins-script', get_template_directory_uri() . '/assets/js/plugins.min.js', [], '1.0', true);
    wp_enqueue_script('functions-script', get_template_directory_uri() . '/assets/js/functions.js', [], '1.0', true);
    wp_enqueue_script('woocommerce-custom-script', get_template_directory_uri() . '/assets/js/woocommerce-custom.js', [], '1.0', true);

    wp_localize_script('woocommerce-custom-script', 'es',
        [
            'ajax_url' => admin_url('admin-ajax.php')
        ]);


}

add_action('wp_enqueue_scripts', 'shop_scripts');
