<?php
session_start();
include 'koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM Customers WHERE email='$email'";
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        // Login berhasil
        $_SESSION['id_customer'] = $row['id_customer'];
        // Redirect ke halaman index setelah login berhasil
        header("Location: index.php");
        exit(); // Pastikan tidak ada output lain sebelum header() dipanggil
    } else {
        echo "Password salah.";
    }
} else {
    echo "Email tidak ditemukan.";
}

$koneksi->close();
?>
