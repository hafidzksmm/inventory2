<x-app-layout>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        <div class="container-fluid py-4 px-5">
            <div class="row">
                <div class="col-12">
                    <div class="card card-background card-background-after-none align-items-start mt-4 mb-5">
                        <div class="full-background"
                            style="background-image: url('../assets/img/header-blue-purple.jpg')"></div>
                        <div class="card-body text-start p-4 w-100">
                            <h3 class="text-white mb-2">Collect your benefits 🔥</h3>
                            <p class="mb-4 font-weight-semibold">
                                Check all the advantages and choose the best.
                            </p>
                            <button type="button"
                                class="btn btn-outline-white btn-blur btn-icon d-flex align-items-center mb-0">
                                <span class="btn-inner--icon">
                                    <svg width="14" height="14" viewBox="0 0 14 14"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="d-block me-2">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM6.61036 4.52196C6.34186 4.34296 5.99664 4.32627 5.71212 4.47854C5.42761 4.63081 5.25 4.92731 5.25 5.25V8.75C5.25 9.0727 5.42761 9.36924 5.71212 9.52149C5.99664 9.67374 6.34186 9.65703 6.61036 9.47809L9.23536 7.72809C9.47879 7.56577 9.625 7.2926 9.625 7C9.625 6.70744 9.47879 6.43424 9.23536 6.27196L6.61036 4.52196Z" />
                                    </svg>
                                </span>
                                <span class="btn-inner--text">Watch more</span>
                            </button>
                            <img src="../assets/img/3d-cube.png" alt="3d-cube"
                                class="position-absolute top-0 end-1 w-25 max-width-200 mt-n6 d-sm-block d-none" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-header border-bottom pb-0">
                            <div class="d-sm-flex align-items-center">
                                 <div>
                <h6 class="font-weight-semibold text-lg mb-0">📦 Data Aset Jual</h6>
                <p class="text-sm text-secondary mb-0">Menampilkan semua data aset jual</p>
            </div>
           <!-- Tombol Tambah Data -->
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="text-white">Aset Jual Workshop</h4>
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addInventarisModal">
        <i class="bi bi-plus-lg"></i> Tambah Data
    </button>
</div>

<!-- Modal Tambah Data -->
<div class="modal fade" id="addInventarisModal" tabindex="-1" aria-labelledby="addInventarisModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable"> {{-- scrollable agar bisa digulir --}}
    <div class="modal-content bg-dark text-white">
      <div class="modal-header">
        <h5 class="modal-title" id="addInventarisModalLabel">Tambah Data Inventaris</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('aset-store') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
          </div>

          <div class="mb-3">
            <label for="jenis" class="form-label">Jenis</label>
            <input type="text" class="form-control" id="jenis" name="jenis" required>
          </div>

          <div class="mb-3">
            <label for="ukuran" class="form-label">Ukuran</label>
            <textarea class="form-control" id="ukuran" name="ukuran" rows="3" required></textarea>
          </div>

          <div class="mb-3">
            <label for="dimensi" class="form-label">Dimensi</label>
            <input type="text" class="form-control" id="dimensi" name="dimensi" required>
          </div>

          <div class="mb-3">
            <label for="qty" class="form-label">Quantity (QTY)</label>
            <input type="number" class="form-control" id="qty" name="qty" min="1" required>
          </div>

          <div class="mb-3">
            <label for="satuan" class="form-label">Satuan</label>
            <input type="text" class="form-control" id="satuan" name="satuan" required>
          </div>

          <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

        </div>

        <div class="card-body px-0 py-0">
            <div class="table-responsive p-3">
                <table class="table table-hover align-items-center mb-0">
                    <thead class="bg-gray-100">
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Jenis</th>
                            <th>ukuran</th>
                            <th>Dimensi</th>
                            <th>Qty</th>
                            <th>Satuan</th>
                            <th>Lokasi</th>
                            <th>Dibuat Pada</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($asset_jual as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->nama_barang }}</td>
                                <td>{{ $item->jenis }}</td>
                                <td>{{ $item->ukuran }}</td>
                                <td>{{ $item->dimensi }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->satuan }}</td>
                                <td>{{ $item->lokasi }}</td>
                                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                <td>
    <!-- Tombol Edit (buka modal) -->
    <button type="button" 
        class="btn btn-sm btn-warning me-2" 
        data-bs-toggle="modal" 
        data-bs-target="#editModal{{ $item->id }}">
        <i class="bi bi-pencil-square"></i> Edit
    </button>

    <!-- Form Hapus -->
    <form action="{{ route('aset.hapus', $item->id) }}" 
          method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger"
            onclick="return confirm('Yakin ingin menghapus data ini?')">
            <i class="bi bi-trash"></i> Hapus
        </button>
    </form>

    <!-- Modal Edit -->
    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
    <form action="{{ route('aset.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit Inventaris</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
            <div class="mb-3">
                <label for="nama_barang{{ $item->id }}" class="form-label">Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" 
                       id="nama_barang{{ $item->id }}" 
                       value="{{ $item->nama_barang }}" required>
            </div>

            <div class="mb-3">
                <label for="jenis{{ $item->id }}" class="form-label">Jenis</label>
                <input type="text" name="jenis" class="form-control" 
                       id="jenis{{ $item->id }}" 
                       value="{{ $item->jenis }}" required>
            </div>

            <div class="mb-3">
                <label for="ukuran{{ $item->id }}" class="form-label">Ukuran</label>
                <textarea name="ukuran" class="form-control" 
                          id="ukuran{{ $item->id }}" 
                          rows="3" required>{{ $item->ukuran }}</textarea>
            </div>

            <div class="mb-3">
                <label for="dimensi{{ $item->id }}" class="form-label">Dimensi</label>
                <input type="text" name="dimensi" class="form-control" 
                       id="dimensi{{ $item->id }}" 
                       value="{{ $item->dimensi }}">
            </div>

            <div class="mb-3">
                <label for="qty{{ $item->id }}" class="form-label">Qty</label>
                <input type="number" name="qty" class="form-control" 
                       id="qty{{ $item->id }}" 
                       value="{{ $item->qty }}" required>
            </div>

            <div class="mb-3">
                <label for="satuan{{ $item->id }}" class="form-label">Satuan</label>
                <input type="text" name="satuan" class="form-control" 
                       id="satuan{{ $item->id }}" 
                       value="{{ $item->satuan }}" required>
            </div>

            <div class="mb-3">
                <label for="lokasi{{ $item->id }}" class="form-label">Lokasi</label>
                <input type="text" name="lokasi" class="form-control" 
                       id="lokasi{{ $item->id }}" 
                       value="{{ $item->lokasi }}" required>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
    </form>
</div>

        </div>
    </div>
