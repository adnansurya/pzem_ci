<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <!-- <i class="fas fa-laugh-wink"></i> -->
            <i class="fas fa-plug"></i>
        </div>
        <div class="sidebar-brand-text mx-3">IoT <sup>Monitoring</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link <?= (current_url() == base_url('dashboard')) ? 'active' : '' ?>" href="<?= base_url('dashboard') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item">
    <a class="nav-link <?= (current_url() == base_url('history')) ? 'active' : '' ?>" href="<?= base_url('history') ?>">
            <i class="fas fa-list"></i>
            <span>History</span></a>
    </li>

</ul>