<!--<div class="container">-->

    <!-- Features
    ============================================= -->
    <div class="row   mt-5">
        <div class="col-lg-7 ">
            <div class="row mt-3 col-mb-50">
                <?php while (have_rows('feature_repeater')):
                    the_row()
                    ?>
                    <div class="col-sm-6">
                        <div class="feature-box fbox-sm fbox-plain">
                            <div class="fbox-icon">
                                <a href="<?php the_sub_field('link'); ?>"><i
                                            class="<?php the_sub_field('icons'); ?> text-dark"></i></a>
                            </div>
                            <div class="fbox-content">
                                <h3 class="font-weight-normal"><?php the_sub_field('heading'); ?></h3>
                                <p><?php the_sub_field('paragraph'); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>

        <div class="col-lg-5">

            <div class="accordion clearfix">
                <?php while (have_rows('accordion_repeater')) :
                    the_row();
                    ?>
                    <div class="accordion-header">
                        <div class="accordion-icon">
                            <i class="accordion-closed icon-ok-circle"></i>
                            <i class="accordion-open icon-remove-circle"></i>
                        </div>

                        <div class="accordion-title">
                            <?php the_sub_field('title'); ?>
                        </div>
                    </div>
                    <div class="accordion-content"><?php the_sub_field('description'); ?>
                    </div>
                <?php endwhile; ?>
            </div>

        </div>

    </div>

<!--</div>-->

<div class="clear"></div>
