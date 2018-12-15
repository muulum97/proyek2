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

require_once "inc/headerv2.php";
?>

<div class="container">
	<div class="home">
    <div class="contentadmin">
      <?php 
      $page = $_GET['page'];
      switch ($page) {
        case 'manageprofile':
          include 'inc/account/profilemanage.php';
          break;

        case 'updateprofile':
          include 'inc/account/profileupdate.php';
          break;

        case 'editprofile':
          include 'inc/account/profileedit.php';
          break;
        
        case 'detailprofile':
          include 'inc/account/profiledetail.php';
          break;
        
        case 'deleteprofile':
          include 'inc/account/profiledelete.php';
          break;
        
        default:
          include 'inc/account/profileupdate.php';
          break;
      }
      ?>
    </div>
	</div>
</div>

<?php
require_once "inc/footerv2.php"
?>