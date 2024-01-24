@extends('admin/layout.master')

@section('title', 'Tenant')
@section('title2', 'index')
@section('tenant', 'active')
<title>Tenant - Tambah</title>

<link rel="shortcut icon" href="https://mpp.cimahikota.go.id/img/favicon.png" type="image/x-icon">

@section('konten')
    <div class="card">
        <div class="card-header">
            <h4>Tambah Tenant</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('tenant.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    {{-- logo --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gambar" @error('gambar') class="text-danger" @enderror>
                                Pilih Logo
                                @error('gambar')
                                    | {{ $message }}
                                @enderror
                            </label>
                            <input type="file" name="logo" id="logoInput" class="form-control-file" autocomplete="off"
                                accept="image/*">
                            @if (isset($tenants) && $tenants->logo)
                                <img src="data:image/png;base64,{{ base64_encode($tenant->logo) }}" alt="Logo Preview"
                                    id="logoPreview">
                            @else
                                <img src="#" alt="Logo Preview" id="logoPreview" style="display: none;">
                            @endif
                        </div>
                    </div>

                    {{-- nama --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label @error('nama') class="text-danger" @enderror>
                                Nama Tenant
                                @error('nama')
                                    | {{ $message }}
                                @enderror
                            </label>
                            <input type="text" name="nama_tenant" class="form-control" autocomplete="off">
                        </div>
                    </div>

                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    <a href="/tenant" class="btn btn-secondary" type="reset">Cancel</a>
                </div>
            </form>
        </div>
    </div>

@endsection
@push('page-scripts')
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> --}}
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
