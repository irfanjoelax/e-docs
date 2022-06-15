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