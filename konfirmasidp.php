<?php
	session_start();
	if (empty($_SESSION['user'])) {
	header("location:index.php"); // jika belum login, maka dikembalikan ke file index.php
	}
	else 
	{
?>

<?php

//koneksi ke database
include "func/core/init.php";

//menangkap posting dari field input form
if( isset($_POST['submit']) ){
$no_order    = $_POST['no_order'];
$nama		 = $_POST['nama'];
$transfer    = $_POST['transfer'];
$bank        = $_POST['bank'];

$namafolder="img/pembayaran/"; //folder tempat menyimpan file
if (!empty($_FILES["filegbr"]["tmp_name"]))
{
    $jenis_gambar=$_FILES['filegbr']['type']; //memeriksa format gambar
    if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
    {           
        $lampiran = $namafolder . basename($_FILES['filegbr']['name']);  
        
        //mengupload gambar dan update row table database dengan path folder dan nama image		
        if (move_uploaded_file($_FILES['filegbr']['tmp_name'], $lampiran)) {
            
			$query_insert = "INSERT INTO dataimage (no_order,nama,transfer,bank,image)
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
?>


<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
 	<div id="header">
		<center><h1>Konfirmasi Uang Muka</h1></center>
	</div>

	<div class   ="row">
	<div class   ="col-md-4"></div>
	<div class   ="col-md-4">
	<form action ="" method="post" enctype="multipart/form-data" name="form1" id="form1">

		<div class   ="form-group">
			<label >Nomer Order</label>
			<input type ="text" class="form-control" name="no_order">
		</div>
					<div class="form-group">
								<label>Nama</label>
								<input type="text" class="form-control" name="nama">
							</div> 

					<div class ="form-group">
						<label>Jumlah Transfer</label>
						<input type="text" class="form-control" name="transfer"><div style="text-align: center;">*jumlah tf sesuai dengan jumlah yang harus dibayar</div>
						
					</div>

							<div class="form-group">
								<label>Bank</label>
								<input type="text" class="form-control" name="bank">
							</div>

									<div class="form-group">
										<p>Pilih File Gambar : <br/><input type='file' name='filegbr' id='Filegambar'></p>  
									</div>

											<div class="form-group">
												<input type="submit" name="submit" value="Upload" />
											</div>

													<div class='alert alert-info' role='alert'>
														<center>Lakukan pembayaran melalui rekening :</center>
														<center> BNI. 497060428 A/N Raja Cetak</center>
													</div>

							</form>
							<center>
	<div id="menu">
			<a class="selected" href="index.php">Kembali ke Menu</a>
	</div>
</center>
						</div>
					<div class="col-md-4"></div>
				</div>
			</div>
		<?php } ?>
	</body>
</html>