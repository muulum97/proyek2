<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!-- Page Content -->
<div class="container">
  <!-- Page Heading -->
  <div align="center">
<?php
  if(isset($_GET['query'])){
    $cari = escape($_GET['query']);
    echo "Hasil pencarian : <b>".$_GET['query']."</b>";
  }else{
    echo "<h1 class=\"my-4\">Pesan Banner Disini Aja</h1>";
    echo "<h2 class=\"my-4\">Punya Desain Sendiri? Pesan <a href=\"pesanancustom.php\">Disini</a></h2>";
  }
?>
</div>

<form action="" method="get" class="search">
<div class="row">
        <div class="col-12">
            <div class="input-group">
                <input type="search" name="query" placeholder="Cari produk disini" class="form-control border-secondary py-2">
                <div class="input-group-append">
                  <input type="submit" value="Cari" class="btn btn-outline-secondary">
                </div>
            </div>
        </div>
    </div>
</form>

<br>

<div class="row">
<?php
  include 'inc/pagination.php';
  if(mysqli_num_rows($query)>0){
    while ($row=mysqli_fetch_array($query)){
?>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a><img class="card-img-top" src="img/menu/<?php echo $row["gambar"]; ?>" alt="Gambar menu" height="200"></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="details.php?kode=<?php echo $row["kode"]; ?>"><?php echo $row["nama"]; ?></a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
            </div>
          </div>
        </div>

<?php }
  }else{
?>

<div align="center"><br><br>
  <h1>Tidak ditemukan hasil</h1>
</div>

<?php
}
?>
</div>
      <!-- /.row -->

<!-- Pagination -->
<ul class="pagination justify-content-center">
<?php
  if(isset($_GET['query']))
  {
    for ($i=1; $i<=$halaman ; $i++)
    {
?>

<li class="page-item">
  <a href="?p=<?php echo $i; ?>&query=<?php echo $cari ?>" class="page-link" ><?php echo $i; ?></a>
</li>
<?php }
}else{
  for ($i=1; $i<=$halaman ; $i++){ ?>
<a href="?p=<?php echo $i; ?>" class="page-link" ><?php echo $i; ?></a>

<?php
}
}
?>
</ul>
</div>
    <!-- /.container -->