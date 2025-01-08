<?php
header('Content-Type: application/json');

// Konfigurasi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pzem3fasa";

// Koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    echo json_encode(['error' => 'Database connection failed: ' . $conn->connect_error]);
    exit();
}

// Query untuk mendapatkan data terbaru
$sql = "SELECT phase_a, phase_b, phase_c FROM current_data ORDER BY timestamp DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Ambil data terbaru
    $row = $result->fetch_assoc();
    echo json_encode([
        'phase_a' => (float)$row['phase_a'],
        'phase_b' => (float)$row['phase_b'],
        'phase_c' => (float)$row['phase_c']
    ]);
} else {
    // Jika tidak ada data
    echo json_encode([
        'error' => 'No data available'
    ]);
}

// Tutup koneksi
$conn->close();
?>
