<?php remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

/**
 * update default woocommerce address fields
 *
 * @param $fields
 *
 * @return mixed
 */
function ecommerce_default_address_fields($fields)
{

    unset($fields['last_name']);
    unset($fields['address_2']);
    unset($fields['company']);
    unset($fields['country']);
    unset($fields['address_2']);
    unset($fields['city']);
    unset($fields['state']);
    unset($fields['postcode']);

    $fields['first_name']['label'] = 'Full Name';
    $fields['first_name']['class'] = ['form-row-wide'];

    $fields['address_1']['label'] = 'Address';
    $fields['address_1']['placeholder'] = 'Address';
    $fields['address_1']['type'] = 'textarea';
    $fields['address_1']['required'] = false;

    return $fields;
}

add_filter('woocommerce_default_address_fields', 'ecommerce_default_address_fields', 20, 1);
