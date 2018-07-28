<?php

// checking for logout
if (isset($_SESSION['user']["id"]) && isset($_GET["f"]) && $_GET["f"] == "logout")
{
    $testing = $_SESSION['user']['id'];
    unset($_SESSION['user']);
    Redirect("index.php?f=login");
    die();
}
else
{
    Redirect("index.php?f=login");
}
?>
