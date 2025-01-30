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
            <td>
                <?php if ($sensor['status'] == 'Critical'): ?>
                    <span class="badge bg-danger">Critical</span>
                <?php elseif ($sensor['status'] == 'Warning'): ?>
                    <span class="badge bg-warning text-dark">Warning</span>
                <?php else: ?>
                    <span class="badge bg-success">Normal</span>
                <?php endif; ?>
            </td>
            <td><?= esc($sensor['created_at']) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->include('layout/footer') ?>
