<?php

if (isset($_POST['paymenteditsubmit']))
{
    if ($data->update("payment", ['name' => $_POST['paymentedit']], ['id' => $_POST['paymentEditId']]))
    {

        $_SESSION['msg'] = "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Payment Edited!</strong></div>";
        Redirect("index.php?e=payment");
    }
    else
    {

        $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Payment Was Not Edited!</strong></div>";
        Redirect("index.php?e=payment");
    }
}
if (isset($_POST['paymentdeletesubmit']))
{
    if ($data->delete('payment', ['id' => $_POST['paymentDeleteId']]))
    {
        $_SESSION['msg'] = "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Payment Deleted!</strong></div>";
        Redirect("index.php?e=payment");
    }
    else
    {
        $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Payment Was Not Deleted!</strong></div>";
        Redirect("index.php?e=payment");
    }
}
if (isset($_POST['paymentsubmit']))
{
    if ($data->insert("payment", ['name' => $_POST['paymentinput']]))
    {

        $_SESSION['msg'] = "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>{$_POST['paymentinput']} Added to Payment Methods!</strong></div>";
        foreach ($_POST as $key => $value)
        {
            unset($_POST[$key]);
        }
        Redirect("index.php?e=payment");
    }
    else
    {
        $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>{$_POST['paymentinput']} Was Not Added to Payment Methods!</strong></div>";
        Redirect("index.php?e=payment");
    }
}
?>