<div align="center"><br>
	<h3>Produk yang dipesan :</h3><br>
</div>

<table class="table-fill">
	<thead>
		<tr>
			<th>No</th>
			<th colspan="5" class="text-center">Produk</th>
			<th colspan="2" class="text-center">Price</th>
			<th>Quantity</th>
			<th colspan="2" class="text-center">Total</th>
		</tr>
	</thead>
	<tbody>
		<?php

		$total = 0;
		$totalqty = 0;
		$no = 1;

		if(!empty($_SESSION['cart'])){
			$cart = $_SESSION['cart'];

			foreach ($cart as $key => $value) {
				$query = "SELECT * FROM menu WHERE kode=$key";
				$sql = mysqli_query($connectdb, $query);
				$row = mysqli_fetch_assoc($sql);
		//if($query){
		//	while ($row=mysqli_fetch_array($query)){
?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td colspan="4"><?php echo substr($row['nama'], 0 , 30); ?></td>
			<td><img src="img/menu/<?php echo $row["gambar"]; ?>" alt="Gambar menu" width="50" height="50"></td>
			<td colspan="2"><p><?php echo "Rp".number_format($row["harga"],0,",","."); ?></p></td>
			<td class="text-center"><?php echo $value['quantity']; ?></td>
			<td colspan="2"><?php echo("Rp".number_format($row['harga']*$value['quantity'],0,",","."));?></td>
		</tr>
<?php
//}
			$totalqty = $totalqty + $value['quantity'];
			$total = ($total+($row['harga']*$value['quantity']));
			}
?>
		<tr>
			<th><h6>Jml</h6></th>
			<th colspan="3" class="text-center"><h6>Total</h6></th>
			<th colspan="2" class="text-center"><h6>Biaya Desain</h6></th>
			<th colspan="2" class="text-center"><h6>Grand total</h6></th>
		</tr>
		<tr>
			<td><?php echo $totalqty; ?> Meter</td>
			<td colspan="3"><?php echo("Rp".number_format($total,0,",",".")); ?></td>
			<td colspan="2">Rp20.000</td>
			<td colspan="2" class="text-center"><?php echo("Rp".number_format($total+20000,0,",",".")); ?></td>
		</tr>
		<tr>
			<td colspan="10" class="text-center">
				<form action="" method="post">
					<textarea rows="4" cols="50" name="deskripsi">
isi Deskripsi Produk disini ...
					</textarea>
						<br>
						<br>
						<input type="submit" name="agree" value="Pesan">
				</form>
			</td>
		</tr>
<?php
		}else{
			echo "<tr><td colspan='12' class='text-center'>Anda belum memasukan barang ke pesanan</td></th>";
		}
?>

	</tbody>
</table>
<?php
//print_r($cart); echo "<br>";
 ?>
