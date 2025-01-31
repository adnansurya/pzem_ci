<?= $this->include('layout/head') ?>
<?= $this->include('layout/sidebar') ?>
<?= $this->include('layout/header') ?>

<h2>Data History</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Fasa</th>
            <th>Arus (A)</th>
            <th>Tegangan (V)</th>
            <th>Frekuensi (Hz)</th>
            <th>Daya (W)</th>
            <th>Pf</th>
            <th>Energy (Wh)</th>
            <th>Status</th>
            <th>Waktu</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($sensorHistory as $sensor): ?>
            <tr>
                <td><?= esc($sensor['phase']) ?></td>
                <td><?= esc($sensor['current']) ?></td>
                <td><?= esc($sensor['voltage']) ?></td>
                <td><?= esc($sensor['frequency']) ?></td>
                <td><?= esc($sensor['power']) ?></td>
                <td><?= esc($sensor['pf']) ?></td>
                <td><?= esc($sensor['energy']) ?></td>
                <td>
                    <?php if ($sensor['status'] == 'On'): ?>
                        <span class="badge bg-success">ON</span>
                    <?php elseif ($sensor['status'] == 'Off'): ?>
                        <span class="badge bg-danger">OFF</span>
                    <?php elseif ($sensor['status'] == 'Disconnected'): ?>
                        <span class="badge bg-default text-dark">Disconnected</span>
                    <?php else: ?>
                        <span class="badge bg-warning text-datk"><?= esc($sensor['power']) ?></span>
                    <?php endif; ?>
                </td>
                <td><?= esc($sensor['created_at']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->include('layout/footer') ?>