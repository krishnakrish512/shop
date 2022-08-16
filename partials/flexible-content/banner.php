<!-- Slider
   ============================================= -->
<section id="slider" class="slider-element swiper_wrapper" data-autoplay="6000" data-speed="800" data-loop="true"
         data-grab="true" data-effect="fade" data-arrow="false" style="height: 600px;">
    <div class="swiper-container swiper-parent">
        <div class="swiper-wrapper">
            <?php while (have_rows('banner_repeater')):
                the_row()
                ?>
                <div class="swiper-slide dark">
                    <div class="container">
                        <div class="slider-caption slider-caption-center">
                            <div>
                                <div class="h5 mb-2 font-secondary"><?php the_sub_field('types'); ?></div>
                                <h2 class="bottommargin-sm text-white"><?php the_sub_field('title'); ?></h2>
                                <a href="<?php the_sub_field('link'); ?>"
                                   class="button bg-white text-dark button-light"><?php the_sub_field('shop'); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide-bg"
                         style="background-image: url('<?php the_sub_field('image_url'); ?>');"></div>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>

</section><!-- #Slider End -->
