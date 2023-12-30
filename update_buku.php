<!-- update.php -->
<?php
session_start();
require 'connect.php';

// Ambil data dari MySQL berdasarkan ID
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Mengambil data reservasi dari tabel MySQL
    $result = $mysqli->query("SELECT * FROM buku WHERE id = $id");

    if ($result->num_rows > 0) {
        $pesanan = $result->fetch_assoc();
    } else {
        $_SESSION['error'] = "Buku tidak ditemukan";
        header("Location: index.php");
        exit();
    }
} else {
    $_SESSION['error'] = "ID tidak valid";
    header("Location: index.php");
    exit();
}

// Proses form update jika metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form (sesuaikan dengan nama field di tabel MySQL)
    $nama_buku = $_POST['nama_buku'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];


    // Update data di tabel MySQL
    $query = "UPDATE buku SET nama_buku='$nama_buku', pengarang='$pengarang', penerbit='$penerbit', tahun_terbit='$tahun_terbit'WHERE id = $id";

    if ($mysqli->query($query)) {
        $_SESSION['success'] = "Data Berhasil Diupdate";
    } else {
        $_SESSION['error'] = "Gagal Mengupdate Data: " . $mysqli->error;
    }

    header("Location: buku.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Buku</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section class="reservation-update" id="reservation-update">
        <h3>Update BUku</h3>
        <form method="post">
            <!-- Form input fields sesuaikan dengan field di tabel MySQL -->
            <label for="nama_buku">Nama Buku:</label>
            <input type="text" name="nama_buku" value="<?php echo $pesanan['nama_buku']; ?>" required>

            <label for="pengarang">Pengarang:</label>
            <input type="text" name="pengarang" value="<?php echo $pesanan['pengarang']; ?>" required>

            <label for="penerbit">Penerbit:</label>
            <input type="text" name="penerbit" value="<?php echo $pesanan['penerbit']; ?>" required>

            <label for="tahun_terbit">Tahun Terbit:</label>
            <input type="date" name="tahun_terbit" value="<?php echo $pesanan['tahun_terbit']; ?>" required>

            <button type="submit">Update</button>
        </form>
        <div class="form-group">
            <a href="index.php" class="btn">Kembali</a>
        </div>
    </section>
</body>

</html>
