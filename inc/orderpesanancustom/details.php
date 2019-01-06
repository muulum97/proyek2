<?php $page = basename($_SERVER['SCRIPT_NAME']); ?>
  <?php foreach($css as $value){
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . _SITE_ . "/$value\"/>";
    } ?>

<?php
if(isset($_GET['kode']) & !empty($_GET['kode'])){
	$kode = $_GET['kode'];
}else{
	header('location: order.php');
}
if(cek_role($_SESSION['user'])<1){
	$ordsql = "SELECT * FROM pesanancustom WHERE kode='$kode'";
}else{
	$ordsql = "SELECT * FROM pesanancustom WHERE kode='$kode' AND username='$user'";
}
$ordsql =  mysqli_query($connectdb,$ordsql);
if(mysqli_num_rows($ordsql)<=0){
	header('location: order.php');
}
$ordsql = mysqli_fetch_assoc($ordsql);
?>
<div align="center">
	<br>
	<h2><?php
	if(cek_role($_SESSION['user'])<1){
		echo "Detail pesanan ".$ordsql['username'];
	}else{
		echo "Detail pesanan saya";
	}
	?></h2>
	<br>
</div>
<?php


//$orditmsql = "SELECT * FROM itempesanan i JOIN menu m WHERE i.kode_pesanan=$kode AND i.kode=m.kode";
//$orditm = mysqli_query($connectdb, $orditmsql);
$tracksql = "SELECT * FROM pesanancustom WHERE kode=$kode";
$track = mysqli_query($connectdb, $tracksql);
$track = mysqli_fetch_array($track);
$no = 1;
?>

<table class="table-fill">
	<thead>
		<tr>
			<th>No</th>
			<th>No Order</th>
			<th colspan="2" class="text-center">Produk</th>
			<th class="text-center"><h6>Status</h6></th>
			<th class="text-center"><h6>Total</h6></th>
			<th class="text-center"><h6>Biaya Desain</h6></th>
		</tr>
	</thead>
	<tbody>
<?php
///while($orditmr = mysqli_fetch_assoc($orditm)){
?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $track['kode']; ?></td>
			<td colspan="2"><img src="<?php echo $track["gambar"]; ?>" alt="Gambar menu" width="50" height="50"></td>
			<td><?php echo $ordsql['status']; ?></td>
			<td><?php echo("Rp".number_format($ordsql['total'],0,",",".")); ?></td>
			<td>20.000</td>
		</tr>
<?php
//}
?>

		<tr>
			<th class="text-center"><h6>Grand total</h6></th>
			<th class="text-center"><h6>Tanggal pesanan</h6></th>
			<th class="text-center" colspan="3"><h6>Deskripsi</h6></th>
		</tr>
		<tr>
			<td class="text-center"><?php echo("Rp".number_format($ordsql['total']+20000,0,",",".")); ?></td>
			<td><?php echo $ordsql['tanggal']; ?></td>
			<td colspan="3"><?php echo $ordsql['deskripsi']; ?></td>
		</tr>

	</tbody>
</table>
<br>

<?php
if($ordsql['status'] == "Pesanan diterima"){ ?>
<form action="<?php echo _SITE_ ?>konfirmasidp.php">
<button type="submit" value="Submit">Konfirmasi Pembayaran</button>
</form>
<?php }
?>

<br>
<?php
if($track['status']=="Dibatalkan"){
	echo "<br>Alasan dibatalkan : ";
}
echo $track['pesan']."<br>";
?>