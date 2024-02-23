@extends('masyarakat/layout/master')

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

                <div id="statistik" class="desc mt-4">
                    <h6 class="custom-paragraph">Website ini digunakan untuk menyampaikan pendapat yang ingin masyarakat
                        sampaikan terhadap kinerja
                        masing-masing tenant yang ada di Mal Pelayanan Publik Kota Cimahi.</h6>
                </div>

                {{-- <div class="mt-5"> --}}
                {{-- @if (Auth::guard('masyarakat')->check()) --}}
                {{-- <a href="masyarakat_pengaduan" class="button rounded-pill shadow tebel-sedang">Isi Survei</a>
                &nbsp;
                <a href="history" class="link">Riwayat Survei</a> --}}
                {{-- @else 
                <a href="#" id="swal-6" class="button rounded-pill shadow tebel-sedang">Isi Survei</a>
                &nbsp;
                <a href="#" id="swal-6" class="link">Riwayat Survei</a>                
                @endif --}}
                {{-- </div> --}}
            </div>
        </div>

        <h1>STATISTIK PELAYANAN</h1>
        <h2 class="display-3 text-left custom-h2">
            <span class="highlight-letter">M</span>AL <span class="highlight-letter">P</span>ELAYANAN <span
                class="highlight-letter">P</span>UBLIK CIMAHI
        </h2>
        <div class="garis-horizontal"></div>
        <div>
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
        {{-- <div class="container">
            <div class="col-md-8">
                <!-- Tombol untuk mengekspor data ke dalam file Excel -->
                <form action="{{ route('export.excel') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Export to Excel</button>
                </form>
            </div>
        </div> --}}


        <br id="tata-cara"><br><br><br><br><br>

        <h1>Tata Cara Mengisi Survei</h1>
        <div class="garis-horizontal"></div>

        <!-- How -->
        <div class="container my-10 mx-auto px-4 md:px-8 lg:px-12 max-w-xs">
            <div class="flex flex-wrap -mx-4">
                <!-- Article 1 -->
                <div class="my-1 px-1 i-full md:w-1/4 lg:my-4 lg:px-4 lg:w-1/4">
                    <article class="overflow-hidden rounded-lg shadow-lg text-gray-800">
                        <img alt="Tulis"
                            class="block max-w-full h-auto mx-auto my-10 transform transition hover:scale-125 duration-300 ease-in-out"
                            src="{{ asset('assets/img/pilihtenant.svg') }}" />
                        <header class="leading-tight p-2 md:p-4 text-center ">
                            <h1 class="text-lg font-bold">1. Pilih Tenant</h1>
                            <p class="text-grey-darker text-sm py-4">
                                Pilih tenant yang akan anda nilai.
                            </p>
                        </header>
                    </article>
                </div>
                <!-- END Article 1 -->

                <!-- Article 2 -->
                <div class="my-1 px-1 i-full md:w-1/4 lg:my-4 lg:px-4 lg:w-1/4">
                    <article class="overflow-hidden rounded-lg shadow-lg text-gray-800">
                        <img alt="Proses"
                            class="block max-w-full h-auto mx-auto my-10 transform transition hover:scale-125 duration-300 ease-in-out"
                            src="{{ asset('assets/img/tulis.svg') }}" />
                        <header class="leading-tight p-2 md:p-4 text-center">
                            <h1 class="text-lg font-bold">2. Isi Biodata Diri</h1>
                            <p class="text-grey-darker text-sm py-4">
                                Isi biodata diri sesuai dengan data diri Anda.
                            </p>
                        </header>
                    </article>
                </div>
                <!-- END Article 2 -->

                <!-- Article 3 -->
                <div class="my-1 px-1 i-full md:w-1/4 lg:my-4 lg:px-4 lg:w-1/4">
                    <article class="overflow-hidden rounded-lg shadow-lg text-gray-800">
                        <img alt="Ditindak"
                            class="block max-w-full h-auto mx-auto my-10 transform transition hover:scale-125 duration-300 ease-in-out"
                            src="{{ asset('assets/img/isikuesioner.svg') }}" />
                        <header class="leading-tight p-2 md:p-4 text-center">
                            <h1 class="text-lg font-bold">3. Isi Kuisioner</h1>
                            <p class="text-grey-darker text-sm py-4">
                                Beri penilaian Anda terhadap kinerja tenant.
                            </p>
                        </header>
                    </article>
                </div>
                <!-- END Article 3 -->

                <!-- Article 4 -->
                <div class="my-1 px-1 i-full md:w-1/4 lg:my-4 lg:px-4 lg:w-1/4">
                    <article class="overflow-hidden rounded-lg shadow-lg text-gray-800">
                        <img alt="Selesai"
                            class="block max-w-full h-auto mx-auto my-10 transform transition hover:scale-125 duration-300 ease-in-out"
                            src="{{ asset('assets/img/verification.svg') }}" />
                        <header class="leading-tight p-2 md:p-4 text-center">
                            <h1 class="text-lg font-bold">4. Selesai</h1>
                            <p class="text-grey-darker text-sm py-4">
                                Penilaian selesai dilakukan.
                            </p>
                        </header>
                    </article>
                </div>
                <!-- END Article 4 -->
            </div>
        </div>

        <br><br><br id="tenant"><br><br><br><br><br>

        <div class="mb-8">
            <form action="/" id="searchForm">
                <div class="w-full md:w-1/2 m-auto relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-search text-gray-400 absolute inset-3 w-7 h-7">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <input type="text" name="search" class="form-input pl-12 text-lg py-3 rounded-lg"
                        placeholder="Cari Layanan" id="searchInput">
                    <button class="form-button absolute inset-y-2 right-2" type="submit"
                        onclick="searchServices(event)">
                        Cari
                    </button>
                </div>
            </form>
        </div>

        {{-- <div class="row">
            <div class=col-md-6>
                <form action="/" id="searchForm">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari Layanan" name="search"
                            id="searchInput">
                        <button class="btn btn-danger" type="submit" onclick="searchServices(event)">Cari</button>
                    </div>
                </form>
            </div>
        </div> --}}

        <div class="grid" id="serviceResults">
            @foreach ($layananData['layananTenant'] as $layanan)
                <a href="layanan/{{ $layanan->id_tenant }}" class="box">
                    <div class="logo-container">
                        @if ($layanan->logo)
                            <img class="logo" src="{{ Storage::url($layanan->logo) }}"
                                alt="{{ $layanan->nama_tenant }}">
                        @else
                            <span>Logo not available</span>
                        @endif
                    </div>
                    <h3 class="service-title">{{ $layanan->nama_tenant }}</h3>
                </a>
            @endforeach

        </div>

    </div>

    <br><br>

    <div class="footer">
        <p class="text-center font-semibold text-sm text-gray-500">
            © DPMPTSP Kota Cimahi X <a href="https://www.itenas.ac.id" target="_blank"
                rel="noopener noreferrer">ITENAS</a>
        </p>
    </div>

    <script>
        function searchServices(event) {
            // Mencegah perilaku pengiriman formulir bawaan
            event.preventDefault();

            // Mendapatkan nilai pencarian dari input
            var searchTerm = document.querySelector("input[name='search']").value.toLowerCase();

            // Mendapatkan semua kotak layanan
            var serviceBoxes = document.querySelectorAll(".box");

            // Memfilter dan menampilkan hanya kotak layanan yang relevan
            for (var i = 0; i < serviceBoxes.length; i++) {
                var serviceTitle = serviceBoxes[i].querySelector(".service-title").innerText.toLowerCase();
                var altText = serviceBoxes[i].querySelector(".logo").getAttribute("alt").toLowerCase();
                var isMatch = serviceTitle.includes(searchTerm) || altText.includes(searchTerm);

                // Tambah atau hapus kelas .hidden berdasarkan hasil pencarian
                if (isMatch) {
                    serviceBoxes[i].classList.remove("hidden");
                } else {
                    serviceBoxes[i].classList.add("hidden");
                }
            }
        }
    </script>
@endsection
