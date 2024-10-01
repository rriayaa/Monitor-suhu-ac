<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$password = "";
$dbname = "ac_system";
$conn = new mysqli($host, $user, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$temperature = $_POST['temperature'];
$humidity = $_POST['humidity'];

// Validasi kombinasi suhu dan kelembapan
if ($temperature < 20 && $humidity > 70) {
    header("Location: result.php?error=Kombinasi suhu dan kelembapan tidak realistis. Suhu dibawah 20°C tidak dapat memiliki kelembapan di atas 70%.");
    exit;
}
if ($temperature >= 20 && $temperature <= 25 && $humidity > 80) {
    header("Location: result.php?error=Kombinasi suhu dan kelembapan tidak realistis. Suhu antara 20°C dan 25°C tidak dapat memiliki kelembapan di atas 80%.");
    exit;
}
if ($temperature > 25 && $humidity < 30) {
    header("Location: result.php?error=Kombinasi suhu dan kelembapan tidak realistis. Suhu di atas 25°C tidak dapat memiliki kelembapan dibawah 30%.");
    exit;
}

// Tentukan level kerja AC
if ($temperature < 20) {
    $workload = "AC Mati";
} elseif ($temperature >= 20 && $temperature < 25) {
    if ($humidity < 50) {
        $workload = "AC Menyala Rendah";
    } elseif ($humidity < 70) {
        $workload = "AC Menyala Sedang";
    } else {
        $workload = "AC Menyala Tinggi";
    }
} elseif ($temperature >= 25 && $temperature < 30) {
    if ($humidity < 50) {
        $workload = "AC Menyala Sedang";
    } elseif ($humidity < 70) {
        $workload = "AC Menyala Tinggi";
    } else {
        $workload = "AC Menyala Berat";
    }
} else { // Suhu 30°C ke atas
    if ($humidity < 50) {
        $workload = "AC Menyala Tinggi";
    } elseif ($humidity < 70) {
        $workload = "AC Menyala Berat";
    } else {
        $workload = "AC Menyala Sangat Berat";
    }
}

// Simpan hasil ke database
$sql = "INSERT INTO ac_data (temperature, humidity, workload) VALUES ('$temperature', '$humidity', '$workload')";

if ($conn->query($sql) === TRUE) {
    // Redirect ke halaman hasil dengan workload yang benar
    header("Location: result.php?workload=$workload&temperature=$temperature&humidity=$humidity");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
