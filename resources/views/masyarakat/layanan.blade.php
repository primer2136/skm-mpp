<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DEKRANASDA</title>

    <link rel="shortcut icon" href="https://mpp.cimahikota.go.id/img/favicon.png" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('landing/bs/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('landing/css/body.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('landing/css/navbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('landing/css/resp.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('landing/css/layanan.css') }}">

</head>

<body style="background-color: #fafafa;">

    <!-- background -->
    <img src="{{ asset('landing/assets/vector-bg.png') }}" class="bg" width="50%">

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light mt-3 fixed-top" id="navbar">
        <div class="container-fluid">
            <a href="/" class="navbar-brand">
                <img src="{{ asset('assets/img/logoMPP.png') }}" height="75px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="nav nav-pills">
                    {{-- @if (Auth::guard('masyarakat')->check()) --}}
                    <li class="nav-item">
                        <a href="/" class="nav-link active bg-active link-navbar tebel-sedang">Beranda &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a href="#statistik" class="nav-link link-navbar tebel-sedang">Statistik &nbsp;&nbsp;</a>
                    </li>
                    {{-- <li class="nav-item">
            @else --}}
                    {{-- @endif --}}
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')

    @section('content')
    <!-- content -->
    <div class="container">
        <br><br><br>
        <div class="row mt-5 mb-5">

            <div class="col-lg-12 gambar">
                <img src="{{ asset('landing/assets/vector-content.png') }}" width="100%">
            </div>

            <div class="col-sm-12 position-relative p-4">
                <div class="position-absolute top-0 end-0">
                    <img src="{{ asset('landing/assets/vector-content.png') }}" class="img">
                </div>

                <h1 class="display-1 text-truncate tebel-sedang">Survei Kepuasan</h1>
                <h1 class="display-1 text-truncate tebel-sedang">Pelayanan Tenant</h1>

                <div id="tata-cara" class="desc mt-4">
                    <p>Website ini digunakan untuk menyampaikan pendapat yang ingin masyarakat sampaikan terhadap kinerja
                        masing-masing tenant yang ada di Mal Pelayanan Publik Kota Cimahi.</p>
                </div>

                <div id="statistik" class="mt-5">
                    {{-- @if (Auth::guard('masyarakat')->check()) --}}
                    <a href="/survey" class="button rounded-pill shadow tebel-sedang">Mulai Survei</a>
                    &nbsp;
                    {{-- @else 
              <a href="#" id="swal-6" class="button rounded-pill shadow tebel-sedang">Mulai Survei</a>
              &nbsp;           
              @endif --}}
                    {{-- </div> --}}
                </div> <br><br>
                <div>
                    <h1 class="display-3 mt-5 text-left">STATISTIK PELAYANAN</h1>
                    <h2 class="display-3 mb-5 text-left">DEKRANASDA</h2>
                    <div class="box-container">
                        <div class="box">
                            <h2>Indeks Kepuasan (%)</h2>
                            <p>80</p>
                        </div>
                        <div class="box">
                            <h2>Total Responden</h2>
                            <p>500</p>
                        </div>
                        <div class="box">
                            <h2>Kualitas Pelayanan</h2>
                            <p>Sangat Baik</p>
                        </div>

                        <!-- Diagram batang -->
                        <div class="box bar-chart">
                            <h4>Statistik Pemilihan Responden Per Kategori Soal</h4>
                            <canvas id="barChart" width="300" height="300"></canvas>
                        </div>

                        <!-- Diagram lingkaran (pendidikan) -->
                        <div class="box doughnut-chart-edu">
                            <h4>Responden Berdasarkan Pendidikan</h4>
                            <canvas id="doughnutChartEdu" width="300" height="300"></canvas>
                        </div>

                        <!-- Diagram lingkaran (pekerjaan) -->
                        <div class="box doughnut-chart-job">
                            <h4>Responden Berdasarkan Pekerjaan</h4>
                            <canvas id="doughnutChartJob" width="300" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="{{ asset('landing/bs/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('landing/js/onscroll.js') }}"></script>
    <script src="{{ asset('node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @stack('page-scripts')

    <script>
        // Diagram batang
        var ctxBar = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: ['P1', 'P2', 'P3', 'P4', 'P5', 'P6', 'P7', 'P8', 'P9'],
                datasets: [{
                    label: 'Jumlah Responden',
                    data: [10, 15, 7, 20, 12, 18, 25, 16, 9],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                scales: {
                    x: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Diagram lingkaran (pendidikan)
        var ctxDoughnutEdu = document.getElementById('doughnutChartEdu').getContext('2d');
        var doughnutChartEdu = new Chart(ctxDoughnutEdu, {
            type: 'doughnut',
            data: {
                labels: ['SD', 'SMP', 'SMA', 'S1', 'S2', 'S3'],
                datasets: [{
                    label: 'Jumlah Responden',
                    data: [20, 30, 25, 40, 15, 10],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                    ],
                    borderWidth: 1
                }]
            }
        });

        // Diagram lingkaran (pekerjaan)
        var ctxDoughnutJob = document.getElementById('doughnutChartJob').getContext('2d');
        var doughnutChartJob = new Chart(ctxDoughnutJob, {
            type: 'doughnut',
            data: {
                labels: ['PNS', 'Swasta', 'Wiraswasta', 'Mahasiswa', 'Lainnya'],
                datasets: [{
                    label: 'Jumlah Responden',
                    data: [30, 25, 15, 20, 10],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            }
        });
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>