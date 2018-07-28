
$(document).ready(function () {

// Quantity Spinner
    $('.le-quantity a').click(function (e) {
        e.preventDefault();
        var currentQty = $(this).parent().parent().find('input').val();
        if ($(this).hasClass('minus') && currentQty > 0) {
            $(this).parent().parent().find('input').val(parseInt(currentQty, 10) - 1);
        } else {
            if ($(this).hasClass('plus')) {
                $(this).parent().parent().find('input').val(parseInt(currentQty, 10) + 1);
            }
        }
    });
    /*
     * Add-to-cart on product page is clicked
     */
    $('body').on('click', '#addto-cart', function () {

        /*
         * Function to get URL parameter
         */
        function GetURLParameter(sParam)
        {
            var sPageURL = window.location.search.substring(1);
            var sURLVariables = sPageURL.split('&');
            for (var i = 0; i < sURLVariables.length; i++)
            {
                var sParameterName = sURLVariables[i].split('=');
                if (sParameterName[0] == sParam)
                {
                    return sParameterName[1];
                }
            }
        }

// checking if single page
        if (GetURLParameter('f') == 'single-product') {
            var productid = GetURLParameter('id'); // product id
            var quantity = $('.quantity').val(); // current quantity
//            alert(productid);

            $.ajax({
                url: 'ajax/cart.php',
                type: 'POST',
                data: {'data': JSON.stringify({[productid]: quantity})},
                success: function (data) {
                    if (parseInt(data) === 0) {
                        alert('failed');
                    } else {
                        if ($('.p_' + data['id']).length == 1) {
//                            alert('OLD --- ' + JSON.stringify(data));
                            // same product
//                            $('#cart-dropdown').children().remove('p_' + data['id']);
                            $('.p_' + data['id']).remove();
                            $('.checkout').before("<li class='p_" + data['id'] + "'>\n\
<div class='basket-item'><div class='row'><div class='col-xs-4 col-sm-4 no-margin text-center'><div class='thumb'><img alt='' src='assets/images/products/product-small-01.jpg' /></div></div><div class='col-xs-8 col-sm-8 no-margin'><div class='title'>" + data['title'] + "</div><div class='price'><span class='color-green'>" + data['quantity'] + " x </span>$" + data['price'] + "</div></div></div><a class='close-btn' href='#'><input type='hidden' value='" + data['id'] + "'></a></div></li>");
                        } else {
                            // new product
                            $('.checkout').before("<li class='p_" + data['id'] + "'><div class='basket-item'><div class='row'><div class='col-xs-4 col-sm-4 no-margin text-center'><div class='thumb'><img alt='' src='assets/images/products/product-small-01.jpg' /></div></div><div class='col-xs-8 col-sm-8 no-margin'><div class='title'>" + data['title'] + "</div><div class='price'><span class='color-green'>" + data['quantity'] + " x </span>$" + data['price'] + "</div></div></div><a class='close-btn' href='#'><input type='hidden' value='" + data['id'] + "'></a></div></li>");
                            var cartNumber = $('.count-cart').text();
                            if (cartNumber == 0) {
                                $('.checkout').html("<div class='basket-item'>        <div class='row'>            <div class='col-xs-12 col-sm-6'>                <a href='cart.html' class='le-button inverse'>View cart</a>            </div>            <div class='col-xs-12 col-sm-6'>                <a href='checkout.html' class='le-button'>Checkout</a>            </div>        </div>    </div>");
                            }
                            cartNumber++;
                            $('.count-cart').text(cartNumber);
//                            alert('NEW --- ' + JSON.stringify(data));
                        }


                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
//                    alert(jqXHR + "   " + textStatus + "   " + errorThrown);
                }
            });
        }
        return false;
    });

    /*
     * Close button to cart dropdown
     */
    $('body').on('click', '.close-btn', function () {
//        alert('clicked');
        var id = $(this).children('input').val();
        $(this).parents('li').remove();
        var cartNumber = $('.count-cart').text();
        if (parseInt(cartNumber) > 0) {
            cartNumber--;
            $('.count-cart').text(cartNumber);
        }
        $.get(
                "ajax/cartRemove.php",
                {'remove': id},
                function (data, status) {
//                    alert("Data: " + data + "\nStatus: " + status);
//                    alert("cart number " + cartNumber);
                    if (parseInt(cartNumber) == 0) {
                        $('.checkout').html("<div class='basket-item'><div class='row'><div class='col-xs-12 col-sm-12'><a href='#' class='le-button inverse'>Your cart is empty </a></div></div></div></div>");
//                        $('#cart-dropdown').html("<li class='checkout'><div class='basket-item'><div class='row'><div class='col-xs-12 col-sm-12'><a href='#' class='le-button inverse'>Your cart is empty </a></div></div></div></div></li>");

                    }

                }
        );
//        var basketItem = $('.basket-item').length;
//        alert(id);
    });
});


