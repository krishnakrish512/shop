$(document).ready(function ($) {
    //ajax add to cart from product listing
    $(document).on('click', '.add-to-cart', function (e) {
        if ($(this).data('product-type') === "simple") {
            e.preventDefault();
            let productId = $(this).data('product_id');

            $.ajax({
                url: es.ajax_url,
                type: 'POST',
                data: {
                    action: 'ecommerce_add_cart_ajax',
                    product_id: productId
                },
                success: function (results) {
                    //update the cart html
                    $('.widget_shopping_cart_content').empty();
                    $('.widget_shopping_cart_content').append(results);
                    $("div").addClass("top-cart-open");
                    // setTimeout(function () {
                    //     jQuery('.cart-dropdown').removeClass('show-dropdown');
                    // }, 3000);
                }
            });
        }
    });

    //ajax add to cart from product quick view modal
    $(document).on('click', '.add-to-cart', function (e) {
        e.preventDefault();
        let productId = $(this).data('product_id');
        let quantity = $('input[name="quantity"]').val();
        let variation = {};
        let selects = document.getElementsByClassName('variation-select');
        //get variation attributes from select fields
        if (selects.length) {
            for (let key in selects) {
                if (selects.hasOwnProperty(key)) {
                    variation[selects[key].name] = selects[key].value;
                }
            }
        }

        variation = JSON.stringify(variation);

        $.ajax({
            url: es.ajax_url,
            type: 'POST',
            data: {
                action: 'ecommerce_add_cart_ajax',
                product_id: productId,
                quantity: quantity,
                variation: variation
            },
            success: function (results) {
                //update the cart html
                $('.widget_shopping_cart_content').empty();
                $('.widget_shopping_cart_content').append(results);
                $("div").addClass("top-cart-open");
            }
        });
    });

    //on cart html change update the cart meta html i.e. product count and subtotal
    $("body").on('DOMSubtreeModified', ".widget_shopping_cart_content", function () {
        $.ajax({
            url: es.ajax_url,
            type: 'POST',
            data: {
                action: 'ecommerce_cart_meta_ajax'
            },
            success: function (results) {
                $('#b-mini_cart').empty();
                $('#b-mini_cart').append(results);
            }
        });
    });

    //ajax add to cart from product quick view modal
    $(document).on('click', '.add-to-cart', function (e) {
        e.preventDefault();
        let productId = $(this).data('product_id');
        let quantity = $('input[name="quantity"]').val();
        let variation = {};
        // let selects = document.getElementsByClassName('variation-select');

    });

    //ajax get quick view modal html
    $(document).on('click', '.quick-view', function (e) {
        let productId = $(this).data('product-id');
        $.ajax({
            url: es.ajax_url,
            type: 'POST',
            data: {
                action: 'ecommerce_quick_view_ajax',
                product_id: productId
            },
            success: function (results) {
                $('#b-qucik_view .modal-body').empty();
                $('#b-qucik_view .modal-body').append(results);


            }
        });
    });
});


$(document).on('click', 'input.minus', function (e) {
    let val = parseInt($(this).next('input').attr('value'));
    if (parseInt(val) > 1) {
        val = parseInt(val) - 1;
        $(this).next('input').attr('value', val);
    }
});

$(document).on('click', 'input.plus', function (e) {
    let val = parseInt($(this).prev('input').attr('value'));
    let max = parseInt($(this).prev('input').attr('max'));

    if (max > val || $(this).prev('input').attr('max') === "" || $(this).prev('input').attr('max') === "-1") {
        val = parseInt(val) + 1;
        $(this).prev('input').attr('value', val);
    }
});

//single product page

//ajax add to cart
$(document).on('click', '.single_add_to_cart_button', function (e) {
    e.preventDefault();
    let productId = null;
    let variationId = null;
    let variation = {};

    if ($('.woocommerce-grouped-product-list').length) {
        let products = document.getElementsByClassName('prod-quantity');

        let quantityArray = [];
        $(".prod-quantity").each(function (index) {
            let quantity = this.value;
            let name = this.name;
            name = name.split(']')[0];
            let id = name.split('[')[1];

            quantityArray[index] = {
                'id': id,
                'quantity': quantity
            }
        });
        quantity = quantityArray;
    }


    variation = JSON.stringify(variation);

    $.ajax({
        url: es.ajax_url,
        type: 'POST',
        data: {
            action: 'ecommerce_add_cart_ajax',
            product_id: productId,
            quantity: quantity,
            variation: variation,
            variation_id: variationId
        },
        success: function (results) {
            //update the cart html
            $('.widget_shopping_cart_content').empty();
            $('.widget_shopping_cart_content').append(results);
            $("body").addClass("top-cart-open");
        }
    });
});

