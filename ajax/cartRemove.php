<?php

require 'ajaxConnect.php';
if (isset($_GET['remove']))
{
    unset($_SESSION['cart'][$_GET['remove']]);
    echo $_GET['remove'];
}
else
{
    echo 'nai';
}
