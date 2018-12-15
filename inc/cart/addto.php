<?php
if(isset($_GET) & !empty($_GET)){
	$id = $_GET['id'];

	if(isset($_GET['qty']) & !empty($_GET['qty']) ){
		$quant = $_GET['qty'];
	}else{
		$quant = 1;
	}

	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id] = array("quantity" => $_SESSION['cart'][$id]['quantity']+$quant);
	}else{
		$_SESSION['cart'][$id] = array("quantity" => $quant);
	}
	header('location: cart.php');

}else{
	header('location: index.php');
}
//print_r($_SESSION['cart']);
?>