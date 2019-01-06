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
        include 'inc/order/details.php';
        //include 'inc/order/accountdetail.php';
        break;

        case 'view':
        include 'inc/order/list.php';
        break;

        case 'cancel':
        include 'inc/order/cancel.php';
        break;

        case 'prosesdesain':
        include 'inc/order/prosesdesain.php';
        break;

        case 'prosescetak':
        include 'inc/order/prosescetak.php';
        break;

        case 'email':
        include 'inc/order/send_mail.php';
        break;

        case 'konfirmasi':
        include 'inc/order/hasil.php';
        break;

        case 'konfirmasiselesai':
        include 'inc/order/konfirmasiselesai.php';
        break;

        case 'selesai':
        include 'inc/order/selesai.php';
        break;

        default:
        include 'inc/order/list.php';
        break;
        
      }
      ?>
<br>
<br>
<?php
require_once "inc/footerv2.php"
?>
