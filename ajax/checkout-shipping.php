<?php

if (isset($_GET['shipping']))
{
    require 'ajaxConnect.php';
    $shipping = $data->view('cusomter_shipping_address_view', NULL, NULL, array('id' => $_GET['shipping']));

    while ($row = $shipping->fetch_assoc())
    {
        $_SESSION['shipping']['id'] = $row['id'];
        echo $row['id'];
    }
}
else
{
    echo 0;
}