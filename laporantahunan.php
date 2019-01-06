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

//require_once "inc/headerv2.php";
?>

      <?php
      $p = $_GET['p'];
      switch ($p) {
        case 'listtahunan':
        include 'inc/laporan/listtahunan.php';
        break;

        default:
        include 'inc/laporan/listtahunan.php';
        break;
      }
      ?>
<br>
<br>
<?php
//require_once "inc/footerv2.php"
?>