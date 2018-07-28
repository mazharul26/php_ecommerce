$(document).ready(function () {
    /*
     * MINUS
     */
    $('body').on('click', '.minus', function () {
        var p = $(this).parent();
        var id = $(p).children('.quantity').attr('data-id');
        var qt = $(p).children('.quantity').text();
        if (qt > 0)
            qt--;
        $(p).children('.quantity').text(qt);
        $.get(
                'ajax/checkout.php',
                {'id': id, 'qt': qt},
                function (data) {
                }
        );
        /*
         * single product price row update
         */
        var price = parseInt($('.price-' + id).text());
        var total = qt * price;
        $('.total-' + id).text(total);
        /*
         * grand total
         */
        if ($('.shipping').val() > 0) {
            /*
             * shipping ase
             */

        } else
        {
            /*
             * shipping nai
             */
            var grand = [];
            $('.totals').each(function () {
                grand.push(parseInt($(this).text()));
            });
            var len = grand.length;
            sum = 0;
            for (var i = 0; i < len; i++) {
                sum += grand[i];
            }
//                alert(sum);

            $('.grandtotal').text(sum);
        }

        /*
         * Coupon total fix and Total Pay fix
         */
        if (parseInt($('.discountamount').text()) > 0) {

            var couponTotal = parseInt($('.grandtotal').text()) - parseInt($('.discountamount').text());
            $('.totalwithcoupon').text(couponTotal);
            if ($('.choose-address').hasClass('address-active') == true) {
                var deliveryCharge = parseInt($('.address-active').attr('data-address-charge'));
//                alert(deliveryCharge);
                $('.totalpay').text(couponTotal + deliveryCharge);
            } else {
                $('.totalpay').text(couponTotal);
            }

        }


        /*
         * Total Pay fix
         */





    });
    /*
     * PLUS
     */
    $('body').on('click', '.plus', function () {
        var p = $(this).parent();
        var id = $(p).children('.quantity').attr('data-id');
        var qt = $(p).children('.quantity').text();
        qt++;
        $(p).children('.quantity').text(qt);
        $.get(
                'ajax/checkout.php',
                {'id': id, 'qt': qt},
                function (data) {
//                        alert(data);
                }

        );
        /*
         * single product price row update
         */
        var price = parseInt($('.price-' + id).text());
        var total = qt * price;
        $('.total-' + id).text(total);
        /*
         * grand total
         */
        if ($('.shipping').val() > 0) {
            /*
             * shipping ase
             */
            var shipcost = $('.shipping').find(':selected').attr('data-ship-cost');
            var grand = [];
            $('.totals').each(function () {
                grand.push(parseInt($(this).text()));
            });
            var len = grand.length;
            sum = 0;
            for (var i = 0; i < len; i++) {
                sum += grand[i];
            }
//                alert(sum);
            sum += parseInt(shipcost);
            $('.grandtotal').text(sum);
        } else
        {
            /*
             * shipping nai
             */
            var grand = [];
            $('.totals').each(function () {
                grand.push(parseInt($(this).text()));
            });
            var len = grand.length;
            sum = 0;
            for (var i = 0; i < len; i++) {
                sum += grand[i];
            }
//                alert(sum);

            $('.grandtotal').text(sum);
        }

        /*
         * Coupon total fix and Total Pay fix
         */
        if (parseInt($('.discountamount').text()) > 0) {

            var couponTotal = parseInt($('.grandtotal').text()) - parseInt($('.discountamount').text());
            $('.totalwithcoupon').text(couponTotal);
            if ($('.choose-address').hasClass('address-active') == true) {
                var deliveryCharge = parseInt($('.address-active').attr('data-address-charge'));
//                alert(deliveryCharge);
                $('.totalpay').text(couponTotal + deliveryCharge);
            } else {
                $('.totalpay').text(couponTotal);
            }

        }




    });
    /*
     * APPLY COUPON
     */
    $('body').on('keyup', '.coupon', function () {
        if ($(this).val().length > 0) {
            $('.couponsubmit').show();
        } else {
            $('.couponsubmit').hide();
        }
    });
    /*
     * apply coupon
     */
    $('body').on('click', '.couponsubmit', function () {



        $.get(
                'ajax/checkout-coupon.php',
                {'coupon': $('.coupon').val()},
                function (data) {
                    if (data > 0) {
//                        alert(data);
                        $('.coupon-mes').html('Congrats!! You received <span class="discountamount">' + data + '</span> Taka Discount').addClass('success').show();
                        var total = parseInt($('.grandtotal').text()) - parseInt(data);
                        $('.totalwithcoupon').text(total);
                    } else {
                        $('.coupon-mes').text('coupon failed').addClass('danger').show();
                    }
//                        alert(data);
                }
        );
//            alert('clicked');


    });
    /*
     * Shipping Buttons
     */

    $('body').on('click', '.address', function () {
        $('.address').removeClass('btn-warning').addClass('btn-default');
        $(this).addClass('btn-warning').addClass('btn-default');
        if ($(this).hasClass('new-address')) {
            $('.new-address-form').show();
            $('.existing-address-form').hide();
        }
        if ($(this).hasClass('existing-address')) {
            $('.new-address-form').hide();
            $('.existing-address-form').show();
        }


    });
    /*
     * New Shipping Address
     */
    $('body').on('click', '.newadd', function () {
        var ship_name = $("input[name='ship_name']").val();
        var ship_addresss = $("input[name='ship_addresss']").val();
        var ship_contact = $("input[name='ship_contact']").val();
        var ship_city = $("select[name='ship_city']").val();
        var ship_country = $("select[name='ship_country']").val();
        if (ship_name.length > 0 && ship_contact.length > 0 && ship_city > 0 && ship_country > 0 && ship_addresss.length > 0) {
            $.post(
                    'ajax/checkout-new-shipping.php',
                    {
                        'name': ship_name,
                        'address': ship_addresss,
                        'contact': ship_contact,
                        'cityid': ship_city
                    },
                    function (data) {
//                        alert(data['charge']);
                        $('.shipping-id').val(data['id']);
                        $('.shipping-id').attr('data-ship-charge', data['charge']);
                        $('.ship-form').fadeOut().hide();
                        $('.address-to-ship').show().html("Shipping Address is; <br><div class='choose-address' data-add-id='" + data['id'] + "'>" + ship_name + '<br>' + ship_addresss + '<br>' + ship_city + '<br>' + ship_country + '<br>' + ship_contact + "</div>");
                    }
            );
        } else {
            alert('failed');
        }
    });
    /*
     * A shipping Address Block is Clicked
     */


    $('body').on('click', '.choose-address', function () {

        var addressId = parseInt($(this).attr('data-address-id'));
        var addressCharge = parseInt($(this).attr('data-address-charge'));
        $.get(
                'ajax/checkout-shipping.php',
                {
                    'shipping': addressId
                },
                function (data) {
                }
        );


        $('.choose-address').removeClass('address-active');
        $(this).addClass('address-active');
        /*
         * Update Total Pay amount
         */
        var totalPay = parseInt($('.totalpay').text());
        $('.totalpay').text(totalPay + parseInt(addressCharge));


    });



    /*
     * Checkout button clicked
     */
    $('body').on('click', '.checkmeout', function () {
        var payMethodId = parseInt($('.paymentmethodid').val());
        var payTranId = parseInt($('.paytranid').val());
        if (payMethodId > 0) {
            $.post(
                    'ajax/checkmeout.php',
                    {
                        'payMethodId': payMethodId,
                        'payTranId': payTranId
                    },
                    function (data) {
                        alert(data);
                        if (data > 0) {
                            return true;
                        } else {
                            return false;
                        }

                    }
            );
        } else {
            return false;
        }
//        return false;
    });














});



