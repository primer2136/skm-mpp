@extends('admin/layout.master')

@section('title', 'Responden')
@section('title2', 'index')
@section('responden', 'active')
<title>Responden</title>

@section('konten')
    <div class="card">
        <div class="card-header">
            <h4>Edit Responden</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('responden.update', $respondens->id_responden) }}" method="POST"
                enctype="multipart/form-data">
                @method('PATCH')
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
                            <input type="text" name="nama_responden"
                                @if (old('nama_responden')) value="{{ old('nama_responden') }}"
              @else
                  value="{{ $respondens->nama_responden }}" @endif
                                class="form-control" autocomplete="off">
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
                            <input type="number" name="tahun_lahir"
                                @if (old('tahun_lahir')) value="{{ old('tahun_lahir') }}"
              @else
                  value="{{ $respondens->tahun_lahir }}" @endif
                                class="form-control" autocomplete="off" min="1900" max="2024">
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
                                <option value="Pria" @if (old('jenis_kelamin') == 'Pria' || $respondens->jenis_kelamin == 'Pria') selected @endif>Pria</option>
                                <option value="Wanita" @if (old('jenis_kelamin') == 'Wanita' || $respondens->jenis_kelamin == 'Wanita') selected @endif>Wanita</option>
                            </select>
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
                                <option value="SD" @if (old('riwayat_pendidikan') == 'SD' || $respondens->riwayat_pendidikan == 'SD') selected @endif>SD</option>
                                <option value="SMP" @if (old('riwayat_pendidikan') == 'SMP' || $respondens->riwayat_pendidikan == 'SMP') selected @endif>SMP</option>
                                <option value="SMA" @if (old('riwayat_pendidikan') == 'SMA' || $respondens->riwayat_pendidikan == 'SMA') selected @endif>SMA</option>
                                <option value="Perguruan Tinggi" @if (old('riwayat_pendidikan') == 'Perguruan Tinggi' || $respondens->riwayat_pendidikan == 'Perguruan Tinggi') selected @endif>Perguruan Tinggi</option>
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
                            <input type="text" name="pekerjaan"
                                @if (old('pekerjaan')) value="{{ old('pekerjaan') }}"
              @else
                  value="{{ $respondens->pekerjaan }}" @endif
                                class="form-control" autocomplete="off">
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
