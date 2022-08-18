<?php
$server 	= "localhost";
$username	= "root";
$password	= "";
$db 		= "user";
$koneksi = mysqli_connect($server, $username, $password, $db);
//$koneksi = mysqli_connect()

if(mysqli_connect_errno()) {
	echo "Koneksi gagal : ".mysqli_connect_error();
}
/*else{
	echo "Koneksi berhasil";
}*/
?>
