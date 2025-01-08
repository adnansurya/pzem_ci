<?php
header('Content-Type: application/json');

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pzem3fasa";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Connection failed: " . $conn->connect_error]));
}

// Mendapatkan data dari ESP32
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $phase_a = isset($_GET['phase_a']) ? $_GET['phase_a'] : null;
    $phase_b = isset($_GET['phase_b']) ? $_GET['phase_b'] : null;
    $phase_c = isset($_GET['phase_c']) ? $_GET['phase_c'] : null;

    if ($phase_a !== null && $phase_b !== null && $phase_c !== null) {
        $stmt = $conn->prepare("INSERT INTO current_data (phase_a, phase_b, phase_c, timestamp) VALUES (?, ?, ?, NOW())");
        $stmt->bind_param("ddd", $phase_a, $phase_b, $phase_c);

        if ($stmt->execute()) {
            echo json_encode(["success" => true, "message" => "Data inserted successfully"]);
        } else {
            echo json_encode(["success" => false, "message" => "Failed to insert data"]);
        }
        $stmt->close();
    } else {
        echo json_encode(["success" => false, "message" => "Invalid data"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid request method"]);
}

$conn->close();
