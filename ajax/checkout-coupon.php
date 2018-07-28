<?php

require 'ajaxConnect.php';

if (isset($_GET['coupon']) && isset($_SESSION['cart']) && isset($_SESSION['shipping']))
{

    $coupon = $data->view('discount_code', NULL, NULL, ['code' => $data->validate($_GET['coupon'])]);
    if ($coupon)
    {

        while ($row = $coupon->fetch_assoc())
        {


            /*
             * If total price == minimum price
             */

            $cartNumber = count($_SESSION['cart']);

            $wherein = '';
            foreach ($_SESSION['cart'] as $key => $value)
            {
                if ($wherein != "")
                    $wherein .= " , ";
                $wherein .= " $key ";
            }
            $cartItems = $data->viewIN('product', 'product.id, product.price', ['product.id' => $wherein]);
            $arr = [];
            $grandtotal = 0;

            while ($product = $cartItems->fetch_assoc())
            {
                $productID = $product['id'];
                $grandtotal += $_SESSION['cart'][$product['id']] * $product['price'];
            }

            if ($grandtotal >= $row['minimum_total_price'])
            {
                //  $output['discountAmount'] = $row['discount_amount'];
                $_SESSION['discount']['id'] = $productID;
                $_SESSION['discount']['coupon'] = $_GET['coupon'];
                $_SESSION['discount']['discount_amount'] = $row['discount_amount'];
                echo $row['discount_amount'];
            }
            else
            {
                echo 0;
            }
        }
    }
}
else
{
    echo '0000';
}


