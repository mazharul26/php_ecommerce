<?php

$title = "Media Center";

if (isset($_GET['f']))
    $title = ucfirst($_GET['f']) . " - Media Center";