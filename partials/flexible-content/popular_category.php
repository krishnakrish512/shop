<!-- Content
    ============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <!-- Shop Categories
            ============================================= -->
            <div class="fancy-title title-border title-center mb-4">
                <h4><?php the_sub_field('heading'); ?></h4>
            </div>

            <div class="row shop-categories clearfix">
                <?php while (have_rows('catrgory_repeater')):
                    the_row();
                    ?>
                    <div class="col-lg-6">
                        <a href="<?php the_sub_field('link'); ?>"
                           style="background: url('<?php the_sub_field('image_url'); ?>') no-repeat right center; background-size: cover;">
                            <div class="vertical-middle dark center">
                                <div class="heading-block m-0 border-0">
                                    <h3 class="nott font-weight-semibold ls0 text-white"><?php the_sub_field('title'); ?></h3>
                                    <small class="button bg-white text-dark button-light button-mini">Shop Now</small>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="clear"></div>
