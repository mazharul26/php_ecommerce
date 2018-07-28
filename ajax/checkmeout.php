<?php

require 'ajaxConnect.php';
if (isset($_POST['payMethodId']) && isset($_POST['payTranId']))
{
    $payTranId = "1234567890";
    if ($_POST['payTranId'] == $payTranId)
    {


        /*
         * Sale Table
         */
        $sales = [
            'shippingid' => $_SESSION['shipping']['id'],
            'paymentid' => $_POST['payMethodId'],
            'customerid' => $_SESSION['user']['id']
        ];
        if (isset($_SESSION['discount']['id']))
            $sales['discountid'] = $_SESSION['discount']['id'];
        if (isset($_COOKIE['mediaAff']))
            $sales['affiliate_id'] = $_COOKIE['mediaAff'];

        $salesInsert = $data->insert('sales', $sales);

        if ($salesInsert)
        {
            $salesid = $data->Id;
            foreach ($_SESSION['cart'] as $key => $value)
            {
                $multiInsertArr[] = $salesid . ', ' . $key . ', ' . $value;
            }

            $salesDetails = $data->multiInsert('sales_details', 'salesid, productid, quantity', $multiInsertArr);
            if ($salesInsert)
            {
                /*
                 * Database insert successful
                 */
                unset($_SESSION['cart']);
                unset($_SESSION['shipping']);
                unset($_SESSION['discount']);
                echo 1;
            }
            else
            {
                echo 0;
            }
        }
        else
        {
            echo 0;
        }
    }
    else
    {
        echo 0;
    }
}
else
{
    echo 0;
}



