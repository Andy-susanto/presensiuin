<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginWithGoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();

            // Block list domain
            // if (explode("@", $user->email)[1] !== 'uinjambi.ac.id') {
            //     return redirect('admin')->with('status', 'Anda Tidak di perbolehkan masuk');
            // }
            if ($finduser) {
                Auth::login($finduser);
                return redirect()->intended('admin');
            } else {
                $pegawai = Pegawai::where('nama_pegawai', $user->name)->first();
                $newUser = User::create([
                    'pegawai_id' => $pegawai->id,
                    'name'       => $user->name,
                    'email'      => $user->email,
                    'google_id'  => $user->id,
                    'password'   => encrypt($user->name)
                ]);
                Auth::login($newUser);
                return redirect()->intended('admin');
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
}
