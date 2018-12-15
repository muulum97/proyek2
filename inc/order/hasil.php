<?php $page = basename($_SERVER['SCRIPT_NAME']); ?>
  <?php foreach($css as $value)
  {
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . _SITE_ . "/$value\"/>";
  }
?>

<body>
<?php
 if (empty($_SESSION['user']))
 {
 	header("location:index.php"); //jika belum login, maka dikembalikan ke file index.php
 }
 	else 
 {
?>

<div id="menu">
	<a href="order.php">Kembali</a>
</div>

<table class="table-fill">
	<tr>
		<th>Nomer Order</th>
		<th>Nama</th>
		<th>Transfer</th>
		<th>Bank</th>
		<th>Image</th>
		<th>Action</th>
	</tr>

<?php
//include "koneksi-database.php";
//include "func/core/init.php";
$data = "SELECT * from dataimage";
$bacadata = mysqli_query($connectdb, $data);
while($select_result = mysqli_fetch_array($bacadata))
{
$no_order    = $select_result['no_order'];
$nama		 = $select_result['nama'];
$transfer    = $select_result['transfer'];
$bank        = $select_result['bank'];
$image       = $select_result['image'];



echo"<tr> 
		<td>$no_order</td>
		<td>$nama</td>
		<td>$transfer</td>
		<td>$bank</td>
		<td><img src='$image' height='150'></td>

	 ";
//ganti imagesup dengan nama folder dimana anda menempatkan image hasil upload
?>
<td>
	<a href="delete_gambar.php?no_order=<?php echo $select_result["no_order"] ?>">Delete</a>
</td>
</tr>
<?php
}
?>
</table>
</div>
</div>
<?php
 } 
 ?>
</body>
</html>