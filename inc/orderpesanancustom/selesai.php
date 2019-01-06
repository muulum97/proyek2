<?php
foreach($css as $value){
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . _SITE_ . "/$value\"/>";
  }

if(isset($_GET['kode']) & !empty($_GET['kode'])){
	$kode = $_GET['kode'];
}else{
	header('location: orderpesanancustom.php');
}
if(cek_role($_SESSION['user'])>=1){
	header('location: orderpesanancustom.php');
}


if(isset($_POST) & !empty($_POST)){
		$pesan = "Pesanan sudah selesai";
		$kode = $_POST['kode'];
		$tanggal = date('Y-m-d H:i:s');

		//$query = "INSERT INTO trackpesanan (kode_pesanan, status, pesan, tanggal) VALUES ('$kode', 'Pesanan selesai', '$pesan', '$tanggal')";
		//$query = mysqli_query($connectdb,$query);

		//if($query){
				$query1 = "UPDATE pesanancustom SET status='Pesanan selesai', pesan='$pesan' WHERE kode=$kode";
				if(mysqli_query($connectdb, $query1)){
					header('location: orderpesanancustom.php');
				}
			//}
}

$query = "SELECT * FROM pesanancustom WHERE kode=$kode";
$query = mysqli_query($connectdb, $query);
$sql = mysqli_fetch_assoc($query)
?>
<div align="center">
	<br>
	<h2>
	<?php
	echo "Konfirmasi selesaikan pesanan ".$sql['username'];
	?>
	</h2>
	<br>
</div>

<table class="table-fill">
	<thead>
		<tr>
			<th>Username</th>
			<th colspan="2">Tanggal</th>
			<th colspan="2">Status</th>
		</tr>
	</thead>
	<tbody>
<?php
$query = "SELECT * FROM pesanancustom WHERE kode=$kode";
$query = mysqli_query($connectdb, $query);
while($row = mysqli_fetch_assoc($query)){
?>
  		<tr>
		  	<td><?php echo $row['username']; ?></td>
  			<td colspan="2"><?php echo $row['tanggal']; ?></td>
  			<td colspan="2"><?php echo $row['status']; ?></td>
      </tr>
<?php
}

//$orditmsql = "SELECT * FROM itempesanan i JOIN menu m WHERE i.kode_pesanan=$kode AND i.kode=m.kode";
//$orditm = mysqli_query($connectdb, $orditmsql);
$no = 1;
?>
		<tr>
			<th>No</th>
			<th>No Order</th>
			<th colspan="2" class="text-center">Produk</th>
		</tr>
<?php
//while($orditmr = mysqli_fetch_assoc($orditm)){
?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $sql['kode']; ?></td>
			<td colspan="2"><img src="<?php echo $sql["gambar"]; ?>" alt="Gambar menu" width="50" height="50"></td>
		</tr>
<?php
//}
?>
		<tr>
			<th colspan="2" class="text-center"><h6>Total</h6></th>>
			<th class="text-center" colspan="2"><h6>Biaya Desain</h6></th>
			<th colspan="2" class="text-center"><h6>Grand total</h6></th>
    </tr>
		<tr>
			<td colspan="2"><?php echo("Rp".number_format($sql['total'],0,",",".")); ?></td>
			<td colspan="2">Rp20.000</td>
			<td colspan="2" class="text-center"><?php echo("Rp".number_format($sql['total']+20000,0,",",".")); ?></td>
		</tr>
  	</tbody>
  </table>
<br>
<div align="center">
	<form action="" method="post">
		<input type="hidden" name="kode" value="<?php echo $kode; ?>" />
		<input type="submit" value="Selesaikan pesanan" />
	</form>
</div>