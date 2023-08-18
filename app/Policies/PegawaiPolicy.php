<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Pegawai;

class PegawaiPolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_pegawai');
    }

    public function view(User $user, Pegawai $pegawai)
    {
        return $user->can('view_pegawai');
    }

    public function create(User $user)
    {
        return $user->can('create_pegawai');
    }

    public function update(User $user, Pegawai $pegawai)
    {
        return $user->can('update_pegawai');
    }

    public function delete(User $user, Pegawai $pegawai)
    {
        return $user->can('delete_pegawai');
    }

    public function deleteAny(User $user)
    {
        return $user->can('delete_any_pegawai');
    }

    public function forceDelete(User $user, Pegawai $pegawai)
    {
        return $user->can('{{ ForceDelete }}');
    }

    public function forceDeleteAny(User $user)
    {
        return $user->can('{{ ForceDeleteAny }}');
    }

    public function restore(User $user, Pegawai $pegawai)
    {
        return $user->can('{{ Restore }}');
    }
    public function restoreAny(User $user)
    {
        return $user->can('{{ RestoreAny }}');
    }
    public function replicate(User $user, Pegawai $pegawai)
    {
        return $user->can('{{ Replicate }}');
    }
    public function reorder(User $user)
    {
        return $user->can('{{ Reorder }}');
    }
}
