<?php 

$kode = $_GET['kode'];

$query = "SELECT * FROM menu WHERE kode='$kode'";
$sql = mysqli_query($connectdb, $query);
$row = mysqli_fetch_array($sql);
if($row['gambar']!='default.jpg'){
	if(is_file("img/menu/".$row['gambar'])){
		unlink("img/menu/".$row['gambar']);
	}
}

$query = "DELETE from menu where kode='$kode'";

if(mysqli_query($connectdb,$query)){
	echo "<script>alert('Menu berhasil dihapus!'); window.location = 'menu.php';</script>";
}else{
	echo "<script>alert('Menu gagal dihapus!'); window.location = 'menu.php';</script>";
}

?>