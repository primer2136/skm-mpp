<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/dashboard">SURVEI KEPUASAN</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/dashboard">SKM</a>
        </div>
        <ul class="sidebar-menu">

            {{-- Dashboard --}}
            <li class="menu-header">Dashboard</li>
            <li class="@yield('dashboard')"><a class="nav-link" href="/dashboard"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>

            {{-- Entry data --}}
            <li class="menu-header">Entri data</li>
            <li class="@yield('admin')"><a class="nav-link" href="/ds-admin"><i class="fas fa-user"></i> <span>Admin</span></a></li>
            <li class="@yield('responden')"><a class="nav-link" href="/responden"><i class="fas fa-user"></i> <span>Responden</span></a></li>
            <li class="@yield('tenant')"><a class="nav-link" href="/tenant"><i class="fas fa-user"></i> <span>Tenant</span></a></li>
            <li class="@yield('pertanyaan')"><a class="nav-link" href="/pertanyaan"><i class="fas fa-user"></i> <span>Pertanyaan</span></a></li>
            <li class="@yield('publish')"><a class="nav-link" href="/publish"><i class="fas fa-user"></i> <span>Publish</span></a></li>

            {{-- @endif
            @if (Auth::guard('admin')->user()->role == 'super admin')
                <li class="@yield('admin')"><a class="nav-link" href="/ds-admin"><i class="fas fa-user"></i> <span>Admin</span></a></li>
                <li class="@yield('responden')"><a class="nav-link" href="/responden"><i class="fas fa-user"></i> <span>Responden</span></a></li>
                <li class="@yield('tenant')"><a class="nav-link" href="/tenant"><i class="fas fa-user"></i> <span>Tenant</span></a></li>
                <li class="@yield('pertanyaan')"><a class="nav-link" href="/pertanyaan"><i class="fas fa-user"></i> <span>Pertanyaan</span></a></li>
            @elseif (Auth::guard('admin')->user()->role == 'admin tenant 1')
                <li class="@yield('admin')"><a class="nav-link" href="/ds-admin"><i class="fas fa-user"></i> <span>Admin</span></a></li>
            @elseif (Auth::guard('admin')->user()->role == 'admin tenant 2')
                <li class="@yield('responden')"><a class="nav-link" href="/responden"><i class="fas fa-user"></i> <span>Responden</span></a></li>
            @endif --}}


            {{-- Penilaian --}}
            <li class="menu-header">Penilaian</li>
            <li class="@yield('penilaian')"><a class="nav-link" href="/penilaian"><i class="fas fa-database"></i> <span>Entri Penilaian</span></a></li>

            {{-- Laporan (komentar ini dihilangkan sesuai permintaan) --}}
            {{-- @if (Auth::guard('admin')->user()->status == 'admin') --}}
            {{-- <li class="menu-header">Laporan</li>
            <li class="@yield('laporan')"><a class="nav-link" href="/laporan"><i class="fas fa-print"></i> <span>Rekap Laporan</span></a></li> --}}
            {{-- @endif --}}
        </ul>
    </aside>
</div>