<?php
// Pastikan ID peminjaman lapangan telah diterima melalui parameter GET
if (isset($_GET['id'])) {
    $id_booking = $_GET['id'];

    // Pastikan ID peminjaman lapangan valid (misalnya, cek apakah ID booking ada di database)
    // Selanjutnya, Anda dapat mengambil data peminjaman lapangan dari database berdasarkan ID yang diberikan

    // Kemudian, tampilkan form untuk memperbarui waktu mulai dan waktu selesai peminjaman lapangan
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Peminjaman Lapangan</title>
    </head>
    <body>
        <h1>Update Peminjaman Lapangan</h1>
        <form action="proses_update_pelanggan.php" method="POST">
            <input type="hidden" name="id_booking" value="<?php echo $id_booking; ?>">
            <label for="waktu_mulai">Waktu Mulai Baru:</label><br>
            <input type="datetime-local" id="waktu_mulai" name="waktu_mulai" required><br>
            <label for="waktu_selesai">Waktu Selesai Baru:</label><br>
            <input type="datetime-local" id="waktu_selesai" name="waktu_selesai" required><br>
            <input type="submit" value="Update">
        </form>
    </body>
    </html>
    <?php
} else {
    // Jika parameter ID tidak diberikan, munculkan pesan kesalahan
    echo "ID peminjaman lapangan tidak ditemukan.";
}
?>
