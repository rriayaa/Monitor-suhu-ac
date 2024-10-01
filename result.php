<?php
// Aktifkan error reporting untuk debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Cek apakah ada error yang dikirim melalui URL
if (isset($_GET['error'])) {
    $error = $_GET['error'];
} else {
    $error = "";
}

// Ambil data suhu, kelembapan dari URL jika tersedia
$temperature = isset($_GET['temperature']) ? $_GET['temperature'] : null;
$humidity = isset($_GET['humidity']) ? $_GET['humidity'] : null;

// Fungsi untuk menentukan level kerja AC berdasarkan suhu dan kelembapan
function getACWorkload($temperature, $humidity) {
    if ($temperature < 20) {
        return "AC Mati";
    } elseif ($temperature >= 20 && $temperature < 25) {
        return ($humidity < 50) ? "AC Menyala Rendah" : "AC Menyala Sedang";
    } elseif ($temperature >= 25 && $temperature < 30) {
        return ($humidity < 50) ? "AC Menyala Sedang" : "AC Menyala Berat";
    } else {
        return "AC Menyala Sangat Berat";
    }
}

// Tentukan level kerja AC berdasarkan suhu dan kelembapan
$workload = isset($_GET['workload']) ? $_GET['workload'] : getACWorkload($temperature, $humidity);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pengaturan AC</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Hasil Pengaturan AC</h1>

        <!-- Tampilkan pesan error jika ada -->
        <?php if (!empty($error)): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>

        <!-- Tampilkan suhu, kelembapan, dan workload jika ada -->
        <p>Suhu: <?php echo isset($temperature) ? $temperature . "°C" : "-"; ?></p>
        <p>Kelembapan: <?php echo isset($humidity) ? $humidity . "%" : "-"; ?></p>
        <p>Level kerja AC: <?php echo isset($workload) ? $workload : "-"; ?></p>

        <div class="buttons">
            <button onclick="window.location.href='index.html'">Kembali</button>
            <button onclick="window.location.href='history.php'">Lihat History</button>
        </div>
    </div>
</body>
</html>
