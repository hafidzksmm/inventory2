<x-app-layout>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-app.navbar />

        <div class="container-fluid py-4 px-5">
            <div class="position-relative overflow-hidden" style="height: 100vh;">

                <!-- 🔹 VIDEO BACKGROUND -->
                <video autoplay muted loop playsinline class="w-100 h-100 object-cover position-absolute top-0 start-0"
                    style="object-fit: cover; z-index: 1;">
                    <source src="{{ asset('assets/img/vidioo.mp4') }}" type="video/mp4">
                    Browser kamu tidak mendukung video.
                </video>

                <!-- 🔹 TITLE -->
                <h2 class="animated-title fw-bold text-white position-absolute top-0 start-0 ms-4 mt-3"
                    style="z-index: 3; padding-left:30px;">
                    Dashboard
                </h2>

                <!-- 🔹 CHART -->
                <div class="position-absolute top-50 start-50 translate-middle text-center" style="z-index: 3;">
                    <div class="chart-container mx-auto position-relative" style="width: 600px; height: 600px;">
                        <canvas id="inventoryChart"></canvas>

                        <div class="logo-center-wrapper position-absolute top-50 start-50 translate-middle">
                            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo"
                                 class="floating-logo" style="width:250px; height:auto; z-index:5;">
                        </div>
                    </div>
                </div>

                <!-- 🔹 IKON KIRI BAWAH -->
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

                <!-- 🔹 KANAN ATAS -->
                <div class="position-absolute top-0 end-0 mt-4 me-4 d-flex flex-column align-items-end gap-3" style="z-index: 3;">
                    <div class="icon-item text-end text-white" onclick="window.open('https://mttech.co.id', '_blank')" style="cursor: pointer;">
                        <img src="{{ asset('assets/img/ikonn1.jpg') }}" class="rounded-circle shadow icon-img"
                            style="width: 70px; height: 70px; object-fit: cover;">
                        <div class="fw-bold small">Company Profile</div>
                    </div>
                    <div class="icon-item text-end text-white" onclick="alert('Documentation Project');" style="cursor: pointer;">
                        <img src="{{ asset('assets/img/ikonn2.jpg') }}" class="rounded-circle shadow icon-img"
                            style="width: 70px; height: 70px; object-fit: cover;">
                        <div class="fw-bold small">Doc Giat</div>
                    </div>
                </div>

                <!-- 🔹 KANAN BAWAH -->
                <div class="position-absolute bottom-0 end-0 mb-4 me-4 d-flex flex-column align-items-end gap-3" style="z-index: 3;">
                    <div class="icon-item text-end text-white" onclick="alert('Documentation Giat');" style="cursor: pointer;">
                        <img src="{{ asset('assets/img/ikonn3.jpg') }}" class="rounded-circle shadow icon-img"
                            style="width: 70px; height: 70px; object-fit: cover;">
                        <div class="fw-bold small">Doc Project</div>
                    </div>
                    <div class="icon-item text-end text-white" onclick="alert('Document MTT');" style="cursor: pointer;">
                        <img src="{{ asset('assets/img/ikonn3.jpg') }}" class="rounded-circle shadow icon-img"
                            style="width: 70px; height: 70px; object-fit: cover;">
                        <div class="fw-bold small">Document MTT</div>
                    </div>
                </div>

            </div>

            <x-app.footer />
        </div>
    </main>

    <!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('inventoryChart').getContext('2d');

        const labels = ['Inventory Project', 'Inventory Workshop', 'Asset Jual'];
        const dataValues = [{{ $countProjek }}, {{ $countInventaris }}, {{ $countAssetjual }}];
        const colors = ['#0000FF', '#800000', '#800080'];

        const chart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: dataValues,
                    backgroundColor: colors,
                    borderWidth: 2,
                    hoverOffset: 10
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '60%',
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        enabled: true,
                        callbacks: {
                            label: function(context) {
                                const label = context.chart.data.labels[context.dataIndex];
                                const value = context.formattedValue;
                                return `${label}`;
                            }
                        },
                        backgroundColor: 'rgba(0,0,0,0.7)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        titleFont: { size: 16, weight: 'bold' },
                        bodyFont: { size: 14 }
                    }
                },
                onHover: (event, elements) => {
                    const canvas = event.native ? event.native.target : event.target;
                    canvas.style.cursor = elements.length ? 'pointer' : 'default';
                }
            },
            plugins: [{
                // 🔹 Plugin custom untuk angka di tengah setiap slice
                id: 'valueLabels',
                afterDraw(chart) {
                    const {ctx, data} = chart;
                    const meta = chart.getDatasetMeta(0);
                    ctx.save();
                    ctx.font = 'bold 30px Poppins';
                    ctx.fillStyle = '#fff';
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'middle';
                    meta.data.forEach((element, index) => {
                        const pos = element.tooltipPosition();
                        const value = data.datasets[0].data[index];
                        ctx.fillText(value, pos.x, pos.y);
                    });
                    ctx.restore();
                }
            }]
        });

        // 🔹 Tambahkan logo di tengah tengah donat
        const image = new Image();
        image.src = '/images/logo.png'; // ganti dengan path logo kamu
        image.onload = function() {
            const plugin = {
                id: 'centerImage',
                beforeDraw(chart) {
                    const {ctx, chartArea: {width, height}} = chart;
                    const x = chart.chartArea.left + width / 2;
                    const y = chart.chartArea.top + height / 2;
                    const imgSize = 70; // ukuran logo, bisa kamu kecilkan lagi
                    ctx.drawImage(image, x - imgSize / 2, y - imgSize / 2, imgSize, imgSize);
                }
            };
            chart.config.plugins.push(plugin);
            chart.update();
        };
    });
</script>

    <style>
    .chart-container { position: relative; }

    .logo-center-wrapper {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: flex;
        align-items: center;
        justify-content: center;
        width: 250px;
        height: 250px;
        pointer-events: none;
        z-index: 5;
    }

    @keyframes floatY {
        0%   { transform: translateY(0); }
        25%  { transform: translateY(-6px); }
        50%  { transform: translateY(-14px); }
        75%  { transform: translateY(-6px); }
        100% { transform: translateY(0); }
    }

    .floating-logo {
        width: 100%;
        height: auto;
        display: block;
        animation: floatY 3.2s ease-in-out infinite;
        will-change: transform;
        filter:
            drop-shadow(0 0 10px rgba(255,255,255,1))
            drop-shadow(0 0 25px rgba(255,255,255,0.9))
            drop-shadow(0 0 40px rgba(255,255,255,0.7));
        backface-visibility: hidden;
    }

    @keyframes glowText {
        0% { text-shadow: 0 0 10px rgba(255,255,255,0.6); opacity: 0.7; }
        50% { text-shadow: 0 0 20px rgba(255,255,255,0.9); opacity: 1; }
        100% { text-shadow: 0 0 10px rgba(255,255,255,0.6); opacity: 0.7; }
    }
    .animated-title {
        font-size: 2rem;
        letter-spacing: 2px;
        animation: glowText 2s infinite ease-in-out;
    }

    .icon-item .icon-img {
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }
    .icon-item:hover .icon-img {
        transform: scale(1.1);
        border-color: #ffc107;
        box-shadow: 0 0 15px rgba(255, 193, 7, 0.8);
    }
    .icon-item:active .icon-img { transform: scale(0.95); }

    @media (max-width: 768px) {
        .chart-container { width: 320px !important; height: 320px !important; }
        .logo-center-wrapper { width: 140px; height: 140px; }
    }
    </style>

</x-app-layout>
