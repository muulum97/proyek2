<?php

$username = $_SESSION['user'];

$query = "SELECT * from users where username='$username'";
$query = mysqli_query($connectdb,$query);
$row = mysqli_fetch_array($query);
?>
<?php if(isset($warning)){ ?>
	<div id="warning">
<?php echo $warning;
echo "</div>";}?>
<div align="center"><br>
	<h3>Pesanan atas nama :</h3><br>
</div>
<img src="img/profile/<?php echo $row["foto_akun"]; ?>" alt="Gambar profil" width="200" height="200"><br>
<?php
echo "Nama Lengkap : ".$row["nama_dpn"]." ".$row["nama_blkg"]."<br>";
echo "No Telepon : ".$row["no_telepon"]."<br>";
echo "Email : ".$row["email"]."<br>";
echo "Alamat : ".$row["alamat"]."<br>"; 
?>
<br>
<a href="account.php" class="checkout"> Ubah data diri</a>
