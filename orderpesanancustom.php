<?php
require_once "func/core/init.php";

$title = "Pesanan saya";
$css = array("css/rules.css","css/style.css","css/id.css","css/admin.css");
$error='';
$user = $_SESSION['user'];

if(!isset($_SESSION['user'])){
  $_SESSION['msg'] = 'Silahkan login untuk mengakses halaman tersebut';
	header('Location: login.php');
}

if(!isset($_GET['p'])){
  $_GET['p'] = "view";
}

require_once "inc/headerv2.php";
?>

      <?php
      $p = $_GET['p'];
      switch ($p) {
        case 'details':
        include 'inc/orderpesanancustom/details.php';
        //include 'inc/order/accountdetail.php';
        break;

        case 'view':
        include 'inc/orderpesanancustom/list.php';
        break;

        case 'cancel':
        include 'inc/orderpesanancustom/cancel.php';
        break;

        case 'prosesorder':
        include 'inc/orderpesanancustom/prosesorder.php';
        break;

        case 'prosescetak':
        include 'inc/orderpesanancustom/prosescetak.php';
        break;

        case 'email':
        include 'inc/orderpesanancustom/send_mail.php';
        break;

        case 'konfirmasi':
        include 'inc/orderpesanancustom/hasil.php';
        break;

        case 'konfirmasiselesai':
        include 'inc/orderpesanancustom/konfirmasiselesai.php';
        break;

        case 'selesai':
        include 'inc/orderpesanancustom/selesai.php';
        break;

        default:
        include 'inc/orderpesanancustom/list.php';
        break;
        
      }
      ?>
<br>
<br>
<?php
require_once "inc/footerv2.php"
?>
