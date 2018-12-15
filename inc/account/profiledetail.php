<?php 

if(isset($_GET['id'])){
	$id = $_GET['id'];
	$query = "SELECT * from users where id='$id'";
}else{
	$username = $_GET['username'];
	$query = "SELECT * from users where username='$username'";
}

$query = mysqli_query($connectdb,$query);
$row = mysqli_fetch_array($query);
?>
<?php
if($row){
	echo "id : ".$row['id']." | role : ".$row["role"]." | username : ".$row["username"]."<br>";
	echo "nama depan : ".$row["nama_dpn"]." | nama belakang : ".$row["nama_blkg"]."<br>";
	echo "tanggal lahir : ".FormatTanggal($row["tgl_lahir"])." | jenis kelamin : ".$row["jenis_kelamin"]."<br>";
	echo "no telepon : ".$row["no_telepon"]."<br>";
	echo "email : ".$row["email"]."<br>";
?><br>
Foto profil:<br>
<img src="img/profile/<?php echo $row["foto_akun"]; ?>" alt="Gambar profil" width="200" height="200"><br><br>
<div align="right">
	NB: Role 1 = konsumen, 0 Pengelola
</div>
<?php
}
?>