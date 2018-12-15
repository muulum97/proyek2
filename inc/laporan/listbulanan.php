  <?php foreach($css as $value){
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . _SITE_ . "/$value\"/>";
    } ?>
<?php 
if(!isset($_GET['status_order'])){
  $_GET['status_order'] = "semua";
}
if(!isset($_GET['bulan'])){
    $m = date('m');
    $_GET['bulan'] = $m;
}
if(!isset($_GET['tahun'])){
    $y = date('Y');
    $_GET['tahun'] = $y;
}
?>
<div align="center">
	<br>
	<h2>Daftar laporan pemesanan bulan
    <?php 
        echo $_GET['bulan']."/".$_GET['tahun'];
    ?> dengan status 
    <?php
        echo $_GET['status_order'];
    ?></h2>
	<br>

<div align="left">
    <a href="laporantahunan.php" class="navadmin">Lihat laporan tahunan</a>
</div>

<div align="right">

  <form action="" method="get">
    Laporan
    <select name="bulan" required="required">
        <option value="01">Januari</option>
        <option value="02">Februari</option>
        <option value="03">Maret</option>
        <option value="04">April</option>
        <option value="05">Mei</option>
        <option value="06">Juni</option>
        <option value="07">Juli</option>
        <option value="08">Agustus</option>
        <option value="09">September</option>
        <option value="10">Oktober</option>
        <option value="12">November</option>
        <option value="12">Desember</option>
    </select>
    <select name="tahun" required="required">
        <?php
        $mulai= date('Y') - 50;
        for($i = $mulai;$i<$mulai + 100;$i++){
            $sel = $i == date('Y') ? ' selected="selected"' : '';
            echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
        }
        ?>
    </select>
    <select name="status_order">
    <option value="semua" disabled selected>--STATUS PESANAN--</option>
    <option value="semua">Semua</option> 
    <option value="diterima">Diterima</option> 
    <option value="proses">Diproses</option> 
    <option value="antar">Diantar</option> 
    <option value="selesai">Selesai</option> 
    <option value="dibatalkan">Dibatalkan</option> 
  </select> 
    <?php 
    echo $_GET['status_order']; ?> 
  <button type="submit">submit</button>
  </form>
</div>

</div>

<br>
<?php

if(isset($_GET) & !empty($_GET)){
    $bulan = $_GET['bulan'];
    $tahun = $_GET['tahun'];
    $status_order = $_GET['status_order'];

      switch ($status_order) {
        case 'semua':
        $query = "SELECT * FROM pesanan where month(tanggal)='$bulan' and year(tanggal) = '$tahun' ORDER BY tanggal DESC";
        break;

        case 'proses':
        $query = "SELECT * FROM pesanan where month(tanggal)='$bulan' and year(tanggal) = '$tahun' and status='Sedang Diproses' ORDER BY tanggal DESC";
        break;

        case 'antar':
        $query = "SELECT * FROM pesanan where month(tanggal)='$bulan' and year(tanggal) = '$tahun' and status='Sedang diantar' ORDER BY tanggal DESC";
        break;

        case 'diterima':
        $query = "SELECT * FROM pesanan where month(tanggal)='$bulan' and year(tanggal) = '$tahun' and status='Pesanan diterima' ORDER BY tanggal DESC";
        break;

        case 'selesai':
        $query = "SELECT * FROM pesanan where month(tanggal)='$bulan' and year(tanggal) = '$tahun' and status='Pesanan Selesai' ORDER BY tanggal DESC";
        break;

        case 'dibatalkan':
        $query = "SELECT * FROM pesanan where month(tanggal)='$bulan' and year(tanggal) = '$tahun' and status='Dibatalkan' ORDER BY tanggal DESC";
        break;

        default:
        $query = "SELECT * FROM pesanan where month(tanggal)='$bulan' and year(tanggal) = '$tahun' ORDER BY tanggal DESC";
        break;
        }
}
?>

<table class="table-fill">
	<thead>
		<tr>
			<th>No</th>
			<th>No order</th>
			<?php
			if(cek_role($_SESSION['user'])<1){
				echo "<th>Username</th>";
			}
			?>
			<th>Tanggal</th>
			<th>Status</th>
			<th>Total</th>
		</tr>
	</thead>
	<tbody>
<?php
$no = 1;

$query = mysqli_query($connectdb, $query);

while($row = mysqli_fetch_assoc($query)){
?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $row['kode']; ?></td>
			<?php
			if(cek_role($_SESSION['user'])<1){
				echo "<td><a href='account.php?page=detailprofile&username=".$row["username"]."'>".$row['username']."</a></td>";
			}
			?>
			<td><?php echo $row['tanggal']; ?></td>
			<td><?php echo $row['status']; ?></td>
			<td><?php echo "Rp".number_format($row['total']+($row['total']/10)+10000,0,",","."); ?></td>
		</tr>
<?php
}
?>
	</tbody>
</table>