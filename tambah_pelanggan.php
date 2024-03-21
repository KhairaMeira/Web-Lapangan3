<?php
include 'koneksi.php';

// Ambil data dari form
$nama = $_POST['nama'];
$email = $_POST['email'];

// Tambahkan pelanggan ke database
$sql = "INSERT INTO Customers (nama, email) VALUES ('$nama', '$email')";
if ($koneksi->query($sql) === TRUE) {
    echo "Pelanggan berhasil ditambahkan.";
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

// Tutup koneksi
$koneksi->close();
?>
