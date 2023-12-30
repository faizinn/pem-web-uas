<?php
session_start();
require 'connect.php';

if(isset($_POST['submit'])) {
    // Menyimpan data ke MySQL
    $nama_buku = $_POST['nama_buku'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];

    $query = "INSERT INTO buku (nama_buku, pengarang, penerbit, tahun_terbit) VALUES ('$nama_buku', '$pengarang', '$penerbit', '$tahun_terbit')";

    if ($mysqli->query($query)) {
        $_SESSION['success'] = "Data Berhasil Ditambahkan";
        header("Location: buku.php");
    } else {
        echo "Error: " . $query . "<br>" . $mysqli->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>daftar buku</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<section class="reservation" id="reservation">
    <form action="" method="post">
        <h3>jududl</h3>
        <div class="flex">
            <div class="box">
                <p>nama buku<span>*</span></p>
                <input type="text" name="nama_buku" class="input" required />
            </div>
            <div class="box">
                <p>pengarang <span>*</span></p>
                <input type="text" name="pengarang" class="input" required />
            </div>
            <div class="box">
                <p>penerbit <span>*</span></p>
                <input type="text" name="penerbit" class="input" required />
            </div>
            <div class="box">
                <p>tahun terbit <span>*</span></p>
                <input type="date" name="tahun_terbit" class="input" required />
            </div>
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn">simpan</button>
        </div>
        <div class="form-group">
            <a href="index.php" class="btn">Kembali</a>
        </div>
    </form>
</section>


</body>
</html>
