<?php
require_once "func/core/init.php";

$title = "Panel admin";
$css = array("css/rules.css","css/style.css","css/id.css","css/admin.css");

if( !isset($_SESSION['user'])){
	$_SESSION['msg'] = 'Silahkan login untuk mengakses halaman tersebut';
	header('Location: login.php');
}

if(!isset($_GET['page'])){
	$_GET['page'] = "read";
}

require_once "inc/headerv2.php";

if(cek_role($_SESSION['user'])<1){
?>

<div class="container">
	<div class="home">
		<div class="contentadmin">
			<?php 
			$page = $_GET['page'];
			switch ($page) {
				case 'adminmenu':
					include 'inc/admin/menu.php';
					break;
				
				case 'managemenu':
					include 'inc/admin/menumanage.php';
					break;
					break;
				
				default:
					include 'inc/admin/menu.php';
					break;
			}
			?>
		</div>
	</div>
</div>

<?php }else{ ?>

<div class="home">
	<div align="center" style="background-color:red; font-size: 40px;"><br><p>ANDA TIDAK DIIJINKAN MENGAKSES HALAMAN INI</p><br>
	</div>
</div>

<?php }

require_once "inc/footerv2.php"
?>