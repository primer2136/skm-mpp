<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="dashboard">SURVEI KEPUASAN</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="dashboard">SKM</a>
        </div>
        <ul class="sidebar-menu">
            {{-- @if (Auth::guard('admin')->user()->status == 'admin') --}}
            {{-- Dashboard --}}
            <li class="menu-header">Dashboard</li>
            <li class="@yield('dashboard')"><a class="nav-link" href="/dashboard"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>

            {{-- Entry data --}}
            <li class="menu-header">Entry data</li>
            <li class="@yield('admin')"><a class="nav-link" href="/ds-admin"><i class="fas fa-user"></i> <span>Admin</span></a></li>
            <li class="@yield('masyarakat')"><a class="nav-link" href="/ds-masyarakat"><i class="fas fa-user"></i> <span>Masyarakat</span></a></li>

            {{-- @endif --}}

            {{-- Penilaian --}}
            <li class="menu-header">Penilaian</li>
            <li class="@yield('penilaian')"><a class="nav-link" href="/penilaian"><i class="fas fa-database"></i> <span>Entry Penilaian</span></a></li>
            {{-- <li class="@yield('tanggapan')"><a class="nav-link" href="/tanggapan"><i class="fas fa-database"></i> <span>Entry Tanggapan</span></a></li> --}}

            {{-- @if (Auth::guard('admin')->user()->status == 'admin') --}}
            {{-- Laporan --}}
            {{-- <li class="menu-header">Laporan</li>
            <li class="@yield('laporan')"><a class="nav-link" href="/laporan"><i class="fas fa-print"></i> <span>Rekap Laporan</span></a></li> --}}
            {{-- @endif --}}

        </ul>
    </aside>
</div>
