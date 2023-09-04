<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    public function getPegawai()
    {
        $pegawai = Pegawai::with('biodata')->latest()->get();
        $data = [];
        foreach ($pegawai as $key => $nama) {
            $data[] = [
                'id' => $nama->id,
                'nama' => $nama->nama_lengkap
            ];
        }
        return response()->json($data);
    }
}
