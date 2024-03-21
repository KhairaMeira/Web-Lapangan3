<?php
// Pastikan form telah disubmit
if (isset($_POST['id_booking'])) {
    include 'koneksi.php';

    $id_booking = $_POST['id_booking'];
    $waktu_mulai_baru = $_POST['waktu_mulai'];
    $waktu_selesai_baru = $_POST['waktu_selesai'];

    // Lakukan pembaruan data peminjaman lapangan
    $sql_update_booking = "UPDATE Bookings SET waktu_mulai = '$waktu_mulai_baru', waktu_selesai = '$waktu_selesai_baru' WHERE id_booking = '$id_booking'";
    
    if ($koneksi->query($sql_update_booking) === TRUE) {
        // Redirect kembali ke halaman index setelah berhasil mengupdate
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql_update_booking . "<br>" . $koneksi->error;
    }

    // Tutup koneksi
    $koneksi->close();
}
?>
