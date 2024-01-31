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
                    <div class="card-header">
                        <h4>Detail Jawaban</h4>
                    </div>
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



                        {{-- tabel --}}
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Pertanyaan</th>
                                    <th>Bobot</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jawabanSurvei as $jawaban)
                                    <tr>
                                        <td>{{ $jawaban->pertanyaan->id_pertanyaan }}</td>
                                        <td>{{ $jawaban->pertanyaan->pertanyaan }}</td>
                                        <td>{{ $jawaban->bobot }}</td>
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
                                {{-- Baris untuk rata-rata nilai --}}
                                <tr>
                                    <td colspan="2" style="text-align: center"><b>Rata-rata Nilai</b></td>
                                    <td>{{ number_format($rataRata, 2) }}</td>
                                </tr>
                            </tbody>
                            </tbody>
                        </table>
                        <div class="mt-4">
                            <a href="{{ route('publish.index') }}" class="btn btn-primary">Kembali</a>
                        </div>
                        {{-- {{ $survei->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
