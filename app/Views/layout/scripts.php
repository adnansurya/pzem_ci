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