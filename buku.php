<!-- view.php -->
<?php
session_start();
require 'connect.php'; // assuming connect.php contains your MySQL connection code

// Ambil data dari MySQL
$result = $mysqli->query("SELECT * FROM buku");
$pesanan = $result->fetch_all(MYSQLI_ASSOC);
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
  <section class="reservation-view" id="reservation-view">
    <h3>Daftar buku</h3>
    <table>
      <thead>
        <tr>
          <th>No ID</th>
          <th>Nama Buku</th>
          <th>Pengarang</th>
          <th>Penerbit</th>
          <th>Tahun Terbit</th>
          <th>Pilihan</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($pesanan as $pesan) : ?>
          <tr>
            <!-- Ganti '_id' dengan kolom yang sesuai, seperti 'no_kamar' -->
            <td><?php echo $pesan['id']; ?></td>
            <td><?php echo $pesan['nama_buku']; ?></td>
            <td><?php echo $pesan['pengarang']; ?></td>
            <td><?php echo $pesan['penerbit']; ?></td>
            <td><?php echo $pesan['tahun_terbit']; ?></td>
            <td>
              <a href='delete_buku.php?id=<?php echo $pesan['id']; ?>' onclick="return confirmDelete();" class="btn">Delete</a>
              <a href='update_buku.php?id=<?php echo $pesan['id']; ?>' class='btn'>Edit</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <div class="form-group">
      <a href="index.php" class="btn">Kembali</a>
    </div>
  </section>

</body>
</html>
