@extends('admin/layout.master')

@section('title','Admin')
@section('title2','Tambah')
@section('admin','active')
<title>Admin - Tambah</title>

@section('konten')
<div class="card">
  <div class="card-header">
    <h4>Tambah Admin</h4>
  </div>
  <div class="card-body">
    <form action="{{ route('admin.store') }}" method="POST">
    @csrf
    <div class="row">

        {{-- nama --}}
        <div class="col-md-6">
            <div class="form-group">
              <label @error('nama') class="text-danger" @enderror>
                Nama Admin
                @error('nama')
                  | {{ $message }}
                @enderror
              </label>
              <input type="text" name="nama" value="{{old('nama')}}" class="form-control" autocomplete="off">  
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
              <input type="text" name="username" value="{{old('username')}}" class="form-control" autocomplete="off">  
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
              <input type="password" name="password" value="{{old('password')}}" class="form-control" autocomplete="off">  
            </div>
          </div>

            {{-- kompetensi --}}
          <div class="col-md-6">
            <div class="form-group">
              <label @error('telp') class="text-danger" @enderror>
                No. HP
                @error('telp')
                  | {{ $message }}
                @enderror
              </label>
              <input type="text" name="telp" value="{{old('telp')}}" class="form-control" autocomplete="off">  
            </div>
          </div>

          {{-- kompetensi --}}
          <div class="col-md-6">
            <div class="form-group">
              <label @error('level') class="text-danger" @enderror>
                Level
                @error('level')
                  | {{ $message }}
                @enderror
              </label>
              <select name="level" class="form-control" id="select2">
                  <option value="admin" class="form-control" disabled selected>-- Pilih --</option>
                  <option value="admin" class="form-control">Super Admin</option>
                  <option value="admin" class="form-control">Admin Tenant 1</option>
                  <option value="petugas" class="form-control">Admin Tenant 2</option>
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
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
  $('#select2').select2();
</script>
@endpush