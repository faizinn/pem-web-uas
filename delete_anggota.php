<?php
session_start();
require 'connect.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $userId = $_GET['id'];

    // Query untuk menghapus data profil berdasarkan _id
    $deleteQuery = "DELETE FROM anggota WHERE id = $userId";

    if ($mysqli->query($deleteQuery)) {
        $_SESSION['success'] = "Data berhasil dihapus";
    } else {
        $_SESSION['error'] = "Gagal menghapus data: " . $mysqli->error;
    }
} else {
    $_SESSION['error'] = "ID tidak valid";
}

// Redirect kembali ke halaman profil setelah menghapus data
header("Location: anggota.php");
exit();
?>
