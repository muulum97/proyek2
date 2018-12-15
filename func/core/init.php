<?php

//memulai session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//define url web
//define('_SITE_', 'http://localhost:8080/proyek2ku');

//require function
require_once "func/db.php";
require_once "func/user.php";
require_once "func/menu.php";
require_once "func/config.php";

//set base url _SITE_
$link = base_url();
define('_SITE_',$link);

?>