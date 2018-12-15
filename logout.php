<?php 

require_once "func/core/init.php";

session_unset();
session_destroy();
header('Location: index.php')
?>