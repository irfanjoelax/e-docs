<li class="dropdown dropdown-list-toggle">
    <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg {{ ($cekBaca) ? 'beep' : '' }}">
        <i class="far fa-bell"></i>
    </a>
    <div class="dropdown-menu dropdown-list dropdown-menu-right">
        <div class="dropdown-header">Notifications</div>
        <div class="{{ ($cekBaca) ? 'dropdown-list-content dropdown-list-icons' : '' }}">
            @foreach ($suratMasuks as $suratMasuk)
            <a href="{{ url('/atasan/surat-masuk/'.$suratMasuk->id, []) }}" class="dropdown-item">
                <div class="dropdown-item-icon bg-info text-white">
                    <i class="fas fa-bell"></i>
                </div>
                <div class="dropdown-item-desc">
                    {{ $suratMasuk->perihal }}
                    <div class="time">{{ $suratMasuk->tgl_masuk }}</div>
                </div>
            </a>
            @endforeach
        </div>
        <div class="dropdown-footer text-center">
            <a href="{{ url('/atasan/surat-masuk', []) }}">View All <i class="fas fa-chevron-right"></i></a>
        </div>
    </div>
</li>