<?php

function get_product_quick_view_html($product_id)
{
    $product = wc_get_product($product_id);
//    var_dump($product);
    $parent_product = '';
    if ($product->get_parent_id()) {
        $parent_product = wc_get_product($product->get_parent_id());
    }
//    var_dump($parent_product);

    ?>
    <div class="single-product shop-quick-view-ajax">
<!--         <div class="ajax-modal-title">
            <h2><?= $product->get_name() ?></h2>
        </div> -->
        <div class="product modal-padding">
            <div class="row col-mb-50">
                <div class="col-md-6">
                    <div class="product-image">
                        <div class="fslider" data-pagi="false">
                            <div class="flexslider">
                                <ul class="slides">
                                    <?php
                                    $image_id = $product->get_image_id();
                                    //                                    var_dump($image_ids);
                                    //                                    exit();
//                                     if (empty($image_ids)) {
//                                         $image_ids = [$product->get_image_id()];

//                                     } else {
//                                         array_unshift($image_ids, $product->get_image_id());
//                                     }
                                    if ($image_id):
//                                         foreach ($image_ids as $image_id):
                                            $image = wp_get_attachment_image_url($image_id, 'full');
//                                        var_dump($image);
                                            ?>
                                            <li class="slide">
                                                <a href="<?= $product->get_permalink() ?>"
                                                   title="Pink Printed Dress"><img
                                                            src="<?= $image ?>"
                                                            alt="Pink Printed Dress"></a>
                                            </li>
                                        <?php
//                                         endforeach;
                                    endif;
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 product-desc">
                    <div class="product-price">
						<h3><?= $product->get_name() ?></h3>
                        <ins class="font-weight-semibold" style="font-size:25px;"><?= $product->get_price_html() ?></ins>
                    </div>
                    <div class="clear"></div>
                    <div class="line"></div>

                    <!-- Product Single - Quantity & Cart Button
                    ============================================= -->
                    <!--                    <form class="cart mb-0" method="post" enctype='multipart/form-data'>-->
                    <div class="quantity clearfix">
                        <input type="button" value="-" class="minus">
                        <input type="text" step="1" min="<?= $product->get_min_purchase_quantity() ?>"
                               max="<?= ($product->get_max_purchase_quantity() != -1) ? $product->get_max_purchase_quantity() : '' ?>"
                               name="quantity" value="1" title="Qty" class="qty"
                               size="4">
                        <input type="button" value="+" class="plus">
                    </div>
                    <button type="submit" class="add-to-cart button m-0"
                            data-product_id="<?= ($parent_product) ? $parent_product->get_id() : $product->get_id() ?>"
                            data-product-type="<?= $product->get_type() ?>">Add to cart
                    </button>
                    <!--                    </form>-->
                    <!-- Product Single - Quantity & Cart Button End -->

                    <div class="clear"></div>
                    <div class="line"></div>
                    <p><?php echo $product->get_short_description(); ?></p>
                    <div class="card product-meta mb-0">
                        <div class="card-body">
                            <span itemprop="productID" class="sku_wrapper">SKU: <span
                                        class="sku"><?= $product->get_sku() ?></span></span>
                            <span class="posted_in">Category:
                            <?php
                            $categories = wp_get_post_terms(($parent_product) ? $parent_product->get_id() : $product->get_id(), 'product_cat');

                            foreach ($categories as $category):
                                ?>
                                <a href="<?= get_category_link($category->term_id) ?>"><?= $category->name ?></a>
                            <?php
                            endforeach;
                            ?>
                            </span>
                        </div>
                    </div>
                    <div class="si-share border-0 d-flex  align-items-center mt-4">
                        <?php ecommerce_product_sharing($product->get_id()); ?>
                    </div><!-- Product Single - Share End -->

                </div>
            </div>
        </div>
    </div>
    <?php
}

function get_single_product_html($product_id)
{
    $product = wc_get_product($product_id);
    ?>
    <div class="product">
        <div class="product-image">
            <?php
            $image = wp_get_attachment_image_url($product->get_image_id(), 'full'); ?>
            <img src="<?= $image ?>" alt="Image 10">
            <div class="bg-overlay">
                <div class="bg-overlay-content align-items-end justify-content-between"
                     data-hover-animate="fadeIn" data-hover-speed="400">
                    <a href="<?= $product->add_to_cart_url() ?>" class="btn btn-dark mr-2"
                       data-product_id="<?= $product->get_id() ?>">
                        <i class="icon-shopping-cart"></i></a>
                    <a href="javascript:void(0)" class="btn btn-dark quick-view"
                       data-toggle="modal"
                       data-target="#b-qucik_view"
                       data-lightbox=" ajax" data-product-id="<?= $product->get_id() ?>"><i
                                class="icon-line-expand"></i></a>
                                <a href="<?= $product->get_permalink() ?>" class="stretched-link"></a>
                </div>
                <div class="bg-overlay-bg bg-transparent"></div>
            </div>
        </div>
        <div class="product-desc">
            <div class="product-title mb-1"><h3><a
                            href="<?= $product->get_permalink() ?>"><?= $product->get_name() ?></a></h3></div>
            <div class="product-price font-primary">
                <ins><?= $product->get_price_html() ?></ins>
            </div>
        </div>
    </div>
    <?php
}