<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('landing/bs/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('landing/css/body.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('landing/css/navbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('landing/css/resp.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('landing/css/survey.css') }}">

    <title>SURVEY KEPUASAN MASYARAKAT</title>
    <link rel="shortcut icon" href="https://mpp.cimahikota.go.id/img/favicon.png" type="image/x-icon">
  </head>
  <body style="background-color: #fafafa;">
    
    <!-- background -->
    <img src="{{ asset('landing/assets/vector-bg.png') }}" class="bg" width="50%">

<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light mt-3 fixed-top" id="navbar">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="{{ asset('assets/img/logopengaduan.png') }}" height="30px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="nav nav-pills">
            {{-- @if (Auth::guard('masyarakat')->check()) --}}
            <li class="nav-item">
              <a class="nav-link active bg-active link-navbar tebel-sedang" href="/">Beranda &nbsp;&nbsp;</a>
            </li>
            <li class="nav-item">
              <a class="nav-link link-navbar tebel-sedang" href="/history">Riwayat &nbsp;&nbsp;</a>
            </li>
            {{-- <li class="nav-item">
              <a href="/logoutmasyarakat" class="nav-link bg-custom rounded tebel-sedang shadow" id="btn-sign">LOG OUT</a>
            </li>
            @else --}}
            <li class="nav-item">
              <a href="/loginmasyarakat" class="nav-link bg-custom rounded tebel-sedang shadow" id="btn-sign">MASUK</a>
            </li>
            {{-- @endif --}}
          </ul>
        </div>
      </div>
    </nav>
    @yield('content')