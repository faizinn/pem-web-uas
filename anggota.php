<?php
session_start();
require 'connect.php';

// Query untuk mendapatkan data pengguna dari tabel MySQL
$query = "SELECT * FROM anggota";
$result = $mysqli->query($query);

// Mengambil hasil query ke dalam array
$users = [];
while ($row = $result->fetch_assoc()) {
    $users[] = $row;
}

// Menutup koneksi tidak diperlukan di sini
// $mysqli->close();
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

    <section class="profil" id="profil">
        <div class="row">
            <h3>Daftar Anggota</h3>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <!-- Ganti 'id' dengan kolom yang sesuai di database -->
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>jenis kelamin</th>
                        <th>no hp</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['nama']; ?></td>
                            <!-- Ganti 'id' dengan kolom yang sesuai di database -->
                            <td><?php echo $user['alamat']; ?></td>
                            <td><?php echo $user['jenis_kelamin']; ?></td>
                            <td><?php echo $user['no_hp']; ?></td>
                            <td>
                                <!-- Ganti 'id' dengan kolom yang sesuai di database -->
                                <a href='delete_anggota.php?id=<?php echo $user['id']; ?>' onclick="return confirmDelete();" class="btn">Delete</a>  
                                <a href='update_anggota.php?id=<?php echo $user['id']; ?>' class='btn'>Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="form-group">
            <a href="index.php" class="btn">Kembali</a>
        </div>
    </section>


</body>

</html>
