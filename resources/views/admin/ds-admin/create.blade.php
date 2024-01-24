@extends('admin/layout.master')

@section('title', 'Admin')
@section('title2', 'Tambah')
@section('admin', 'active')
<title>Admin - Tambah</title>

<link rel="shortcut icon" href="https://mpp.cimahikota.go.id/img/favicon.png" type="image/x-icon">

@section('konten')
    <div class="card">
        <div class="card-header">
            <h4>Tambah Admin</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.store') }}" method="POST">
                @csrf
                <div class="row">

                    {{-- nama admin --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label @error('nama_admin') class="text-danger" @enderror>
                                Nama Admin
                                @error('nama_admin')
                                    | {{ $message }}
                                @enderror
                            </label>
                            <input type="text" name="nama_admin" value="{{ old('nama_admin') }}" class="form-control"
                                autocomplete="off">
                        </div>
                    </div>

                    {{-- username --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label @error('username') class="text-danger" @enderror>
                                Username
                                @error('username')
                                    | {{ $message }}
                                @enderror
                            </label>
                            <input type="text" name="username" value="{{ old('username') }}" class="form-control"
                                autocomplete="off">
                        </div>
                    </div>

                    {{-- password --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label @error('password') class="text-danger" @enderror>
                                Password
                                @error('password')
                                    | {{ $message }}
                                @enderror
                            </label>
                            <input type="password" name="password" value="{{ old('password') }}" class="form-control"
                                autocomplete="off">
                        </div>
                    </div>

                    {{-- no. hp --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label @error('telp') class="text-danger" @enderror>
                                No. HP
                                @error('telp')
                                    | {{ $message }}
                                @enderror
                            </label>
                            <input type="text" name="telp" value="{{ old('telp') }}" class="form-control"
                                autocomplete="off">
                        </div>
                    </div>

                    {{-- role --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label @error('role') class="text-danger" @enderror>
                                Role
                                @error('role')
                                    | {{ $message }}
                                @enderror
                            </label>
                            <select name="role" class="form-control" autocomplete="off">
                                <option disabled selected>-- Pilih --</option>
                                <hr style="margin: 5px 0; border: 0; border-top: 1px solid #ccc;">
                                <option value="super admin">Super Admin</option>
                                <option value="admin tenant 1">Admin Tenant 1</option>
                                <option value="admin tenant 2">Admin Tenant 2</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    <a href="/ds-admin" class="btn btn-secondary" type="reset">Cancel</a>
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
@endpush
