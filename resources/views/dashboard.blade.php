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

            <!-- 🎬 Header Video Section -->
            <div class="position-relative overflow-hidden" style="height: 80vh;">

                <!-- 🔹 Background Video -->
                <video autoplay muted loop playsinline class="w-100 h-100 object-cover position-absolute top-0 start-0"
                    style="object-fit: cover; z-index: 1;">
                    <source src="{{ asset('assets/img/vidio.mp4') }}" type="video/mp4">
                    Browser kamu tidak mendukung video.
                </video>

                <!-- 🔹 Logo di tengah -->
                <div class="position-absolute top-50 start-50 translate-middle d-flex justify-content-center align-items-center"
                    style="z-index: 3;">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="floating-logo"
                        style="margin-top:50px; width: 230px; filter: drop-shadow(0 0 25px rgba(255,255,255,0.8));">
                </div>

            <!-- 🔹 Ikon di kiri bawah sejajar horizontal -->
            <div class="position-absolute bottom-0 start-0 mb-4 ms-4 d-flex flex-row gap-3" style="z-index: 3;">
                @php
                    $icons = [
                        ['src' => 'assets/img/ikon-1.jpg', 'label' => 'Inventory Workshop', 'route' => 'view-ws'],
                        ['src' => 'assets/img/ikon-2.jpg', 'label' => 'Inventory Project', 'route' => 'view-projek'],
                        ['src' => 'assets/img/ikon-3.jpg', 'label' => 'Asset Jual', 'route' => 'view-aset'],
                    ];
                @endphp

                @foreach ($icons as $index => $icon)
                    <div class="icon-item d-flex flex-column align-items-center text-white"
                        style="cursor: pointer;"
                        onclick="window.location.href='{{ route($icon['route']) }}'">
                        <img src="{{ asset($icon['src']) }}" alt="ikon{{ $index + 1 }}"
                            class="rounded-circle shadow icon-img"
                            style="width: 90px; height: 90px; object-fit: cover;">
                        <span class="mt-1 fw-bold text-center" style="font-size: 0.8rem;">
                            {{ $icon['label'] }}
                        </span>
                    </div>
                @endforeach
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
    <style>
        /* 🌊 Efek floating logo */
@keyframes float {
    0% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-12px);
    }
    100% {
        transform: translateY(0);
    }
}

.floating-logo {
    animation: float 3s ease-in-out infinite;
}
.icon-item .icon-img {
    transition: all 0.3s ease;
    border: 3px solid transparent;
}

.icon-item:hover .icon-img {
    transform: scale(1.1);
    border-color: #ffc107; /* warna kuning glowing */
    box-shadow: 0 0 15px rgba(255, 193, 7, 0.8);
}

.icon-item:active .icon-img {
    transform: scale(0.95);
    box-shadow: 0 0 20px rgba(255, 255, 255, 0.8);
}

        </style>
</x-app-layout>
