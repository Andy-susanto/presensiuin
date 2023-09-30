<div>
    <img src="{{auth()->user()->pegawai->biodata->file_foto ?? asset('image/logouinjambi.svg')}}" alt="" width="50" class="inline-block rounded p-2 bg-slate-400">
    {{auth()->user()->pegawai?->nama_lengkap ?? 'ADMIN'}} - PRESENSI PEGAWAI
</div>
