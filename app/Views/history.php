<?= $this->include('layout/head') ?>
<?= $this->include('layout/sidebar') ?>
<?= $this->include('layout/header') ?>

<h2>Data History</h2>
<div class="card mt-4">
    <div class="row p-4">
        <div class="col-12">
            <div class="table-responsive">
                <table id="historyTable" class="table table-bordered">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No.</th>
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
                                <td><?= esc($sensor['id']) ?></td>
                                <td>
                                    <?php if ($sensor['phase'] == 'R'): ?>
                                        <h4 class="text-danger"><strong>R</strong></h4>
                                    <?php elseif ($sensor['phase'] == 'S'): ?>
                                        <h4 class="text-warning"><strong>S</strong></h4>
                                    <?php elseif ($sensor['phase'] == 'T'): ?>
                                        <h4 class="text-dark"><strong>T</strong></h4>
                                    <?php else: ?>                                    
                                        <h4 class="text-gray"><strong><?= esc($sensor['phase']) ?></strong></h4>
                                    <?php endif; ?>                                
                                </td>
                                <td><?= esc($sensor['current']) ?></td>
                                <td><?= esc($sensor['voltage']) ?></td>
                                <td><?= esc($sensor['frequency']) ?></td>
                                <td><?= esc($sensor['power']) ?></td>
                                <td><?= esc($sensor['pf']) ?></td>
                                <td><?= esc($sensor['energy']) ?></td>
                                <td>
                                    <?php if ($sensor['status'] == 'On'): ?>
                                        <span class="badge bg-success text-white">ON</span>
                                    <?php elseif ($sensor['status'] == 'Off'): ?>
                                        <span class="badge bg-danger text-white">OFF</span>
                                    <?php elseif ($sensor['status'] == 'Disconnected'): ?>
                                        <span class="badge bg-secondary text-white">Disconnected</span>
                                    <?php else: ?>
                                        <span class="badge bg-info text-white"><?= esc($sensor['status']) ?></span>
                                    <?php endif; ?>
                                </td>
                                <td><?= esc($sensor['created_at']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->include('layout/footer') ?>