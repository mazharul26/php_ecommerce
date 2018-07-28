<?php

require 'ajaxConnect.php';

$insert = $data->insert('shipping', [
    'name' => $_POST['name'],
    'address' => $_POST['address'],
    'cityid' => $_POST['cityid'],
    'contact' => $_POST['contact'],
    'customerid' => $_SESSION['user']['id'],
        ]
);
if ($insert)
{

    $output['id'] = $data->Id;

    $cost = $data->view('city', '', '', ['id' => $_POST['cityid']]);
    while ($row = $cost->fetch_object())
    {
        $output['charge'] = $row->delivery_charge;
    }
    header('Content-Type: application/json');
    echo json_encode($output);
}
else
{
    echo 0;
}
