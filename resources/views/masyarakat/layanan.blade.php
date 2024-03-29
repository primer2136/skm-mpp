<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $layananData['judul'] }}</title>

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
                <div class="d-flex align-items-center">
                    <img src="{{ asset('assets/img/Kota Cimahi.png') }}" height="90px" class="mr-2">
                    <img src="{{ asset('assets/img/logoMPP2.png') }}" height="100px" class="mr-2">
                    <a href="https://www.itenas.ac.id" target="_blank">
                        <img src="{{ asset('assets/img/logoitenas.png') }}" height="55px" class="itenas-logo">
                    </a>
                    <a href="https://www.stialanbandung.ac.id" target="_blank">
                        <img src="{{ asset('assets/img/logo_LAN.png') }}" height="80px" class="lan-logo">
                    </a>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="nav nav-pills">
                    {{-- @if (Auth::guard('masyarakat')->check()) --}}
                    <li class="nav-item">
                        <a href="/" class="nav-link active bg-active link-navbar tebel-sedang">Beranda
                            &nbsp;&nbsp;</a>
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
                        <h6 class="custom-paragraph">Website ini digunakan untuk menyampaikan pendapat yang ingin masyarakat
                            sampaikan terhadap kinerja
                            masing-masing tenant yang ada di Mal Pelayanan Publik Kota Cimahi.</h6>
                    </div>

                    <div id="statistik" class="mt-5">
                        {{-- @if (Auth::guard('masyarakat')->check()) --}}
                        <a href="{{ url("/layanan/{$layananData['nomor']}/survey/responden") }}"
                            class="button rounded-pill shadow tebel-sedang">Mulai Survei</a>
                        &nbsp;
                        {{-- @else 
                <a href="#" id="swal-6" class="button rounded-pill shadow tebel-sedang">Mulai Survei</a>
                &nbsp;           
                @endif --}}
                        {{-- </div> --}}
                    </div> <br><br>
                    <div>
                        <h1 class="display-3 mt-5 text-left">STATISTIK PELAYANAN</h1>
                        <h2 class="display-3 mb-5 text-left">{{ $layananData['info'] }}</h2>
                        <div class="kotak-container">
                            <div class="kotak">
                                <h2>Indeks Kepuasan (%)</h2>
                                <p id="indeks-kepuasan">0</p>
                            </div>
                            <div class="kotak">
                                <h2>Total Responden</h2>
                                <p id="total-responden">0</p>
                            </div>
                            <div class="kotak">
                                <h2>Kualitas Pelayanan</h2>
                                <p class="animate-text" id="kualitas-pelayanan">-</p>
                            </div>

                            <!-- Diagram batang -->
                            <div class="kotak bar-chart">
                                <h4>Statistik Rata-Rata Nilai Per Pertanyaan</h4>
                                <canvas id="barChart" width="300" height="300"></canvas>
                            </div>

                            <!-- Diagram lingkaran (pendidikan) -->
                            <div class="kotak doughnut-chart-edu">
                                <h4>Responden Berdasarkan Pendidikan</h4>
                                <canvas id="doughnutChartEdu" width="300" height="300"></canvas>
                            </div>

                            <!-- Diagram lingkaran (pekerjaan) -->
                            <div class="kotak doughnut-chart-job">
                                <h4>Responden Berdasarkan Pekerjaan</h4>
                                <canvas id="doughnutChartJob" width="300" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="{{ asset('landing/bs/js/bootstrap.bundle.js') }}"></script>
        <script src="{{ asset('landing/js/onscroll.js') }}"></script>
        <script src="{{ asset('node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        @stack('page-scripts')

        <script>
            $(document).ready(function() {
                // Animasi untuk indeks kepuasan
                $({
                    Counter: 0
                }).animate({
                    Counter: <?php echo $skm['konversiSKM']; ?>
                }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function() {
                        $('p#indeks-kepuasan').text(this.Counter.toFixed(2));
                    },
                    complete: function() {
                        // Setelah animasi indeks kepuasan selesai
                        animateTotalResponden(); // Mulai animasi total responden
                    }
                });

                // Animasi untuk total responden
                $({
                    Counter: 0
                }).animate({
                    Counter: <?php echo $totalResponden; ?>
                }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function() {
                        $('p#total-responden').text(Math.ceil(this.Counter));
                    },
                    complete: function() {
                        // Setelah animasi total responden selesai
                        animateKualitasPelayanan(); // Mulai animasi kualitas pelayanan
                    }
                });

                function animateKualitasPelayanan() {
                    // Tentukan kualitas pelayanan
                    var kualitasPelayanan = "<?php echo $skm['kualitasPelayanan']; ?>";

                    // Tampilkan kualitas pelayanan secara pop-up
                    $('#kualitas-pelayanan').text(kualitasPelayanan).css('opacity', '1');
                }
            });
            // Diagram batang
            var ctxBar = document.getElementById('barChart').getContext('2d');
            var barChart = new Chart(ctxBar, {
                type: 'bar',
                data: {
                    labels: ['U1', 'U2', 'U3', 'U4', 'U5', 'U6', 'U7', 'U8', 'U9'],
                    datasets: [{
                        label: 'Rata-Rata',
                        data: {!! json_encode(array_values($skm['nilaiRataRata'])) !!},
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
                    labels: {!! json_encode($layananData['chartData']['eduData']->pluck('riwayat_pendidikan')) !!},
                    datasets: [{
                        label: 'Jumlah Responden',
                        data: {!! json_encode($layananData['chartData']['eduData']->pluck('total')) !!},
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 0, 0, 0.2)',
                            'rgba(0, 128, 0, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 0, 0, 1)',
                            'rgba(0, 128, 0, 1)',
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
                    labels: {!! json_encode($layananData['chartData']['jobData']->pluck('pekerjaan')) !!},
                    datasets: [{
                        label: 'Jumlah Responden',
                        data: {!! json_encode($layananData['chartData']['jobData']->pluck('total')) !!},
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 0, 0, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 0, 0, 1)',
                        ],
                        borderWidth: 1
                    }]
                }
            });
        </script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
                        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
                            integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous">
                        </script>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
                            integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous">
                        </script>
                        -->
    </body>

    </html>
