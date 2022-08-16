<?php get_header(); ?>
    <!-- Content
        ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="row gutter-40 col-mb-80">
                    <!-- Post Content
                    ============================================= -->
                    <div class="postcontent col-lg-9">

                        <div class="single-post mb-0">

                            <!-- Single Post
                            ============================================= -->
                            <?php
                            while (have_posts()):
                                the_post();
                                ?>
                                <div class="entry clearfix">

                                    <!-- Entry Title
                                    ============================================= -->
                                    <div class="entry-title">
                                        <h2><?php the_title(); ?></h2>
                                    </div><!-- .entry-title end -->

                                    <!-- Entry Meta
                                    ============================================= -->
                                    <div class="entry-meta">
                                        <ul>
                                            <li><i class="icon-calendar3"></i> <?php the_time('jS F Y'); ?></li>
                                            <!--                                        <li><a href="#"><i class="icon-user"></i> admin</a></li>-->
                                            <!--                                        <li><i class="icon-folder-open"></i> <a href="#">General</a>, <a-->
                                            <!--                                                    href="#">Media</a>-->
                                            <!--                                        </li>-->
                                            <!--                                        <li><a href="#"><i class="icon-comments"></i> 43 Comments</a></li>-->
                                            <!--                                        <li><a href="#"><i class="icon-camera-retro"></i></a></li>-->
                                        </ul>
                                    </div><!-- .entry-meta end -->

                                    <!-- Entry Image
                                    ============================================= -->
                                    <div class="entry-image">
                                        <a href="#"><img src="<?php the_post_thumbnail_url('full'); ?>"
                                                         alt="Blog Single"></a>
                                    </div><!-- .entry-image end -->

                                    <!-- Entry Content
                                    ============================================= -->
                                    <div class="entry-content mt-0">
                                        <?php the_content(); ?>

                                        <!-- Tag Cloud
                                        ============================================= -->
                                        <div class="tagcloud clearfix bottommargin d-none">
                                            <a href="#">general</a>
                                            <a href="#">information</a>
                                            <a href="#">media</a>
                                            <a href="#">press</a>
                                            <a href="#">gallery</a>
                                            <a href="#">illustration</a>
                                        </div><!-- .tagcloud end -->

                                        <div class="clear"></div>

                                        <!-- Post Single - Share
                                        ============================================= -->

                                        <?php $facebook_url = "https://www.facebook.com/sharer.php?u=" . get_the_permalink(get_the_ID());
                                        $linkedin_url = "https://www.linkedin.com/sharing/share-offsite/?url=" . get_the_permalink(get_the_ID());
                                        $twitter_url = add_query_arg(
                                            [
                                                'text' => urlencode(get_the_title(get_the_ID())),
                                                'url' => get_the_permalink(get_the_ID()),
//                            'hashtags' => 'revivalpoint'
                                            ],
                                            "https://www.twitter.com/intent/tweet?"
                                        ); ?>
                                        <div class="si-share border-0 d-flex justify-content-between align-items-center">
                                            <span>Share this Post:</span>
                                            <div>
                                                <a href="<?= $facebook_url ?>"
                                                   class="social-icon si-borderless si-facebook">
                                                    <i class="icon-facebook"></i>
                                                    <i class="icon-facebook"></i>
                                                </a>
                                                <a href="<?= $twitter_url ?>"
                                                   class="social-icon si-borderless si-twitter">
                                                    <i class="icon-twitter"></i>
                                                    <i class="icon-twitter"></i>
                                                </a>
                                                <a href="<?= $linkedin_url ?>"
                                                   class="social-icon si-borderless si-linkedin">
                                                    <i class="icon-linkedin"></i>
                                                    <i class="icon-linkedin"></i>
                                                </a>
                                            </div>
                                        </div><!-- Post Single - Share End -->

                                    </div>
                                </div><!-- .entry end -->
                            <?php endwhile; ?>

                            <!-- Post Navigation
                            ============================================= -->
                            <div class="row justify-content-between col-mb-30 post-navigation">
                                <div class="col-12 col-md-auto text-center">
                                    <a href="#">&lArr; This is a Standard post with a Slider Gallery</a>
                                </div>

                                <div class="col-12 col-md-auto text-center">
                                    <a href="#">This is an Embedded Audio Post &rArr;</a>
                                </div>
                            </div><!-- .post-navigation end -->

                            <div class="line"></div>

                            <h4>Related Posts:</h4>

                            <div class="related-posts row posts-md col-mb-30">
                                <?php
                                $related = new WP_Query(
                                    array(
                                        'category__in' => wp_get_post_categories($post->ID),
                                        'posts_per_page' => 5,
                                        'post__not_in' => array($post->ID)
                                    )
                                );

                                if ($related->have_posts()) {
                                    while ($related->have_posts()) {
                                        $related->the_post();
                                        ?>
                                        <div class="entry col-12 col-md-6">
                                            <div class="grid-inner row align-items-center gutter-20">
                                                <div class="col-4">
                                                    <div class="entry-image">
                                                        <a href="<?php the_permalink(); ?>"><img
                                                                    src="<?php the_post_thumbnail_url('full'); ?>"
                                                                    alt="Blog Single"></a>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="entry-title title-xs">
                                                        <h3>
                                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                        </h3>
                                                    </div>
                                                    <div class="entry-meta">
                                                        <ul>
                                                            <li>
                                                                <i class="icon-calendar3"></i> <?php the_time('jS F Y'); ?>
                                                            </li>
                                                            <!--                                                    <li><a href="#"><i class="icon-comments"></i> 12</a></li>-->
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                    wp_reset_postdata();
                                } ?>

                            </div>

                        </div>

                    </div><!-- .postcontent end -->

                    <!-- Sidebar
                    ============================================= -->
                    <div class="sidebar col-lg-3 ">
                        <div class="sidebar-widgets-wrap">


                            <div class="widget clearfix ">

                                <div class="tabs mb-0 clearfix " id="sidebar-tabs">

                                    <ul class="tab-nav clearfix">
                                        <li><a href="#tabs-1">Popular</a></li>
                                        <li><a href="#tabs-2">Recent</a></li>
                                        <li><a href="#tabs-3"><i class="icon-comments-alt mr-0"></i></a></li>
                                    </ul>

                                    <div class="tab-container ">

                                        <div class="tab-content clearfix" id="tabs-1">
                                            <div class="posts-sm row col-mb-30" id="popular-post-list-sidebar">
                                                <div class="entry col-12">
                                                    <div class="grid-inner row no-gutters">
                                                        <div class="col-auto">
                                                            <div class="entry-image">
                                                                <a href="#"><img class="rounded-circle"
                                                                                 src="assets/images/magazine/small/3.jpg"
                                                                                 alt="Image"></a>
                                                            </div>
                                                        </div>
                                                        <div class="col pl-3">
                                                            <div class="entry-title">
                                                                <h4><a href="#">Lorem ipsum dolor sit amet,
                                                                        consectetur</a>
                                                                </h4>
                                                            </div>
                                                            <div class="entry-meta d-none">
                                                                <ul>
                                                                    <li><i class="icon-comments-alt"></i> 35 Comments
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="entry col-12">
                                                    <div class="grid-inner row no-gutters">
                                                        <div class="col-auto">
                                                            <div class="entry-image">
                                                                <a href="#"><img class="rounded-circle"
                                                                                 src="assets/images/magazine/small/2.jpg"
                                                                                 alt="Image"></a>
                                                            </div>
                                                        </div>
                                                        <div class="col pl-3">
                                                            <div class="entry-title">
                                                                <h4><a href="#">Elit Assumenda vel amet dolorum
                                                                        quasi</a>
                                                                </h4>
                                                            </div>
                                                            <div class="entry-meta">
                                                                <ul>
                                                                    <li><i class="icon-comments-alt"></i> 24 Comments
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="entry col-12">
                                                    <div class="grid-inner row no-gutters">
                                                        <div class="col-auto">
                                                            <div class="entry-image">
                                                                <a href="#"><img class="rounded-circle"
                                                                                 src="assets/images/magazine/small/1.jpg"
                                                                                 alt="Image"></a>
                                                            </div>
                                                        </div>
                                                        <div class="col pl-3">
                                                            <div class="entry-title">
                                                                <h4><a href="#">Debitis nihil placeat, illum est
                                                                        nisi</a>
                                                                </h4>
                                                            </div>
                                                            <div class="entry-meta">
                                                                <ul>
                                                                    <li><i class="icon-comments-alt"></i> 19 Comments
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content clearfix" id="tabs-2">
                                            <div class="posts-sm row col-mb-30" id="recent-post-list-sidebar">
                                                <div class="entry col-12">
                                                    <div class="grid-inner row no-gutters">
                                                        <div class="col-auto">
                                                            <div class="entry-image">
                                                                <a href="#"><img class="rounded-circle"
                                                                                 src="assets/images/magazine/small/1.jpg"
                                                                                 alt="Image"></a>
                                                            </div>
                                                        </div>
                                                        <div class="col pl-3">
                                                            <div class="entry-title">
                                                                <h4><a href="#">Lorem ipsum dolor sit amet,
                                                                        consectetur</a>
                                                                </h4>
                                                            </div>
                                                            <div class="entry-meta">
                                                                <ul>
                                                                    <li>10th July 2021</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="entry col-12">
                                                    <div class="grid-inner row no-gutters">
                                                        <div class="col-auto">
                                                            <div class="entry-image">
                                                                <a href="#"><img class="rounded-circle"
                                                                                 src="assets/images/magazine/small/2.jpg"
                                                                                 alt="Image"></a>
                                                            </div>
                                                        </div>
                                                        <div class="col pl-3">
                                                            <div class="entry-title">
                                                                <h4><a href="#">Elit Assumenda vel amet dolorum
                                                                        quasi</a>
                                                                </h4>
                                                            </div>
                                                            <div class="entry-meta">
                                                                <ul>
                                                                    <li>10th July 2021</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="entry col-12">
                                                    <div class="grid-inner row no-gutters">
                                                        <div class="col-auto">
                                                            <div class="entry-image">
                                                                <a href="#"><img class="rounded-circle"
                                                                                 src="images/magazine/small/3.jpg"
                                                                                 alt="Image"></a>
                                                            </div>
                                                        </div>
                                                        <div class="col pl-3">
                                                            <div class="entry-title">
                                                                <h4><a href="#">Debitis nihil placeat, illum est
                                                                        nisi</a>
                                                                </h4>
                                                            </div>
                                                            <div class="entry-meta">
                                                                <ul>
                                                                    <li>10th July 2021</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content clearfix" id="tabs-3">
                                            <div class="posts-sm row col-mb-30" id="recent-comments-list-sidebar">
                                                <div class="entry col-12">
                                                    <div class="grid-inner row no-gutters">
                                                        <div class="col-auto">
                                                            <div class="entry-image">
                                                                <a href="#"><img class="rounded-circle"
                                                                                 src="images/icons/avatar.jpg"
                                                                                 alt="User Avatar"></a>
                                                            </div>
                                                        </div>
                                                        <div class="col pl-3">
                                                            <strong>John Doe:</strong> Veritatis recusandae sunt
                                                            repellat
                                                            distinctio...
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="entry col-12">
                                                    <div class="grid-inner row no-gutters">
                                                        <div class="col-auto">
                                                            <div class="entry-image">
                                                                <a href="#"><img class="rounded-circle"
                                                                                 src="images/icons/avatar.jpg"
                                                                                 alt="User Avatar"></a>
                                                            </div>
                                                        </div>
                                                        <div class="col pl-3">
                                                            <strong>Mary Jane:</strong> Possimus libero, earum officia
                                                            architecto maiores....
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="entry col-12">
                                                    <div class="grid-inner row no-gutters">
                                                        <div class="col-auto">
                                                            <div class="entry-image">
                                                                <a href="#"><img class="rounded-circle"
                                                                                 src="assets/images/icons/avatar.jpg"
                                                                                 alt="User Avatar"></a>
                                                            </div>
                                                        </div>
                                                        <div class="col pl-3">
                                                            <strong>Site Admin:</strong> Deleniti magni labore
                                                            laboriosam
                                                            odio...
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="widget clearfix d-none">

                                <h4>Tag Cloud</h4>
                                <div class="tagcloud">
                                    <a href="#">general</a>
                                    <a href="#">videos</a>
                                    <a href="#">music</a>
                                    <a href="#">media</a>
                                    <a href="#">photography</a>
                                    <a href="#">parallax</a>
                                    <a href="#">ecommerce</a>
                                    <a href="#">terms</a>
                                    <a href="#">coupons</a>
                                    <a href="#">modern</a>
                                </div>

                            </div>

                        </div>
                    </div><!-- .sidebar end -->
                </div>

            </div>
        </div>
    </section><!-- #content end -->
<?php get_footer(); ?>