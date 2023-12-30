<?php
session_start();
require 'connect.php';

if (isset($_SESSION['success'])) {
}

try {
    // Menggabungkan data dari tabel reviews, users, dan reservasi
    $query = "
        SELECT
            p.id,
            p.id_anggota,
            p.id_buku,
            p.tanggal_peminjaman
        FROM peminjaman p
        JOIN anggota u ON p.id_anggota = u.id
        JOIN buku re ON p.id_buku = re.id
    ";

    $result = $mysqli->query($query);

    if (!$result) {
        throw new Exception("Error executing query: " . $mysqli->error);
    }

    $reviews = $result->fetch_all(MYSQLI_ASSOC);
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <section class="review">
        <div class="row">
            <h3>Daftar peminjaman</h3>
            <table>
                <thead>
                    <tr>
                        <th>no id</th>
                        <th>id Anggota</th>
                        <th>id Buku</th>
                        <th>Tanggal peminjaman</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reviews as $review) : ?>
                        <tr>
                            <td><?php echo $review['id']; ?></td>
                            <td><?php echo $review['id_anggota']; ?></td>
                            <td><?php echo $review['id_buku']; ?></td>
                            <td><?php echo $review['tanggal_peminjaman']; ?></td>
                            <td>
                                <a href='delete_peminjaman.php?id=<?php echo $review['id']; ?>' class="btn">Delete</a>
                                <a href='update_peminjaman.php?id=<?php echo $review['id']; ?>' class='btn'>Edit</a>
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
