<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pegawai;
use App\Models\Presensi;
use App\Models\WaktuPresensi;
use IbrahimBedir\FilamentDynamicSettingsPage\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public $message;
    public $waktuPresensi;
    public $bisaPresensi;
    public function __construct()
    {
        $this->bisaPresensi = [];
        $this->waktuPresensi = null;
        parent::__construct();
    }

    public function index()
    {
        $this->data['pegawais'] = Pegawai::idWithNama();
        $pegawai = Pegawai::with('biodata')->whereRelation('biodata', 'file_foto', 'like', '%/pas-foto-%')->get();
        $dataLabel = [];
        foreach ($pegawai as $key => $nama) {
            if ($nama?->biodata?->file_foto != null) {
                $dataLabel[] = [
                    'nama' => $nama->nama_pegawai,
                    'nama_lengkap' => $nama->nama_lengkap,
                    'foto' => $nama->biodata->file_foto
                ];
            }
        }
        $this->data['label'] = $dataLabel;
        return view('home', $this->data);
    }

    public function getdata(Request $request)
    {
        $pegawai = Pegawai::with('biodata')->where('id', $request->id)->get();
        $dataLabel = [];
        foreach ($pegawai as $key => $nama) {
            if ($nama?->biodata?->file_foto != null) {
                $dataLabel[] = [
                    'nama' => $nama->nama_pegawai,
                    'nama_lengkap' => $nama->nama_lengkap,
                    'foto' => $nama->biodata->file_foto
                ];
            }
        }
        $this->data['label'] = $dataLabel;
    }

    public function checkPegawaiId($data)
    {
        if (!$data) {
            $this->message = [
                'message' => 'Silahkan Pilih Pegawai Terlebih Dahulu !',
                'status' => 'error'
            ];
            $this->bisaPresensi[] = false;
            return false;
        }

        $this->bisaPresensi[] = true;
        return true;
    }

    public function checkPermissionGps($data)
    {
        $enableGps = Setting::where('key', 'presensi.enable.ip')->first()->value;
        if ($enableGps == 'ya') {
            if (!$data) {
                $this->message = [
                    'message' => 'Akses GPS harus di aktifkan !',
                    'status' => 'error'
                ];
                $this->bisaPresensi[] = false;
                return false;
            }
        }
        $this->bisaPresensi[] = true;
        return true;
    }

    public function checkPermissionCamera($data)
    {
        if (!$data) {
            $this->message = [
                'message' => 'Akses Camera harus di aktifkan !',
                'status' => 'error'
            ];
            $this->bisaPresensi[] = false;
            return false;
        }

        $this->bisaPresensi[] = true;
        return true;
    }

    public function alreadyPresence($data)
    {
        if ($data) {
            $this->message = [
                'message' => 'Sudah Melakukan Presensi',
                'status' => 'error'
            ];
            $this->bisaPresensi[] = false;
            return false;
        }
        $this->bisaPresensi[] = true;
        return true;
    }

    public function checkTime()
    {
        $hari = strtolower(Carbon::now()->locale('id')->dayName);
        $now = Carbon::now()->toTimeString();

        $cekWaktu = WaktuPresensi::where('nama', 'waktu trial')->where('hari', $hari)->where('jam_mulai', '<=', $now)->where('jam_selesai', '>=', $now)->first();

        if ($cekWaktu) {
            $this->waktuPresensi = $cekWaktu->id;
            $this->bisaPresensi[] = true;
            return true;
        }

        $this->message = [
            'message' => 'diluar Jam Presensi',
            'status' => 'error'
        ];
        $this->bisaPresensi[] = false;
        return false;
    }

    public function checkIP($data)
    {
        $ip = setting('presensi.ip');
        $enableIp = Setting::where('key', 'presensi.enable.ip')->first()->value;
        if ($enableIp == 'ya') {
            if ($data != $ip) {
                $this->message = [
                    'message' => 'Presensi hanya bisa dilakukan dengan wifi kampus',
                    'status' => 'error'
                ];
                $this->bisaPresensi[] = false;
                return false;
            }
        }
        $this->bisaPresensi[] = true;
        return true;
    }

    public function presensi(Request $request)
    {
        $pegawai_id = $request->pegawai_id ? true : false;
        $foto = $request->foto_presensi ? true : false;
        $lat = $request->lat ? true : false;
        $date = Carbon::now();

        $pegawai = Pegawai::where('id', $request?->pegawai_id)->first();

        // Default Message
        $this->message = [
            'message' => $pegawai?->nama_lengkap . ' Berhasil Melakukan Presensi pada waktu ' . $date,
            'status' => 'success',
        ];
        $this->checkPegawaiId($pegawai_id);
        $this->checkPermissionGps($lat);
        $this->checkPermissionCamera($foto);
        $this->checkTime();
        $this->checkIP($request->ip());

        // Check Jika Sudah Presensi
        $alReadyPresensi = Presensi::where('pegawai_id', $pegawai?->id)->where('waktu_presensi_id', $this->waktuPresensi)->first() ? true : false;
        $this->alreadyPresence($alReadyPresensi);

        if (!in_array(false, $this->bisaPresensi)) {
            $img = $request->foto_presensi;
            $folderPath = "uploads/";
            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = uniqid() . '.png';
            $file = $folderPath . $fileName;
            $foto = Storage::disk('public')->put($file, $image_base64);

            $mytime = Carbon::now();
            DB::table('presensi')->insert([
                'id' => Str::orderedUuid()->toString(),
                'waktu_presensi_id' => $this->waktuPresensi,
                'pegawai_id'    => $request->pegawai_id,
                'waktu'     => $mytime,
                'tanggal'     => $mytime,
                'ip' => $request->ip(),
                'foto' => $file,
                'lat' => $request->lat,
                'long' => $request->long,
            ]);
        }

        return response()->json($this->message);
    }
}
