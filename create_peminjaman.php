<?php
session_start();

if (isset($_POST['submit'])) {
    require 'connect.php';

    // Tidak perlu mengambil nilai _id dari form, karena nilai ini akan otomatis di-generate oleh MySQL (AUTO_INCREMENT)
    $id_anggota = $_POST['id_anggota'];
    $id_buku = $_POST['id_buku'];
    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];

    // Lakukan validasi data sesuai kebutuhan

    // Query untuk menyimpan data ke tabel reviews di MySQL
    $query = "INSERT INTO peminjaman (id_anggota, id_buku, tanggal_peminjaman) VALUES ('$id_anggota', '$id_buku', '$tanggal_peminjaman')";

    if ($mysqli->query($query)) {
        $_SESSION['success'] = "Data Berhasil Ditambahkan";
        header("Location: peminjaman.php");
    } else {
        $_SESSION['error'] = "Gagal Menambahkan Data: " . $mysqli->error;
        header("Location: peminjaman.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<section class="contact" id="contact">

<div class="row">

   <form action="" method="post">
      <h3>Daftar Peminjaman</h3>
      <!-- Tidak perlu input _id karena akan di-generate secara otomatis -->
      <input type="number" name="id_anggota" required maxlength="50" placeholder="masukkan id Anggota" class="box">
      <input type="number" name="id_buku" required maxlength="50"  placeholder="masukkan id buku" class="box">
      <input type="date" name="tanggal_peminjaman" required maxlength="50" placeholder="berikan tanggal peminjanam" class="box">
      <div class="form-group">
         <button type="submit" name="submit" class="btn">send</button>
      </div>
   </form>
</div>
<div class="form-group">
         <a href="index.php" class="btn">Kembali</a>
      </div>

</section>


</body>
</html>
