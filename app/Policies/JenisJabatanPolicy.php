<?php

namespace App\Policies;

use App\Models\User;
use App\Models\JenisJabatan;

class JenisJabatanPolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_jenis::jabatan');
    }

    public function view(User $user, JenisJabatan $jenisJabatan)
    {
        return $user->can('view_jenis::jabatan');
    }

    public function create(User $user)
    {
        return $user->can('create_jenis::jabatan');
    }

    public function update(User $user, JenisJabatan $jenisJabatan)
    {
        return $user->can('update_jenis::jabatan');
    }

    public function delete(User $user, JenisJabatan $jenisJabatan)
    {
        return $user->can('delete_jenis::jabatan');
    }

    public function deleteAny(User $user)
    {
        return $user->can('delete_any_jenis::jabatan');
    }

    public function forceDelete(User $user, JenisJabatan $jenisJabatan)
    {
        return $user->can('{{ ForceDelete }}');
    }

    public function forceDeleteAny(User $user)
    {
        return $user->can('{{ ForceDeleteAny }}');
    }

    public function restore(User $user, JenisJabatan $jenisJabatan)
    {
        return $user->can('{{ Restore }}');
    }
    public function restoreAny(User $user)
    {
        return $user->can('{{ RestoreAny }}');
    }
    public function replicate(User $user, JenisJabatan $jenisJabatan)
    {
        return $user->can('{{ Replicate }}');
    }
    public function reorder(User $user)
    {
        return $user->can('{{ Reorder }}');
    }
}
