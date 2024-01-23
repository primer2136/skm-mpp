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
                                        value="{{ Request()->keyword }}" autocomplete="off">
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

                        {{-- tabel --}}
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
                                                <img src="{{ Storage::url($tenant->logo) }}"
                                                    alt="Logo Tenant"
                                                    style="margin-top: 10px; max-width: 75px; max-height: 75px;">
                                            @else
                                                No Logo
                                            @endif
                                        </td>
                                        <td>{{ $tenant->nama_tenant }}</td>
                                        <td>
                                            <a href="{{ route('tenant.edit', $tenant->id_tenant) }}"
                                                class="btn btn-warning p-0" style="vertical-align: baseline;">
                                                {{-- <i class="fas fa-edit mb-2"></i> --}}
                                                <button class="btn btn-warning m-0">Edit</button>
                                            </a>
                                            <form action="{{ route('tenant.destroy', $tenant->id_tenant) }}" method="POST"
                                                class="btn btn-danger p-0" style="vertical-align: baseline;"
                                                onsubmit="return confirm('Apakah yakin ingin dihapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger m-0">Hapus</button>
                                            </form>
                                            {{-- <a href="#" data-id=""
                                                class="btn btn-danger confirm_script-{{ $tenant->id_tenant }} mr-3">
                                                <form action="{{ route('tenant.destroy', $tenant->id_tenant) }}"
                                                    class="delete_form-{{ $tenant->id_tenant }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                                <i class="fas fa-trash"></i>
                                            </a> --}}
                                        </td>
                                    </tr>
                                    {{-- @push('page-scripts')
                                        <script src="{{ asset('node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
                                    @endpush

                                    @push('after-scripts')
                                        <script>
                                            $(".confirm_script-{{ $tenant->id_tenant }}").click(function(e) {
                                                // id = e.target.dataset.id;
                                                swal({
                                                        title: 'Yakin hapus data?',
                                                        text: 'Data yang dihapus tidak bisa di kembalikan',
                                                        icon: 'warning',
                                                        buttons: true,
                                                        dangerMode: true,
                                                    })
                                                    .then((willDelete) => {
                                                        if (willDelete) {
                                                            $('.delete_form-{{ $tenant->id_tenant }}').submit();
                                                        } else {
                                                            swal('Hapus data telah di batalkan');
                                                        }
                                                    });
                                            });
                                        </script>
                                    @endpush --}}
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $tenants->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
