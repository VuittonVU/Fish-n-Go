<?php
$servername = "localhost"; // atau "127.0.0.1"
$username = "root"; // biasanya "root" jika menggunakan XAMPP
$password = ""; // kosong jika menggunakan XAMPP
$dbname = "register"; // nama database

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
