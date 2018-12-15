<?php

//variable database mysql
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'proyek';

//connect ke mysql
$connectdb = mysqli_connect($host, $user, $pass, $db) or die(mysqli_error());

?>