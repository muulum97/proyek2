<?php

$kode = $_GET['kode'];
$query = "SELECT * from pesanan where kode='$kode'";
$query = mysqli_query($connectdb,$query);
$row = mysqli_fetch_array($query);
$username = $_SESSION['user'];
$query = "SELECT * from pesanan where username='$username'";
$query = mysqli_query($connectdb,$query);
$row = mysqli_fetch_array($query);
?>
<div align="center"><br>
	<h3>Pesanan atas nama :</h3><br>
</div>
<img src="img/profile/<?php echo $row["foto_akun"]; ?>" alt="Gambar profil" width="200" height="200"><br>
<?php
echo "username : ".$row["username"]."<br>";
echo "nama lengkap : ".$row["nama_dpn"]." ".$row["nama_blkg"]."<br>";
echo "no telepon : ".$row["no_telepon"]."<br>";
echo "Alamat : ".$row["alamat"]."<br>"; 
?>
<br>
<a href="account.php" class="checkout"> Ubah data diri</a>
