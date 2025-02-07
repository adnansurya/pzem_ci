<?= $this->include('layout/head') ?>
<?= $this->include('layout/sidebar') ?>
<?= $this->include('layout/header') ?>

<h2>Dashboard Monitoring</h2>
<p>Welcome, <?= session('username') ?>!</p>
<div class="row mt-4" id="sensor-data">
    <!-- Data akan dimuat di sini via AJAX -->
</div>


<?= $this->include('layout/footer') ?>