<?php $page = basename($_SERVER['SCRIPT_NAME']); ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title; ?></title>

    <link rel="icon" type="image/png" href="img/icons/icon.jpg"/>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/3-col-portfolio.css" rel="stylesheet">

  </head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="<?php echo _SITE_ ?>" <?php if ($page == 'index.php') { echo ' class="active"'; } ?>>Raja Cetak</a>

          <a class="navbar-brand" href="">
            <?php
              if(ISSET($_SESSION['user']))
              {
                echo display_username($_SESSION['user']);
              }
            ?>
          </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo _SITE_ ?>" <?php if ($page == 'index.php') { echo ' class="active"'; } ?>>Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cart.php" <?php if ($page == 'cart.php') { echo ' class="active"'; } ?>>Keranjang</a>
            </li>
            <?php
        if(isset($_SESSION['user'])){
          if(cek_role($_SESSION['user'])>=1){
        ?>
              <li class="nav-item">
              <a class="nav-link" href="order.php" <?php if ($page == 'order.php') { echo ' class="active"'; } ?>>History Pesanan</a>
            </li>
        <?php
          }
        }
        ?>
        <?php
        //jika sudah login
        if(isset($_SESSION['user'])){
          //jika sudah dan statusnya admin
          if(cek_role($_SESSION['user'])<1){ ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo _SITE_ ?>adminv2.php" <?php if ($page == 'adminv2.php') { echo ' class="active"'; } ?>>Admin Page</a>
        </li>
        <?php
          }
        }
        ?>
        <?php
        //jika belum login
        if(!isset($_SESSION['user'])){ ?>
          <li><a class="nav-link" href="<?php echo _SITE_ ?>login.php">Login</a></li>
          <li><a class="nav-link" href="<?php echo _SITE_ ?>register.php">Register</a></li>
        <?php
        }else{
        ?>
          <li><a class="nav-link" href="<?php echo _SITE_ ?>account.php">Ubah data</a></li>
          <li><a class="nav-link" href="logout.php">Logout</a></li>
        <?php
        }
        ?>
        </li>   
          </ul>
        </div>
      </div>
    </nav>