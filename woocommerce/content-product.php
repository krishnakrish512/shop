<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}
?>
<?php
if (is_shop() || is_archive()):
    ?>
    <div class="product col-md-4 col-sm-6 sf-dress"<?php wc_product_class('', $product); ?>>
<?php endif; ?>
    <div class="grid-inner">
        <?php
        /**
         * Hook: woocommerce_before_shop_loop_item.
         *
         * @hooked woocommerce_template_loop_product_link_open - 10
         */
        do_action('woocommerce_before_shop_loop_item'); ?>
        <div class="product-image">
            <?php $image = wp_get_attachment_image_url($product->get_image_id(), 'full'); ?>
            <a href="<?= $product->get_permalink() ?>"><img src="<?= $image ?>" alt="Slim Fit Chinos"></a>
            <a href="<?= $product->get_permalink() ?>"><img src="<?= $image ?>" alt="Slim Fit Chinos"></a>
            <?php
            /**
             * Hook: woocommerce_before_shop_loop_item_title.
             *
             * @hooked woocommerce_show_product_loop_sale_flash - 10
             * @hooked woocommerce_template_loop_product_thumbnail - 10
             */
            //                do_action('woocommerce_before_shop_loop_item_title');
            ?>
            <?php woocommerce_show_product_loop_sale_flash() ?>
            <div class="bg-overlay">
                <div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn"
                     data-hover-speed="400">
                    <a href="<?= $product->add_to_cart_url() ?>" class="btn btn-dark mr-2"><i
                                class="icon-shopping-cart"></i></a>
                    <a href="javascript:void(0)" class="btn btn-dark quick-view" data-toggle="modal"
                       data-target="#b-qucik_view" data-product-id="<?= $product->get_id() ?>"><i
                                class="icon-line-expand"></i></a>
                                <a href="<?= $product->get_permalink() ?>" class="stretched-link"></a>
                </div>
                <div class="bg-overlay-bg bg-transparent"></div>
            </div>
        </div>
        <div class="product-desc">
            <div class="product-title">
                <a href="<?= $product->get_permalink() ?>">
                    <?php
                    /**
                     * Hook: woocommerce_shop_loop_item_title.
                     *
                     * @hooked woocommerce_template_loop_product_title - 10
                     */
                    do_action('woocommerce_shop_loop_item_title');
                    ?>
                </a>
            </div>
            <div class="product-price">
                <?php
                /**
                 * Hook: woocommerce_after_shop_loop_item_title.
                 *
                 * @hooked woocommerce_template_loop_rating - 5
                 * @hooked woocommerce_template_loop_price - 10
                 */
                do_action('woocommerce_after_shop_loop_item_title');
                ?>
            </div>
        </div>
        <?php
        /**
         * Hook: woocommerce_after_shop_loop_item.
         *
         * @hooked woocommerce_template_loop_product_link_close - 5
         * @hooked woocommerce_template_loop_add_to_cart - 10
         */
        //    do_action('woocommerce_after_shop_loop_item');
        //
        ?>
    </div>
<?php
if (is_shop() || is_archive()):
    ?>
    </div>
<?php
endif;
