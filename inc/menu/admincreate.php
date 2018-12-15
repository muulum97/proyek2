<?php

if( isset($_POST['send']) ){
	$kode = escape($_POST['kode']);
	$nama = escape($_POST['nama']);
	$tipe = escape($_POST['tipe']);
	$harga = escape($_POST['harga']);
  $gambar = escape($_FILES['gambar']['name']);
  $tmp = $_FILES['gambar']['tmp_name'];
	$desc = escape($_POST['desc']);

  $fotobaru = date('dmYHis').$gambar;
  $gambar = "img/menu/".$fotobaru;

  if(!empty($_FILES['gambar']['name'])){
    // Proses upload
    // Cek apakah gambar berhasil diupload atau tidak
    if(move_uploaded_file($tmp, $gambar)){
      // Proses simpan ke Database
      $query="INSERT INTO menu VALUES
      ('$kode','$nama','$tipe','$harga','$desc','$fotobaru','1')";
    }
  }else{
      // Proses simpan ke Database
      $query="INSERT INTO menu VALUES
      ('$kode','$nama','$tipe','$harga','$desc','default.jpg','1')";
  }


    // Eksekusi/ Jalankan query
    // Cek jika proses simpan ke database sukses atau tidak
    if(mysqli_query($connectdb,$query)){
      // Jika Sukses, Lakukan :
      echo "<script>alert('Menu berhasil dibuat!'); window.location = 'menu.php?page=managemenu';</script>";
    }else{
      // Jika Gagal simpan ke database, Lakukan :
      echo "<script>alert('Menu gagal dibuat!'); window.location = 'menu.php?page=managemenu';</script>";
    }
  }

?>
<div class="notif"></div>
<form action="" method="POST" enctype="multipart/form-data">
  <div class="row">
    <input type="text" placeholder="Kode menu" name="kode" size="10" />
    <input type="text" placeholder="Nama menu" name="nama" size="40" />
  </div>
  <div class="row">
    <input type="text" placeholder="Tipe menu" name="tipe" size="30" />
    <input type="text" placeholder="Harga menu" name="harga" size="20" />
  </div>
  <div class="row">
  <textarea name="desc" placeholder="Deskripsi menu" rows="4" cols="55"></textarea>
  </div>
  <div class="row">
    <div class="fileUpload btn btn-primary">
    <span> Upload Gambar Desain</span>
    <input type="file" class="upload" name="gambar" />
    </div>
  </div>
  <div class="row">
    <input type="submit" name="send" value="Send" />
    <input type="reset" name="clear" value="Clear" />
  </div>
</form>