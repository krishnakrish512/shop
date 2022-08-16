<?php

use function NextGenImage\getImageInWebp;
use function NextGenImage\resizeImage;

/**
 * Function to get resized image in webp and original format
 *
 * @param $url string
 * @param array $size =[with x height]
 *
 * @return array
 */
function getResizedImage($url, $size = array())
{
    $webpImage = getImageInWebp(ABSPATH . str_replace(site_url(), "", $url), $size);
    $fileType = wp_check_filetype($url);
    $image = resizeImage(ABSPATH . str_replace(site_url(), "", $url), $fileType['ext'], $size);

    return array(
        'webp' => $webpImage,
        'orig' => $image
    );
}

/**
 * for single product sharing in product
 */
function ecommerce_product_sharing($product_id)
{
    $product = wc_get_product($product_id);

    $facebook_url = "https://www.facebook.com/sharer.php?u=" . $product->get_permalink();
    $twitter_url = add_query_arg(
        [
            'text' => urlencode($product->get_title()),
            'url' => $product->get_permalink(),
            'hashtags' => 'shop'
        ],
        "https://www.twitter.com/intent/tweet?"
    );

    $mail_body = $product->get_short_description() . " For details, link here : " . $product->get_permalink();

    $gmail_url = add_query_arg(
        [
            'view' => 'cm',
            'fs' => 1,
            'to' => '',
            'su' => urlencode($product->get_title()),
            'body' => urlencode($mail_body),
            'bcc' => ''
        ],
        "https://mail.google.com/mail/"
    ) ?>
    <span>Share:</span>
    <div>
        <a href="<?= $facebook_url ?>" target="_blank" class="social-icon si-borderless si-facebook">
            <i class="icon-facebook"></i>
            <i class="icon-facebook"></i>
        </a>
        <a href="<?= $twitter_url ?>" target="_blank" class="social-icon si-borderless si-twitter">
            <i class="icon-twitter"></i>
            <i class="icon-twitter"></i>
        </a>
        <a href="<?= $gmail_url ?>" target="_blank" class="social-icon si-borderless si-email3">
            <i class="icon-email3"></i>
            <i class="icon-email3"></i>
        </a>
    </div>

<?php }

/**
 * function to display user user account link
 */
function ecommerce_user_account_link()
{
    if (!is_user_logged_in()):
        ?>
        <a href="<?= get_permalink(get_option('woocommerce_myaccount_page_id')) ?>" data-lightbox="inline"><i
                    class="icon-line2-user mr-1 position-relative" style="top: 1px;"></i><span
                    class="d-none d-sm-inline-block font-primary font-weight-medium">Login</span></a> or
        <a href="<?= get_permalink(get_option('woocommerce_myaccount_page_id')) ?>" data-lightbox="inline"><i
                    class="icon-line2-user mr-1 position-relative" style="top: 1px;"></i><span
                    class="d-none d-sm-inline-block font-primary font-weight-medium">Register</span></a>
    <?php
    endif;

    if (is_user_logged_in()):
        ?>
        <a href="<?= get_permalink(get_option('woocommerce_myaccount_page_id')) ?>"
           class="text-default">User Dashboard</a>
    <?php
    endif;
}