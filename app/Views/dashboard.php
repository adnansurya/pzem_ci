<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Data Sensor PZEM</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Fasa</th>
                    <th>Arus (A)</th>
                    <th>Tegangan (V)</th>
                    <th>Frekuensi (Hz)</th>
                    <th>Daya (W)</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sensorData as $sensor): ?>
                <tr>
                    <td><?= esc($sensor['phase']) ?></td>
                    <td><?= esc($sensor['current']) ?></td>
                    <td><?= esc($sensor['voltage']) ?></td>
                    <td><?= esc($sensor['frequency']) ?></td>
                    <td><?= esc($sensor['power']) ?></td>
                    <td><?= esc($sensor['created_at']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="/history" class="btn btn-primary">Lihat Data Historis</a>
    </div>
</body>
</html>
