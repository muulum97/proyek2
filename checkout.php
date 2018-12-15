<?php

require_once "func/core/init.php";

$title = "Konfirmasi pesanan";
$css = array("css/rules.css","css/style.css","css/id.css","css/admin.css");
    foreach($css as $value){
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . _SITE_ . "/$value\"/>";
    }
$error='';
$user = $_SESSION['user'];
$cart = $_SESSION['cart'];

if(!isset($_SESSION['user'])){
    if(isset($_SESSION['cart'])){
        $_SESSION['msg'] = 'Silahkan login untuk melanjutkan checkout';
    }else{
        $_SESSION['msg'] = 'Silahkan login untuk mengakses halaman tersebut';
    }
	header('Location: login.php');
}

if(isset($_POST) & !empty($_POST)){
    include 'inc/checkout/checkout.php';

}

require_once "inc/headerv2.php";
?>

<div class="container">
	<div class="home">
    	<div class="contentadmin">
    		<div align="center"><br>
    			<h2>Konfirmasi pemesanan</h2></div>
                    <?php include 'inc/checkout/accountdetail.php'; ?>
                    <?php include 'inc/checkout/menudetail.php'; ?>

        </div>
	</div>
</div>
<?php
require_once "inc/footerv2.php"
?>
