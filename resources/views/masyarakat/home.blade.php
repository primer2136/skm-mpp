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
        <div class="garis-horizontal"></div>
        <div>
            <div class="kotak-container">
                <div class="kotak">
                    <h2>Indeks Kepuasan (%)</h2>
                    <p>80</p>
                </div>
                <div class="kotak">
                    <h2>Total Responden</h2>
                    <p>500</p>
                </div>
                <div class="kotak">
                    <h2>Kualitas Pelayanan</h2>
                    <p>Sangat Baik</p>
                </div>

                <!-- Diagram batang -->
                <div class="kotak bar-chart">
                    <h4>Statistik Pemilihan Responden Per Kategori Soal</h4>
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
            <form action="/" method="GET">
                <div class="w-full md:w-1/2 m-auto relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-search text-gray-400 absolute inset-3 w-7 h-7">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <input type="text" name="nama_layanan" class="form-input pl-12 text-lg py-3 rounded-lg"
                        placeholder="Cari Layanan">
                    <button class="form-button absolute inset-y-2 right-2">
                        Cari
                    </button>
                </div>
            </form>
        </div>

        <div class="grid">
            <a href="layanan/1" class="box">
                <div class="logo-container">
                    <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239340_dekranasda.png"
                        alt="Logo DEKRANASDA">
                </div>
                <h3 class="service-title">DEKRANASDA</h3>
            </a>
            <a href="layanan/2" class="box">
                <div class="logo-container">
                    <img class="logo"
                        src="https://mpp.cimahikota.go.id/layanan/1666239444_kisspng-directorate-general-of-immigration-logo-vector-gra-international-affairs-office-5b6d3f3f610287.0532550815338862713974.png"
                        alt="Logo IMIGRASI">
                </div>
                <h3 class="service-title">IMIGRASI</h3>
            </a>
            <a href="layanan/3" class="box">
                <div class="logo-container">
                    <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239526_pngwing.com.png"
                        alt="Logo BADAN NARKOTIKA NASIONAL">
                </div>
                <h3 class="service-title">BADAN NARKOTIKA NASIONAL</h3>
            </a>
            <a href="layanan/4" class="box">
                <div class="logo-container">
                    <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239586_logo-pa-kota-cimahi.png"
                        alt="Logo PENGADILAN AGAMA">
                </div>
                <h3 class="service-title">PENGADILAN AGAMA</h3>
            </a>
            <a href="layanan/5" class="box">
                <div class="logo-container">
                    <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239641_Logo%20Taspen%202.png"
                        alt="Logo PT TASPEN">
                </div>
                <h3 class="service-title">PT TASPEN</h3>
            </a>
            <a href="layanan/6" class="box">
                <div class="logo-container">
                    <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239766_samsat%20cimahi.jpg"
                        alt="Logo SAMSAT">
                </div>
                <h3 class="service-title">SAMSAT</h3>
            </a>
            <a href="layanan/7" class="box">
                <div class="logo-container">
                    <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239844_Lambang_Polda_Jabar.png"
                        alt="Logo POLRES">
                </div>
                <h3 class="service-title">POLRES</h3>
            </a>
            <a href="layanan/8" class="box">
                <div class="logo-container">
                    <img class="logo"
                        src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                        alt="Logo PT PEGADAIAN">
                </div>
                <h3 class="service-title">PT PEGADAIAN</h3>
            </a>
            <a href="layanan/9" class="box">
                <div class="logo-container">
                    <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1673406612_logo antrian disdukcapil.png"
                        alt="Logo DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL">
                </div>
                <h3 class="service-title">DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL</h3>
            </a>
            <a href="layanan/10" class="box">
                <div class="logo-container">
                    <img class="logo"
                        src="https://mpp.cimahikota.go.id/layanan/1666239983_kisspng-logo-bank-bjb-syariah-portable-network-graphics-de-5c650ba4ad6456.4317897615501259887102.png"
                        alt="Logo BJB KCP PEMDA CIMAHI">
                </div>
                <h3 class="service-title">BJB KCP PEMDA CIMAHI</h3>
            </a>
            <a href="layanan/11" class="box">
                <div class="logo-container">
                    <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666240185_djp.png"
                        alt="Logo KANTOR PAJAK PRATAMA">
                </div>
                <h3 class="service-title">KANTOR PAJAK PRATAMA</h3>
            </a>
            <a href="layanan/12" class="box">
                <div class="logo-container">
                    <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666240267_logo bpjs-02.png"
                        alt="Logo BPJS KESEHATAN">
                </div>
                <h3 class="service-title">BPJS KESEHATAN</h3>
            </a>
            <a href="layanan/13" class="box">
                <div class="logo-container">
                    <img class="logo"
                        src="https://mpp.cimahikota.go.id/layanan/1666255331_BPJS Ketenagakerjaan Logo.png"
                        alt="Logo BPJS KETENAGAKERJAAN">
                </div>
                <h3 class="service-title">BPJS KETENAGAKERJAAN</h3>
            </a>
            <a href="layanan/14" class="box">
                <div class="logo-container">
                    <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666255432_pngwing.com (1).png"
                        alt="Logo KEJAKSAAN NEGERI CIMAHI">
                </div>
                <h3 class="service-title">KEJAKSAAN NEGERI CIMAHI</h3>
            </a>
            <a href="layanan/15" class="box">
                <div class="logo-container">
                    <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666255530_bappenda.png"
                        alt="Logo BAPPENDA">
                </div>
                <h3 class="service-title">BAPPENDA</h3>
            </a>
            <a href="layanan/16" class="box">
                <div class="logo-container">
                    <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666255707_Kementerian Agama.png"
                        alt="Logo KEMENTERIAN AGAMA">
                </div>
                <h3 class="service-title">KEMENTERIAN AGAMA</h3>
            </a>
            <a href="layanan/17" class="box">
                <div class="logo-container">
                    <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1669602597_kadin.jpg" alt="Logo KADIN">
                </div>
                <h3 class="service-title">KADIN</h3>
            </a>
            <a href="layanan/18" class="box">
                <div class="logo-container">
                    <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666255955_mpp.png"
                        alt="Logo DPMPTSP CIMAHI">
                </div>
                <h3 class="service-title">DPMPTSP CIMAHI</h3>
            </a>
            <a href="layanan/19" class="box">
                <div class="logo-container">
                    <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666256120_PUPR.png" alt="Logo DPUPR">
                </div>
                <h3 class="service-title">DPUPR</h3>
            </a>
            <a href="layanan/20" class="box">
                <div class="logo-container">
                    <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666256143_notariat.png"
                        alt="Logo NOTARIAT">
                </div>
                <h3 class="service-title">NOTARIAT</h3>
            </a>
            <a href="layanan/21" class="box">
                <div class="logo-container">
                    <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666256267_Pos-Indonesia.png"
                        alt="Logo PT POS INDONESIA">
                </div>
                <h3 class="service-title">PT POS INDONESIA</h3>
            </a>
            <a href="layanan/22" class="box">
                <div class="logo-container">
                    <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666256499_bpn-atr.png"
                        alt="Logo BPN ATR">
                </div>
                <h3 class="service-title">BPN ATR</h3>
            </a>
            <a href="layanan/23" class="box">
                <div class="logo-container">
                    <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666256617_bpom.png" alt="Logo BPOM">
                </div>
                <h3 class="service-title">BPOM</h3>
            </a>
            <a href="layanan/24" class="box">
                <div class="logo-container">
                    <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1669188912_logo bea cukai.png"
                        alt="Logo BEA CUKAI BANDUNG">
                </div>
                <h3 class="service-title">BEA CUKAI BANDUNG</h3>
            </a>
            <a href="layanan/25" class="box">
                <div class="logo-container">
                    <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666256862_dpmptspjabar.png"
                        alt="Logo DPMPTSP PROVINSI JAWA BARAT">
                </div>
                <h3 class="service-title">DPMPTSP PROVINSI JAWA BARAT</h3>
            </a>
            <a href="layanan/26" class="box">
                <div class="logo-container">
                    <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666256997_cimahi.png"
                        alt="Logo KECAMATAN CIMAHI SELATAN">
                </div>
                <h3 class="service-title">KECAMATAN CIMAHI SELATAN</h3>
            </a>
            <a href="layanan/27" class="box">
                <div class="logo-container">
                    <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666257117_pln copy.png"
                        alt="Logo PT PLN (Persero) UP3 Cimahi">
                </div>
                <h3 class="service-title">PT PLN (Persero) UP3 Cimahi</h3>
            </a>
            <a href="layanan/28" class="box">
                <div class="logo-container">
                    <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666257063_cimahi.png"
                        alt="Logo KECAMATAN CIMAHI TENGAH">
                </div>
                <h3 class="service-title">KECAMATAN CIMAHI TENGAH</h3>
            </a>
            <a href="layanan/29" class="box">
                <div class="logo-container">
                    <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666257098_cimahi.png"
                        alt="Logo KECAMATAN CIMAHI UTARA">
                </div>
                <h3 class="service-title">KECAMATAN CIMAHI UTARA</h3>
            </a>
            <a href="layanan/30" class="box">
                <div class="logo-container">
                    <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666257196_logokotacimahi.png"
                        alt="Logo DISDAGKOPERIN">
                </div>
                <h3 class="service-title">DISDAGKOPERIN</h3>
            </a>
            <a href="layanan/31" class="box">
                <div class="logo-container">
                    <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666257207_tenaga-kerja.png"
                        alt="Logo DINAS TENAGA KERJA">
                </div>
                <h3 class="service-title">DINAS TENAGA KERJA</h3>
            </a>
            <a href="layanan/32" class="box">
                <div class="logo-container">
                    <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666257309_dinas-pendidikan.png"
                        alt="Logo DINAS PENDIDIKAN">
                </div>
                <h3 class="service-title">DINAS PENDIDIKAN</h3>
            </a>
            <a href="layanan/33" class="box">
                <div class="logo-container">
                    <img class="logo"
                        src="https://mpp.cimahikota.go.id/layanan/1669095804_slider-5-2-water-operational-system.png"
                        alt="Logo PERUMDA AIR MINUM TIRTA RAHARJA">
                </div>
                <h3 class="service-title">PERUMDA AIR MINUM TIRTA RAHARJA</h3>
            </a>
            <a href="layanan/34" class="box">
                <div class="logo-container">
                    <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666257621_kesbangpol.png"
                        alt="Logo BADAN KESATUAN BANGSA DAN POLITIK">
                </div>
                <h3 class="service-title">BADAN KESATUAN BANGSA DAN POLITIK</h3>
            </a>
            <a href="layanan/35" class="box">
                <div class="logo-container">
                    <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666257699_dishub.png"
                        alt="Logo DINAS PERHUBUNGAN">
                </div>
                <h3 class="service-title">DINAS PERHUBUNGAN</h3>
            </a>
            <a href="layanan/36" class="box">
                <div class="logo-container">
                    <img class="logo"
                        src="https://mpp.cimahikota.go.id/layanan/1666257812_satpolpp-damkar.jpeg.crdownload"
                        alt="Logo SATPOL PP DAN DAMKAR">
                </div>
                <h3 class="service-title">SATPOL PP DAN DAMKAR</h3>
            </a>
            <a href="layanan/37" class="box">
                <div class="logo-container">
                    <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666258064_lingkungan-hidup.png"
                        alt="Logo DINAS LINGKUNGAN HIDUP">
                </div>
                <h3 class="service-title">DINAS LINGKUNGAN HIDUP</h3>
            </a>
            <a href="layanan/38" class="box">
                <div class="logo-container">
                    <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1671589509_1666257098_cimahi.png"
                        alt="Logo DINAS PERUMAHAN DAN KAWASAN PEMUKIMAN">
                </div>
                <h3 class="service-title">DINAS PERUMAHAN DAN KAWASAN PEMUKIMAN</h3>
            </a>
            <a href="layanan/39" class="box">
                <div class="logo-container">
                    <img class="logo"
                        src="https://mpp.cimahikota.go.id/layanan/1689145827_WhatsApp_Image_2023-07-12_at_1.53.03_PM-removebg-preview.png"
                        alt="Logo DINAS SOSIAL">
                </div>
                <h3 class="service-title">DINAS SOSIAL</h3>
            </a>
            <a href="layanan/40" class="box">
                <div class="logo-container">
                    <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666258428_dibudparpora.png"
                        alt="Logo DISBUDPARPORA CIMAHI">
                </div>
                <h3 class="service-title">DISBUDPARPORA CIMAHI</h3>
            </a>
            <a href="layanan/41" class="box">
                <div class="logo-container">
                    <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666258544_dinkes.png"
                        alt="Logo DINAS KESEHATAN">
                </div>
                <h3 class="service-title">DINAS KESEHATAN</h3>
            </a>
            <a href="layanan/42" class="box">
                <div class="logo-container">
                    <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1669604400_logo dispangtan-1.png"
                        alt="Logo DINAS PANGAN DAN PERTANIAN">
                </div>
                <h3 class="service-title">DINAS PANGAN DAN PERTANIAN</h3>
            </a>
            <a href="layanan/43" class="box">
                <div class="logo-container">
                    <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1669599358_kejaksaan.png"
                        alt="Logo KEJAKSAAN - E TILANG">
                </div>
                <h3 class="service-title">KEJAKSAAN - E TILANG</h3>
            </a>
            <a href="layanan/44" class="box">
                <div class="logo-container">
                    <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1683517714_logo-removebg-preview.png"
                        alt="Logo PENGADILAN NEGERI BALE BANDUNG">
                </div>
                <h3 class="service-title">PENGADILAN NEGERI BALE BANDUNG</h3>
            </a>

        </div>

    </div>

    <!-- <div>
            <div style="margin-top:2%">
                <nav>
                    <ul class="pagination">


                        <li class="page-item disabled" aria-disabled="true" aria-label="&laquo; Previous">
                            <span class="page-link" aria-hidden="true">
                                <</span>
                        </li>
                        <li class="page-item active" aria-current="page"><span class="page-link">1</span>
                        </li>
                        <li class="page-item"><a class="page-link" href="http://mpp.cimahikota.go.id?page=2">2</a></li>
                        <li class="page-item"><a class="page-link" href="http://mpp.cimahikota.go.id?page=3">3</a></li>
                        <li class="page-item"><a class="page-link" href="http://mpp.cimahikota.go.id?page=4">4</a></li>
                        <li class="page-item"><a class="page-link" href="http://mpp.cimahikota.go.id?page=5">5</a></li>
                        <li class="page-item"><a class="page-link" href="http://mpp.cimahikota.go.id?page=6">6</a></li>
                        <li class="page-item"><a class="page-link" href="http://mpp.cimahikota.go.id?page=2" rel="next" aria-label="Next »">></a>
                        </li>

                    </ul>
                </nav>
            </div> -->
    <br><br>
    </div>

    <div class="footer">
        <p class="text-center font-semibold text-sm text-gray-500">
            © DPMPTSP Kota Cimahi X <a href="https://www.itenas.ac.id" target="_blank"
                rel="noopener noreferrer">ITENAS</a>
        </p>
    </div>
@endsection
