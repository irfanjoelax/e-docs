<li class="menu-header">Dashboard</li>
<li class="{{ ($active == 'home') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('/petugas/home', []) }}">
        <i class="fas fa-fire"></i> <span>Home Page</span>
    </a>
</li>
<li class="menu-header">Master Data</li>
<li class="{{ ($active == 'klasifikasi') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('/petugas/klasifikasi', []) }}">
        <i class="fas fa-layer-group"></i> <span>Klasifikasi Surat</span>
    </a>
</li>
<li class="menu-header">Transaksi Surat</li>
<li class="{{ ($active == 'surat-masuk') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('/petugas/surat-masuk', []) }}">
        <i class="fas fa-envelope"></i> <span>Surat Masuk</span>
    </a>
</li>
<li class="{{ ($active == 'surat-keluar') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('/petugas/surat-keluar', []) }}">
        <i class="fas fa-envelope-open"></i> <span>Surat Keluar</span>
    </a>
</li>