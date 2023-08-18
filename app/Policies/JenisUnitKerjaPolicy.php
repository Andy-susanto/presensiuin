<?php

namespace App\Policies;

use App\Models\User;
use App\Models\JenisUnitKerja;

class JenisUnitKerjaPolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_jenis::unit::kerja');
    }

    public function view(User $user, JenisUnitKerja $jenisUnitKerja)
    {
        return $user->can('view_jenis::unit::kerja');
    }

    public function create(User $user)
    {
        return $user->can('create_jenis::unit::kerja');
    }

    public function update(User $user, JenisUnitKerja $jenisUnitKerja)
    {
        return $user->can('update_jenis::unit::kerja');
    }

    public function delete(User $user, JenisUnitKerja $jenisUnitKerja)
    {
        return $user->can('delete_jenis::unit::kerja');
    }

    public function deleteAny(User $user)
    {
        return $user->can('delete_any_jenis::unit::kerja');
    }

    public function forceDelete(User $user, JenisUnitKerja $jenisUnitKerja)
    {
        return $user->can('{{ ForceDelete }}');
    }

    public function forceDeleteAny(User $user)
    {
        return $user->can('{{ ForceDeleteAny }}');
    }

    public function restore(User $user, JenisUnitKerja $jenisUnitKerja)
    {
        return $user->can('{{ Restore }}');
    }
    public function restoreAny(User $user)
    {
        return $user->can('{{ RestoreAny }}');
    }
    public function replicate(User $user, JenisUnitKerja $jenisUnitKerja)
    {
        return $user->can('{{ Replicate }}');
    }
    public function reorder(User $user)
    {
        return $user->can('{{ Reorder }}');
    }
}
