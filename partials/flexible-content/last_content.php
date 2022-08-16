<!-- Last Section
           ============================================= -->
<div class="section footer-stick bg-white m-0 py-3 border-bottom">
    <div class="container clearfix">

        <div class="row clearfix">
            <?php while (have_rows('content_repeater')):
                the_row()
                ?>
                <div class="col-lg-4 col-md-6">

                    <div class="shop-footer-features mb-3 mb-lg-3"><i class="<?php the_sub_field('icons'); ?>"></i><h5
                                class="inline-block mb-0 ml-2 font-weight-semibold"><a
                                    href="<?php the_sub_field('link'); ?>"><?php the_sub_field('title'); ?></a><span
                                    class="font-weight-normal text-muted"> <?php the_sub_field('heading'); ?></span></h5>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>
</div>
</section><!-- #content end -->
