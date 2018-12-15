<?php 

$query = "SELECT * from menu ORDER BY kode ASC";
$query = mysqli_query($connectdb,$query);

?>
<table class="table-fill">
	<tr>
		<th>kode</th>
		<th>nama</th>
		<th>tipe</th>
		<th>harga</th>
		<th>gambar</th>
		<th>desc_menu</th>
		<th>stok</th>
		<th colspan="2">action</th>
	</tr>
<?php
if($query){
	while ($row=mysqli_fetch_array($query)){
?>
	<tr>
		<td><?php echo $row["kode"]; ?></td>
		<td><?php echo $row["nama"]; ?></td>
		<td><?php echo $row["tipe"]; ?></td>
		<td><?php echo $row["harga"]; ?></td>
		<td><img src="img/menu/<?php echo $row["gambar"]; ?>" alt="Gambar menu" width="100" height="100"></td>
		<td><?php echo $row["desc_menu"]; ?></td>
		<td>
		<?php
		if($row["stok"]==1){
			echo "Tersedia";
		}else{
			echo "Stok habis";
		}
		?>
		</td>
		<td><a href="menu.php?page=updatemenu&kode=<?php echo$row["kode"]; ?>">Edit</a></td>
		<td><a href="menu.php?page=deletemenu&kode=<?php echo$row["kode"]; ?>" onclick="return confirm('Anda yakin ingin menghapus barang berkode <?php echo
				$row["kode"]; ?> dari database?')">Delete</a></td>
	</tr>
<?php

	}
}

?>
</table>