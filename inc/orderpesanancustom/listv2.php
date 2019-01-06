
<?php $page = basename($_SERVER['SCRIPT_NAME']); ?>
  <?php foreach($css as $value){
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . _SITE_ . "/$value\"/>";
    } ?>

<?php 
if(!isset($_GET['status_order'])){
  $_GET['status_order'] = "semua";
}
?>
<div align="center">
	<br>
	<h2><?php
	if(cek_role($_SESSION['user'])<1){
		echo "Daftar Pesanan";
	}else{
		echo "Daftar pesanan saya";
	}
	?></h2>
	<br>
</div>

<div align="right">
  <form action="" method="get">
	<select name="status_order">
    <option value="" disabled selected>Status pesanan</option>
    <option value="semua">Semua</option> 
    <option value="diterima">Diterima</option> 
    <option value="diproses">Diproses</option> 
    <option value="dicetak">Dicetak</option> 
    <option value="selesai">Selesai</option> 
    <option value="dibatalkan">Dibatalkan</option> 
  </select> 
  	<?php 
  	echo $_GET['status_order']; ?> 
  <button type="submit">submit</button>
  </form>
</div>
<br>
<?php
      $status_order = $_GET['status_order'];
      switch ($status_order) {
        case 'semua':
        if(cek_role($_SESSION['user'])<1){
        	$query = "SELECT * FROM pesanancustom ORDER BY tanggal DESC";
        }else{
        	$query = "SELECT * FROM pesanancustom WHERE username='$user' ORDER BY tanggal DESC";
        }
        break;

        case 'diproses':
        if(cek_role($_SESSION['user'])<1){
            $query = "SELECT * FROM pesanancustom WHERE status='Sedang Diproses' ORDER BY tanggal DESC";
        }else{
            $query = "SELECT * FROM pesanancustom WHERE username='$user' AND status='Sedang Diproses' ORDER BY tanggal DESC";
        }
        break;

        case 'dicetak':
        if(cek_role($_SESSION['user'])<1){
            $query = "SELECT * FROM pesanancustom WHERE status='Sedang dicetak' ORDER BY tanggal DESC";
        }else{
            $query = "SELECT * FROM pesanancustom WHERE username='$user' AND status='Sedang dicetak' ORDER BY tanggal DESC";
        }
        break;

        case 'diterima':
        if(cek_role($_SESSION['user'])<1){
        	$query = "SELECT * FROM pesanancustom WHERE status='Pesanan diterima' ORDER BY tanggal DESC";
        }else{
        	$query = "SELECT * FROM pesanancustom WHERE username='$user' AND status='Pesanan diterima' ORDER BY tanggal DESC";
        }
        break;

        case 'selesai':
        if(cek_role($_SESSION['user'])<1){
        	$query = "SELECT * FROM pesanancustom WHERE status='Pesanan Selesai' ORDER BY tanggal DESC";
        }else{
        	$query = "SELECT * FROM pesanancustom WHERE username='$user' AND status='Pesanan Selesai' ORDER BY tanggal DESC";
        }
        break;

        case 'dibatalkan':
        if(cek_role($_SESSION['user'])<1){
        	$query = "SELECT * FROM pesanancustom WHERE status='Dibatalkan' ORDER BY tanggal DESC";
        }else{
        	$query = "SELECT * FROM pesanancustom WHERE username='$user' AND status='Dibatalkan' ORDER BY tanggal DESC";
        }
        break;

        default:
        break;
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
                echo "<th>Email</th>";
			}
			?>
			<th>Tanggal</th>
			<th>Status</th>
			<th>Total</th>
			<th>Action</th>
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
                echo "<td>".$row['email']."</td>";
			}
			?>
			<td><?php echo $row['tanggal']; ?></td>
			<td><?php echo $row['status']; ?></td>
			<td><?php echo "Rp".number_format($row['total']+20000,0,",","."); ?></td>
			<td>
				<a href="orderpesanancustom.php?p=details&kode=<?php echo $row['kode']; ?>">View</a>
				<?php
				if(cek_role($_SESSION['user'])<1){
                    if($row['status'] == "Pesanan diterima"){
                        echo ' | <a href="orderpesanancustom.php?p=konfirmasi&kode='.$row['kode'].'">Cek Pembayaran DP</a>';
                        echo ' | <a href="orderpesanancustom.php?p=prosesorder&kode='.$row['kode'].'">Proses Order</a>';
                    }
                    if($row['status'] == "Sedang Diproses"){
                        echo ' | <a href="orderpesanancustom.php?p=prosescetak&kode='.$row['kode'].'">Proses Cetak</a>';
                    }
                    if($row['status'] == "Selesai" || $row['status'] == "Sedang dicetak"){
                        echo ' | <a href="orderpesanancustom.php?p=selesai&kode='.$row['kode'].'">Selesai</a>';
                    }
                    if($row['status'] == "Pesanan diterima" || $row['status'] == "Sedang Diproses"){
                        echo ' | <a href="orderpesanancustom.php?p=cancel&kode='.$row['kode'].'">Cancel</a>';
                    }
				}else{
                    if($row['status'] == "Pesanan diterima"){
                        echo ' | <a href="orderpesanancustom.php?p=cancel&kode='.$row['kode'].'">Cancel</a>';
                    }
                }
				?>
			</td>
		</tr>
<?php
}
?>
	</tbody>
</table>