</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center text-muted py-3">
                                    Tidak ada data inventaris.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-header border-bottom pb-0">
                            <div class="d-sm-flex align-items-center mb-3">
                                <div>
                                    <h6 class="font-weight-semibold text-lg mb-0">Recent transactions</h6>
                                    <p class="text-sm mb-sm-0">These are details about the last transactions</p>
                                </div>
                                <div class="ms-auto d-flex">
                                    <div class="input-group input-group-sm ms-auto me-2">
                                        <span class="input-group-text text-body">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z">
                                                </path>
                                            </svg>
                                        </span>
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="Search">
                                    </div>
                                    <button type="button"
                                        class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0 me-2">
                                        <span class="btn-inner--icon">
                                            <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" class="d-block me-2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                            </svg>
                                        </span>
                                        <span class="btn-inner--text">Download</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 py-0">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center justify-content-center mb-0">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7">
                                                Transaction</th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                                Amount</th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Date
                                            </th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                                Status</th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                                Account</th>
                                            <th
                                                class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div class="avatar avatar-sm rounded-circle bg-gray-100 me-2 my-2">
                                                        <img src="../assets/img/small-logos/logo-spotify.svg"
                                                            class="w-80" alt="spotify">
                                                    </div>
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">Spotify</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-normal mb-0">$2,500</p>
                                            </td>
                                            <td>
                                                <span class="text-sm font-weight-normal">Wed 3:00pm</span>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge badge-sm border border-success text-success bg-success">
                                                    <svg width="9" height="9" viewBox="0 0 10 9"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg"
                                                        stroke="currentColor" class="me-1">
                                                        <path d="M1 4.42857L3.28571 6.71429L9 1" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                    Paid
                                                </span>
                                            </td>
                                            <td class="align-middle">
                                                <div class="d-flex">
                                                    <div
                                                        class="border px-1 py-1 text-center d-flex align-items-center border-radius-sm my-auto">
                                                        <img src="../assets/img/logos/visa.png" class="w-90 mx-auto"
                                                            alt="visa">
                                                    </div>
                                                    <div class="ms-2">
                                                        <p class="text-dark text-sm mb-0">Visa 1234</p>
                                                        <p class="text-secondary text-sm mb-0">Expiry 06/2026</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                    data-bs-toggle="tooltip" data-bs-title="Edit user">
                                                    <svg width="14" height="14" viewBox="0 0 15 16"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M11.2201 2.02495C10.8292 1.63482 10.196 1.63545 9.80585 2.02636C9.41572 2.41727 9.41635 3.05044 9.80726 3.44057L11.2201 2.02495ZM12.5572 6.18502C12.9481 6.57516 13.5813 6.57453 13.9714 6.18362C14.3615 5.79271 14.3609 5.15954 13.97 4.7694L12.5572 6.18502ZM11.6803 1.56839L12.3867 2.2762L12.3867 2.27619L11.6803 1.56839ZM14.4302 4.31284L15.1367 5.02065L15.1367 5.02064L14.4302 4.31284ZM3.72198 15V16C3.98686 16 4.24091 15.8949 4.42839 15.7078L3.72198 15ZM0.999756 15H-0.000244141C-0.000244141 15.5523 0.447471 16 0.999756 16L0.999756 15ZM0.999756 12.2279L0.293346 11.5201C0.105383 11.7077 -0.000244141 11.9624 -0.000244141 12.2279H0.999756ZM9.80726 3.44057L12.5572 6.18502L13.97 4.7694L11.2201 2.02495L9.80726 3.44057ZM12.3867 2.27619C12.7557 1.90794 13.3549 1.90794 13.7238 2.27619L15.1367 0.860593C13.9869 -0.286864 12.1236 -0.286864 10.9739 0.860593L12.3867 2.27619ZM13.7238 2.27619C14.0917 2.64337 14.0917 3.23787 13.7238 3.60504L15.1367 5.02064C16.2875 3.8721 16.2875 2.00913 15.1367 0.860593L13.7238 2.27619ZM13.7238 3.60504L3.01557 14.2922L4.42839 15.7078L15.1367 5.02065L13.7238 3.60504ZM3.72198 14H0.999756V16H3.72198V14ZM1.99976 15V12.2279H-0.000244141V15H1.99976ZM1.70617 12.9357L12.3867 2.2762L10.9739 0.86059L0.293346 11.5201L1.70617 12.9357Z"
                                                            fill="#64748B" />
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div class="avatar avatar-sm rounded-circle bg-gray-100 me-2 my-2">
                                                        <img src="../assets/img/small-logos/logo-invision.svg"
                                                            class="w-80" alt="invision">
                                                    </div>
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">Invision</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-normal mb-0">$5,000</p>
                                            </td>
                                            <td>
                                                <span class="text-sm font-weight-normal">Wed 1:00pm</span>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge badge-sm border border-success text-success bg-success">
                                                    <svg width="9" height="9" viewBox="0 0 10 9"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg"
                                                        stroke="currentColor" class="me-1">
                                                        <path d="M1 4.42857L3.28571 6.71429L9 1" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                    Paid
                                                </span>
                                            </td>
                                            <td class="align-middle">
                                                <div class="d-flex">
                                                    <div
                                                        class="border px-1 py-1 text-center d-flex align-items-center border-radius-sm my-auto">
                                                        <img src="../assets/img/logos/mastercard.png"
                                                            class="w-90 mx-auto" alt="mastercard">
                                                    </div>
                                                    <div class="ms-2">
                                                        <p class="text-dark text-sm mb-0">Mastercard 1234</p>
                                                        <p class="text-secondary text-sm mb-0">Expiry 06/2026</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                    data-bs-toggle="tooltip" data-bs-title="Edit user">
                                                    <svg width="14" height="14" viewBox="0 0 15 16"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M11.2201 2.02495C10.8292 1.63482 10.196 1.63545 9.80585 2.02636C9.41572 2.41727 9.41635 3.05044 9.80726 3.44057L11.2201 2.02495ZM12.5572 6.18502C12.9481 6.57516 13.5813 6.57453 13.9714 6.18362C14.3615 5.79271 14.3609 5.15954 13.97 4.7694L12.5572 6.18502ZM11.6803 1.56839L12.3867 2.2762L12.3867 2.27619L11.6803 1.56839ZM14.4302 4.31284L15.1367 5.02065L15.1367 5.02064L14.4302 4.31284ZM3.72198 15V16C3.98686 16 4.24091 15.8949 4.42839 15.7078L3.72198 15ZM0.999756 15H-0.000244141C-0.000244141 15.5523 0.447471 16 0.999756 16L0.999756 15ZM0.999756 12.2279L0.293346 11.5201C0.105383 11.7077 -0.000244141 11.9624 -0.000244141 12.2279H0.999756ZM9.80726 3.44057L12.5572 6.18502L13.97 4.7694L11.2201 2.02495L9.80726 3.44057ZM12.3867 2.27619C12.7557 1.90794 13.3549 1.90794 13.7238 2.27619L15.1367 0.860593C13.9869 -0.286864 12.1236 -0.286864 10.9739 0.860593L12.3867 2.27619ZM13.7238 2.27619C14.0917 2.64337 14.0917 3.23787 13.7238 3.60504L15.1367 5.02064C16.2875 3.8721 16.2875 2.00913 15.1367 0.860593L13.7238 2.27619ZM13.7238 3.60504L3.01557 14.2922L4.42839 15.7078L15.1367 5.02065L13.7238 3.60504ZM3.72198 14H0.999756V16H3.72198V14ZM1.99976 15V12.2279H-0.000244141V15H1.99976ZM1.70617 12.9357L12.3867 2.2762L10.9739 0.86059L0.293346 11.5201L1.70617 12.9357Z"
                                                            fill="#64748B" />
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div class="avatar avatar-sm rounded-circle bg-gray-100 me-2 my-2">
                                                        <img src="../assets/img/small-logos/logo-jira.svg"
                                                            class="w-80" alt="jira">
                                                    </div>
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">Jira</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-normal mb-0">$3,400</p>
                                            </td>
                                            <td>
                                                <span class="text-sm font-weight-normal">Mon 7:40pm</span>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge badge-sm border border-warning text-warning bg-warning">
                                                    <svg width="12" height="12"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="me-1ca">
                                                        <path fill-rule="evenodd"
                                                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 6a.75.75 0 00-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 000-1.5h-3.75V6z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    Pending
                                                </span>
                                            </td>
                                            <td class="align-middle">
                                                <div class="d-flex">
                                                    <div
                                                        class="border px-1 py-1 text-center d-flex align-items-center border-radius-sm my-auto">
                                                        <img src="../assets/img/logos/mastercard.png"
                                                            class="w-90 mx-auto" alt="mastercard">
                                                    </div>
                                                    <div class="ms-2">
                                                        <p class="text-dark text-sm mb-0">Mastercard 1234</p>
                                                        <p class="text-secondary text-sm mb-0">Expiry 06/2026</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                    data-bs-toggle="tooltip" data-bs-title="Edit user">
                                                    <svg width="14" height="14" viewBox="0 0 15 16"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M11.2201 2.02495C10.8292 1.63482 10.196 1.63545 9.80585 2.02636C9.41572 2.41727 9.41635 3.05044 9.80726 3.44057L11.2201 2.02495ZM12.5572 6.18502C12.9481 6.57516 13.5813 6.57453 13.9714 6.18362C14.3615 5.79271 14.3609 5.15954 13.97 4.7694L12.5572 6.18502ZM11.6803 1.56839L12.3867 2.2762L12.3867 2.27619L11.6803 1.56839ZM14.4302 4.31284L15.1367 5.02065L15.1367 5.02064L14.4302 4.31284ZM3.72198 15V16C3.98686 16 4.24091 15.8949 4.42839 15.7078L3.72198 15ZM0.999756 15H-0.000244141C-0.000244141 15.5523 0.447471 16 0.999756 16L0.999756 15ZM0.999756 12.2279L0.293346 11.5201C0.105383 11.7077 -0.000244141 11.9624 -0.000244141 12.2279H0.999756ZM9.80726 3.44057L12.5572 6.18502L13.97 4.7694L11.2201 2.02495L9.80726 3.44057ZM12.3867 2.27619C12.7557 1.90794 13.3549 1.90794 13.7238 2.27619L15.1367 0.860593C13.9869 -0.286864 12.1236 -0.286864 10.9739 0.860593L12.3867 2.27619ZM13.7238 2.27619C14.0917 2.64337 14.0917 3.23787 13.7238 3.60504L15.1367 5.02064C16.2875 3.8721 16.2875 2.00913 15.1367 0.860593L13.7238 2.27619ZM13.7238 3.60504L3.01557 14.2922L4.42839 15.7078L15.1367 5.02065L13.7238 3.60504ZM3.72198 14H0.999756V16H3.72198V14ZM1.99976 15V12.2279H-0.000244141V15H1.99976ZM1.70617 12.9357L12.3867 2.2762L10.9739 0.86059L0.293346 11.5201L1.70617 12.9357Z"
                                                            fill="#64748B" />
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div class="avatar avatar-sm rounded-circle bg-gray-100 me-2 my-2">
                                                        <img src="../assets/img/small-logos/logo-slack.svg"
                                                            class="w-80" alt="slack">
                                                    </div>
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">Slack</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-normal mb-0">$1,000</p>
                                            </td>
                                            <td>
                                                <span class="text-sm font-weight-normal">Wed 5:00pm</span>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge badge-sm border border-success text-success bg-success">
                                                    <svg width="9" height="9" viewBox="0 0 10 9"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg"
                                                        stroke="currentColor" class="me-1">
                                                        <path d="M1 4.42857L3.28571 6.71429L9 1" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                    Paid
                                                </span>
                                            </td>
                                            <td class="align-middle">
                                                <div class="d-flex">
                                                    <div
                                                        class="border px-1 py-1 text-center d-flex align-items-center border-radius-sm my-auto">
                                                        <img src="../assets/img/logos/visa.png" class="w-90 mx-auto"
                                                            alt="visa">
                                                    </div>
                                                    <div class="ms-2">
                                                        <p class="text-dark text-sm mb-0">Visa 1234</p>
                                                        <p class="text-secondary text-sm mb-0">Expiry 06/2026</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                    data-bs-toggle="tooltip" data-bs-title="Edit user">
                                                    <svg width="14" height="14" viewBox="0 0 15 16"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M11.2201 2.02495C10.8292 1.63482 10.196 1.63545 9.80585 2.02636C9.41572 2.41727 9.41635 3.05044 9.80726 3.44057L11.2201 2.02495ZM12.5572 6.18502C12.9481 6.57516 13.5813 6.57453 13.9714 6.18362C14.3615 5.79271 14.3609 5.15954 13.97 4.7694L12.5572 6.18502ZM11.6803 1.56839L12.3867 2.2762L12.3867 2.27619L11.6803 1.56839ZM14.4302 4.31284L15.1367 5.02065L15.1367 5.02064L14.4302 4.31284ZM3.72198 15V16C3.98686 16 4.24091 15.8949 4.42839 15.7078L3.72198 15ZM0.999756 15H-0.000244141C-0.000244141 15.5523 0.447471 16 0.999756 16L0.999756 15ZM0.999756 12.2279L0.293346 11.5201C0.105383 11.7077 -0.000244141 11.9624 -0.000244141 12.2279H0.999756ZM9.80726 3.44057L12.5572 6.18502L13.97 4.7694L11.2201 2.02495L9.80726 3.44057ZM12.3867 2.27619C12.7557 1.90794 13.3549 1.90794 13.7238 2.27619L15.1367 0.860593C13.9869 -0.286864 12.1236 -0.286864 10.9739 0.860593L12.3867 2.27619ZM13.7238 2.27619C14.0917 2.64337 14.0917 3.23787 13.7238 3.60504L15.1367 5.02064C16.2875 3.8721 16.2875 2.00913 15.1367 0.860593L13.7238 2.27619ZM13.7238 3.60504L3.01557 14.2922L4.42839 15.7078L15.1367 5.02065L13.7238 3.60504ZM3.72198 14H0.999756V16H3.72198V14ZM1.99976 15V12.2279H-0.000244141V15H1.99976ZM1.70617 12.9357L12.3867 2.2762L10.9739 0.86059L0.293346 11.5201L1.70617 12.9357Z"
                                                            fill="#64748B" />
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div class="avatar avatar-sm rounded-circle bg-gray-100 me-2 my-2">
                                                        <img src="../assets/img/small-logos/logo-webdev.svg"
                                                            class="w-80" alt="webdev">
                                                    </div>
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">Webdev</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-normal mb-0">$14,000</p>
                                            </td>
                                            <td>
                                                <span class="text-sm font-weight-normal">Wed 3:30am</span>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge badge-sm border border-success text-success bg-success">
                                                    <svg width="9" height="9" viewBox="0 0 10 9"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg"
                                                        stroke="currentColor" class="me-1">
                                                        <path d="M1 4.42857L3.28571 6.71429L9 1" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                    Paid
                                                </span>
                                            </td>
                                            <td class="align-middle">
                                                <div class="d-flex">
                                                    <div
                                                        class="border px-1 py-1 text-center d-flex align-items-center border-radius-sm my-auto">
                                                        <img src="../assets/img/logos/visa.png" class="w-90 mx-auto"
                                                            alt="visa">
                                                    </div>
                                                    <div class="ms-2">
                                                        <p class="text-dark text-sm mb-0">Visa 1234</p>
                                                        <p class="text-secondary text-sm mb-0">Expiry 06/2026</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                    data-bs-toggle="tooltip" data-bs-title="Edit user">
                                                    <svg width="14" height="14" viewBox="0 0 15 16"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M11.2201 2.02495C10.8292 1.63482 10.196 1.63545 9.80585 2.02636C9.41572 2.41727 9.41635 3.05044 9.80726 3.44057L11.2201 2.02495ZM12.5572 6.18502C12.9481 6.57516 13.5813 6.57453 13.9714 6.18362C14.3615 5.79271 14.3609 5.15954 13.97 4.7694L12.5572 6.18502ZM11.6803 1.56839L12.3867 2.2762L12.3867 2.27619L11.6803 1.56839ZM14.4302 4.31284L15.1367 5.02065L15.1367 5.02064L14.4302 4.31284ZM3.72198 15V16C3.98686 16 4.24091 15.8949 4.42839 15.7078L3.72198 15ZM0.999756 15H-0.000244141C-0.000244141 15.5523 0.447471 16 0.999756 16L0.999756 15ZM0.999756 12.2279L0.293346 11.5201C0.105383 11.7077 -0.000244141 11.9624 -0.000244141 12.2279H0.999756ZM9.80726 3.44057L12.5572 6.18502L13.97 4.7694L11.2201 2.02495L9.80726 3.44057ZM12.3867 2.27619C12.7557 1.90794 13.3549 1.90794 13.7238 2.27619L15.1367 0.860593C13.9869 -0.286864 12.1236 -0.286864 10.9739 0.860593L12.3867 2.27619ZM13.7238 2.27619C14.0917 2.64337 14.0917 3.23787 13.7238 3.60504L15.1367 5.02064C16.2875 3.8721 16.2875 2.00913 15.1367 0.860593L13.7238 2.27619ZM13.7238 3.60504L3.01557 14.2922L4.42839 15.7078L15.1367 5.02065L13.7238 3.60504ZM3.72198 14H0.999756V16H3.72198V14ZM1.99976 15V12.2279H-0.000244141V15H1.99976ZM1.70617 12.9357L12.3867 2.2762L10.9739 0.86059L0.293346 11.5201L1.70617 12.9357Z"
                                                            fill="#64748B" />
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div class="avatar avatar-sm rounded-circle bg-gray-100 me-2 my-2">
                                                        <img src="../assets/img/small-logos/logo-xd.svg"
                                                            class="w-80" alt="xd">
                                                    </div>
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">Adobe XD</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-normal mb-0">$2,300</p>
                                            </td>
                                            <td>
                                                <span class="text-sm font-weight-normal">Tue 3:30pm</span>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge badge-sm border border-danger text-danger bg-danger">
                                                    <svg width="12" height="12"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="me-1">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                    Canceled
                                                </span>
                                            </td>
                                            <td class="align-middle">
                                                <div class="d-flex">
                                                    <div
                                                        class="border px-1 py-1 text-center d-flex align-items-center border-radius-sm my-auto">
                                                        <img src="../assets/img/logos/mastercard.png"
                                                            class="w-90 mx-auto" alt="mastercard">
                                                    </div>
                                                    <div class="ms-2">
                                                        <p class="text-dark text-sm mb-0">Mastercard 1234</p>
                                                        <p class="text-secondary text-sm mb-0">Expiry 06/2026</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                    data-bs-toggle="tooltip" data-bs-title="Edit user">
                                                    <svg width="14" height="14" viewBox="0 0 15 16"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M11.2201 2.02495C10.8292 1.63482 10.196 1.63545 9.80585 2.02636C9.41572 2.41727 9.41635 3.05044 9.80726 3.44057L11.2201 2.02495ZM12.5572 6.18502C12.9481 6.57516 13.5813 6.57453 13.9714 6.18362C14.3615 5.79271 14.3609 5.15954 13.97 4.7694L12.5572 6.18502ZM11.6803 1.56839L12.3867 2.2762L12.3867 2.27619L11.6803 1.56839ZM14.4302 4.31284L15.1367 5.02065L15.1367 5.02064L14.4302 4.31284ZM3.72198 15V16C3.98686 16 4.24091 15.8949 4.42839 15.7078L3.72198 15ZM0.999756 15H-0.000244141C-0.000244141 15.5523 0.447471 16 0.999756 16L0.999756 15ZM0.999756 12.2279L0.293346 11.5201C0.105383 11.7077 -0.000244141 11.9624 -0.000244141 12.2279H0.999756ZM9.80726 3.44057L12.5572 6.18502L13.97 4.7694L11.2201 2.02495L9.80726 3.44057ZM12.3867 2.27619C12.7557 1.90794 13.3549 1.90794 13.7238 2.27619L15.1367 0.860593C13.9869 -0.286864 12.1236 -0.286864 10.9739 0.860593L12.3867 2.27619ZM13.7238 2.27619C14.0917 2.64337 14.0917 3.23787 13.7238 3.60504L15.1367 5.02064C16.2875 3.8721 16.2875 2.00913 15.1367 0.860593L13.7238 2.27619ZM13.7238 3.60504L3.01557 14.2922L4.42839 15.7078L15.1367 5.02065L13.7238 3.60504ZM3.72198 14H0.999756V16H3.72198V14ZM1.99976 15V12.2279H-0.000244141V15H1.99976ZM1.70617 12.9357L12.3867 2.2762L10.9739 0.86059L0.293346 11.5201L1.70617 12.9357Z"
                                                            fill="#64748B" />
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="border-top py-3 px-3 d-flex align-items-center">
                                <button class="btn btn-sm btn-white d-sm-block d-none mb-0">Previous</button>
                                <nav aria-label="..." class="ms-auto">
                                    <ul class="pagination pagination-light mb-0">
                                        <li class="page-item active" aria-current="page">
                                            <span class="page-link font-weight-bold">1</span>
                                        </li>
                                        <li class="page-item"><a class="page-link border-0 font-weight-bold"
                                                href="javascript:;">2</a></li>
                                        <li class="page-item"><a
                                                class="page-link border-0 font-weight-bold d-sm-inline-flex d-none"
                                                href="javascript:;">3</a></li>
                                        <li class="page-item"><a class="page-link border-0 font-weight-bold"
                                                href="javascript:;">...</a></li>
                                        <li class="page-item"><a
                                                class="page-link border-0 font-weight-bold d-sm-inline-flex d-none"
                                                href="javascript:;">8</a></li>
                                        <li class="page-item"><a class="page-link border-0 font-weight-bold"
                                                href="javascript:;">9</a></li>
                                        <li class="page-item"><a class="page-link border-0 font-weight-bold"
                                                href="javascript:;">10</a></li>
                                    </ul>
                                </nav>
                                <button class="btn btn-sm btn-white d-sm-block d-none mb-0 ms-auto">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <x-app.footer />
        </div>
    </main>

</x-app-layout>
