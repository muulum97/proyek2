<?php $page = basename($_SERVER['SCRIPT_NAME']); ?>
  <?php foreach($css as $value){
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . _SITE_ . "/$value\"/>";
    } ?>
<div class="admmenu">
<p>Menu admin</p>
<br><br>
<a href="menu.php?page=createmenu">Masukan data produk</a>
<a href="menu.php?page=managemenu">Kelola data produk</a>
<a href="account.php?page=manageprofile">Lihat akun terdaftar</a>
<br><br>
<p>Pesanan</p>
<br><br>
<a href="order.php">Lihat Pesanan</a>
<a href="orderpesanancustom.php">Lihat Pesanan Custom</a>
<a href="laporanbulanan.php">Lihat Laporan pemesanan bulanan</a>
<a href="laporantahunan.php">Lihat Laporan pemesanan tahunan</a>
</div>