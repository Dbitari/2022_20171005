<?php
//koneksi ke db dan pilih database
$conn = mysqli_connect('localhost', 'root', '', 'user');

//query isi tabel user_detail
$result = mysqli_query($conn, "SELECT id, user_email, user_fullname FROM `user_detail`");

//ubah data ke dalam array
while ($row = mysqli_fetch_assoc($result)) {
  $rows[] = $row;
}

//tampung ke variabel user_detail
$user_detail = $rows;
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Administrator</title>
</head>

<body>
  <h3>Selamat Datang Administrator</h3>

  <table border="1" cellpadding="10" cellpadding="0">
    <tr>
      <th>No</th>
      <th>Email</th>
      <th>Nama</th>
      <th>Aksi</th>
    </tr>

    <?php $i = 1;
    foreach ($user_detail as $m) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><?= $m['user_email']; ?></td>
        <td><?= $m['user_fullname']; ?></td>
        <td>
          <a href="">Ubah</a> | <a href="">Hapus</a>
        </td>
      </tr>
    <?php endforeach ?>
  </table>
</body>

</html>