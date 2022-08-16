<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
?>

<!-- Content
  ============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="single-product">
                <div class="product">
                    <div class="row gutter-40">
                        <div class="col-md-5">
                            <!-- Product Single - Gallery
                            ============================================= -->
                            <div class="product-image">
                                <div class="fslider" data-pagi="false" data-arrows="false" data-thumbs="true">
                                    <div class="flexslider">
                                        <div class="slider-wrap" data-lightbox="gallery">
                                            <?php
                                            $image_ids = $product->get_gallery_image_ids();

                                            if (empty($image_ids)) {
                                                $image_ids = [$product->get_image_id()];

                                            } else {
                                                array_unshift($image_ids, $product->get_image_id());
                                            }

                                            foreach ($image_ids as $image_id):
                                                $image = wp_get_attachment_image_url($image_id, 'full');
//                                                $image = getResizedImage($image);
                                                ?>
                                            <div class="slide"
                                                data-thumb="<?= wp_get_attachment_image_url($image_id, 'full') ?>">
                                                <a href="<?= wp_get_attachment_image_url($image_id, 'full') ?>"
                                                    title="Pink Printed Dress - Front View"
                                                    data-lightbox="gallery-item"><img
                                                        src="<?= wp_get_attachment_image_url($image_id, 'full') ?>"
                                                        alt="Pink Printed Dress"></a>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <!--                                <div class="sale-flash badge badge-success p-2">-->
                                <?php //echo apply_filters('woocommerce_sale_flash', '<span class="onsale">' . esc_html__('Sale!', 'woocommerce') . '</span>', $post, $product); ?>
                                <!--</div>-->
                            </div><!-- Product Single - Gallery End -->
                        </div>
                        <div class="col-md-7 product-desc">
                            <h1><?php the_title(); ?></h1>
                            <div class="d-flex align-items-center justify-content-between">

                                <!-- Product Single - Price
                                ============================================= -->
                                <div class="product-price">
                                    <!--                                    <del>-->
                                    <?php //echo $product->get_price_html(); ?>
                                    <!--</del>-->
                                    <ins><?php echo $product->get_price_html(); ?></ins>
                                </div><!-- Product Single - Price End -->

                                <!-- Product Single - Rating End -->
                            </div>

                            <div class="line"></div>

                            <!-- Product Single - Quantity & Cart Button
                            ============================================= -->
                            <!--                                                        --><?php //woocommerce_template_single_add_to_cart(); ?>

                            <?php if ($product->is_in_stock()) : ?>
                            <form class="cart mb-0 " method="post" enctype='multipart/form-data'>
                                <div class="quantity clearfix">
                                    <input type="button" value="-" class="minus">
                                    <input type="number" step="1" min="<?= $product->get_min_purchase_quantity() ?>"
                                        max="<?= ($product->get_max_purchase_quantity() != -1) ? $product->get_max_purchase_quantity() : '' ?>"
                                        name="quantity" value="1" title="Qty" class="qty">
                                    <input type="button" value="+" class="plus">
                                </div>
                                <button type="submit" name="add-to-cart" class="single_add_to_cart_button button m-0"
                                    value="<?php echo esc_attr($product->get_id()); ?>">
                                    <?php echo esc_html($product->single_add_to_cart_text()); ?></button>
                            </form>
                            <!--                                Product Single - Quantity & Cart Button End-->
                            <?php endif; ?>
                            <div class="line"></div>
                            <!-- Product Single - Short Description
                            ============================================= -->
                            <p>
                                <!--                                --><?php //the_field('intro_text'); // WPCS: XSS ok.?>
                                <?php the_excerpt(); ?>
                            </p>
                            <!-- Product Single - Meta
                            ============================================= -->
                            <div class="card product-meta">
                                <div class="card-body">
                                    <span itemprop="productID" class="sku_wrapper">SKU: <span
                                            class="sku"><?php echo ($sku = $product->get_sku()) ? $sku : esc_html__('N/A', 'woocommerce'); ?></span></span>
                                    <span
                                        class="posted_in"><?php echo wc_get_product_category_list($product->get_id(), ', ', '<li class="posted_in">' . _n('Category:', 'Categories:', count($product->get_category_ids()), 'woocommerce') . ' ', '</li>'); ?></span>
                                    <span
                                        class="tagged_as"><?php echo wc_get_product_tag_list($product->get_id(), ', ', '<li class="tagged_as">' . _n('Tag:', 'Tags:', count($product->get_tag_ids()), 'woocommerce') . ' ', '</li>'); ?></span>
                                </div>
                            </div><!-- Product Single - Meta End -->

                            <!-- Product Single - Share
                            ============================================= -->
                            <div class="si-share border-0 d-flex  align-items-center mt-4">
                                <?php ecommerce_product_sharing($product->get_id()); ?>
                            </div><!-- Product Single - Share End -->

                        </div>
                        <div class="w-100"></div>
                        <?php $product_tabs = apply_filters('woocommerce_product_tabs', array());
                        if (isset($product_tabs['reviews'])) {
//                            var_dump($product_tabs);
                            unset($product_tabs['reviews']);
//                           var_dump($product_tabs);
                        }
                        ?>
                        <?php if (!empty($product_tabs)) : ?>
                        <div class="col-12 mt-5">
                            <div class="tabs clearfix mb-0" id="tab-1">

                                <ul class="tab-nav clearfix">
                                    <?php foreach ($product_tabs as $key => $product_tab) : ?>
                                    <li><a href="#tabs-<?php echo esc_attr($key); ?>"><i
                                                class="icon-align-justify2"></i><span class="d-none d-md-inline-block">
                                                <?php echo wp_kses_post(apply_filters('woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key)); ?></span></a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                                <div class="tab-container">
                                    <?php foreach ($product_tabs as $key => $product_tab) : ?>
                                    <div class="tab-content clearfix" id="tabs-<?php echo esc_attr($key); ?>">
                                        <p> <?php
                                                if (isset($product_tab['callback'])) {
                                                    call_user_func($product_tab['callback'], $key, $product_tab);
                                                }
                                                ?></p>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <div class="line"></div>
            <?php $related_products = wc_get_related_products(get_the_ID());
            ?>
            <?php if ($related_products) : ?>
            <div class="w-100">
                <h4>RELATED PRODUCTS</h4>
                <div class="owl-carousel product-carousel carousel-widget" data-margin="30" data-pagi="false"
                    data-autoplay="5000" data-items-xs="1" data-items-md="2" data-items-lg="3" data-items-xl="4">
                    <?php foreach ($related_products

                                       as $related_product) : ?>
                    <?php
                            $post_object = get_post($related_product);
                            setup_postdata($GLOBALS['post'] =& $post_object);
                            $wc_related_product = wc_get_product($related_product); ?>
                    <div class="oc-item">
                        <div class="product">
                            <div class="product-image">
                                <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('full'); ?>"
                                        alt="Checked Short Dress"></a>
                                <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('full'); ?>"
                                        alt="Checked Short Dress"></a>
                                <?php
                                        if (!$wc_related_product->is_in_stock()):
                                            ?>
                                <div class="sale-flash badge badge-danger p-2">Out of Stuck</div>
                                <?php
                                        elseif ($wc_related_product->is_on_sale()):
                                            ?>
                                <div class="sale-flash badge badge-success p-2">Sale!</div>
                                <?php
                                        endif;
                                        ?>
                                <div class="bg-overlay">
                                    <div class="bg-overlay-content align-items-end justify-content-between"
                                        data-hover-animate="fadeIn" data-hover-speed="400">
                                        <a href="<?= $wc_related_product->add_to_cart_url() ?>"
                                            class="btn btn-dark mr-2"
                                            data-product_id="<?= $wc_related_product->get_id() ?>">
                                            <i class="icon-shopping-cart"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-dark quick-view" data-toggle="modal"
                                            data-target="#b-qucik_view"
                                            data-product-id="<?= $wc_related_product->get_id() ?>"><i
                                                class="icon-line-expand"></i></a>
                                    </div>
                                    <div class="bg-overlay-bg bg-transparent"></div>
                                </div>
                            </div>
                            <div class="product-desc center">
                                <div class="product-title">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h3>
                                </div>
                                <div class="product-price">
                                    <ins><?php echo $wc_related_product->get_price_html(); ?></ins>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;
                        wp_reset_postdata(); ?>
                </div>
            </div>
            <?php endif;
            ?>
        </div>
    </div>
</section><!-- #content end -->