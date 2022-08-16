<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
//do_action( 'woocommerce_before_main_content' );

?>
    <!-- Sidebar   ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="row gutter-40 col-mb-80">
                    <?php
                    /**
                     * Hook: woocommerce_sidebar.
                     *
                     * @hooked woocommerce_get_sidebar - 10
                     */
                    //                                                    do_action('woocommerce_sidebar');
                    ?>
                    <div class="sidebar col-lg-3">
                        <div class="sidebar-widgets-wrap">
                            <div class="widget widget-filter-links">
                                <h4>Select Category</h4>
                                <?php $orderby = 'name';
                                $order = 'asc';
                                $hide_empty = false;
                                $cat_args = array(
                                    'orderby' => $orderby,
                                    'order' => $order,
                                    'hide_empty' => $hide_empty,
                                );
                                $product_categories = get_terms('product_cat', $cat_args);
                                ?>
                                <ul class="custom-filter pl-2" data-container="#shop"
                                    data-active-class="active-filter">
                                    <?php foreach ($product_categories as $product_categorie): ?>
                                        <li><a href="<?php echo get_term_link($product_categorie); ?>"
                                               data-filter=".sf-dress"><?php echo $product_categorie->name; ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <?php woocommerce_catalog_ordering(); ?>
                        </div>
                    </div><!-- .sidebar end -->
                    <?php


                    /**
                     * Hook: woocommerce_before_shop_loop.
                     *
                     * @hooked woocommerce_output_all_notices - 10
                     * @hooked woocommerce_result_count - 20
                     * @hooked woocommerce_catalog_ordering - 30
                     */
                    ?>
                    <div class="postcontent col-lg-9 order-lg-last">
                        <?php
                        if (woocommerce_product_loop()) {
                            do_action('woocommerce_before_shop_loop'); ?>
                            <div id="shop" class="shop row grid-container gutter-20" data-layout="fitRows">
                                <?php
                                woocommerce_product_loop_start();
                                if (wc_get_loop_prop('total')) {
                                    while (have_posts()) {
                                        the_post();

                                        /**
                                         * Hook: woocommerce_shop_loop.
                                         */
                                        do_action('woocommerce_shop_loop');

                                        wc_get_template_part('content', 'product');
                                    }
                                }
                                woocommerce_product_loop_end(); ?>
                                <?php
                                /**
                                 * Hook: woocommerce_after_shop_loop.
                                 *
                                 * @hooked woocommerce_pagination - 10
                                 */
                                do_action('woocommerce_after_shop_loop');
                                ?>

                            </div>
                        <?php } else {
                            /**
                             * Hook: woocommerce_no_products_found.
                             *
                             * @hooked wc_no_products_found - 10
                             */
                            do_action('woocommerce_no_products_found');
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
//do_action('woocommerce_after_main_content');

get_footer('shop');
