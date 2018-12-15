<?php $page = basename($_SERVER['SCRIPT_NAME']); ?>
  <?php foreach($css as $value){
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . _SITE_ . "/$value\"/>";
    } ?>

<br>
<div align="center">
<?php
if(isset($_GET['query'])){
	$cari = escape($_GET['query']);
	echo "Hasil pencarian : <b>".$_GET['query']."</b>";
}else{
	//echo "<h1>Our menu</h1>";
	echo "<h1>Kami menyediakan Pizza yang lezat dan berbagai macam minuman</h1>";
}
?>
</div>
<br>

<form action="" method="get" class="search">
	<div class="form__field">
		<input type="search" name="query" placeholder="What are you looking for?" class="form__input">
		<input type="submit" value="Cari" class="button">
	</div>
</form>
<br>
<div id="placeholder">
<?php
include 'inc/pagination.php';
if(mysqli_num_rows($query)>0){
	while ($row=mysqli_fetch_array($query)){
 ?>
	<div class="box">
		<img src="img/menu/<?php echo $row["gambar"]; ?>" alt="Gambar menu" width="250" height="200">
		<p><a href="details.php?kode=<?php echo $row["kode"]; ?>"><?php echo $row["nama"]." Rp ".number_format($row["harga"],0,",","."); ?></a></p>
		<!--form method="get" action="cart.php"><p>
			<input type="hidden" name="act" value="add">
			<input type="hidden" name="id" value="<?php echo $row["kode"]; ?>">
			<input type="submit" value="Order"> <input type="text" name="qty" placeholder="1" size="2"> Pcs
		</p></form-->
	</div>
<?php
	}
}else{
?>
<div align="center"><br><br>
	<h1>Tidak ditemukan hasil</h1>
</div>
<?php
}
?>
<?php
/*
	<div class="box">
		<img src="img/250x200.png">
		<p>DETAIL</p>
		<p class="order">PESAN</p>
	</div>
*/
?>
</div>


<div align="center">
<?php
if(isset($_GET['query'])){
	for ($i=1; $i<=$halaman ; $i++){ ?>
<a href="?p=<?php echo $i; ?>&query=<?php echo $cari ?>" style="background-color: #fff; padding: 5px 10px;"><?php echo $i; ?></a>
<?php
	}
}else{
	for ($i=1; $i<=$halaman ; $i++){ ?>
<a href="?p=<?php echo $i; ?>" style="background-color: #fff; padding: 5px 10px;"><?php echo $i; ?></a>
<?php
	}
}
?>
</div>