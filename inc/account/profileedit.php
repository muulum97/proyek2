<?php 

$user = $_GET['id'];

$query = "SELECT * from users where id='$user'";
$query = mysqli_query($connectdb,$query);
$row=mysqli_fetch_array($query);

if(isset($_POST['send']) ){
  if($_POST['nama_dpn']==""||$_POST['jns_kelamin']==""||$_POST['tgllahir']==""||$_POST['notelp']==""){
    $error = "Data tidak boleh kosong";
  }else{
  $role = $_POST['role'];
  $nama_dpn = $_POST['nama_dpn'];
  $nama_blkg = $_POST['nama_blkg'];
  $jns_kelamin = $_POST['jns_kelamin'];
  $tgllahir = $_POST['tgllahir'];
  $notelp = $_POST['notelp'];
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
                  role='$role',
                  nama_dpn='$nama_dpn',
                  nama_blkg='$nama_blkg',
                  jenis_kelamin='$jns_kelamin',
                  tgl_lahir='$tgllahir',
                  no_telepon='$notelp',
                  foto_akun='$fotobaru'
                WHERE
                  id='$user'";
    }
  }else{
    $query = "UPDATE users SET
                  role='$role',
                  nama_dpn='$nama_dpn',
                  nama_blkg='$nama_blkg',
                  jenis_kelamin='$jns_kelamin',
                  tgl_lahir='$tgllahir',
                  no_telepon='$notelp'
              WHERE
                  id='$user'";
  }

  if(mysqli_query($connectdb,$query)){
      echo "<script>alert('Data akun berhasil diubah!'); window.location = 'account.php?page=manageprofile';</script>";
    }else{
      echo "<script>alert('Data akun gagal diubah!'); window.location = 'account.php?page=manageprofile';</script>";
    }
  }
}

 ?>

 <?php if($error!=''){ ?><br/>
        <div id="error">
          <?php echo $error; ?>
        </div>
        <?php }else{echo "";} ?>
      <form action="" method="POST" enctype="multipart/form-data">
  <div class="row">
    <input type="text" placeholder="Id" value="<?php echo $row['id']; ?>" name="id" size="5" readonly/>
    <input type="text" placeholder="Username" value="<?php echo $row['username']; ?>" name="username" size="35" readonly/>
    <select name="role" required="required">
      <option value="">Pilih role</option>
      <option value="0"<?php 
      if($row['role']=='0'){
        echo " selected";
      }
       ?>>Admin</option>
      <option value="1"<?php 
      if($row['role']=='1'){
        echo " selected";
      }
       ?>>User</option>
    </select>
  </div>
  <div class="row">
    <input type="text" placeholder="Nama depan" value="<?php echo $row['nama_dpn']; ?>" name="nama_dpn" size="20" />
    <input type="text" placeholder="Nama belakang" value="<?php echo $row['nama_blkg']; ?>" name="nama_blkg" size="30" />
  </div>
  <div class="row">
    <select name="jns_kelamin">
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
    </select>
    <input type="date" placeholder="Tanggal lahir" value="<?php echo $row['tgl_lahir']; ?>" name="tgllahir" size="20" />
    <input type="text" placeholder="No telepon" value="<?php echo $row['no_telepon']; ?>" name="notelp" size="18" />
  </div>
  <div class="row">
    <img src="img/profile/<?php echo $row["foto_akun"]; ?>" alt="Gambar menu" width="150" height="150">
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