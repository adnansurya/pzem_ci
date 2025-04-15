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

<div class="modal fade" id="modalNotifRealtime" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-default">
                <h5 class="modal-title">⚠️ Notifikasi</h5>
                <button type="button" class="btn-close" data-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="modalNotifBody">
                <!-- isi notifikasi -->
            </div>
        </div>
    </div>
</div>

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
    function loadNotifikasiTerbaru() {
        $.ajax({
            url: "<?= base_url('get-notifikasi-terbaru') ?>",
            method: "GET",
            dataType: "json",
            success: function(res) {
                let html = '';
                res.forEach(notif => {
                    html += `
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                            <div class="icon-circle bg-warning">
                                <i class="fas fa-exclamation-triangle text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">${formatTanggal(notif.created_at)}</div>
                            <span class="font-weight-bold">${notif.pesan}</span>
                        </div>
                    </a>`;
                });

                $('#dropdownNotifikasi').html(html);
            }
        });
    }

    function formatTanggal(timestamp) {
        const date = new Date(timestamp);
        const options = {
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        };
        return date.toLocaleDateString('id-ID', options);
    }

    // Panggil saat halaman load dan refresh setiap 5 detik
    loadNotifikasiTerbaru();
    setInterval(loadNotifikasiTerbaru, 5000);

    setInterval(() => {
        $.ajax({
            url: "<?= base_url('cek-notif') ?>",
            method: "GET",
            dataType: "json",
            success: function(res) {
                if (res.success) {
                    $('#modalNotifBody').html(res.pesan);
                    let modal = new bootstrap.Modal(document.getElementById('modalNotifRealtime'));
                    modal.show();
                }
            }
        });
    }, 1000); // setiap 1 detik

    function loadSensorData() {
        $.ajax({
            url: "<?= base_url('get-latest-data') ?>", // Panggil API
            type: "GET",
            dataType: "json",
            success: function(response) {
                let content = "";
                response.forEach((data) => {
                    let cardColor = "gray";
                    let cardTextColor = "gray";
                    if (data.phase == "R") {
                        cardColor = "danger";
                        cardTextColor = "white";
                    } else if (data.phase == "S") {
                        cardColor = "warning";
                        cardTextColor = "dark";
                    } else if (data.phase == "T") {
                        cardColor = "dark";
                        cardTextColor = "white";
                    }
                    content += `
                        <div class="col-md-4">
                            <div class="card border-${cardColor} mb-3">
                                <div class="card-header bg-${cardColor} text-${cardTextColor} text-center">
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
                                        <div class="col-12">  
                                            <p>Status <br> <h4>${data.status}</h4> </p>
                                        </div>
                                    </div>                                                          
                                </div>
                                
                                <div class="card-footer bg-${cardColor} text-${cardTextColor} pb-0">
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