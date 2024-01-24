@extends('admin/layout.master')

@section('title', 'Admin')
@section('title2', 'tambah')
@section('admin', 'active')
<title>Admin</title>

<link rel="shortcut icon" href="https://mpp.cimahikota.go.id/img/favicon.png" type="image/x-icon">

@section('konten')
    <div class="card">
        <div class="card-header">
            <h4>Edit Admin</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('ds-admin.update', $data->id_admin) }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
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
                            <input type="text" name="nama_admin"
                                @if (old('nama_admin')) value="{{ old('nama_admin') }}"
              @else
                  value="{{ $data->nama_admin }}" @endif
                                class="form-control" autocomplete="off">
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
                            <input type="text" name="username"
                                @if (old('username')) value="{{ old('username') }}"
              @else
                  value="{{ $data->username }}" @endif
                                class="form-control" autocomplete="off">
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
                            <input type="text" name="password"
                                @if (old('password')) value="{{ old('password') }}"
              @else
                  value="{{ $data->password }}" @endif
                                class="form-control" autocomplete="off">
                        </div>
                    </div>

                    {{-- no hp --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label @error('telp') class="text-danger" @enderror>
                                No. HP
                                @error('telp')
                                    | {{ $message }}
                                @enderror
                            </label>
                            <input type="text" name="telp"
                                @if (old('telp')) value="{{ old('telp') }}"
              @else
                  value="{{ $data->telp }}" @endif
                                class="form-control" autocomplete="off">
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
                            <input type="text" name="role"
                                @if (old('role')) value="{{ old('role') }}"
              @else
                  value="{{ $data->role }}" @endif
                                class="form-control" autocomplete="off">
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
    {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush
