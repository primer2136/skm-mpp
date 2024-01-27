@extends('admin/layout.master')

@section('title', 'Tenant')
@section('title2', 'index')
@section('tenant', 'active')
<title>Tenant</title>

<link rel="shortcut icon" href="https://mpp.cimahikota.go.id/img/favicon.png" type="image/x-icon">

@section('konten')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        {{-- Button tambah --}}
                        <a href="{{ route('tenant.create') }}" class="btn btn-warning mb-4"><i
                                class="fas fa-plus text-light"></i></a>

                        {{-- Form search --}}
                        <div class="float-right">
                            <form action="?" method="GET">
                                <div class="input-group mb-3">
                                    <input name="keyword" id="caritenant" type="text" class="form-control"
                                        placeholder="Cari..." aria-label="Cari" aria-describedby="button-addon2"
                                        value="{{ Request::get('keyword') }}" autocomplete="off">
                                    <div class="input-group-append">
                                        <button id="btncaritenant" class="btn btn-outline-warning bg-warning" type="submit"
                                            id="button-addon2"><i class="fas fa-search text-light"></i></button>
                                    </div>
                                </div>
                            </form>
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
                                    <th>Logo</th>
                                    <th>Nama Tenant</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($tenants as $tenant)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>
                                            @if ($tenant->logo)
                                                <img src="{{ Storage::url($tenant->logo) }}" alt="Logo Tenant"
                                                    style="margin-top: 10px; max-width: 75px; max-height: 75px;">
                                            @else
                                                No Logo
                                            @endif
                                        </td>
                                        <td>{{ $tenant->nama_tenant }}</td>
                                        <td>
                                            <a href="{{ route('tenant.edit', $tenant->id_tenant) }}"
                                                class="btn btn-warning p-0" style="vertical-align: baseline">
                                                <button class="btn btn-warning m-0">Edit</button>
                                            </a>
                                            <form action="{{ route('tenant.destroy', $tenant->id_tenant) }}" method="POST"
                                                class="btn btn-danger p-0 delete-tenant" style="vertical-align: baseline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger m-0">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Penanganan jika tidak ada data -->
                        @if ($tenants->isEmpty())
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
@endsection
