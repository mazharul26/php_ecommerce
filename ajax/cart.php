<?php

require 'ajaxConnect.php';
if (isset($_POST['data']))
{
    $singleArr = json_decode($_POST['data']);
    foreach ($singleArr as $key => $value)
    {
        if ($value > 0)
            $_SESSION['cart'][$key] = $value;
        $product = $data->procedure('cart', $key);
        while ($row = $product->fetch_assoc())
        {
            $row['quantity'] = $value;
            header('Content-Type: application/json');
            echo json_encode($row);
        }
    }
}
else
{
    echo 0;
}
