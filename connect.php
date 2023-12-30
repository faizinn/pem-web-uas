<?php
// Informasi koneksi MySQL
$host = "localhost"; // Ganti dengan host MySQL Anda
$username = "root"; // Ganti dengan username MySQL Anda
$password = ""; // Ganti dengan password MySQL Anda
$database = "perpustakaan"; // Ganti dengan nama database Anda

// Membuat koneksi
$mysqli = new mysqli($host, $username, $password, $database);

// Memeriksa koneksi
if ($mysqli->connect_error) {
    die("Koneksi ke MySQL gagal: " . $mysqli->connect_error);
}

// Kode di sini untuk menjalankan query atau operasi database lainnya

?>
