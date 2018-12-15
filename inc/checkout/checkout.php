<?php 
$user = $_SESSION['user'];

$query = "SELECT * from users where username='$user'";
$query = mysqli_query($connectdb,$query);
$row=mysqli_fetch_array($query);
$email=$row['email'];

if($_POST['agree'] == true){
    $tanggal = date('Y-m-d H:i:s');
	$total = 0;
    $deskripsi = $_POST['deskripsi'];

if($row['nama_dpn']==""||$row['alamat']==""||$row['no_telepon']==""||$row['email']==""){
  $warning = "Mohon lengkapi data diri anda terlebih dahulu";
  }else{

	//looping $cart
	foreach ($cart as $key => $value) {
		$query = "SELECT * FROM menu WHERE kode=$key";
        $query = mysqli_query($connectdb, $query);
        $order = mysqli_fetch_assoc($query);

        $total = $total + ($order['harga']*$value['quantity']);
    }

    $query = "INSERT INTO pesanan (username, email, total, status, tanggal, deskripsi) VALUES ('$user', '$email', '$total', 'Pesanan diterima', '$tanggal','$deskripsi')";
    $query = mysqli_query($connectdb, $query);
    if($query){
        $orderid = mysqli_insert_id($connectdb);

        //looping $cart
        foreach ($cart as $key => $value) {
            $query = "SELECT * FROM menu WHERE kode=$key";
            $query = mysqli_query($connectdb, $query);
            $order = mysqli_fetch_assoc($query);
            
            $id = $order['kode'];
            $productprice = $order['harga'];
            $quantity = $value['quantity'];

            $query = "INSERT INTO itempesanan (kode_pesanan, kode, harga, jumlah) VALUES ('$orderid', '$id', '$productprice', '$quantity')";
            $query = mysqli_query($connectdb, $query);
        }
    }
    unset($_SESSION['cart']);
    header("location: order.php");
    }
}
 ?>