<div>
    @if ($getState() == setting('presensi.ip'))
        <span class="bg-success-500 text-white">Anda presensi di lingkugan kampus</span>
    @else
        <span class="bg-red-500 text-white">Anda presensi di luar likungan kampus</span>
    @endif
</div>
