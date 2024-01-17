@extends('admin/layout.master')

@section('title', 'Responden')
@section('title2', 'index')
@section('responden', 'active')
<title>Responden</title>

@section('konten')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        {{-- Button tambah --}}
                        <a href="{{ route('responden.create') }}" class="btn btn-warning mb-4"><i
                                class="fas fa-plus text-light"></i></a>

                        {{-- Form search --}}
                        <div class="float-right">
                            <form action="?" method="GET">
                                <div class="input-group mb-3">
                                    <input name="keyword" id="caribuku" type="text" class="form-control"
                                        placeholder="Cari..." aria-label="Cari" aria-describedby="button-addon2"
                                        value="{{ Request()->keyword }}" autocomplete="off">
                                    <div class="input-group-append">
                                        <button id="btncaribuku" class="btn btn-outline-warning bg-warning" type="submit"
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
                                    <th>Nama</th>
                                    <th>Tahun Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Riwayat Pendidikan</th>
                                    <th>Pekerjaan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($respondens as $responden)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $responden->nama_responden }}</td>
                                        <td>{{ $responden->tahun_lahir }}</td>
                                        <td>{{ $responden->jenis_kelamin }}</td>
                                        <td>{{ $responden->riwayat_pendidikan }}</td>
                                        <td>{{ $responden->pekerjaan }}</td>
                                        <td>
                                            <a href="{{ route('responden.edit', $responden->id_responden) }}"
                                                class="btn btn-warning p-0" style="vertical-align: baseline;">
                                                {{-- <i class="fas fa-edit mb-2"></i> --}}
                                                <button class="btn btn-warning m-0">Edit</button>
                                            </a>
                                            <form action="{{ route('responden.destroy', $responden->id_responden) }}" method="POST"
                                                class="btn btn-danger p-0" style="vertical-align: baseline;"
                                                onsubmit="return confirm('Apakah yakin ingin dihapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger m-0">Hapus</button>
                                            </form>
                                            {{-- <a href="#" data-id=""
                                                class="btn btn-danger confirm_script-{{ $responden->id_responden }} mr-3">
                                                <form action="{{ route('responden.destroy', $responden->id_responden) }}"
                                                    class="delete_form-{{ $responden->id_responden }}" method="POST">
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
                                            $(".confirm_script-{{ $responden->id_responden }}").click(function(e) {
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
                                                            $('.delete_form-{{ $responden->id_responden }}').submit();
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
                        {{-- {{ $respondens->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection