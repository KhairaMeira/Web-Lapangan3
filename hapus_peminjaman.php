<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $bookingId = $_GET['id'];

    // Perform deletion from the database
    $delete = mysqli_prepare($koneksi, "DELETE FROM bookings WHERE id_booking = ?");
    mysqli_stmt_bind_param($delete, "s", $bookingId);

    if (mysqli_stmt_execute($delete)) {
        // Deletion successful
        header('location: index.php');
        exit;
    } else {
        // Error during deletion
        echo 'Error: ' . mysqli_error($koneksi);
    }

    mysqli_stmt_close($delete);
} else {
    // Invalid request, no book ID provided
    echo 'Invalid request';
}
?>