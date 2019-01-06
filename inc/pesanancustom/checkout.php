<?php 
$user = $_SESSION['user'];

$query = "SELECT * from users where username='$user'";
$query = mysqli_query($connectdb,$query);
$row=mysqli_fetch_array($query);
$email=$row['email'];

if($_POST['agree'] == true){
    $panjang    = $_POST['panjang'];
    $lebar		 = $_POST['lebar'];
    $ukuran    = $_POST['ukuran'];
    //$total    = $_POST['total'];
    $total = 20000 * $ukuran;
    $tanggal = date('Y-m-d H:i:s');
    $deskripsi = $_POST['deskripsi'];
    $namafolder="img/pesanancustom/"; //folder tempat menyimpan file

if($row['nama_dpn']==""||$row['alamat']==""||$row['no_telepon']==""||$row['email']==""){
  $warning = "Mohon lengkapi data diri anda terlebih dahulu";
  }else{

    if (!empty($_FILES["filegbr"]["tmp_name"]))
{
    $jenis_gambar=$_FILES['filegbr']['type']; //memeriksa format gambar
    if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
    {           
        $gambar = $namafolder . basename($_FILES['filegbr']['name']);  
        
        //mengupload gambar dan update row table database dengan path folder dan nama image		
        if (move_uploaded_file($_FILES['filegbr']['tmp_name'], $gambar)) {
            
			$query_insert = "INSERT INTO pesanancustom (username,email,panjang,lebar,ukuran,total,status,tanggal,gambar,deskripsi)
			VALUES ('$user','$email','$panjang','$lebar','$ukuran','$total','Pesanan diterima','$tanggal','$gambar','$deskripsi')";
			$insert = mysqli_query($connectdb,$query_insert);
			
			echo "<script>alert('Menu berhasil dibuat!'); window.location = 'pesanancustom.php';</script>";
			
			//Jika gagal upload, tampilkan pesan Gagal		
        } else {
           echo "<script>alert('Gambar gagal dikirim!'); window.location = 'pesanancustom.php';</script>";
        }
   } else {
        echo "<script>alert('Jenis gambar yang anda kirim salah. Harus .jpg .gif .png!'); window.location = 'pesanancustom.php';</script>";
   }
} else {
    echo "<script>alert('Anda belum memilih gambar!'); window.location = 'pesanancustom.php';</script>";
}
}
    //$query = "INSERT INTO pesanancustom (username, email, total, status, tanggal, deskripsi) VALUES ('$user', '$email', '$total', 'Pesanan diterima', '$tanggal','$deskripsi')";
    }
 ?>