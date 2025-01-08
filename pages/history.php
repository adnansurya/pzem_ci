<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pzem3fasa";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari tabel current_data
$sql = "SELECT phase_a, phase_b, phase_c, timestamp FROM current_data ORDER BY timestamp DESC";
$result = $conn->query($sql);
?>
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">History</h1>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Phase A (A)</th>
                        <th>Phase B (A)</th>
                        <th>Phase C (A)</th>
                        <th>Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        $counter = 1;
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                        <td>" . $counter++ . "</td>
                                        <td>" . $row['phase_a'] . "</td>
                                        <td>" . $row['phase_b'] . "</td>
                                        <td>" . $row['phase_c'] . "</td>
                                        <td>" . $row['timestamp'] . "</td>
                                    </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='text-center'>No data available</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>