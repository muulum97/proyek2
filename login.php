<?php

//fungsi initialize
require_once "func/core/init.php";

//set belum ada error
$error = '';

//jika sudah login arahkan ke index
if( isset($_SESSION['user'])){
	header('Location: index.php');
}

//proses register dan validasi
if( isset($_POST['loginsubmit']) ){
	$user = $_POST['uname'];
	$pass = $_POST['pword'];

	if(!empty(trim($user)) && !empty(trim($pass)) ){
		if(cek_nama($user)!=0){
			if(cek_data_login($user,$pass)){
				redirect($user);
			}else{
				$error = 'Username salah / Password salah';
			}
			
		}else{
			//$error = 'Username tidak terdaftar';
			$error = 'Username salah / Password salah';
		}

	}else{
		$error = 'Form tidak boleh kosong';
	}
}

if(isset($_SESSION['msg'])){
	$flash = $_SESSION['msg'];
}

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">
  	<div class="form">

			<?php if(isset($_SESSION['msg'])){ ?>
				<?php
				echo $flash;
				unset($_SESSION['msg']); ?>
			<?php }?>

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">

          <form action="login.php" method="post">
            <div class="form-group">
              <div class="form-label-group">
                <input placeholder="Masukan username" type="text" name="uname" class="form-control" id="inputEmail">
                <label for="inputEmail">Username</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input placeholder="Masukan password" type="password" name="pword" class="form-control" id="inputPassword">
                <label for="inputPassword">Password</label>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me">
                  Remember Password
                </label>
              </div>
            </div>
            <input type="submit" class="btn btn-primary btn-block"  name="loginsubmit" value="Login"/>
          </form>
          <div class="text-center">
          	    <?php if($error!=''){ ?>
				<?php echo $error; ?>
				<?php }else{echo "";} ?>
            <a class="d-block small mt-3" href="<?php echo _SITE_ ?>register.php">Register an Account</a>
            <a class="d-block small" href="<?php echo _SITE_ ?>">Home</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>