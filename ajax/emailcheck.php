<?php

if (isset($_GET['email']))
{
    require 'ajexConnect.php';
    //$emailCheck = $_GET['email'];
    $result = $data->view('users', ['id', 'email'], array('name', 'ASC'), ['email' => $_GET['email']]);
    // echo $result;
    if ($result->num_rows > 0)
    {
        echo 1;
    }
    else
    {
        echo o;
    }
}
    