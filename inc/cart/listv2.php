<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

<?php $page = basename($_SERVER['SCRIPT_NAME']); ?>
  <?php foreach($css as $value){
    //echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . _SITE_ . "/$value\"/>";
    } ?>
<div align="center"><br>
	<h1>Pesanan anda</h1><br>
</div>

<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th  class="cell100 column1">No</th>
									<th  class="cell100 column2">Menu</th>
									<th  class="cell100 column3">Harga</th>
									<th  class="cell100 column4">Ukuran</th>
									<th  class="cell100 column4">Total</th>
									<th  class="cell100 column5">Delete</th>
								</tr>
							</thead>
						</table>
					</div>
				
<div class="table100-body js-pscroll">
	<table> 
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
		<tr class="row100 body">
			<td class="cell100 column1"><?php echo $no++; ?></td>
			<td class="cell100 column2"><?php echo substr($row['nama'], 0 , 30); ?></td>
			<td class="cell100 column2"><img src="img/menu/<?php echo $row["gambar"]; ?>" alt="Gambar menu" width="50" height="50"></td>
			<td class="cell100 column3"><p><?php echo "Rp".number_format($row["harga"],0,",","."); ?></p></td>
			<td class="cell100 column4"><?php echo $value['quantity']; ?></td>
			<td class="cell100 column5"><?php echo("Rp".number_format($value['quantity']*$row['harga'],0,",","."));?></td>
			<td class="cell100 column5"><a class="checkout" href="cart.php?act=delete&id=<?php echo $key; ?>">X</a></td>
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
		<tr class="row100 head">
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
	</div>
			</div>
		</div>
	</div>
	</div>
</div>
<?php
		}
?>

<!--===============================================================================================-->	
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<?php
//print_r($cart); echo "<br>";
 ?>
