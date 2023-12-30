<!-- update.php -->
<?php
session_start();
require 'connect.php';

// Ambil data dari MySQL berdasarkan ID
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Mengambil data reservasi dari tabel MySQL
    $result = $mysqli->query("SELECT * FROM peminjaman WHERE id = $id");

    if ($result->num_rows > 0) {
        $rivew = $result->fetch_assoc();
    } else {
        $_SESSION['error'] = "peminjaman tidak ditemukan";
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
    $id_anggota = $_POST['id_anggota'];
    $id_buku = $_POST['id_buku'];
    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];



    // Update data di tabel MySQL
    $query = "UPDATE peminjaman SET id_anggota='$id_anggota', id_buku='$id_buku', tanggal_peminjaman='$tanggal_peminjaman'WHERE id = $id";

    if ($mysqli->query($query)) {
        $_SESSION['success'] = "Data Berhasil Diupdate";
    } else {
        $_SESSION['error'] = "Gagal Mengupdate Data: " . $mysqli->error;
    }

    header("Location: peminjaman.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Peminjaman</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section class="reservation-update" id="reservation-update">
        <h3>Update Peminjaman</h3>
        <form method="post">
            <!-- Form input fields sesuaikan dengan field di tabel MySQL -->
            <label for="id_angggota">ID Anggota:</label>
            <input type="number" name="id_anggota" value="<?php echo $review['id_anggota']; ?>" required>

            <label for="id_buku">ID buku:</label>
            <input type="number" name="id_buku" value="<?php echo $review['id_buku']; ?>" required>

            <label for="tanggal_peminjaman">Penerbit:</label>
            <input type="date" name="tanggal_peminjaman" value="<?php echo $review['tanggal_peminjaman']; ?>" required>

            <button type="submit">Update</button>
        </form>
        <div class="form-group">
            <a href="index.php" class="btn">Kembali</a>
        </div>
    </section>
</body>

</html>
