<?php
$no_order = $_GET['no_order'];
$conn = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($conn, "proyek");
$sqlstr = "delete from dataimage where no_order='$no_order'";
$tampilkan = mysqli_query($conn,$sqlstr);
if($tampilkan)
{
	header("Location: order.php?p=konfirmasi");
}	
else
{
	$error ="Data Gagal Di Delete";
}
mysql_close($conn);
?>