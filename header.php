<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="author" content="SemiColonWeb"/>

    <!-- Stylesheets
    ============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Montserrat:300,400,500,600,700|Merriweather:300,400,300i,400i&display=swap"
          rel="stylesheet" type="text/css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <!-- Document Title
    ============================================= -->
    <title>Shop Demo | Canvas</title>
    <?php wp_head(); ?>
</head>

<body class="stretched">
<!-- Top Bar
============================================= -->
<?php $contact = get_field('contact', 'option') ?>
<?php $social = get_field('social', 'option') ?>
<div id="top-bar" class="dark" style="background-color: #a3a5a7;">
    <div class="container">

        <div class="row justify-content-between align-items-center">

            <div class="col-12 col-lg-auto d-none">
                <p class="mb-0 d-flex justify-content-center justify-content-lg-start py-3 py-lg-0">
                    <strong><?= $contact['header_title']; ?></strong></p>
            </div>

            <div class="col-12 col-lg-auto d-lg-flex">

                <!-- Top Links
                ============================================= -->
                <div class="top-links d-none">
                    <ul class="top-links-container">
                        <li class="top-links-item"><a href="#">About</a></li>
                        <li class="top-links-item"><a href="#">FAQS</a></li>
                        <li class="top-links-item"><a href="#">Blogs</a></li>
                        <li class="top-links-item"><a href="#">EN</a>
                            <ul class="top-links-sub-menu">
                                <li class="top-links-item"><a href="#"><img src="images/icons/flags/french.png"
                                                                            alt="French"> FR</a></li>
                                <li class="top-links-item"><a href="#"><img src="images/icons/flags/italian.png"
                                                                            alt="Italian"> IT</a></li>
                                <li class="top-links-item"><a href="#"><img src="images/icons/flags/german.png"
                                                                            alt="German"> DE</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- .top-links end -->

                <!-- Top Social
                ============================================= -->

                <ul id="top-social">
                    <li><a href="<?= $social['facebook_url'] ?>" class="si-facebook"><span class="ts-icon"><i
                                        class="icon-facebook"></i></span><span class="ts-text">Facebook</span></a></li>
                    <li><a href="<?= $social['instagram_url'] ?>" class="si-instagram"><span class="ts-icon"><i
                                        class="icon-instagram2"></i></span><span class="ts-text">Instagram</span></a>
                    </li>
                    <li><a href="tel:+977 9841234567" class="si-call"><span class="ts-icon"><i
                                        class="icon-call"></i></span><span
                                    class="ts-text"><?= $contact['phone_number'] ?></span></a></li>
                    <li><a href="info@kathmanduhandmade.com" class="si-email3"><span class="ts-icon"><i
                                        class="icon-envelope-alt"></i></span><span
                                    class="ts-text"><?= $contact['email'] ?></span></a>
                    </li>
                </ul><!-- #top-social end -->

            </div>
        </div>

    </div>
</div>
<!-- Header
    ============================================= -->
<header id="header" class="full-header header-size-md">
    <div id="header-wrap">
        <div class="container">
            <div class="header-row justify-content-lg-between">
                <?php
                if (function_exists('the_custom_logo')) {
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo = wp_get_attachment_image_url($custom_logo_id, 'full');
//                            var_dump($logo);
//                            exit();
                } ?>

                <!-- Logo
                ============================================= -->
                <div id="logo" class="mr-lg-4">
                    <a href="<?= get_home_url(); ?>" class="standard-logo"><img src="<?= $logo ?>"
                                                                                alt="Canvas Logo"></a>
                    <a href="<?= get_home_url(); ?>" class="retina-logo"><img src="<?= $logo ?>"
                                                                              alt="Canvas Logo"></a>
                </div><!-- #logo end -->

                <div class="header-misc">
                    <!-- Top Search
                    ============================================= -->
                    <div id="top-account">
                        <?php
                        if (!is_user_logged_in()):
                            ?>
                            <a href="<?= get_permalink(get_option('woocommerce_myaccount_page_id')) ?>"><i
                                        class="icon-line2-user mr-1 position-relative" style="top: 1px;"></i><span
                                        class="d-none d-sm-inline-block font-primary font-weight-medium">Sign In</span></a>
                        <?php
                        endif;
                        if (is_user_logged_in()):
                            ?>
                            <a href="<?= get_permalink(get_option('woocommerce_myaccount_page_id')) ?>"><i
                                        class="icon-line2-user mr-1 position-relative" style="top: 1px;"></i><span
                                        class="d-none d-sm-inline-block font-primary font-weight-medium">Login</span></a>

                        <?php endif; ?>
                    </div><!-- #top-search end -->
                    <!-- Top Cart
                    ============================================= -->
                    <div id="top-cart" class="header-misc-icon d-none d-sm-block">
                        <a href="javascript:void(0);" id="top-cart-trigger"><i class="icon-line-bag"></i><span
                                    class="top-cart-number"><?= WC()->cart->get_cart_contents_count() ?></span></a>
                        <div class="top-cart-content">
                            <div class="top-cart-title">

                            </div>
                            <div class="top-cart-items">
                                <h4>Shopping Cart</h4>
                                <?php woocommerce_mini_cart(); ?>
                            </div>
                        </div>
                    </div><!-- #top-cart end -->

                    <!-- Top Search
                    ============================================= -->
                    <div id="top-search" class="header-misc-icon">
                        <a href="javascript:;" id="top-search-trigger"><i class="icon-line-search"></i><i
                                    class="icon-line-cross"></i></a>
                    </div><!-- #top-search end -->

                </div>

                <div id="primary-menu-trigger">
                    <svg class="svg-trigger" viewBox="0 0 100 100">
                        <path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path>
                        <path d="m 30,50 h 40"></path>
                        <path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path>
                    </svg>
                </div>

                <!-- Primary Navigation
                ============================================= -->

                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => 'nav',
                    'menu_class' => 'menu-container',
                    'container_class' => 'primary-menu',
                    'walker' => new Cooperative_Nav_Walker()
                )); ?>


                <form class="top-search-form" action="<?= get_home_url() ?>" method="get">
                    <input type="text" name="s" id="s" class="form-control" value=""
                           placeholder="Type &amp; Hit Enter.."
                           autocomplete="off">
                    <input type="hidden" name="post_type" value="product">
                </form>

            </div>
        </div>
    </div>
    <div class="header-wrap-clone"></div>
</header><!-- #header end -->

