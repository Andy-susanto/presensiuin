<?php

namespace App\Policies;

use App\Models\User;
use App\Models\WaktuPresensi;

class WaktuPresensiPolicy
{
    public function viewAny(User $user)
    {
        return $user->can('view_any_waktu::presensi');
    }

    public function view(User $user, WaktuPresensi $waktuPresensi)
    {
        return $user->can('view_waktu::presensi');
    }

    public function create(User $user)
    {
        return $user->can('create_waktu::presensi');
    }

    public function update(User $user, WaktuPresensi $waktuPresensi)
    {
        return $user->can('update_waktu::presensi');
    }

    public function delete(User $user, WaktuPresensi $waktuPresensi)
    {
        return $user->can('delete_waktu::presensi');
    }

    public function deleteAny(User $user)
    {
        return $user->can('delete_any_waktu::presensi');
    }

    public function forceDelete(User $user, WaktuPresensi $waktuPresensi)
    {
        return $user->can('{{ ForceDelete }}');
    }

    public function forceDeleteAny(User $user)
    {
        return $user->can('{{ ForceDeleteAny }}');
    }

    public function restore(User $user, WaktuPresensi $waktuPresensi)
    {
        return $user->can('{{ Restore }}');
    }
    public function restoreAny(User $user)
    {
        return $user->can('{{ RestoreAny }}');
    }
    public function replicate(User $user, WaktuPresensi $waktuPresensi)
    {
        return $user->can('{{ Replicate }}');
    }
    public function reorder(User $user)
    {
        return $user->can('{{ Reorder }}');
    }
}
