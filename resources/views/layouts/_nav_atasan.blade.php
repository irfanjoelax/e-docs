<li class="menu-header">Dashboard</li>
<li class="{{ ($active == 'home') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('/atasan/home', []) }}">
        <i class="fas fa-fire"></i> <span>Home Page</span>
    </a>
</li>
<li class="menu-header">Master Data</li>
<li class="{{ ($active == 'klasifikasi') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('/atasan/klasifikasi', []) }}">
        <i class="fas fa-layer-group"></i> <span>Klasifikasi Surat</span>
    </a>
</li>
