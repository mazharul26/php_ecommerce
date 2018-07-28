<?php

require 'ajaxConnect.php';
$id = $_GET['id'];

$qt = $_GET['qt'];



$_SESSION['cart'][$id] = $qt;
//echo $id, ' - - ', $qt;

echo $_SESSION['cart'][$id];
