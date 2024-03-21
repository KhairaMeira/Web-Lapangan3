<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];

// Enkripsi password sebelum disimpan ke database (disarankan menggunakan fungsi hashing yang aman)
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO Customers (nama, email, password) VALUES ('$nama', '$email', '$hashed_password')";
if ($koneksi->query($sql) === TRUE) {
    echo "Registrasi berhasil.";
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

$koneksi->close();
?>
