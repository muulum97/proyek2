<?php 

$id = $_GET['id'];

$query = "SELECT * FROM users WHERE id='$id'";
$sql = mysqli_query($connectdb, $query);
$row = mysqli_fetch_array($sql);
if($row['gambar']!='default.png'){
	if(is_file("img/profile/".$row['gambar'])){
		unlink("img/profile/".$row['gambar']);
	}
}

$query = "DELETE from users where id='$id'";

if(mysqli_query($connectdb,$query)){
	echo "<script>alert('User berhasil dihapus!'); window.location = 'account.php?page=manageprofile';</script>";
}else{
	echo "<script>alert('User gagal dihapus!'); window.location = 'account.php?page=manageprofile';</script>";
}
?>