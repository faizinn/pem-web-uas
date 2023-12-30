<!-- update.php -->
<?php
session_start();
require 'connect.php';

// Ambil data dari MySQL berdasarkan ID
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mengambil data dari tabel MySQL
    $result = $mysqli->query("SELECT * FROM anggota WHERE id = $id");

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        $_SESSION['error'] = "Data tidak ditemukan";
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
    // Ambil data dari form
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_hp = $_POST['no_hp'];

    // Query untuk update data di tabel MySQL
    $query = "UPDATE anggota SET 
              nama='$nama', 
              alamat='$alamat' ,
              jenis_kelamin='$jenis_kelamin', 
              no_hp='$no_hp'
              WHERE id = $id";

    if ($mysqli->query($query)) {
        $_SESSION['success'] = "Data Berhasil Diupdate";
    } else {
        $_SESSION['error'] = "Gagal Mengupdate Data: " . $mysqli->error;
    }

    header("Location: anggota.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Anggota</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section class="reservation-update" id="reservation-update">
        <h3>Update Anggota</h3>
        <form method="post">
            <!-- Form input fields sesuaikan dengan field di tabel MySQL -->
            <label for="nama">Nama:</label>
            <input type="text" name="nama" value="<?php echo $user['nama']; ?>" required>

            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" value="<?php echo $user['alamat']; ?>" required>

            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <input type="text" name="jenis_kelamin" value="<?php echo $user['jenis_kelamin']; ?>" required>

            <label for="no_hp">No HP:</label>
            <input type="number" name="no_hp" value="<?php echo $user['no_hp']; ?>" required>


            <button type="submit">Update</button>
        </form>
        <div class="form-group">
            <a href="index.php" class="btn">Kembali</a>
        </div>
    </section>
</body>
</html>
