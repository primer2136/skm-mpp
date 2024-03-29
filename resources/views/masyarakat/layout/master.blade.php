<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SURVEI KEPUASAN MASYARAKAT</title>

    <link rel="shortcut icon" href="https://mpp.cimahikota.go.id/img/favicon.png" type="image/x-icon">


    <!-- Bootstrap CSS -->
    <link href="{{ asset('landing/bs/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('landing/css/body.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('landing/css/navbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('landing/css/resp.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('landing/css/style.css') }}">
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
                        <a href="#" class="nav-link active bg-active link-navbar tebel-sedang">Beranda
                            &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a href="#statistik" class="nav-link link-navbar tebel-sedang">Statistik &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tata-cara" class="nav-link link-navbar tebel-sedang">Tata Cara &nbsp;&nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tenant" class="nav-link link-navbar tebel-sedang">Layanan Tenant &nbsp;&nbsp;</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="/logoutmasyarakat" class="nav-link bg-custom rounded tebel-sedang shadow" id="btn-sign">LOG OUT</a>
                            </li>
                        @else --}}
                    <li class="nav-item">
                        <a href="/login" class="nav-link bg-custom rounded tebel-sedang shadow"
                            id="btn-sign">MASUK</a>
                    </li>
                    {{-- @endif --}}
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="{{ asset('landing/bs/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('landing/js/onscroll.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @stack('page-scripts')

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous">
    </script>
    -->
    <script>
        $(document).ready(function() {
            // Animasi untuk indeks kepuasan
            $({
                Counter: 0
            }).animate({
                Counter: <?php echo $skmData['konversiSKM']; ?>
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
                Counter: <?php echo $totalRespondenSemuaTenant; ?>
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
                var kualitasPelayanan = "<?php echo $skmData['kualitasPelayanan']; ?>";

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
                    data: {!! json_encode(array_values($skmData['nilaiRataRata'])) !!},
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
                labels: {!! json_encode($eduLabels) !!},
                datasets: [{
                    label: 'Jumlah Responden',
                    data: {!! json_encode($eduValues) !!},
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
                labels: {!! json_encode($jobLabels) !!},
                datasets: [{
                    label: 'Jumlah Responden',
                    data: {!! json_encode($jobValues) !!},
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
</body>

</html>
