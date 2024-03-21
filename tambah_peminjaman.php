<?php
include 'koneksi.php';

// Ambil data yang dikirimkan dari form
$id_booking = $_POST['id_booking'];
$id_customer = $_POST['id_customer'];
$waktu_mulai = $_POST['waktu_mulai'];
$waktu_selesai = $_POST['waktu_selesai'];

// Periksa apakah id_booking sudah digunakan
$sql_check_booking = "SELECT id_booking FROM Bookings WHERE id_booking = '$id_booking'";
$result_check_booking = $koneksi->query($sql_check_booking);

if ($result_check_booking->num_rows > 0) {
    // id_booking sudah digunakan, tampilkan pesan kesalahan
    echo "ID booking sudah digunakan.";
} else {
    // id_booking belum digunakan, lanjutkan dengan menambahkan peminjaman lapangan
    $sql = "INSERT INTO Bookings (id_booking, id_customer, waktu_mulai, waktu_selesai) 
            VALUES ('$id_booking', '$id_customer', '$waktu_mulai', '$waktu_selesai')";

    if ($koneksi->query($sql) === TRUE) {
        echo "Peminjaman lapangan berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

// Tutup koneksi
$koneksi->close();
?>
