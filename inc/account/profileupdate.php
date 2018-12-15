<?php $page = basename($_SERVER['SCRIPT_NAME']); ?>
  <?php foreach($css as $value){
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . _SITE_ . "/$value\"/>";
    } ?>

<?php 

$user = $_SESSION['user'];

$query = "SELECT * from users where username='$user'";
$query = mysqli_query($connectdb,$query);
$row=mysqli_fetch_array($query);
if($row['nama_dpn']==""||$row['jenis_kelamin']==""||$row['tgl_lahir']==""||$row['no_telepon']==""||$row['email']==""){
  $warning = "Mohon lengkapi data diri anda terlebih dahulu";
  }
if(isset($_POST['send']) ){
  if($_POST['nama_dpn']==""||$_POST['jns_kelamin']==""||$_POST['tgllahir']==""||$_POST['notelp']==""||$_POST['email']==""){
    $error = "Data ada yang tidak boleh kosong";
  }else{
  $nama_dpn = $_POST['nama_dpn'];
  $nama_blkg = $_POST['nama_blkg'];
  $jns_kelamin = $_POST['jns_kelamin'];
  $tgllahir = $_POST['tgllahir'];
  $alamat = $_POST['alamat'];
  $notelp = $_POST['notelp'];
  $email = $_POST['email'];
  $gambar = $_FILES['foto_akun']['name'];
  $tmp = $_FILES['foto_akun']['tmp_name'];

  $fotobaru = $user.date('dmYHis').$gambar;
  $gambar = "img/profile/".$fotobaru;

  if(!empty($_FILES['foto_akun']['name'])){
    if(move_uploaded_file($tmp, $gambar)){
     $query = "SELECT * FROM users WHERE username='$user'";
     $sql = mysqli_query($connectdb, $query);
     $row = mysqli_fetch_array($sql);
     if($row['foto_akun']!='default.png'){
          if(is_file("img/profile/".$row['foto_akun'])){
           unlink("img/profile/".$row['foto_akun']);
          }
      }
      $query = "UPDATE users SET
                  nama_dpn='$nama_dpn',
                  nama_blkg='$nama_blkg',
                  jenis_kelamin='$jns_kelamin',
                  tgl_lahir='$tgllahir',
                  alamat='$alamat',
                  no_telepon='$notelp',
                  email='$email',
                  foto_akun='$fotobaru'
                WHERE
                  username='$user'";
    }
  }else{
    $query = "UPDATE users SET
                  nama_dpn='$nama_dpn',
                  nama_blkg='$nama_blkg',
                  jenis_kelamin='$jns_kelamin',
                  tgl_lahir='$tgllahir',
                  alamat='$alamat',
                  no_telepon='$notelp',
                  email='$email'
              WHERE
                  username='$user'";
  }

  if(mysqli_query($connectdb,$query)){
      echo "<script>alert('Akun berhasil diubah!'); window.location = 'account.php';</script>";
    }else{
      echo "<script>alert('Akun gagal diubah!'); window.location = 'account.php';</script>";
    }
  }
}

 ?>

 <?php if($error!=''){ ?><br/>
        <div id="error">
          <?php echo $error; ?>
        </div>
        <?php }else if($success!=''){ ?>
        <div id="success">
          <?php echo $success; ?>
        </div>
        <?php }else if($warning!=''){ ?>
        <div id="warning">
          <?php echo $warning; ?>
        </div>
        <?php } ?>
      <form action="" method="POST" enctype="multipart/form-data">
  <div class="row">
    <input type="text" placeholder="Nama depan" required="required" value="<?php echo $row['nama_dpn']; ?>" name="nama_dpn" size="25" />
    <input type="text" placeholder="Nama belakang" value="<?php echo $row['nama_blkg']; ?>" name="nama_blkg" size="25" />
  </div>
  <div class="row">
    <select name="jns_kelamin" required="required">
      <option value="">Jenis kelamin</option>
      <option value="L"<?php 
      if($row['jenis_kelamin']=='L'){
        echo " selected";
      }
       ?>>Laki-laki</option>
      <option value="P"<?php 
      if($row['jenis_kelamin']=='P'){
        echo " selected";
      }
       ?>>Perempuan</option>
      <option value="-"<?php 
      if($row['jenis_kelamin']=='-'){
        echo " selected";
      }
       ?>>-</option>
    </select>
    <input type="date" required="required" placeholder="Tanggal lahir" value="<?php echo $row['tgl_lahir']; ?>" name="tgllahir" size="20" />
    <input type="text" required="required" placeholder="No telepon" value="<?php echo $row['no_telepon']; ?>" name="notelp" size="21" />
    <input type="text" required="required" placeholder="Email" value="<?php echo $row['email']; ?>" name="email" size="21" />
  </div>
  <div class="row">
  <textarea name="alamat" required="required" placeholder="Alamat anda" rows="4" cols="67"><?php echo $row['alamat']; ?></textarea>
  </div>
  <div class="row">
    <img src="img/profile/<?php echo $row["foto_akun"]; ?>" alt="Gambar Profil" width="150" height="150">
    <div class="fileUpload btn btn-primary">
    <span> Upload Foto Profil anda</span>
    <input type="file" class="upload" name="foto_akun" />
    </div>
  </div>
  <div class="row">
    <input type="submit" name="send" value="Send" />
    <input type="reset" name="clear" value="Reset" />
  </div>
      </form>