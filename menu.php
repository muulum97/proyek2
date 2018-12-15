<?php
require_once "func/core/init.php";

$title = "Panel menu";
$css = array("css/rules.css","css/style.css","css/id.css","css/admin.css");

foreach($css as $value){
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . _SITE_ . "/$value\"/>";
    }

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
				case 'createmenu':
					include 'inc/menu/admincreate.php';
					break;
				
				case 'managemenu':
					include 'inc/menu/adminmanage.php';
					break;
				
				case 'updatemenu':
					include 'inc/menu/adminupdate.php';
					break;
				
				case 'deletemenu':
					include 'inc/menu/admindelete.php';
					break;
				
				default:
					include 'inc/menu/adminmanage.php';
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