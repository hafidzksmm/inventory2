<x-app-layout>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />

        <div class="container-fluid py-4 px-5">

            <div class="row">
                <div class="col-md-12">
                    <div class="d-md-flex align-items-center mb-3 mx-2">
                        <div class="mb-md-0 mb-3">
                            <h3 class="font-weight-bold mb-0">Halo, Tim MTT</h3>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-0">

            <!-- Swiper Section -->
            <div class="row">
                <div class="position-relative overflow-hidden">
                    <div class="swiper mySwiper mt-4 mb-2">
                        <div class="swiper-wrapper">

                            @for ($i = 1; $i <= 3; $i++)
                                <div class="swiper-slide">
                                    <div
                                        class="card card-background shadow-none border-radius-xl card-background-after-none align-items-start mb-0">
                                        <div class="full-background bg-cover"
                                            style="background-image: url('../assets/img/ikon-{{ $i }}.jpg')"></div>
                                        <div class="card-body text-start px-3 py-0 w-100">
                                            <div class="row mt-12">
                                                <div class="col-sm-3 mt-auto">
                                                    <h4 class="text-dark font-weight-bolder">#{{ $i }}</h4>
                                                    <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Name
                                                    </p>
                                                    <h5 class="text-dark font-weight-bolder">
                                                        {{ ['Inventory Workshop', 'Inventory Project', 'Asset Jual'][$i - 1] }}
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor

                        </div>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>

            <!-- ================= PIE CHART SECTION ================= -->
            <div class="row mt-5">
                <div class="col-md-6 mx-auto text-center">
                    <h4 class="mb-4">Statistik Data Inventori</h4>
                    <canvas id="inventoryChart" width="400" height="400" style="cursor: pointer;"></canvas>
                </div>
            </div>

            <!-- ================= MODAL DETAIL ================= -->
            <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" style="max-height: 80vh; overflow-y: auto;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailModalLabel">Detail Jumlah Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-start">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Inventory Project
                                    <span class="badge bg-primary rounded-pill">{{ $countProjek }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Inventaris
                                    <span class="badge bg-success rounded-pill">{{ $countInventaris }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                     Asset Jual
                                    <span class="badge bg-success rounded-pill">{{ $countAssetjual }}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ================= END PIE CHART SECTION ================= -->

            <x-app.footer />
        </div>
    </main>

    <!-- ================= SCRIPTS ================= -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const ctx = document.getElementById('inventoryChart').getContext('2d');
            const chartData = {
                labels: ['Inventory Project', 'Inventaris', 'Asset Jual'],
                datasets: [{
                    data: [{{ $countProjek }}, {{ $countInventaris }}, {{ $countAssetjual }}],
                    backgroundColor: ['#007bff', '#28a745', '#ffc107'],
                    hoverOffset: 20
                }]
            };

            const inventoryChart = new Chart(ctx, {
                type: 'pie',
                data: chartData,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const label = context.label || '';
                                    const value = context.formattedValue || 0;
                                    return `${label}: ${value} item`;
                                }
                            }
                        }
                    }
                }
            });

            // Klik chart untuk buka modal
            document.getElementById('inventoryChart').addEventListener('click', function() {
                const modal = new bootstrap.Modal(document.getElementById('detailModal'));
                modal.show();
            });
        });
    </script>

</x-app-layout>
