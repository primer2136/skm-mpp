@extends('admin/layout.master')

@section('title', 'Responden')
@section('title2', 'index')
@section('responden', 'active')
<title>Responden</title>

<link rel="shortcut icon" href="https://mpp.cimahikota.go.id/img/favicon.png" type="image/x-icon">

<style>
    .pagination.orange .page-item.active .page-link,
    .pagination.orange .page-link:hover {
        background-color: #ff8c00 !important;
        /* Warna oranye saat hover dan aktif */
        border-color: #ff8c00 !important;
        /* Warna border oranye saat hover dan aktif */
    }

    .pagination.orange .page-link {
        color: #ff8c00 !important;
        /* Warna teks oranye */
    }
</style>


@section('konten')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        {{-- Button tambah --}}
                        <div class="float-left mb-3 mr-3">
                            <a href="{{ route('responden.create') }}" class="btn btn-warning mb-4"><i
                                    class="fas fa-plus text-light"></i></a>
                        </div>
                        {{-- Form search --}}
                        <div class="float-right">
                            <form action="?" method="GET">
                                <div class="input-group mb-3">
                                    <input name="keyword" id="cariresponden" type="text" class="form-control"
                                        placeholder="Cari..." aria-label="Cari" aria-describedby="button-addon2"
                                        value="{{ Request::get('keyword') }}" autocomplete="off">
                                    <div class="input-group-append">
                                        <button id="btncariresponden" class="btn btn-outline-warning bg-warning"
                                            type="submit" id="button-addon2"><i
                                                class="fas fa-search text-light"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        {{-- Dropdown filter --}}
                        <div class="float-right mr-3">
                            <form id="filterForm" action="{{ route('responden.index') }}" method="GET">
                                <div class="form-group">
                                    <select name="id_tenant" id="id_tenant" class="form-control">
                                        <option value="">Semua Tenant</option>
                                        @foreach ($tenants as $tenant)
                                            <option value="{{ $tenant->id_tenant }}"
                                                {{ $id_tenant == $tenant->id_tenant ? 'selected' : '' }}>
                                                {{ $tenant->nama_tenant }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>

                        <div class="float-left mr-3">
                            {{-- Show entries --}}
                            <label for="showEntries" class="mr-2">Show entries:</label>
                            <select id="showEntries" class="form-control d-inline-block" style="width: auto;">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <span id="showEntriesInfo" class="ml-2"></span>
                        </div>

                        {{-- Alert --}}
                        @if (session('message'))
                            <div class="alert alert-success alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>×</span>
                                    </button>
                                    {{ session('message') }}
                                </div>
                            </div>
                        @endif

                        {{-- Tabel --}}
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Tahun Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Nomor Antrian</th>
                                    <th>Riwayat Pendidikan</th>
                                    <th>Pekerjaan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = $respondens->firstItem();
                                @endphp
                                @foreach ($respondens as $responden)
                                    @if (!$id_tenant || $responden->id_tenant == $id_tenant)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $responden->nama_responden }}</td>
                                            <td>{{ $responden->tahun_lahir }}</td>
                                            <td>{{ $responden->jenis_kelamin }}</td>
                                            <td>{{ $responden->nomor_antrian }}</td>
                                            <td>{{ $responden->riwayat_pendidikan }}</td>
                                            <td>{{ $responden->pekerjaan }}</td>
                                            <td>
                                                <a href="{{ route('responden.edit', $responden->id_responden) }}"
                                                    class="btn btn-warning p-0" style="vertical-align: baseline">
                                                    <button class="btn btn-warning m-0"><i class="fas fa-edit"></i></button>
                                                </a>
                                                <form action="{{ route('responden.destroy', $responden->id_responden) }}"
                                                    method="POST" class="btn btn-danger p-0 delete-tenant"
                                                    style="vertical-align: baseline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger m-0"><i
                                                            class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center">
                            {{ $respondens->links('pagination::bootstrap-4')->with(['class' => 'pagination orange']) }}
                        </div>


                        <!-- Penanganan jika tidak ada data -->
                        @if ($respondens->isEmpty())
                            <div class="alert alert-danger mt-3">
                                Data tidak ditemukan.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Skrip untuk SweetAlert --}}
    @push('page-scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @endpush

    {{-- Skrip untuk Konfirmasi Penghapusan --}}
    @push('after-scripts')
        <script>
            $(document).ready(function() {
                $(".delete-tenant").on("click", function(e) {
                    e.preventDefault();
                    var form = $(this).closest("form");

                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: 'Data yang dihapus tidak dapat dikembalikan!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        </script>
    @endpush

    <script>
        document.getElementById('id_tenant').addEventListener('change', function() {
            document.getElementById('filterForm').submit();
        });

        document.addEventListener("DOMContentLoaded", function() {
            var showEntriesSelect = document.getElementById("showEntries");
            var showEntriesInfo = document.getElementById("showEntriesInfo");
            var totalData = "{{ $respondens->total() }}"; 

            // Fungsi untuk memperbarui informasi "of total data" dan jumlah entri yang ditampilkan
            function updateShowEntriesInfo(totalData, selectedEntries) {
                showEntriesInfo.textContent = " of " + totalData + " entries";
            }

            // Mengambil nilai opsi "Show entries" dari URL jika tersedia
            var urlParams = new URLSearchParams(window.location.search);
            var entries = urlParams.get('entries');
            if (entries) {
                showEntriesSelect.value = entries;
            }
            var selectedEntries = showEntriesSelect.value; // Mendapatkan nilai opsi yang dipilih
            updateShowEntriesInfo(totalData,
            selectedEntries); // Memperbarui informasi jumlah entri yang ditampilkan

            // Tambahkan event listener untuk opsi "Show entries"
            showEntriesSelect.addEventListener("change", function() {
                var selectedValue = this.value; // Mendapatkan nilai yang dipilih
                var url = new URL(window.location.href); // Mendapatkan URL saat ini
                url.searchParams.set('entries',
                selectedValue); // Menambahkan parameter 'entries' ke URL dengan nilai yang dipilih
                window.location.href = url.href; // Mengarahkan ulang ke URL yang diperbarui

                // Simpan nilai terakhir yang dipilih ke penyimpanan lokal (localStorage)
                localStorage.setItem('lastSelectedEntries', selectedValue);

                // Memperbarui informasi jumlah entri yang ditampilkan
                updateShowEntriesInfo(totalData, selectedValue);
            });
        });
    </script>

@endsection
