<?php
require_once "func/core/init.php";

$title = "Laporan transaksi";
$css = array("css/rules.css","css/style.css","css/id.css","css/admin.css");
$error='';
$user = $_SESSION['user'];

if(!isset($_SESSION['user'])){
  $_SESSION['msg'] = 'Silahkan login untuk mengakses halaman tersebut';
	header('Location: login.php');
}

if(!isset($_GET['p'])){
  $_GET['p'] = "list";
}

require_once "inc/headerv2.php";
?>

<div class="container">
  <div class="home">
    <div class="contentadmin">
      <?php
      $p = $_GET['p'];
      switch ($p) {
        case 'listbulanan':
        include 'inc/laporan/listbulanan.php';
        break;

        default:
        include 'inc/laporan/listbulanan.php';
        break;
      }
      ?>
    </div>
	</div>
</div>

<?php
require_once "inc/footerv2.php"
?>