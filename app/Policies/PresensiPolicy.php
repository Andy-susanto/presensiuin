<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Presensi;

class PresensiPolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_presensi');
    }

    public function view(User $user, Presensi $presensi)
    {
        return $user->can('view_presensi');
    }

    public function create(User $user)
    {
        return $user->can('create_presensi');
    }

    public function update(User $user, Presensi $presensi)
    {
        return $user->can('update_presensi');
    }

    public function delete(User $user, Presensi $presensi)
    {
        return $user->can('delete_presensi');
    }

    public function deleteAny(User $user)
    {
        return $user->can('delete_any_presensi');
    }

    public function forceDelete(User $user, Presensi $presensi)
    {
        return $user->can('{{ ForceDelete }}');
    }

    public function forceDeleteAny(User $user)
    {
        return $user->can('{{ ForceDeleteAny }}');
    }

    public function restore(User $user, Presensi $presensi)
    {
        return $user->can('{{ Restore }}');
    }
    public function restoreAny(User $user)
    {
        return $user->can('{{ RestoreAny }}');
    }
    public function replicate(User $user, Presensi $presensi)
    {
        return $user->can('{{ Replicate }}');
    }
    public function reorder(User $user)
    {
        return $user->can('{{ Reorder }}');
    }
}
