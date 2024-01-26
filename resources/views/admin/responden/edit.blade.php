@extends('admin/layout.master')

@section('title', 'Responden')
@section('title2', 'tambah')
@section('responden', 'active')
<title>Responden</title>

<link rel="shortcut icon" href="https://mpp.cimahikota.go.id/img/favicon.png" type="image/x-icon">

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

                    {{-- dropdown untuk memilih tenant --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label @error('id_tenant') class="text-danger" @enderror>
                                Nama Tenant
                                @error('id_tenant')
                                    | {{ $message }}
                                @enderror
                            </label>
                            <input type="text" class="form-control" value="{{ $respondens->tenant->nama_tenant }}" disabled>
                        </div>
                    </div>

                    {{-- nama --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label @error('nama') class="text-danger" @enderror>
                                Nama
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

                    {{-- nomor antrian --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label @error('nmr_antrn') class="text-danger" @enderror>
                                Nomor Antrian
                                @error('nmr_antrn')
                                    | {{ $message }}
                                @enderror
                            </label>
                            <input type="text" name="nomor_antrian"
                                @if (old('nomor_antrian')) value="{{ old('nomor_antrian') }}"
              @else
                  value="{{ $respondens->nomor_antrian }}" @endif
                                class="form-control" autocomplete="off">
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
                                <option value="Tidak Tamat" @if (old('riwayat_pendidikan') == 'Tidak Tamat' || $respondens->riwayat_pendidikan == 'SD') selected @endif>Tidak Tamat
                                </option>
                                <option value="SD" @if (old('riwayat_pendidikan') == 'SD' || $respondens->riwayat_pendidikan == 'SD') selected @endif>SD</option>
                                <option value="SMP" @if (old('riwayat_pendidikan') == 'SMP' || $respondens->riwayat_pendidikan == 'SMP') selected @endif>SMP</option>
                                <option value="SMA" @if (old('riwayat_pendidikan') == 'SMA' || $respondens->riwayat_pendidikan == 'SMA') selected @endif>SMA</option>
                                <option value="Tamat D3" @if (old('riwayat_pendidikan') == 'Tamat D3' || $respondens->riwayat_pendidikan == 'Tamat D3') selected @endif>Tamat D3
                                </option>
                                <option value="Tamat D4/S1" @if (old('riwayat_pendidikan') == 'Tamat D4/S1' || $respondens->riwayat_pendidikan == 'Tamat D4/S1') selected @endif>Tamat D4/S1
                                </option>
                                <option value="Tamat S2" @if (old('riwayat_pendidikan') == 'Tamat S2' || $respondens->riwayat_pendidikan == 'Tamat S2') selected @endif>Tamat S2
                                </option>
                                <option value="Tamat S3" @if (old('riwayat_pendidikan') == 'Tamat S3' || $respondens->riwayat_pendidikan == 'Tamat S3') selected @endif>Tamat S3
                                </option>
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
                                <option value="Pegawai Negeri" @if (old('pekerjaan') == 'Pegawai Negeri' || $respondens->pekerjaan == 'Pegawai Negeri') selected @endif>Pegawai
                                    Negeri</option>
                                <option value="Pegawai Swasta" @if (old('pekerjaan') == 'Pegawai Swasta' || $respondens->pekerjaan == 'Pegawai Swasta') selected @endif>Pegawai
                                    Swasta</option>
                                <option value="Mahasiswa" @if (old('pekerjaan') == 'Mahasiswa' || $respondens->pekerjaan == 'Mahasiswa') selected @endif>Mahasiswa
                                </option>
                                <option value="Pelajar" @if (old('pekerjaan') == 'Pelajar' || $respondens->pekerjaan == 'Pelajar') selected @endif>Pelajar</option>
                                <option value="Wiraswasta/Pengusaha" @if (old('pekerjaan') == 'Wiraswasta/Pengusaha' || $respondens->pekerjaan == 'Wiraswasta/Pengusaha') selected @endif>
                                    Wiraswasta/Pengusaha</option>
                                <option value="Lainnya" @if (old('pekerjaan') == 'Lainnya' || $respondens->pekerjaan == 'Lainnya') selected @endif>Lainnya</option>
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
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush
