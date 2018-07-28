<?php

require 'ajaxConnect.php';

$result = $data->view("shipping", "*", "", array("customerid" => $_SESSION['user']['id']));

$html = "";

while ($value = $result->fetch_object()) {
    $html .= "<div class='choose-address' id='{$value->id}'>";
    $html .= "<b>{$value->name}</b><br>{$value->address}<br>{$value->contact}";
    $html .= "</div>";
}

echo $html;
