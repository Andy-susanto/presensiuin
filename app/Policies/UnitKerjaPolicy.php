<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UnitKerja;

class UnitKerjaPolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_unit::kerja');
    }

    public function view(User $user, UnitKerja $unitKerja)
    {
        return $user->can('view_unit::kerja');
    }

    public function create(User $user)
    {
        return $user->can('create_unit::kerja');
    }

    public function update(User $user, UnitKerja $unitKerja)
    {
        return $user->can('update_unit::kerja');
    }

    public function delete(User $user, UnitKerja $unitKerja)
    {
        return $user->can('delete_unit::kerja');
    }

    public function deleteAny(User $user)
    {
        return $user->can('delete_any_unit::kerja');
    }

    public function forceDelete(User $user, UnitKerja $unitKerja)
    {
        return $user->can('{{ ForceDelete }}');
    }

    public function forceDeleteAny(User $user)
    {
        return $user->can('{{ ForceDeleteAny }}');
    }

    public function restore(User $user, UnitKerja $unitKerja)
    {
        return $user->can('{{ Restore }}');
    }
    public function restoreAny(User $user)
    {
        return $user->can('{{ RestoreAny }}');
    }
    public function replicate(User $user, UnitKerja $unitKerja)
    {
        return $user->can('{{ Replicate }}');
    }
    public function reorder(User $user)
    {
        return $user->can('{{ Reorder }}');
    }
}
