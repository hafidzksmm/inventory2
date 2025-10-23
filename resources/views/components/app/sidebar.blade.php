<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-end bg-white fixed-start shadow-sm" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>

        <!-- ✅ Logo -->
        <a class="navbar-brand d-flex align-items-center m-0"
            >
            <img src="{{ asset('./assets/img/logo.png') }}" alt="Logo" class="img-fluid" style="max-height: 40px;">
        </a>
    </div>

    <div class="collapse navbar-collapse px-3 w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">

            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link text-dark fw-semibold {{ is_current_route('dashboard') ? 'active bg-light rounded' : '' }}"
                    href="{{ route('dashboard') }}">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center me-2">
                        <i class="bi bi-speedometer2 fs-5 text-primary"></i>
                    </div>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>

            <!-- Inventory WS -->
            <li class="nav-item">
                <a class="nav-link text-dark fw-semibold {{ is_current_route('view-ws') ? 'active bg-light rounded' : '' }}"
                    href="{{ route('view-ws') }}">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center me-2">
                        <i class="bi bi-building fs-5 text-primary"></i>
                    </div>
                    <span class="nav-link-text">Inventory Workshop</span>
                </a>
            </li>

            <!-- Inventory Project -->
            <li class="nav-item">
                <a class="nav-link text-dark fw-semibold {{ is_current_route('view-projek') ? 'active bg-light rounded' : '' }}"
                    href="{{ route('view-projek') }}">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center me-2">
                        <i class="bi bi-clipboard-data fs-5 text-primary"></i>
                    </div>
                    <span class="nav-link-text">Inventory Project</span>
                </a>
            </li>

            <!-- Aset Jual -->
            <li class="nav-item">
                <a class="nav-link text-dark fw-semibold {{ is_current_route('view-aset') ? 'active bg-light rounded' : '' }}"
                    href="{{ route('view-aset') }}">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center me-2">
                        <i class="bi bi-box-seam fs-5 text-primary"></i>
                    </div>
                    <span class="nav-link-text">Aset Jual</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="my-3">

            <!-- Documentation -->
            <li class="nav-item">
                <div class="nav-link d-flex align-items-center text-dark fw-semibold">
                    <i class="bi bi-journal-text me-2 fs-5 text-primary"></i>
                    <span>Documentation</span>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link text-dark fw-semibold" href="https://mttech.co.id/" target="_blank">
                    <i class="bi bi-building me-2 text-primary"></i>
                    <span>Company Profile MTT</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-dark fw-semibold {{ is_current_route('users-management') ? 'active bg-light rounded' : '' }}"
                    href="{{ route('users-management') }}">
                    <i class="bi bi-folder2-open me-2 text-primary"></i>
                    <span>Documentation Giat</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-dark fw-semibold" href="{{ route('users-management') }}">
                    <i class="bi bi-folder2-open me-2 text-primary"></i>
                    <span>Documentation Project</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-dark fw-semibold" href="{{ route('users-management') }}">
                    <i class="bi bi-folder2-open me-2 text-primary"></i>
                    <span>Document Project</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

<!-- Tambahkan Bootstrap & Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>