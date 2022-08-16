<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 4.1.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

do_action('woocommerce_before_customer_login_form'); ?>
<div class="container">

    <!--    --><?php //if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>

    <div class="row justify-content-center" id="customer_login">

        <div class="col-xl-6 col-lg-6 col-md-8 pr-md-5">

            <div class="box_account">

                <!--                --><?php //endif; ?>

                <h3 class="client">Already Client</h3>

                <form class="form_container" method="post">

                    <?php do_action('woocommerce_login_form_start'); ?>

                    <div class="form-group">
                        <input type="text" class="form-control" name="username"
                               id="username" autocomplete="username" placeholder="Username or email address"
                               value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>"/><?php // @codingStandardsIgnoreLine ?>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password"
                               name="password"
                               id="password" placeholder="Password" autocomplete="current-password"/>
                    </div>

                    <?php do_action('woocommerce_login_form'); ?>

                    <div class="clearfix add_bottom_15">
                        <div class="checkboxes float-left">
                            <label class="container_check">Remember me
                                <input class="woocommerce-form__input woocommerce-form__input-checkbox"
                                       name="rememberme"
                                       type="checkbox" id="rememberme" value="forever"/>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="float-right woocommerce-LostPassword lost_password"><a
                                    href="<?php echo esc_url(wp_lostpassword_url()); ?>">Lost Password?</a>
                        </div>
                    </div>

                    <div class="text-center">
                        <?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
                        <input type="submit"
                               class="woocommerce-form-login__submit btn_1 full-width"
                               name="login"
                               value="Log in">
                    </div>

                    <?php do_action('woocommerce_login_form_end'); ?>

                </form>

                <!--                --><?php //if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-8 border-left pl-md-5">
            <div class="box_account">
                <h3 class="new_client">New Client</h3> <small class="float-right pt-2 d-none">* Required Fields</small>

                <form method="post"
                      class="form_container" <?php do_action('woocommerce_register_form_tag'); ?> >

                    <?php do_action('woocommerce_register_form_start'); ?>

                    <?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>

                        <div class="form-group">
                            <label for="reg_username"><?php esc_html_e('Username', 'woocommerce'); ?>&nbsp;<span
                                        class="required">*</span></label>
                            <input type="text" class="form-control" name="username"
                                   id="reg_username" autocomplete="username"
                                   value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>"/><?php // @codingStandardsIgnoreLine ?>
                        </div>

                    <?php endif; ?>

                    <div class="form-group">
                        <input type="email" class="form-control" name="email"
                               id="reg_email" autocomplete="email" placeholder="Email*"
                               value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>"/><?php // @codingStandardsIgnoreLine ?>
                    </div>

                    <?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>

                        <div class="form-group">
                            <label for="reg_password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span
                                        class="required">*</span></label>
                            <input type="password" class="form-control"
                                   name="password"
                                   id="reg_password" autocomplete="new-password"/>
                        </div>

                    <?php else : ?>

                        <p><?php esc_html_e('A password will be sent to your email address.', 'woocommerce'); ?></p>

                    <?php endif; ?>

                    <?php do_action('woocommerce_register_form'); ?>

                    <div class="text-center">
                        <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
                        <input type="submit"
                               class="btn_1 full-width woocommerce-form-register__submit"
                               name="register"
                               value="Register">
                    </div>

                    <?php do_action('woocommerce_register_form_end'); ?>

                </form>
            </div>
        </div>

    </div>
</div>
<?php //endif; ?>

<?php do_action('woocommerce_after_customer_login_form'); ?>
