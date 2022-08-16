<?php
get_header(); ?>
<!-- Content
		============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">

            <!-- Posts
            ============================================= -->
            <div id="posts" class="post-grid row grid-container gutter-30">
                <?php
                while (have_posts()) {
                    the_post();
                    ?>
                    <div class="entry col-md-4 col-sm-6 col-12">
                        <div class="grid-inner">
                            <div class="entry-image">
                                <a href="<?php the_post_thumbnail_url('thumb-crazy'); ?>" data-lightbox="image"><img
                                            src="<?php the_post_thumbnail_url('category-thumb'); ?>"
                                            alt="Standard Post with Image"></a>
                            </div>
                            <div class="entry-title">
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            </div>
                            <div class="entry-meta">
                                <ul>
                                    <li><i class="icon-calendar3"></i> <?php the_time('jS F Y'); ?></li>
                                    <!--                                    <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 13</a></li>-->
                                    <!--                                    <li><a href="#"><i class="icon-camera-retro"></i></a></li>-->
                                </ul>
                            </div>
                            <div class="entry-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, asperiores quod
                                    est
                                    tenetur in. Eligendi, deserunt, blanditiis est quisquam doloribus.</p>
                                <a href="<?php the_permalink(); ?>" class="more-link">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div><!-- #posts end -->

            <div class="page-load-status">
                <div class="css3-spinner infinite-scroll-request">
                    <div class="css3-spinner-ball-pulse-sync">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
                <div class="alert alert-warning center infinite-scroll-last mx-auto" style="max-width: 20rem;">End of
                    content
                </div>
                <div class="alert alert-warning center infinite-scroll-error mx-auto" style="max-width: 20rem;">No more
                    pages to load
                </div>
            </div>

            <!-- Pagination
            ============================================= -->
            <div class="center d-none">
                <a href="blog-masonry-page-2.html"
                   class="button button-3d button-dark button-large button-rounded load-next-posts">Load more..</a>
            </div>

        </div>
    </div>
</section><!-- #content end -->

<?php get_footer(); ?>
