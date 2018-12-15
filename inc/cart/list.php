<?php $page = basename($_SERVER['SCRIPT_NAME']); ?>
  <?php foreach($css as $value){
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . _SITE_ . "/$value\"/>";
    } ?>
<div align="center"><br>
	<h1>Pesanan anda</h1><br>
</div>

<table class="table-fill">
	<thead>
		<tr>
			<th>No</th>
			<th colspan="5" class="text-center">Menu</th>
			<th colspan="2" class="text-center">Harga</th>
			<th>Ukuran</th>
			<th colspan="2" class="text-center">Total</th>
			<th>Delete</th>
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
			<td colspan="2"><?php echo("Rp".number_format($value['quantity']*$row['harga'],0,",","."));?></td>
			<td class="text-center"><a class="checkout" href="cart.php?act=delete&id=<?php echo $key; ?>">X</a></td>
		</tr>
<?php
//}
			$totalqty = $totalqty + $value['quantity'];
			$total = ($total+($value['quantity']*$row['harga']));
			}
?>
		<tr>
			<td colspan='12' class='text-center'><h2><a href="index.php" class="checkout">+</a></h1></td>
		</tr>
		<tr>
			<th colspan="5" class="text-center"><h6>Jml</h6></th>
			<th colspan="6" class="text-center"><h6>Total*</h6></th>
			<!--th colspan="2"><h6>PPN 10%</h6></th>
			<th colspan="3" class="text-center"><h6>Grand total</h6></th-->
			<th colspan="2" class="text-center"><h6>Action</h6></th>
		</tr>
		<tr>
			<td colspan="5" class="text-center"><?php echo $totalqty; ?></td>
			<td colspan="6" class="text-center"><?php echo("Rp".number_format($total,0,",",".")); ?></td>
			<!--td colspan="2"><?php echo("Rp".number_format($total/10,0,",",".")); ?></td>
			<td colspan="3" class="text-center"><?php echo("Rp".number_format($total+($total/10),0,",",".")); ?></td-->
			<td colspan="2"><a href="checkout.php" class="checkout">Checkout</a></td>
		</tr>
	</tbody>
</table>
<div align="center">
	*Total belum termasuk Jasa Desain
</div>
<?php
		}else{
?>
		<tr><td colspan='12' class='text-center'><h1>Lihat <a href="index.php">menu</a> kami dan mulai memesan!</h1></td></tr>
		</tbody>
	</table>
<?php
		}
?>


<?php
//print_r($cart); echo "<br>";
 ?>
