<!-- Modal -->
<div class="modal fade product_view" id="b-qucik_view" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog  modal-lg  modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="btn btn-close" data-dismiss="modal">
                <i class="icon-line-cross"></i>
            </button>
            <div class="modal-body p-0">

            </div>
        </div>
    </div>
</div>
<script>
    (function () {


    })(jQuery);
</script>

<?php
$contact = get_field('contact', 'option');
?><?php
$social = get_field('social', 'option');
?>
<!-- Footer
============================================= -->
<footer id="footer" class="bg-transparent border-top full-width">
    <div class="container">
        <!-- Footer Widgets
        ============================================= -->
        <div class="footer-widgets-wrap">

            <div class="row col-mb-50">
            <div class="col-lg-3">
                <a href="#"><img src="<?= $contact['footer_logo'] ?>" alt="Image" class="footer-logo"></a>
            </div>
            <div class="col-lg-4">
            <h4 class="ls0 mb-3 nott">Contact </h4>
                <address class="mb-0">
                    <abbr title="Headquarters"
                            style="display: inline-block;margin-bottom: 7px;"></abbr><?= $contact['footer_address'] ?>
                </address>
                <abbr title="Phone Number"><strong>Phone:</strong></abbr><?= $contact['footer_number'] ?>
                <br>
                <!--                                <abbr title="Fax"><strong>Fax:</strong></abbr>-->
                <? //= $contact['footer_fax'] ?><!--<br>-->
                <abbr title="Email Address"><strong>Email:</strong></abbr> <?= $contact['footer_email'] ?>
            </div>
                <div class="col-md-6 col-lg-2">
                    <div class="widget clearfix">

                        <h4 class="ls0 mb-3 nott">Quick Links </h4>

                            <?php
                            wp_nav_menu([

                                'theme_location' => 'footer',

                                 'menu_class' => 'list-unstyled iconlist ml-0',


                            ]); ?>

                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="widget clearfix">
                        
                        <div class="widget clearfix">
                        <h4 class="ls0 mb-3 nott">Follow As</h4>
                            <a href="<?= $social['facebook_url'] ?>" class="social-icon si-small si-rounded si-facebook"
                               target="_blank">
                                <i class="icon-facebook"></i>
                                <i class="icon-facebook"></i>
                            </a>

                            <a href="<?= $social['twitter_url'] ?>" class="social-icon si-small si-rounded si-twitter"
                               target="_blank">
                                <i class="icon-twitter"></i>
                                <i class="icon-twitter"></i>
                            </a>

                            <a href="<?= $social['linkedin_url'] ?>" class="social-icon si-small si-rounded si-linkedin"
                               target="_blank">
                                <i class="icon-linkedin"></i>
                                <i class="icon-linkedin"></i>
                            </a>
                            <a href="<?= $social['instagram_url'] ?>" class="social-icon si-small si-rounded si-instagram"
                               target="_blank">
                                <i class="icon-instagram"></i>
                                <i class="icon-instagram"></i>
                            </a>
                            <a href="<?= $social['pinterest_url'] ?>" class="social-icon si-small si-rounded si-pinterest"
                               target="_blank">
                                <i class="icon-pinterest"></i>
                                <i class="icon-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- .footer-widgets-wrap end -->
    </div>


    <!-- Copyrights
    ============================================= -->
    <div id="copyrights">
        <div class="container">

            <div class="row justify-content-between">
                <div class="col-12 col-lg-auto text-center text-lg-left">
                    <p class="mb-3 mb-md-0">Copyrights &copy; <?php echo date('Y'); ?> All Rights Reserved by Kathmandu
                        Handmade.</p>
                </div>

                <div class="col-12 col-lg-auto text-center text-lg-right">
                    <div class="copyrights-menu copyright-links mb-0">
                        Website by: <a href="https://nirvanstudio.com/">Nirvan Studio</a>
                    </div>
                </div>
            </div>

        </div>
    </div><!-- #copyrights end -->
</footer><!-- #footer end -->

</div><!-- #wrapper end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-line-arrow-up"></div>

<?php wp_footer(); ?>


</body>
</html>