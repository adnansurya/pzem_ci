<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'main';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IoT Monitoring</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include 'partials/sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include 'partials/topbar.php'; ?>
                <div class="container-fluid">
                    <?php
                    if ($page === 'main') {
                        include 'pages/main.php';
                    } elseif ($page === 'history') {
                        include 'pages/history.php';
                    } else {
                        echo "<div class='alert alert-danger'>Halaman tidak ditemukan.</div>";
                    }
                    ?>
                </div>
            </div>
            <?php include 'partials/footer.php'; ?>
        </div>
    </div>

    <!-- Scripts -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>
