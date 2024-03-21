<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Lapangan Basket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa; /* Warna background yang lebih elegan */
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #333;
            text-align: center;
        }
        form {
            margin-bottom: 20px;
            text-align: center; /* Pusatkan form */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        td:last-child {
            text-align: center;
        }
        a {
            background-color: #007bff; /* Warna tombol yang telah diperbarui */
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #0056b3; /* Warna tombol saat di hover */
        }
        button {
            background-color: #007bff; /* Warna tombol yang telah diperbarui */
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3; /* Warna tombol saat di hover */
        }
        input[type="submit"] {
            background-color: #007bff; /* Warna tombol yang telah diperbarui */
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3; /* Warna tombol saat di hover */
        }
        .action-btn {
            display: flex;
            justify-content: center; /* Pusatkan tombol aksi */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Peminjaman Lapangan Basket</h1>

        <h2>Tambah Peminjaman Lapangan</h2>
        <form action="tambah_peminjaman.php" method="POST">
            <label for="id_booking">ID Booking:</label><br>
            <input type="text" id="id_booking" name="id_booking" required><br>
            <label for="id_customer">ID Customer:</label><br>
            <input type="text" id="id_customer" name="id_customer" required><br>
            <label for="waktu_mulai">Waktu Mulai:</label><br>
            <input type="datetime-local" id="waktu_mulai" name="waktu_mulai" required><br>
            <label for="waktu_selesai">Waktu Selesai:</label><br>
            <input type="datetime-local" id="waktu_selesai" name="waktu_selesai" required><br>
            <div class="action-btn">
                <input type="submit" value="Tambah Peminjaman">
            </div>
        </form>
        

        <h2>Daftar Peminjaman</h2>
        <table border="1">
            <tr>
                <th>ID Booking</th>
                <th>ID Customer</th>
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th>Aksi</th>
            </tr>
            <?php
            include 'koneksi.php';

            $query = "SELECT * FROM Bookings";
            $result = $koneksi->query($query);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . (isset($row["id_booking"]) ? $row["id_booking"] : "") . "</td>";
                    echo "<td>" . (isset($row["id_customer"]) ? $row["id_customer"] : "") . "</td>";
                    echo "<td>" . (isset($row["waktu_mulai"]) ? $row["waktu_mulai"] : "") . "</td>";
                    echo "<td>" . (isset($row["waktu_selesai"]) ? $row["waktu_selesai"] : "") . "</td>";
                    echo "<td>";
                    echo "<a href='update_pelanggan.php?id=" . $row['id_booking'] . "' class='btn btn-info'>Update</a>";
                    echo "<button type='button' onclick='confirmDelete(".  $row["id_booking"] .")'>Delete</button>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Tidak ada peminjaman.</td></tr>";
            }

            $koneksi->close();
            ?>
        </table>

        <!-- Button logout -->
        <form action="registrasi.php" method="GET">
            <input type="submit" value="Logout">
        </form>
        <script>
            function confirmDelete(bookId) {
                var confirmation = window.confirm('Are you sure you want to delete this book?');
                if (confirmation) {
                    // If user confirms, redirect to delete script
                    window.location.href = 'hapus_peminjaman.php?id=' + bookId;
                }
            }
        </script>
    </div>
</body>
</html>
