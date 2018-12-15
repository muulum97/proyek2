<?php 
foreach($css as $value){
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . _SITE_ . "/$value\"/>";
    }
$user = $_SESSION['user'];

$query = "SELECT * from users WHERE username!='$user' ORDER BY id ASC";
$query = mysqli_query($connectdb,$query);

?>
<table class="table-fill">
	<tr>
		<!--<th>Id</th>-->
		<th>Username</th>
		<!--<th>Role</th>-->
		<th colspan="4">Nama lengkap</th>
		<th>No Telepon</th>
		<th>Email</th>
		<!--<th colspan="2">action</th>-->
	</tr>
<?php
if($query){
	while ($row=mysqli_fetch_array($query)){
?>
	<tr>
		<!--<td><?php echo $row["id"]; ?></td>-->
		<?php
		echo "<td><a href='account.php?page=detailprofile&username=".$row["username"]."'>".$row['username']."</a></td>";
		?>
		<!--<td><?php echo $row["role"]; ?></td>-->
		<td colspan="4"><?php echo $row["nama_dpn"]." ".$row["nama_blkg"]; ?></td>
		<td><?php echo $row["no_telepon"]; ?></td>
		<td><?php echo $row["email"]; ?></td>
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
</table>