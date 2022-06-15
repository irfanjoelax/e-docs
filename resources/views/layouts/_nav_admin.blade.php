<li class="menu-header">Dashboard</li>
<li class="{{ ($active == 'home') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('/admin/home', []) }}">
        <i class="fas fa-fire"></i> <span>Home Page</span>
    </a>
</li>
<li class="menu-header">Master Data</li>
<li class="{{ ($active == 'jabatan') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('/admin/jabatan', []) }}">
        <i class="fas fa-sitemap"></i> <span>Jabatan</span>
    </a>
</li>
<li class="{{ ($active == 'golongan') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('/admin/golongan', []) }}">
        <i class="fas fa-user-tie"></i> <span>Golongan</span>
    </a>
</li>
<li class="{{ ($active == 'pegawai') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('/admin/pegawai', []) }}">
        <i class="fas fa-users"></i> <span>Semua Pegawai</span>
    </a>
</li>
<li class="{{ ($active == 'user') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('/admin/user', []) }}">
        <i class="fas fa-users-cog"></i> <span>User / Pengguna</span>
    </a>
</li>
<li class="menu-header">Management</li>
<li class="{{ ($active == 'instansi') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('/admin/instansi', []) }}">
        <i class="fas fa-building"></i> <span>Profile Instansi</span>
    </a>
</li>