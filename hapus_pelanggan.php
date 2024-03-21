<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hapus_pelanggan'])) {
    $id_customer_to_delete = $_POST['hapus_pelanggan'];

    // Hapus semua peminjaman terkait dengan pelanggan yang akan dihapus
    $sql_delete_bookings = "DELETE FROM Bookings WHERE id_customer = '$id_customer_to_delete'";
    
    if ($koneksi->query($sql_delete_bookings) === TRUE) {
        // Hapus pelanggan setelah peminjaman terkait telah dihapus
        $sql_delete_customer = "DELETE FROM Customers WHERE id_customer = '$id_customer_to_delete'";
        
        if ($koneksi->query($sql_delete_customer) === TRUE) {
            echo "Pelanggan berhasil dihapus.";
        } else {
            echo "Error: " . $sql_delete_customer . "<br>" . $koneksi->error;
        }
    } else {
        echo "Error: " . $sql_delete_bookings . "<br>" . $koneksi->error;
    }
} else {
    // Jika tidak ada data yang dihapus, arahkan ke halaman index atau halaman lainnya
    header("Location: index.php");
}

// Tutup koneksi
$koneksi->close();
?>
