<!-- Sign Up
           ============================================= -->
<div class="section my-4 py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row align-items-stretch align-items-center">
                    <div class="col-md-7 min-vh-50"
                         style="background: url('<?php the_sub_field('image_url'); ?>') center center no-repeat; background-size: cover;">
                        <div class="vertical-middle pl-5">
                            <h2 class="pl-5"><?php the_sub_field('heading'); ?></h2>
                        </div>
                    </div>
                    <div class="col-md-5 bg-white">
                        <div class="card border-0 py-2">
                            <div class="card-body">
                                <h3 class="card-title mb-4 ls0"><?php the_sub_field('sub_heading'); ?></h3>
                                <ul class="iconlist ml-3">
                                    <?php while (have_rows('list_repeater')):
                                        the_row()
                                        ?>
                                        <li>
                                            <i class="icon-circle-blank text-black-50"></i><?php the_sub_field('list'); ?>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                                <a href="<?php the_sub_field('link'); ?>"
                                   class="button button-rounded ls0 font-weight-semibold ml-0 mb-2 nott px-4"><?php the_sub_field('button_name'); ?></a><br>
                                <small class="font-italic text-black-50"><?php the_sub_field('title') ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
