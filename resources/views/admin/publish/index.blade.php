@extends('admin/layout.master')

@section('title', 'Publish')
@section('title2', 'index')
@section('publish', 'active')
<title>Publish</title>

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
                                    <th>No.</th>
                                    <th>Nama Responden</th>
                                    <th>Nilai Rata-Rata</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($jawabans as $jawaban)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $jawaban->nama_responden }}</td>
                                        <td>{{ number_format($jawaban->rataRata, 2) }}</td>
                                        <td>
                                            <a href="{{ route('publish.view', ['id_responden' => $jawaban->id_responden]) }}"
                                                class="btn btn-warning p-0" style="vertical-align: baseline">
                                                <button class="btn btn-warning m-0"><i class="fas fa-eye"></i></button>
                                            </a>
                                            {{-- @if ($survei->status == 'terkirim')
                                            <a href="{{ route('publish.proses',$survei->id_publish )}}" class="btn btn-primary"><i class="fas fa-keyboard"></i> Diproses</a>
                                        @elseif($survei->status == 'proses')
                                            <a href="{{ route('publish.selesai',$survei->id_publish )}}" class="btn btn-success"><i class="fas fa-check"></i> Selesaikan</a>
                                        @else
                                            
                                        @endif
                                        <a href="{{ route('publish.tanggapan',$survei->id_publish) }}" class="btn btn-warning"><i class="far fa-comment-dots"></i> Tanggapi</a> --}}
                                        </td>
                                    </tr>
                                    @push('page-scripts')
                                        <script src="{{ asset('node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
                                    @endpush

                                    @push('after-scripts')
                                        <script>
                                            $(".confirm_script-{{ $jawaban->id_publish }}").click(function(e) {
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
                                                            $('.delete_form-{{ $jawaban->id_publish }}').submit();
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
