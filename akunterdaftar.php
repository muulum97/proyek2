<?php 

require_once "func/core/init.php";

$title = "Akun anda";
$css = array("css/rules.css","css/style.css","css/id.css","css/admin.css");
$error='';
$success = '';
$warning = '';

if( !isset($_SESSION['user'])){
	$_SESSION['msg'] = 'Silahkan login untuk mengakses halaman tersebut';
	header('Location: login.php');
}

if(!isset($_GET['page'])){
  $_GET['page'] = "updateprofile";
}

//require_once "inc/headerv2.php";
?>


      <?php 
      $page = $_GET['page'];
      switch ($page) {
        case 'manageprofile':
          include 'inc/account/profilemanagev2.php';
          break;
        
        default:
          include 'inc/account/profileupdatev2.php';
          break;
      }
      ?>

<?php
//require_once "inc/footerv2.php"
?>