<div class="d-flex">
    <div class="bg-light sidebar" style="width: 250px; height: 100vh; position: fixed;">
        <ul class="nav flex-column p-3">
            <li class="nav-item">
                <a class="nav-link <?= (current_url() == base_url('dashboard')) ? 'active' : '' ?>" href="<?= base_url('dashboard') ?>">
                    <i class="fas fa-chart-line"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= (current_url() == base_url('history')) ? 'active' : '' ?>" href="<?= base_url('history') ?>">
                    <i class="fas fa-history"></i> Data History
                </a>
            </li>
        </ul>
    </div>
    <div class="content" style="margin-left: 260px; padding: 20px; width: 100%;">
