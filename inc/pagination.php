<?php
$item = 6; //batasan item per halaman

if (isset($_GET['p'])) {
	$page = $_GET['p'];
}else{
	$page = 1;
}

if($page>1){
	$mulai = ($page * $item) - $item;
}else{
	$mulai = 0;
}

if(isset($_GET['query'])){
	$query = "SELECT * FROM menu WHERE stok=1 and nama LIKE'%".$cari."%'  LIMIT $mulai, $item";
	$query = mysqli_query($connectdb,$query);
	$total = "SELECT * from menu WHERE stok=1 and nama LIKE'%".$cari."%'";
	$total = mysqli_query($connectdb,$total);
}else{
	$query = "SELECT * from menu WHERE stok=1 LIMIT $mulai, $item";
	$query = mysqli_query($connectdb,$query);
	$total = "SELECT * from menu WHERE stok=1";
	$total = mysqli_query($connectdb,$total);
}

$total = mysqli_num_rows($total);
$halaman = ceil($total/$item);
?>