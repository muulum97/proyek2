  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
<?php 
foreach($css as $value){
    //echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . _SITE_ . "/$value\"/>";
    }
$user = $_SESSION['user'];

$query = "SELECT * from users WHERE username!='$user' ORDER BY id ASC";
$query = mysqli_query($connectdb,$query);

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Panel</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.php">Raja Cetak - Admin</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <div class="input-group-append">
          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">
      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="adminv2.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Kelola Screens:</h6>
            <a class="dropdown-item" href="menu.php?page=createmenu">Masukan Data Produk</a>
            <a class="dropdown-item" href="menu.php?page=managemenu">Kelola Data Produk</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Pesanan Pages:</h6>
            <a class="dropdown-item" href="orderv2.php">Pesanan Produk</a>
            <a class="dropdown-item" href="orderpesanancustomv2.php">Pesanan Kustom</a>
          </div>
		</li>
		<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		  <i class="fas fa-fw fa-table"></i>
            <span>Laporan</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Laporan Screens:</h6>
            <a class="dropdown-item" href="laporanbulanan.php">Laporan Bulanan</a>
            <a class="dropdown-item" href="laporantahunan.php">Laporan Tahunan</a>
          </div>
		</li>
		<li class="nav-item">
          <a class="nav-link" href="akunterdaftar.php?page=manageprofile">
		  <i class="fa fa-users"></i>
            <span>User Terdaftar</span></a>
        </li>
      </ul>

      <div id="content-wrapper">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="account.php?page=manageprofile">User Terdaftar</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

<div class="limiter">
		<div class="container-table100" style="margin-left: -50px;">
			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110">
					<div class="table100-head">          
            <table>
            <thead>
              <tr class="row100 head">
                <!--<th>Id</th>-->
                <th class="cell100 column2">Username</th>
                <!--<th>Role</th>-->
                <th class="cell100 column1">Nama lengkap</th>
                <th class="cell100 column3">No Telepon</th>
                <th class="cell100 column4">Email</th>
                <!--<th colspan="2">action</th>-->
              </tr>
            </thead>
        </table>
      </div>
      
<div class="table100-body js-pscroll">
	<table>
    <tbody>
            <?php
            if($query){
              while ($row=mysqli_fetch_array($query)){
            ?>
              <tr class="row100 body">
                <!--<td><?php echo $row["id"]; ?></td>-->
                <?php
                echo "<td class='cell100 column2'><a href='account.php?page=detailprofile&username=".$row["username"]."'>".$row['username']."</a></td>";
                ?>
                <!--<td><?php echo $row["role"]; ?></td>-->
                <td class="cell100 column1"><?php echo $row["nama_dpn"]." ".$row["nama_blkg"]; ?></td>
                <td class="cell100 column3"><?php echo $row["no_telepon"]; ?></td>
                <td class="cell100 column4"><?php echo $row["email"]; ?></td>
                <!--
                <td><a href="account.php?page=editprofile&id=<?php echo$row["id"]; ?>">Edit</a></td>
                <td><a href="account.php?page=deleteprofile&id=<?php echo$row["id"]; ?>" onclick="return confirm('Anda yakin ingin menghapus user <?php echo
                    $row["username"]; ?> dari database?')">Delete</a>
                </td>
                -->
              </tr>
                <?php
	                }
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

  </body>

</html>