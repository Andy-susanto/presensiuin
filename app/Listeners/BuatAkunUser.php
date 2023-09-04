<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\BuatAkun;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class BuatAkunUser
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(BuatAkun $event): void
    {
        $user = User::get()->count();
        $year = now()->format('y');
        $formatUrut = $year . str_pad($user + 1, 4, "0", STR_PAD_LEFT);
        $check = User::where('name', $formatUrut)->first();
        if ($check) {
            $formatUrut = $year . str_pad($user + 2, 4, "0", STR_PAD_LEFT);
        }
        try {
            User::updateOrCreate(
                [
                    'pegawai_id' => $event->pegawai->id
                ],
                [
                    'name' => $formatUrut,
                    'password' => bcrypt($formatUrut)
                ]
            );
            $data = User::where('pegawai_id', $event->pegawai->id)->first();
            $data->syncRoles('User');
        } catch (\Throwable $th) {
            //
        }
    }
}
