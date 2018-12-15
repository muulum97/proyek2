<?php 

// ---- LOGIN REGISTER ---- //

/*
register
konek
hash pass
insert data
teruskan
*/
function reg_user($user,$pass){
	global $connectdb;

	//avoid sql injection
	$user = escape($user);
	$pass = escape($pass);

	//menghash password
	$pass = password_hash($pass, PASSWORD_DEFAULT);

	//insert user
	$query = "INSERT INTO users (username, password) VALUES ('$user', '$pass')";

	if( mysqli_query($connectdb, $query)){
		return true;
	}else{
		return false;
	}
}

/*
login
cek password dari nama yg diinput
query
fecth assoc
jika pass=result maka login
*/
function cek_data_login($user,$pass){
	global $connectdb;

	//avoid sql injection
	$user = escape($user);
	$pass = escape($pass);

	$query = "SELECT password FROM users WHERE username = '$user'";
	$result = mysqli_query($connectdb,$query);
	$hash = mysqli_fetch_assoc($result);
	if( password_verify($pass, $hash['password'])){
		return true;
	}else{
		return false;
	}
}

/*
cek nama
cari nama user dari db
return sesuai keinginan
utk register = 0
utk login != 0
*/
function cek_nama($user){
	global $connectdb;

	//avoid sql injection
	$user = escape($user);

	$query = "SELECT * FROM users WHERE username = '$user'";

	IF( $result = mysqli_query($connectdb,$query)){
		return mysqli_num_rows($result);
	}
}

/*
redirect register login
jika reg/login success
maka akan diarahkan ke index
*/function redirect($user){
	$_SESSION['user'] = $user;
	header('Location: index.php');
}

/*
flash message
pesan sekali muncul
jika halaman direload pesan hilang
*/
function flash_message($user){
	echo $_SESSION['msg'];
	unset($_SESSION['msg']);
}

/*
escape
mysqli_real_escape_string
*/
function escape($data){
	global $connectdb;
	return mysqli_real_escape_string($connectdb,$data);
}

/*
cek role
role 0 admin
role 1 kasir
role 2 user
*/
function cek_role($user){
	global $connectdb;

	$query = "SELECT role FROM users WHERE username='$user'";

	$result = mysqli_query($connectdb,$query);
	$status = mysqli_fetch_assoc($result)['role'];

	/*
	//cara lama
	return $status;
	//di coding halamannya
	if(cek_role($_SESSION['user'])==1){
	
	if($status==1){
		return true;
	}else{
		return false;
	}*/
	return $status;
}

/*
function display name
*/
function display_username($user){
	global $connectdb;

	//avoid sql injection
	$user = escape($user);

	$query = "SELECT username FROM users WHERE username = '$user'";
	$result = mysqli_query($connectdb,$query);

	$row = mysqli_fetch_array($result);

	return $row['username'];
}

?>