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
<script src="vendor/datatables/datatables.min.js"></script>


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
                response.reverse().forEach((data) => {
                    let cardColor = "default";
                    if (data.phase == "R") {
                        cardColor = "danger";
                    } else if (data.phase == "S") {
                        cardColor = "warning";
                    } else if (data.phase == "T") {
                        cardColor = "dark";
                    }
                    content += `
                        <div class="col-md-4">
                            <div class="card border-${cardColor} mb-3">
                                <div class="card-header bg-${cardColor} text-white text-center">
                                    <h4> Fasa ${data.phase} </h4>
                                </div>
                                <div class="card-body text-center">
                                    <div class="row">
                                        <div class="col-6">
                                        <p>Arus <br> <h4> ${data.current} A</h4></p>
                                        </div>
                                        <div class="col-6">
                                        <p>Tegangan <br> <h4> ${data.voltage} V</h4></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                        <p>Frekuensi <br> <h4> ${data.frequency} Hz</h4></p>
                                        </div>
                                        <div class="col-6">
                                        <p>Daya <br> <h4> ${data.power} W</h4></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                        <p>Pf <br> <h4> ${data.pf}</h4></p>
                                        </div>
                                        <div class="col-6">
                                        <p>Energi <br> <h4> ${data.power} Wh</h4></p> 
                                        </div>
                                    </div>                                                               
                                </div>
                                <div class="card-footer bg-${cardColor} text-white pb-0">
                                    <p><small>Diperbarui pada</small> <br> ${data.created_at}</p>
                                </div> 
                            </div>
                        </div>`;
                });
                $("#sensor-data").html(content);
            }
        });
    }



    $(document).ready(function() {

        <?php $current_page = str_replace('index.php/', '', current_url()); ?>

        <?php if ($current_page == base_url('dashboard')) : ?>
            loadSensorData(); // Load pertama kali
            setInterval(loadSensorData, 5000); // Refresh setiap 5 detik

        <?php elseif ($current_page == base_url('history')) : ?>
            $('#historyTable').DataTable({
                "responsive": true,
                "autoWidth": false,
                "pageLength": 10, // Jumlah data per halaman
                "order": [
                    [0, "desc"]
                ], // Urutkan berdasarkan kolom waktu terbaru
                "language": {
                    "lengthMenu": "Tampilkan _MENU_ data per halaman",
                    "zeroRecords": "Data tidak ditemukan",
                    "info": "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                    "infoEmpty": "Tidak ada data tersedia",
                    "infoFiltered": "(disaring dari total _MAX_ data)",
                    "search": "Cari:",
                    "paginate": {
                        "first": "Awal",
                        "last": "Akhir",
                        "next": "Berikutnya",
                        "previous": "Sebelumnya"
                    }
                }
            });
        <?php endif ?>

    });
</script>

</body>

</html>