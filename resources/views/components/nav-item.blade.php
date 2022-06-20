@foreach ($klasifikasis as $item)
<li class="">
    <a class="nav-link" href="{{ url('atasan/laporan/klasifikasi/'.$item->id) }}">
        <i class="fas fa-bookmark"></i> <span>Laporan {{ $item->nama }}</span>
    </a>
</li>
@endforeach