<?php
require_once "func/core/init.php";

if(!isset($_GET['act'])){
	$_GET['act'] = "list";
}

$title = "Pesanan anda";
$css = array("css/rules.css","css/style.css","css/id.css","css/admin.css");

require_once "inc/headerv2.php";

?>
			<?php 
			$page = $_GET['act'];
			switch ($page) {
				case 'add':
					include 'inc/cart/addto.php';
					break;
				case 'list':
					include 'inc/cart/list.php';
					break;
				case 'update':
					include 'inc/cart/update.php';
					break;
				case 'delete':
					include 'inc/cart/deleteitem.php';
					break;
				default:
					include 'inc/cart/list.php';
					break;
			}
			?>
<br>
<br>
<?php
require_once "inc/footerv2.php"
?>