<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Pengaturan Suhu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>History Pengaturan Suhu AC</h1>

    <div class="table-container"> <!-- Kontainer Tabel -->
        <table>
            <tr>
                <th>ID</th>
                <th>Suhu (°C)</th>
                <th>Kelembapan (%)</th>
                <th>Workload</th>
                <th>Tanggal</th>
            </tr>
            <?php
            // Koneksi ke database dan ambil data
            $host = "localhost";
            $user = "root";
            $password = "";
            $dbname = "ac_system";
            $conn = new mysqli($host, $user, $password, $dbname);

            // Periksa koneksi
            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            // Ambil data dari database
            $sql = "SELECT * FROM ac_data";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['temperature']}</td>
                            <td>{$row['humidity']}</td>
                            <td>{$row['workload']}</td>
                            <td>{$row['created_at']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
            }
            $conn->close(); // Menutup koneksi
            ?>
        </table>
    </div>

    <div class="history-buttons">
        <button onclick="window.location.href='index.html';">Kembali</button>
    </div>
</body>
</html>
