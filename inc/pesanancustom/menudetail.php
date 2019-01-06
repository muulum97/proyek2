<div align="center"><br>
	<h3>Produk yang dipesan :</h3><br>
</div>

<!--table class="table-fill">
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
			<th colspan="3" class="text-center"><h6>Biaya Desain</h6></th>
			<th colspan="3" class="text-center"><h6>Grand total</h6></th>
		</tr>
		<tr>
			<td><?php echo $totalqty; ?> Meter</td>
			<td colspan="3"><?php echo("Rp".number_format($total,0,",",".")); ?></td>
			<td colspan="3">Rp20.000</td>
			<td colspan="3" class="text-center"><?php echo("Rp".number_format($total+20000,0,",",".")); ?></td>
		</tr>
		<tr>
			<td colspan="10" class="text-center">
				<form action="" method="post">
					<textarea rows="" cols="50" name="deskripsi"> isi Deskripsi Produk pesanan disini ...
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
</table-->
<?php
//print_r($cart); echo "<br>";
 ?>

<!--?php

//menangkap posting dari field input form
if( isset($_POST['submit']) ){
$panjang    = $_POST['panjang'];
$lebar		 = $_POST['lebar'];
$ukuran    = $_POST['ukuran'];
$total    = $_POST['total'];
$status    = $_POST['status'];
$tanggal    = $_POST['tanggal'];
$deskripsi        = $_POST['deskripsi'];

$namafolder="img/pembayaran/"; //folder tempat menyimpan file
if (!empty($_FILES["filegbr"]["tmp_name"]))
{
    $jenis_gambar=$_FILES['filegbr']['type']; //memeriksa format gambar
    if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
    {           
        $lampiran = $namafolder . basename($_FILES['filegbr']['name']);  
        
        //mengupload gambar dan update row table database dengan path folder dan nama image		
        if (move_uploaded_file($_FILES['filegbr']['tmp_name'], $lampiran)) {
            
			$query_insert = "INSERT INTO pesanancustom (no_order,nama,transfer,bank,image)
			VALUES ('$no_order','$nama','$transfer','$bank','$lampiran')";
			$insert = mysqli_query($connectdb,$query_insert);
			
			echo "Data Berhasil di Input";
			
			//Jika gagal upload, tampilkan pesan Gagal		
        } else {
           echo "Gambar gagal dikirim";
        }
   } else {
        echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
   }
} else {
    echo "Anda belum memilih gambar";
}
}
?-->

<script src="assets/js/jquery.js"></script>
 	<div id="header">
		<center><h1>Konfirmasi Uang Muka</h1></center>
	</div>

	<div class   ="row">
	<div class   ="col-md-4"></div>
	<div class   ="col-md-4">
	<form action ="" method="post" enctype="multipart/form-data" name="form1" id="form1">

					<div class="form-group">
								<label>Panjang Banner</label>
								<input class="form-control" type="number" step="any" min="1" name="panjang" id="panjang">
							</div> 

					<div class ="form-group">
						<label>Lebar Banner</label>
						<input class="form-control" type="number" step="any" min="1" name="lebar" id="lebar">
					</div>
							<div class="form-group">
								<label>Total Ukuran</label>
								<input class="form-control" type="text" name="ukuran" id="qty" placeholder="1" size="1" readonly>
								<div style="text-align: center;">*Total harga ukuran x Rp20.000</div>
							</div>
							<div class="form-group">
								<label>Deskripsi Produk</label>
								<textarea cols="30" name="deskripsi"> isi Deskripsi Produk pesanan disini ...</textarea>
							</div>
									<div class="form-group">
										<p>Pilih File Gambar : <br/><input type='file' name='filegbr' id='Filegambar'></p>  
									</div>

											<div class="form-group">
												<input type="submit" name="agree" value="Pesan" />
											</div>
							</form>
						</div>
					<div class="col-md-4"></div>
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