<?php

namespace App\Policies;

use App\Models\User;
use App\Models\StatusKeaktifanPegawai;

class StatusKeaktifanPegawaiPolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_status::keatifan::pegawai');
    }

    public function view(User $user, StatusKeaktifanPegawai $StatusKeaktifanPegawai)
    {
        return $user->can('view_status::keatifan::pegawai');
    }

    public function create(User $user)
    {
        return $user->can('create_status::keatifan::pegawai');
    }

    public function update(User $user, StatusKeaktifanPegawai $StatusKeaktifanPegawai)
    {
        return $user->can('update_status::keatifan::pegawai');
    }

    public function delete(User $user, StatusKeaktifanPegawai $StatusKeaktifanPegawai)
    {
        return $user->can('delete_status::keatifan::pegawai');
    }

    public function deleteAny(User $user)
    {
        return $user->can('delete_any_status::keatifan::pegawai');
    }

    public function forceDelete(User $user, StatusKeaktifanPegawai $StatusKeaktifanPegawai)
    {
        return $user->can('{{ ForceDelete }}');
    }

    public function forceDeleteAny(User $user)
    {
        return $user->can('{{ ForceDeleteAny }}');
    }

    public function restore(User $user, StatusKeaktifanPegawai $StatusKeaktifanPegawai)
    {
        return $user->can('{{ Restore }}');
    }
    public function restoreAny(User $user)
    {
        return $user->can('{{ RestoreAny }}');
    }
    public function replicate(User $user, StatusKeaktifanPegawai $StatusKeaktifanPegawai)
    {
        return $user->can('{{ Replicate }}');
    }
    public function reorder(User $user)
    {
        return $user->can('{{ Reorder }}');
    }
}
