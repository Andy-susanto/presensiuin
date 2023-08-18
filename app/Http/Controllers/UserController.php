<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Pegawai $pegawai)
    {
        $user = User::get()->count();
        $year = now()->format('y');
        $formatUrut =$year.str_pad($user+1,4,"0",STR_PAD_LEFT);
        try {
            User::updateOrCreate([
                'pegawai_id' => $pegawai->id
            ],
            [
                'name' => $formatUrut,
                'password' => bcrypt($formatUrut)
            ]);
            $data = User::where('pegawai_id',$pegawai->id)->first();
            $data->assignRole('user');
            return redirect(route('filament.resources.users.index'));
        } catch (\Throwable $th) {
            return back();
        }
    }

    public function bulkCreate(array $data)
    {

    }
}
