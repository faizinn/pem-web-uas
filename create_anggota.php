<?php
session_start();
require 'connect.php';

if (isset($_POST['submit'])) {
    // Menyimpan data ke MySQL
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_hp = $_POST['no_hp'];

    // Tidak perlu menyertakan _id dalam VALUES karena sudah AUTO_INCREMENT
    $query = "INSERT INTO anggota (nama, alamat, jenis_kelamin,no_hp ) VALUES ('$nama', '$alamat', '$jenis_kelamin', '$no_hp')";

    if ($mysqli->query($query)) {
        $_SESSION['success'] = "Data Berhasil Ditambahkan";
        header("Location: create_buku.php");
    } else {
        echo "Error: " . $query . "<br>" . $mysqli->error;
    }
}

// Query untuk mendapatkan data pengguna dari tabel MySQL
$query = "SELECT * FROM anggota";
$result = $mysqli->query($query);

// Mengambil hasil query ke dalam array
$users = [];
while ($row = $result->fetch_assoc()) {
    $users[] = $row;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section class="contact" id="contact">
        <div class="row">
            <form action="" method="post">
                <h3>daftar anggota</h3>
                <input type="text" name="nama" required maxlength="50" placeholder="nama anda" class="box">
                <input type="text" name="alamat" required maxlength="50"  placeholder="masukkan alamat" class="box">
                <input type="text" name="jenis_kelamin" required maxlength="50" placeholder="masukkan jenis kelamin" class="box">
                <input type="number" name="no_hp" required maxlength="50" placeholder="masukkan nomor hp anda" class="box">
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
