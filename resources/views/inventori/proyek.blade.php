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
                                    <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" class="d-block me-2">
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
                                </div>
                                <!-- Tombol Tambah Data -->
                                <div class="card-header border-bottom pb-0">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <h4 class="text-white mb-3 mb-sm-0">Inventory Workshop</h4>

                                        <div class="d-flex flex-wrap gap-2">
                                            <!-- Tombol Tambah Data -->
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#addInventarisModal">
                                                <i class="bi bi-plus-lg"></i> Tambah Data
                                            </button>

                                            <!-- Tombol Filter -->
                                            <button type="button" class="btn btn-info text-white" data-bs-toggle="modal"
                                                data-bs-target="#filterModal">
                                                <i class="bi bi-funnel-fill"></i> Filter
                                            </button>

                                            <!-- Modal Filter -->
                                            <div class="modal fade" id="filterModal" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Filter Data Projek</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="text" id="filterInput" class="form-control"
                                                                placeholder="Ketik kata kunci...">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" id="applyFilter"
                                                                class="btn btn-primary">Filter</button>
                                                            <button type="button" id="resetFilter"
                                                                class="btn btn-secondary">Reset</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Import Excel -->
                                            <form action="{{ route('projek.import') }}" method="POST"
                                                enctype="multipart/form-data" class="d-flex align-items-center">
                                                @csrf
                                                <input type="file" name="file" class="form-control form-control-sm me-2"
                                                    style="width:180px" required>
                                                <button class="btn btn-primary btn-sm">Import</button>
                                            </form>

                                            <!-- Export Excel -->
                                            <a href="{{ route('projek.export') }}" class="btn btn-success btn-sm">
                                                <i class="bi bi-download"></i> Export
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Tambah Data -->
                                <div class="modal fade" id="addInventarisModal" tabindex="-1"
                                    aria-labelledby="addInventarisModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content bg-white text-dark">
                                            <!-- 💡 background putih -->
                                            <div class="modal-header border-0">
                                                <h5 class="modal-title fw-bold" id="addInventarisModalLabel">Tambah Data
                                                    Inventaris</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <form action="{{ route('projek-store') }}" method="POST">
                                                @csrf
                                                <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                                                    <!-- 💡 scroll bar aktif -->
                                                    <div class="mb-3">
                                                        <label for="nama_barang" class="form-label">Nama Barang</label>
                                                        <input type="text" class="form-control" id="nama_barang"
                                                            name="nama_barang" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="jenis" class="form-label">Jenis</label>
                                                        <input type="text" class="form-control" id="jenis" name="jenis"
                                                            required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="tipe" class="form-label">Tipe</label>
                                                        <input type="text" class="form-control" id="tipe" name="tipe"
                                                            required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="merk" class="form-label">Merk</label>
                                                        <input type="text" class="form-control" id="merk" name="merk"
                                                            required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="ukuran" class="form-label">Ukuran</label>
                                                        <input type="text" class="form-control" id="ukuran"
                                                            name="ukuran" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="jumlah" class="form-label">Jumlah</label>
                                                        <input type="number" class="form-control" id="jumlah"
                                                            name="jumlah" min="1" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="lokasi" class="form-label">Lokasi</label>
                                                        <input type="text" class="form-control" id="lokasi"
                                                            name="lokasi" required>
                                                    </div>
                                                </div>

                                                <div class="modal-footer border-0">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
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
                                                <th>Tipe</th>
                                                <th>Merk</th>
                                                <th>Ukuran</th>
                                                <th>jumlah</th>
                                                <th>Lokasi</th>
                                                <th>Dibuat Pada</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($inventaryprojek as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $item->nama_barang }}</td>
                                                <td>{{ $item->jenis }}</td>
                                                <td>{{ $item->tipe }}</td>
                                                <td>{{ $item->merk }}</td>
                                                <td>{{ $item->ukuran }}</td>
                                                <td>{{ $item->jumlah }}</td>
                                                <td>{{ $item->lokasi }}</td>
                                                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                                <td>
                                                    <!-- Tombol Edit (buka modal) -->
                                                    <button type="button" class="btn btn-sm btn-warning me-2"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editModal{{ $item->id }}">
                                                        <i class="bi bi-pencil-square"></i> Edit
                                                    </button>

                                                    <!-- Form Hapus -->
                                                    <form action="{{ route('projek.hapus', $item->id) }}" method="POST"
                                                        style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                            <i class="bi bi-trash"></i> Hapus
                                                        </button>
                                                    </form>

                                                    <!-- Modal Edit -->
                                                    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
                                                        aria-labelledby="editModalLabel{{ $item->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content"
                                                                style="max-height: 90vh; overflow-y: auto;">
                                                                <form action="{{ route('projek.update', $item->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="editModalLabel{{ $item->id }}">Edit
                                                                            Inventory Project</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>

                                                                    <div class="modal-body"
                                                                        style="max-height: 70vh; overflow-y: auto;">
                                                                        <div class="mb-3">
                                                                            <label for="nama_barang{{ $item->id }}"
                                                                                class="form-label">Item Barang</label>
                                                                            <input type="text" name="nama_barang"
                                                                                class="form-control"
                                                                                id="nama_barang{{ $item->id }}"
                                                                                value="{{ $item->nama_barang }}"
                                                                                required>
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label for="jenis{{ $item->id }}"
                                                                                class="form-label">Jenis</label>
                                                                            <input type="text" name="jenis"
                                                                                class="form-control"
                                                                                id="jenis{{ $item->id }}"
                                                                                value="{{ $item->jenis }}" required>
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label for="tipe{{ $item->id }}"
                                                                                class="form-label">Tipe</label>
                                                                            <textarea name="tipe" class="form-control"
                                                                                id="tipe{{ $item->id }}" rows="3"
                                                                                required>{{ $item->tipe }}</textarea>
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label for="merk{{ $item->id }}"
                                                                                class="form-label">Merk</label>
                                                                            <input type="text" name="merk"
                                                                                class="form-control"
                                                                                id="merk{{ $item->id }}"
                                                                                value="{{ $item->merk }}">
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label for="ukuran{{ $item->id }}"
                                                                                class="form-label">Ukuran</label>
                                                                            <input type="text" name="ukuran"
                                                                                class="form-control"
                                                                                id="ukuran{{ $item->id }}"
                                                                                value="{{ $item->ukuran }}" required>
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label for="jumlah{{ $item->id }}"
                                                                                class="form-label">Jumlah</label>
                                                                            <input type="number" name="jumlah"
                                                                                class="form-control"
                                                                                id="jumlah{{ $item->id }}"
                                                                                value="{{ $item->jumlah }}" required>
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label for="lokasi{{ $item->id }}"
                                                                                class="form-label">Lokasi</label>
                                                                            <input type="text" name="lokasi"
                                                                                class="form-control"
                                                                                id="lokasi{{ $item->id }}"
                                                                                value="{{ $item->lokasi }}" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Batal</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Simpan
                                                                            Perubahan</button>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </td>

                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="10" class="text-center text-muted py-3">
                                                    Tidak ada data Data.
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
            <x-app.footer />
        </div>
    </main>
    <!-- Script Filter -->
    <script>
        $(function () {
            // Realtime filter saat mengetik
            $('#filterInput').on('keyup', function () {
                let keyword = $(this).val();
                filterData(keyword);
            });

            // Klik tombol "Filter"
            $('#applyFilter').on('click', function () {
                let keyword = $('#filterInput').val();
                filterData(keyword);
                $('#filterModal').modal('hide');
            });

            // Reset filter
            $('#resetFilter').on('click', function () {
                $('#filterInput').val('');
                filterData('');
            });

            function filterData(keyword) {
                $.ajax({
                    url: "{{ route('projek.filter') }}",
                    type: "GET",
                    data: {
                        keyword: keyword
                    },
                    success: function (response) {
                        let rows = '';
                        $.each(response, function (index, item) {
                            rows += `
            <tr>
              <td>${item.nama_barang}</td>
              <td>${item.jenis}</td>
              <td>${item.merk}</td>
              <td>${item.lokasi}</td>
            </tr>
          `;
                        });
                        $('#dataTable tbody').html(rows);
                    }
                });
            }
        });

    </script>
</x-app-layout>
