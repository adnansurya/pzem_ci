</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2020</span>
        </div>
    </div>
</footer>

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<script>
    function loadSensorData() {
        $.ajax({
            url: "<?= base_url('get-latest-data') ?>", // Panggil API
            type: "GET",
            dataType: "json",
            success: function(response) {
                let content = "";
                response.forEach((data) => {
                    content += `
                        <div class="col-md-4">
                            <div class="card border-primary mb-3">
                                <div class="card-header bg-primary text-white text-center">
                                    Fasa ${data.phase}
                                </div>
                                <div class="card-body text-center">
                                    <p>Arus:<strong> ${data.current} A</strong></p>
                                    <p>Tegangan:<strong> ${data.voltage} V</strong></p>
                                    <p>Frekuensi:<strong> ${data.frequency} Hz</strong></p>
                                    <p>Daya:<strong> ${data.power} W</strong></p>                            
                                </div>
                            </div>
                        </div>`;
                });
                $("#sensor-data").html(content);
            }
        });
    }

    $(document).ready(function() {
        loadSensorData(); // Load pertama kali
        setInterval(loadSensorData, 5000); // Refresh setiap 5 detik
    });
</script>

</body>

</html>