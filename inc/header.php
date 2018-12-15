<?php $page = basename($_SERVER['SCRIPT_NAME']); ?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title; ?></title>
  <?php foreach($css as $value){
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . _SITE_ . "/$value\"/>";
    } ?>
</head>
<body>
  <header>
    <div class="logo rowlogo">
      <div class="logoimg col">
        <!--img src="img/logo.png" width="50px" height="50px"-->
      </div>
      <div class="logoname col">
        Pizza Bandung
      </div>
    </div>
    <nav class="dropdownmenu" align="center">
      <ul>
        <li><a href="<?php echo _SITE_ ?>/" <?php if ($page == 'index.php') { echo ' class="active"'; } ?>>Home - Menu</a></li>

        <li><a href="cart.php" <?php if ($page == 'cart.php') { echo ' class="active"'; } ?>>Keranjang menu</a></li>

        <?php
        if(isset($_SESSION['user'])){
          if(cek_role($_SESSION['user'])>=1){
        ?>
        <li><a href="order.php" <?php if ($page == 'order.php') { echo ' class="active"'; } ?>>History pesanan</a></li>
        <?php
          }
        }
        ?>

        <?php
        //jika sudah login
        if(isset($_SESSION['user'])){
          //jika sudah dan statusnya admin
          if(cek_role($_SESSION['user'])<1){ ?>
        <li><a href="<?php echo _SITE_ ?>/admin.php" <?php if ($page == 'admin.php') { echo ' class="active"'; } ?>>Admin page</a></li>
        <?php
          }
        }
        ?>
        <!--
        <li><a href="#">Contact Us</a></li>
        <li><a href="#">About Us</a></li>
        -->
        <li ><a href="#">Account</a>
        <ul id="submenu">
        <?php
        //jika belum login
        if(!isset($_SESSION['user'])){ ?>
          <li><a href="<?php echo _SITE_ ?>/login.php">Login</a></li>
          <li><a href="<?php echo _SITE_ ?>/register.php">Register</a></li>
        <?php
        }else{
        ?>
          <p><?php
          if(ISSET($_SESSION['user'])){
            echo display_username($_SESSION['user']);
          }?></p>
          <li><a href="<?php echo _SITE_ ?>/account.php">Ubah data</a></li>
          <li><a href="logout.php">Logout</a></li>
        <?php
        }
        ?>
        </ul>
        </li>
      </ul>
    </nav>
  </div>
</header>
<br><br>
