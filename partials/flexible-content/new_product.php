<?php

$args = [
    'fields' => 'ids',
    'post_type' => 'product',
    'status' => 'publish',
    'posts_per_page' => get_sub_field('number'),
    'post__in' => wc_get_featured_product_ids()
];

$new_products = get_posts($args);
?>


<!-- New Arrivals Men
============================================= -->
<div class="container clearfix">

    <div class="fancy-title title-border topmargin-sm mb-4 title-center">
        <h4><?php the_sub_field('title'); ?></h4>
    </div>

    <div class="row grid-6">

        <!-- Shop Item 1
        ============================================= -->
        <?php
        foreach ($new_products

                 as $product_id):
            ?>
            <div class="col-lg-2 col-md-3 col-6 px-2">
                <?php get_single_product_html($product_id); ?>
            </div>
        <?php endforeach; ?>
    </div>

</div>
