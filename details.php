<?php

require_once "func/core/init.php";

$title = "Home";
$css = array("css/rules.css","css/style.css","css/id.css");

foreach($css as $value)
{
	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . _SITE_ . "/$value\"/>";
}

require_once "inc/headerv2.php";

$kode = $_GET['kode'];
$query = "SELECT * from menu where kode='$kode'";
$query = mysqli_query($connectdb,$query);
$row=mysqli_fetch_array($query);
?>
<script src="assets/js/jquery.js"></script>
<div class="container">
	<div class="home">
		<?php //echo $row["nama"]." | Rp".number_format($row["harga"],0,",","."); ?>
		<div id="placeholder">
			<div class="box">
				<img src="img/menu/<?php echo $row["gambar"]; ?>" alt="Gambar menu" width="400" height="400"><br>
			</div>
			<div class="box">
				<p class="detailtitle">
<?php
				echo $row["nama"]."<br>";	
?>
				</p>
				<p class="detail">
<?php
				echo "Category : ".$row["tipe"]." | desc :<br>".$row["desc_menu"]."<br><br>";
				echo "Rp".number_format($row["harga"],0,",",".")."<br><br>";
?>
				<form method="get" action="cart.php">
					<input type="hidden" name="act" value="add">
					<input type="hidden" name="id" value="<?php echo $row["kode"]; ?>">
					<p>Panjang : <input type="number" step="any" min="1" name="panjang" id="panjang">
					<p>Lebar :   <input type="number" step="any" min="1" name="lebar" id="lebar">
					<p>Total Ukuran :
					<input type="text" name="qty" id="qty" placeholder="1" size="1" Readonly>
					<input type="submit" value="Order"></p>
				</form>
				</p>
			</div><br>
		</div>
	</div>
</div>

<script type="text/javascript">
 $("#panjang").keyup(function(){
 total = $("#panjang").val()* $("#lebar").val();
 $("#qty").val(total);
 });
 
$("#lebar").keyup(function(){
 total = $("#panjang").val()* $("#lebar").val();
 $("#qty").val(total);
 });
 
</script>

<?php
require_once "inc/footerv2.php"
?>