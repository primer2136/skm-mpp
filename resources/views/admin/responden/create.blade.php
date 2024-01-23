@extends('admin/layout.master')

@section('title', 'Responden')
@section('title2', 'index')
@section('responden', 'active')
<title>Responden - Tambah</title>

<link rel="shortcut icon" href="https://mpp.cimahikota.go.id/img/favicon.png" type="image/x-icon">

@section('konten')
    <div class="card">
        <div class="card-header">
            <h4>Tambah Responden</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('responden.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    {{-- nama --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label @error('nama') class="text-danger" @enderror>
                                Nama Responden
                                @error('nama')
                                    | {{ $message }}
                                @enderror
                            </label>
                            <input type="text" name="nama_responden" class="form-control" autocomplete="off">
                        </div>
                    </div>

                    {{-- tahun lahir --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label @error('th_lhr') class="text-danger" @enderror>
                                Tahun Lahir
                                @error('th_lhr')
                                    | {{ $message }}
                                @enderror
                            </label>
                            <input type="number" name="tahun_lahir" class="form-control" autocomplete="off" min="1900"
                                max="2024">
                        </div>
                    </div>

                    {{-- jenis kelamin --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label @error('jns_klmn') class="text-danger" @enderror>
                                Jenis Kelamin
                                @error('jns_klmn')
                                    | {{ $message }}
                                @enderror
                            </label>
                            <select name="jenis_kelamin" class="form-control" autocomplete="off">
                                <option disabled selected>-- Pilih --</option>
                                <hr style="margin: 5px 0; border: 0; border-top: 1px solid #ccc;">
                                <option value="pria">Pria</option>
                                <option value="wanita">Wanita</option>
                            </select>
                        </div>
                    </div>

                    {{-- nomor antrian --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label @error('nmr_antrn') class="text-danger" @enderror>
                                Nomor Antrian
                                @error('nmr_antrn')
                                    | {{ $message }}
                                @enderror
                            </label>
                            <input type="text" name="nomor_antrian" class="form-control" autocomplete="off">
                        </div>
                    </div>

                    {{-- riwayat pendidikan --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label @error('rwyt_pnddkn') class="text-danger" @enderror>
                                Riwayat Pendidikan
                                @error('rwyt_pnddkn')
                                    | {{ $message }}
                                @enderror
                            </label>
                            <select name="riwayat_pendidikan" class="form-control" autocomplete="off">
                                <option disabled selected>-- Pilih --</option>
                                <hr style="margin: 5px 0; border: 0; border-top: 1px solid #ccc;">
                                <option value="Tidak Tamat">Tidak Tamat</option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                                <option value="Tamat D3">Tamat D3</option>
                                <option value="Tamat D4/S1">Tamat D4/S1</option>
                                <option value="Tamat S2">Tamat S2</option>
                                <option value="Tamat S3">Tamat S3</option>
                            </select>
                        </div>
                    </div>

                    {{-- pekerjaan --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label @error('pkrjn') class="text-danger" @enderror>
                                Pekerjaan
                                @error('pkrjn')
                                    | {{ $message }}
                                @enderror
                            </label>
                            <select name="pekerjaan" class="form-control" autocomplete="off">
                                <option disabled selected>-- Pilih --</option>
                                <hr style="margin: 5px 0; border: 0; border-top: 1px solid #ccc;">
                                <option value="Pegawai Negeri">Pegawai Negeri</option>
                                <option value="Pegawai Swasta">Pegawai Swasta</option>
                                <option value="Mahasiswa">Mahasiswa</option>
                                <option value="Pelajar">Pelajar</option>
                                <option value="Wiraswasta/Pengusaha">Wiraswasta/Pengusaha</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    <a href="/responden" class="btn btn-secondary" type="reset">Cancel</a>
                </div>
            </form>
        </div>
    </div>

@endsection
@push('page-scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $('#select2').select2();
    </script>

    <script>
        document.getElementById('logoInput').addEventListener('change', function(e) {
            var logoPreview = document.getElementById('logoPreview');
            var fileInput = e.target;

            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    logoPreview.src = e.target.result;
                    logoPreview.style.display = 'block';
                };

                reader.readAsDataURL(fileInput.files[0]);
            } else {
                logoPreview.src = '#';
                logoPreview.style.display = 'none';
            }
        });
    </script>
@endpush
