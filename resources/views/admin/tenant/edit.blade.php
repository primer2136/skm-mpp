@extends('admin/layout.master')

@section('title', 'Tenant')
@section('title2', 'index')
@section('tenant', 'active')
<title>Tenant</title>

@section('konten')
    <div class="card">
        <div class="card-header">
            <h4>Edit Tenant</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('tenant.update', $tenants->id_tenant) }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
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
                            @if ($tenants->logo)
                                <img src="{{ asset('path/to/your/logo/folder/' . $tenants->logo) }}" alt="Logo Preview"
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
                            <input type="text" name="nama_tenant"
                                @if (old('nama_tenant')) value="{{ old('nama_tenant') }}"
              @else
                  value="{{ $tenants->nama_tenant }}" @endif
                                class="form-control" autocomplete="off">
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
