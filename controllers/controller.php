<?php

if (isset($_GET['u']) && isset($_SESSION['user']['id'])) // USER BASIC
{
    if (file_exists("views/user/{$_GET['u']}.php"))
        require "views/user/{$_GET['u']}.php";
} elseif (isset($_GET['e']) && isset($_SESSION['user']['id'])) // ADMIN and Employeee
{
    if (file_exists("views/employee/{$_GET['e']}.php"))
        require "views/employee/{$_GET['e']}.php";
} elseif (isset($_GET['c']) && isset($_SESSION['user']['id'])) // CUSTOMER
{
    if (file_exists("views/customer/{$_GET['c']}.php"))
        require "views/customer/{$_GET['c']}.php";
}
elseif (isset($_GET['s']) && isset($_SESSION['user']['id'])) // SELLER
{
    if (file_exists("views/seller/{$_GET['s']}.php"))
        require "views/seller/{$_GET['s']}.php";
}
elseif (isset($_GET['a']) && isset($_SESSION['user']['id'])) // SELLER
{
    if (file_exists("views/affiliate/{$_GET['a']}.php"))
        require "views/affiliate/{$_GET['a']}.php";
}
elseif (isset($_GET['f'])) // PUBLIC
    if (file_exists("views/front/{$_GET['f']}.php"))
        require "views/front/{$_GET['f']}.php";
    else
        require "views/front/404.php";
else
    require_once "views/front/home.php";
