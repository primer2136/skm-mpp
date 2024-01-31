@extends('admin/layout.master')

@section('title', 'Pertanyaan')
@section('title2', 'index')
@section('pertanyaan', 'active')
<title>Pertanyaan</title>

<link rel="shortcut icon" href="https://mpp.cimahikota.go.id/img/favicon.png" type="image/x-icon">

@section('konten')
    <style>
        ul {
            list-style-type: decimal;
            margin: 0;
            padding: 0;
        }

        li {
            margin-bottom: 5px;
        }

        .center-text {
            text-align: center;
        }

        td.no-decimal ul {
            list-style-type: none;
        }

        td.pertanyaan-col {
            max-width: 350px;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
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
                                    <th>ID</th>
                                    <th>Pertanyaan</th>
                                    <th>Jawaban</th>
                                    <th>Bobot</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @dd($pertanyaans) --}}
                                @foreach ($pertanyaans as $pertanyaan)
                                    <tr>
                                        <td>{{ $pertanyaan->id_pertanyaan }}</td>
                                        <td class="pertanyaan-col">{{ $pertanyaan->pertanyaan }}</td>
                                        <td>
                                            <ul>
                                                <li>{{ $pertanyaan->jawaban1 }}</li>
                                                <li>{{ $pertanyaan->jawaban2 }}</li>
                                                <li>{{ $pertanyaan->jawaban3 }}</li>
                                                <li>{{ $pertanyaan->jawaban4 }}</li>
                                            </ul>
                                        </td>
                                        <td class="center-text no-decimal">
                                            <ul>
                                                <li>{{ $pertanyaan->bobot1 }}</li>
                                                <li>{{ $pertanyaan->bobot2 }}</li>
                                                <li>{{ $pertanyaan->bobot3 }}</li>
                                                <li>{{ $pertanyaan->bobot4 }}</li>
                                            </ul>
                                        </td>
                                        <td>
                                            <a href="{{ route('pertanyaan.edit', $pertanyaan->id_pertanyaan) }}"
                                                class="btn btn-warning p-0" style="vertical-align: baseline;">
                                                {{-- <i class="fas fa-edit mb-2"></i> --}}
                                                <button class="btn btn-warning m-0">Edit</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
