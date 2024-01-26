@extends('admin/layout.master')

@section('title', 'Publish')
@section('title2', 'index')
@section('publish', 'active')
<title>Detail Jawaban</title>

<link rel="shortcut icon" href="https://mpp.cimahikota.go.id/img/favicon.png" type="image/x-icon">

@section('konten')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

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
                        {{-- Button tambah --}}
                        <a href="{{ route('publish.create') }}" class="btn btn-violet mb-4"><i
                                class="fas fa-plus text-light"></i></a>

                        {{-- Form search --}}
                        <div class="float-right">
                            <form action="?" method="GET">
                                <div class="input-group mb-3">
                                    <input name="keyword" id="caripublish" type="text" class="form-control"
                                        placeholder="Cari..." aria-label="Cari" aria-describedby="button-addon2"
                                        value="{{ Request()->keyword }}" autocomplete="off">
                                    <div class="input-group-append">
                                        <button id="btncaripublish" class="btn btn-outline-warning bg-warning"
                                            type="submit" id="button-addon2"><i
                                                class="fas fa-search text-light"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>



                        {{-- tabel --}}
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Pertanyaan</th>
                                    <th>Bobot jawaban</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($hasils as $jawaban)
                                    <tr>
                                        <td>{{ $jawaban->pertanyaan->id_pertanyaan }}</td>
                                        <td>{{ $jawaban->pertanyaan->pertanyaan }}</td>
                                        <td>{{ $jawaban->pertanyaan->bobot1}}</td>
                                    </tr>
                                    @push('page-scripts')
                                        <script src="{{ asset('node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
                                    @endpush

                                    @push('after-scripts')
                                        <script>
                                            $(".confirm_script-{{ $jawaban->id_jawaban }}").click(function(e) {
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
                                                            $('.delete_form-{{ $jawaban->id_jawaban }}').submit();
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
                        {{-- {{ $survei->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
