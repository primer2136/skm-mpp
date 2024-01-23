@extends('admin/layout.master')

@section('title', 'Admin')
@section('title2', 'index')
@section('admin', 'active')
<title>Admin</title>

<link rel="shortcut icon" href="https://mpp.cimahikota.go.id/img/favicon.png" type="image/x-icon">

@section('konten')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        {{-- Button tambah --}}
                        <a href="{{ route('admin.create') }}" class="btn btn-warning mb-4"><i
                                class="fas fa-plus text-light"></i></a>

                        {{-- Form search --}}
                        <div class="float-right">
                            <form action="?" method="GET">
                                <div class="input-group mb-3">
                                    <input name="keyword" id="cariadmin" type="text" class="form-control"
                                        placeholder="Cari..." aria-label="Cari" aria-describedby="button-addon2"
                                        value="{{ Request()->keyword }}" autocomplete="off">
                                    <div class="input-group-append">
                                        <button id="btncariadmin" class="btn btn-outline-warning bg-warning" type="submit"
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
                                    <th>Nama Admin</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>No. HP</th>
                                    <th>Role</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->nama_admin }}</td>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->password }}</td>
                                        <td>{{ $item->telp }}</td>
                                        <td>{{ $item->role }}</td>
                                        <td>
                                            <a href="{{ route('ds-admin.edit', $item->id_admin) }}"
                                                class="btn btn-warning p-0" style="vertical-align: baseline;">
                                                {{-- <i class="fas fa-edit mb-2"></i> --}}
                                                <button class="btn btn-warning m-0">Edit</button>
                                            </a>
                                            <form action="{{ route('ds-admin.destroy', $item->id_admin) }}" method="POST"
                                                class="btn btn-danger p-0" style="vertical-align: baseline;"
                                                onsubmit="return confirm('Apakah yakin ingin dihapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger m-0">Hapus</button>
                                            </form>
                                            {{-- <a href="{{ route('ds-admin.edit', $item->id_admin) }}"
                                                class="btn btn-warning"><i class="fas fa-edit mb-2"></i></a> --}}
                                            {{-- <a href="#" data-id="" class="btn btn-danger confirm_script-{{$item->id_admin}} mr-3">
                                            <form action="{{ route('admin.destroy',$item->id_admin)}}" class="delete_form-{{$item->id_admin}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            </form>
                                            <i class="fas fa-trash"></i>
                                          </a> --}}
                                        </td>
                                    </tr>
                                    @push('page-scripts')
                                        <script src="{{ asset('node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
                                    @endpush

                                    @push('after-scripts')
                                        <script>
                                            $(".confirm_script-{{ $item->id_admin }}").click(function(e) {
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
                                                            $('.delete_form-{{ $item->id_admin }}').submit();
                                                        } else {
                                                            swal('Hapus data telah di batalkan');
                                                        }
                                                    });
                                            });
                                        </script>
                                    @endpush
                                @endforeach
                            </tbody>
                        </table>
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
