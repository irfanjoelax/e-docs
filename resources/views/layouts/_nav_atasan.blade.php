<li class="menu-header">Dashboard</li>
<li class="{{ ($active == 'home') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('/atasan/home', []) }}">
        <i class="fas fa-fire"></i> <span>Home Page</span>
    </a>
</li>
<li class="menu-header">Transaksi Surat</li>
<li class="{{ ($active == 'surat-masuk') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('/atasan/surat-masuk', []) }}">
        <i class="fas fa-envelope"></i> <span>Surat Masuk</span>
    </a>
</li>
<li class="{{ ($active == 'surat-keluar') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('/atasan/surat-keluar', []) }}">
        <i class="fas fa-envelope-open"></i> <span>Surat Keluar</span>
    </a>
</li>
<li class="menu-header">Report</li>
<li class="{{ ($active == 'laporan-surat-masuk') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('/atasan/laporan/surat-masuk', []) }}">
        <i class="fas fa-envelope"></i> <span>Laporan Surat Masuk</span>
    </a>
</li>
<li class="{{ ($active == 'laporan-surat-keluar') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('/atasan/laporan/surat-keluar', []) }}">
        <i class="fas fa-envelope-open"></i> <span>Laporan Surat Keluar</span>
    </a>
</li>
<li class="{{ ($active == 'laporan-disposisi') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('/atasan/laporan/disposisi', []) }}">
        <i class="fas fa-file-alt"></i> <span>Laporan Disposisi</span>
    </a>
</li>
<li class="{{ ($active == 'laporan-klasifikasi-surat') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('/atasan/laporan/klasifikasi-surat', []) }}">
        <i class="fas fa-layer-group"></i> <span>Rekapitulasi Klasifikasi Surat</span>
    </a>
</li>
<x-nav-item />