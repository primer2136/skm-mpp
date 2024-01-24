@extends('admin/layout.master')

@section('title', 'Pertanyaan')
@section('title2', 'tambah')
@section('pertanyaan', 'active')
<title>Pertanyaan</title>

<link rel="shortcut icon" href="https://mpp.cimahikota.go.id/img/favicon.png" type="image/x-icon">

@section('konten')
    <div class="card">
        <div class="card-header">
            <h4>Edit Pertanyaan</h4>
        </div>
        <div class="card-body">
            <form id="editForm" action="{{ route('pertanyaan.update', $pertanyaans->id_pertanyaan) }}" method="POST"
                enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="row">

                    {{-- pertanyaan --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label @error('pertanyaan') class="text-danger" @enderror>
                                Pertanyaan
                                @error('pertanyaan')
                                    | {{ $message }}
                                @enderror
                            </label>
                            <input type="text" name="pertanyaan"
                                @if (old('pertanyaan')) value="{{ old('pertanyaan') }}"
                                @else
                                    value="{{ $pertanyaans->pertanyaan }}" @endif
                                class="form-control" autocomplete="off">
                        </div>
                    </div>

                    {{-- jawaban 1 --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label @error('jawaban1') class="text-danger" @enderror>
                                Opsi jawaban 1 Bobot 1
                                @error('jawaban1')
                                    | {{ $message }}
                                @enderror
                            </label>
                            <input type="text" name="jawaban1"
                                @if (old('jawaban1')) value="{{ old('jawaban1') }}"
                                @else
                                    value="{{ $pertanyaans->jawaban1 }}" @endif
                                class="form-control" autocomplete="off">
                        </div>
                    </div>

                    {{-- jawaban 2 --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label @error('jawaban2') class="text-danger" @enderror>
                                Opsi jawaban 2 Bobot 2
                                @error('jawaban2')
                                    | {{ $message }}
                                @enderror
                            </label>
                            <input type="text" name="jawaban2"
                                @if (old('jawaban2')) value="{{ old('jawaban2') }}"
                                @else
                                    value="{{ $pertanyaans->jawaban2 }}" @endif
                                class="form-control" autocomplete="off">
                        </div>
                    </div>

                    {{-- jawaban 3 --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label @error('jawaban3') class="text-danger" @enderror>
                                Opsi jawaban 3 Bobot 3
                                @error('jawaban3')
                                    | {{ $message }}
                                @enderror
                            </label>
                            <input type="text" name="jawaban3"
                                @if (old('jawaban3')) value="{{ old('jawaban3') }}"
                                @else
                                    value="{{ $pertanyaans->jawaban3 }}" @endif
                                class="form-control" autocomplete="off">
                        </div>
                    </div>

                    {{-- jawaban 4 --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label @error('jawaban4') class="text-danger" @enderror>
                                Opsi jawaban 4 Bobot 4
                                @error('jawaban4')
                                    | {{ $message }}
                                @enderror
                            </label>
                            <input type="text" name="jawaban4"
                                @if (old('jawaban4')) value="{{ old('jawaban4') }}"
                                @else
                                    value="{{ $pertanyaans->jawaban4 }}" @endif
                                class="form-control" autocomplete="off">
                        </div>
                    </div>

                </div>

                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="button" onclick="validateForm()">Submit</button>
                    <a href="/pertanyaan" class="btn btn-secondary" type="reset">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script>
        function validateForm() {
            var pertanyaan = document.forms["editForm"]["pertanyaan"].value;
            var jawaban1 = document.forms["editForm"]["jawaban1"].value;
            var jawaban2 = document.forms["editForm"]["jawaban2"].value;
            var jawaban3 = document.forms["editForm"]["jawaban3"].value;
            var jawaban4 = document.forms["editForm"]["jawaban4"].value;

            if (pertanyaan == "" || jawaban1 == "" || jawaban2 == "" || jawaban3 == "" || jawaban4 == "") {
                Swal.fire({
                    title: 'Gagal!',
                    text: 'Semua kolom harus diisi!',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            } else {
                document.getElementById("editForm").submit();
            }
        }
    </script>
@endsection
