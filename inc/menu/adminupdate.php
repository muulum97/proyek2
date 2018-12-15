<?php

$kode = $_GET['kode'];


$query = "SELECT * from menu where kode='$kode'";
$query = mysqli_query($connectdb,$query);
$row=mysqli_fetch_array($query);

//isset update form disini
if(isset($_POST['send']) ){
  $kode = escape($_POST['kode']);
  $nama = escape($_POST['nama']);
  $tipe = escape($_POST['tipe']);
  $harga = escape($_POST['harga']);
  $gambar = escape($_FILES['gambar']['name']);
  $tmp = $_FILES['gambar']['tmp_name'];
  $desc = escape($_POST['desc']);
  $stok = escape($_POST['stok']);

  $fotobaru = date('dmYHis').$gambar;
  $gambar = "img/menu/".$fotobaru;

  if(!empty($_FILES['gambar']['name'])){
    if(move_uploaded_file($tmp, $gambar)){
     $query = "SELECT * FROM menu WHERE kode='$kode'";
     $sql = mysqli_query($connectdb, $query);
     $row = mysqli_fetch_array($sql);
     if($row['gambar']!='default.jpg'){
          if(is_file("img/menu/".$row['gambar'])){
           unlink("img/menu/".$row['gambar']);
          }
      }
      $query = "UPDATE menu SET
                  nama='$nama',
                  tipe='$tipe',
                  harga='$harga',
                  desc_menu='$desc',
                  gambar='$fotobaru',
                  stok='$stok'
                WHERE
                  kode='$kode'";
    }
  }else{
    $query = "UPDATE menu SET
                nama='$nama',
                tipe='$tipe',
                harga='$harga',
                desc_menu='$desc',
                stok='$stok'
              WHERE
                kode='$kode'";
  }


	if(mysqli_query($connectdb,$query)){
			echo "<script>alert('Menu berhasil diubah!'); window.location = 'menu.php';</script>";
		}else{
			echo "<script>alert('Menu gagal diubah!'); window.location = 'menu.php';</script>";
		}
}
//end isset
?>
<div class="notif"></div>
<form action="" method="POST" enctype="multipart/form-data">
  <div class="row">
    <input type="text" value="<?php echo $row['kode']; ?>" readonly="true" name="kode" size="10" />
    <input type="text" value="<?php echo $row["nama"]; ?>" name="nama" size="40" />
  </div>
  <div class="row">
    <input type="text" value="<?php echo $row["tipe"]; ?>" name="tipe" size="25" />
    <input type="text" value="<?php echo $row["harga"]; ?>" name="harga" size="15" />
    <select name="stok" required="required">
      <option value="1"<?php 
      if($row['stok']=='1'){
        echo " selected";
      }
       ?>>Tersedia</option>
      <option value="0"<?php 
      if($row['stok']=='0'){
        echo " selected";
      }
       ?>>Stok habis</option>
    </select>
  </div>
  <div class="row">
    <textarea name="desc" rows="4" cols="67"><?php echo $row["desc_menu"]; ?></textarea>
  </div>
  <div class="row">
    <img src="img/menu/<?php echo $row["gambar"]; ?>" alt="Gambar menu" width="150" height="150">
    <div class="fileUpload btn btn-primary">
      <span>Update gambar menu</span>
      <input type="file" class="upload" name="gambar" />
    </div>
  </div>
  <div class="row">
    <input type="submit" name="send" value="Update" />
    <input type="reset" name="clear" value="Reset" />
  </div>
</form>