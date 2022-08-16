<?php
/**
 * Template Name: Template-blog
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header(); ?>
<!-- Content
		============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">

            <!-- Posts
            ============================================= -->
            <div id="posts" class="post-grid row grid-container gutter-30">
                <?php $condition = array(
                    'post_type' => 'post',
                    'post_status' => 'publish'
                );
                $query = new WP_Query($condition);
                if ($query->have_posts()) {
                    while ($query->have_posts()) :
                        $query->the_post();
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
                                    <p><?php the_field('brief');?></p>
                                    <a href="<?php the_permalink(); ?>" class="more-link">Read More</a>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                }
                ?>
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
