<?php
session_start();
require 'connect.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $reviewId = $_GET['id'];

    // Query untuk menghapus data review berdasarkan _id
    $deleteQuery = "DELETE FROM peminjaman WHERE id = $reviewId";

    if ($mysqli->query($deleteQuery)) {
        $_SESSION['success'] = "Data berhasil dihapus";
    } else {
        $_SESSION['error'] = "Gagal menghapus data: " . $mysqli->error;
    }
} else {
    $_SESSION['error'] = "ID tidak valid";
}

// Redirect kembali ke halaman review setelah menghapus data
header("Location: peminjaman.php");
exit();
?>
