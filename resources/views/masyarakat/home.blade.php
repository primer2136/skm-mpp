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

            <div class="desc mt-4">
                <p>Website ini digunakan untuk menyampaikan pendapat yang ingin masyarakat sampaikan terhadap kinerja
                    masing-masing tenant yang ada di Mal Pelayanan Publik Kota Cimahi.</p>
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

    <div id="tenant" class="mb-8">
        <form action="/">
            <div class="w-full md:w-1/2 m-auto relative">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search text-gray-400 absolute inset-3 w-7 h-7">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <input type="text" name="nama_layanan" class="form-input pl-12 text-lg py-3 rounded-lg" placeholder="Cari Layanan">
                <button class="form-button absolute inset-y-2 right-2">
                    Cari
                </button>
            </div>
        </form>
    </div>

<div class="grid">
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239340_dekranasda.png"
                alt="Logo DEKRANASDA">
        </div>
        <h3 class="service-title">DEKRANASDA</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo"
                src="https://mpp.cimahikota.go.id/layanan/1666239444_kisspng-directorate-general-of-immigration-logo-vector-gra-international-affairs-office-5b6d3f3f610287.0532550815338862713974.png"
                alt="Logo IMIGRASI">
        </div>
        <h3 class="service-title">iMIGRASI</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239526_pngwing.com.png"
                alt="Logo BADAN NARKOTIKA NASIONAL">
        </div>
        <h3 class="service-title">BADAN NARKOTIKA NASIONAL</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239586_logo-pa-kota-cimahi.png"
                alt="Logo PENGADILAN AGAMA">
        </div>
        <h3 class="service-title">PENGADILAN AGAMA</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239641_Logo%20Taspen%202.png"
                alt="Logo PT TASPEN">
        </div>
        <h3 class="service-title">PT TASPEN</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239766_samsat%20cimahi.jpg"
                alt="Logo SAMSAT">
        </div>
        <h3 class="service-title">SAMSAT</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239844_Lambang_Polda_Jabar.png"
                alt="Logo POLRES">
        </div>
        <h3 class="service-title">KPOLRES</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                alt="Logo PT PEGADAIAN">
        </div>
        <h3 class="service-title">PT PEGADAIAN</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                alt="Logo PT PEGADAIAN">
        </div>
        <h3 class="service-title">PT PEGADAIAN</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                alt="Logo PT PEGADAIAN">
        </div>
        <h3 class="service-title">PT PEGADAIAN</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                alt="Logo PT PEGADAIAN">
        </div>
        <h3 class="service-title">PT PEGADAIAN</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                alt="Logo PT PEGADAIAN">
        </div>
        <h3 class="service-title">PT PEGADAIAN</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                alt="Logo PT PEGADAIAN">
        </div>
        <h3 class="service-title">PT PEGADAIAN</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                alt="Logo PT PEGADAIAN">
        </div>
        <h3 class="service-title">PT PEGADAIAN</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                alt="Logo PT PEGADAIAN">
        </div>
        <h3 class="service-title">PT PEGADAIAN</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                alt="Logo PT PEGADAIAN">
        </div>
        <h3 class="service-title">PT PEGADAIAN</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                alt="Logo PT PEGADAIAN">
        </div>
        <h3 class="service-title">PT PEGADAIAN</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                alt="Logo PT PEGADAIAN">
        </div>
        <h3 class="service-title">PT PEGADAIAN</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                alt="Logo PT PEGADAIAN">
        </div>
        <h3 class="service-title">PT PEGADAIAN</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                alt="Logo PT PEGADAIAN">
        </div>
        <h3 class="service-title">PT PEGADAIAN</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                alt="Logo PT PEGADAIAN">
        </div>
        <h3 class="service-title">PT PEGADAIAN</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                alt="Logo PT PEGADAIAN">
        </div>
        <h3 class="service-title">PT PEGADAIAN</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                alt="Logo PT PEGADAIAN">
        </div>
        <h3 class="service-title">PT PEGADAIAN</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                alt="Logo PT PEGADAIAN">
        </div>
        <h3 class="service-title">PT PEGADAIAN</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                alt="Logo PT PEGADAIAN">
        </div>
        <h3 class="service-title">PT PEGADAIAN</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                alt="Logo PT PEGADAIAN">
        </div>
        <h3 class="service-title">PT PEGADAIAN</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                alt="Logo PT PEGADAIAN">
        </div>
        <h3 class="service-title">PT PEGADAIAN</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                alt="Logo PT PEGADAIAN">
        </div>
        <h3 class="service-title">PT PEGADAIAN</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                alt="Logo PT PEGADAIAN">
        </div>
        <h3 class="service-title">PT PEGADAIAN</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                alt="Logo PT PEGADAIAN">
        </div>
        <h3 class="service-title">PT PEGADAIAN</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                alt="Logo PT PEGADAIAN">
        </div>
        <h3 class="service-title">PT PEGADAIAN</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                alt="Logo PT PEGADAIAN">
        </div>
        <h3 class="service-title">PT PEGADAIAN</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                alt="Logo PT PEGADAIAN">
        </div>
        <h3 class="service-title">PT PEGADAIAN</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                alt="Logo PT PEGADAIAN">
        </div>
        <h3 class="service-title">PT PEGADAIAN</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                alt="Logo PT PEGADAIAN">
        </div>
        <h3 class="service-title">PT PEGADAIAN</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                alt="Logo PT PEGADAIAN">
        </div>
        <h3 class="service-title">PT PEGADAIAN</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                alt="Logo PT PEGADAIAN">
        </div>
        <h3 class="service-title">PT PEGADAIAN</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                alt="Logo PT PEGADAIAN">
        </div>
        <h3 class="service-title">PT PEGADAIAN</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                alt="Logo PT PEGADAIAN">
        </div>
        <h3 class="service-title">PT PEGADAIAN</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                alt="Logo PT PEGADAIAN">
        </div>
        <h3 class="service-title">PT PEGADAIAN</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                alt="Logo PT PEGADAIAN">
        </div>
        <h3 class="service-title">PT PEGADAIAN</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                alt="Logo PT PEGADAIAN">
        </div>
        <h3 class="service-title">PT PEGADAIAN</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                alt="Logo PT PEGADAIAN">
        </div>
        <h3 class="service-title">PT PEGADAIAN</h3>
    </a>
    <a href="https://mpp.cimahikota.go.id/layanan/1" class="box">
        <div class="logo-container">
            <img class="logo" src="https://mpp.cimahikota.go.id/layanan/1666239898_2560px-Pegadaian_logo_(2013).svg.png"
                alt="Logo PT PEGADAIAN">
        </div>
        <h3 class="service-title">PT PEGADAIAN</h3>
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

<div class="container">
    <p class="text-center font-semibold text-sm text-gray-500">© DPMPTSP Kota Cimahi X ITENAS</p>
</div>

@endsection