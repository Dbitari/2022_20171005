<?php
require("koneksi.php");
//$email  = $_GET['user_fullname'];

//inisialisasi session
session_start();
//sessionCek(); 
//mengecek user pada session
if (!isset($_SESSION['id'])) { // $_SESSION['id'] == null
	$_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
	header('Location: login.php');
}
$sesID = $_SESSION['id'];
$sesName = $_SESSION['name'];
$sesLvl = $_SESSION['level']; //1 atau 2
?>
<html>

<head>
	<title>Home</title>
</head>

<body>
	<!--<h1>Selamat Datang <?php //echo $email;
													?></h1>-->
	<h1>Selamat Datang <?php echo $sesName; ?></h1>
	<table border='1'>
		<tr>
			<td>No</td>
			<td>Email</td>
			<td>Nama</td>
			<td>Aksi</td>
		</tr>
		<?php
		$query  = "SELECT * FROM user_detail";
		$result = mysqli_query($koneksi, $query);
		//echo $result;
		//$result = mysqli_query(mysqli_connect("localhost","root","","user"),"SELECT * FROM user_detail");
		$no = 1;

		if ($sesLvl == 1) { // 1 = admin - 2 = user
			$dis = ""; //<input type="button" value="edit" disable>
		} else {
			$dis = "disabled";
		}

		while ($row = mysqli_fetch_array($result)) {
			$id = $row['id'];
			$userMail = $row['user_email'];
			$userName = $row['user_fullname'];

		?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $userMail; ?></td>
				<td><?php echo $userName; ?></td>
				<td>
					<a href="edit.php?id=<?php echo $row['id']; ?>">
						<input type="button" value="edit" <?php echo $dis; ?>></a>
					<!--<input type="button" value="edit"></a>-->
					<a href="hapus.php?id=<?php echo $row['id']; ?>">
						<input type="button" value="hapus" <?php echo $dis; ?>></a>
					<!--<input type="button" value="hapus" ></a>-->
				</td>
			</tr>
		<?php
			$no++;
		} ?>
	</table>
	<p><a href="logout.php">logout</p>
</body>

</html>