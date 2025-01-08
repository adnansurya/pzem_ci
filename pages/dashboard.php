<div class="row">
    <!-- Phase A -->
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Phase A Current</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="phase_a">0.00 A</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-bolt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Phase B -->
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Phase B Current</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="phase_b">0.00 A</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-bolt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Phase C -->
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Phase C Current</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="phase_c">0.00 A</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-bolt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function fetchRealtimeData() {
        fetch('api/realtime-data.php')
            .then(response => response.json())
            .then(data => {
                document.getElementById('phase_a').textContent = data.phase_a + ' A';
                document.getElementById('phase_b').textContent = data.phase_b + ' A';
                document.getElementById('phase_c').textContent = data.phase_c + ' A';
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    }

    setInterval(fetchRealtimeData, 2000); // Update setiap 2 detik
    fetchRealtimeData(); // Muat data pertama kali
</script>
