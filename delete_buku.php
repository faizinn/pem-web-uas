<?php
session_start();
require 'connect.php'; // assuming connect.php contains your MySQL connection code

// Pastikan ID telah disediakan
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data berdasarkan ID
    $query = "DELETE FROM buku WHERE id = $id";

    if ($mysqli->query($query)) {
        $_SESSION['success'] = "Data berhasil dihapus";
    } else {
        $_SESSION['error'] = "Gagal menghapus data: " . $mysqli->error;
    }
} else {
    $_SESSION['error'] = "ID tidak valid";
}

// Redirect kembali ke halaman view.php
header("Location: buku.php");
exit();
?>
