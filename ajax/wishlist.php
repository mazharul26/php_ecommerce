<?php

require 'ajaxConnect.php';

if (isset($_GET['wish']))
{
    $aseKina = $data->view('wishlist', NULL, NULL, ['customerid' => $_SESSION['user']['id'], 'productid' => $_GET['wish']]);

    if ($aseKina->num_rows == 0)
    {
        echo 0;
    }
    else
    {
        $wish = $data->insert('wishlist', ['customerid' => $_SESSION['user']['id'], 'productid' => $_GET['wish']]);
        if ($wish)
            echo $wish;
        else
            echo 0;
    }
}
else
{
    echo 0;
}