<?php

namespace App\Policies;

use App\Models\User;
use App\Models\StatusKerja;

class StatusKerjaPolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_status::kerja');
    }

    public function view(User $user, StatusKerja $statusKerja)
    {
        return $user->can('view_status::kerja');
    }

    public function create(User $user)
    {
        return $user->can('create_status::kerja');
    }

    public function update(User $user, StatusKerja $statusKerja)
    {
        return $user->can('update_status::kerja');
    }

    public function delete(User $user, StatusKerja $statusKerja)
    {
        return $user->can('delete_status::kerja');
    }

    public function deleteAny(User $user)
    {
        return $user->can('delete_any_status::kerja');
    }

    public function forceDelete(User $user, StatusKerja $statusKerja)
    {
        return $user->can('{{ ForceDelete }}');
    }

    public function forceDeleteAny(User $user)
    {
        return $user->can('{{ ForceDeleteAny }}');
    }

    public function restore(User $user, StatusKerja $statusKerja)
    {
        return $user->can('{{ Restore }}');
    }
    public function restoreAny(User $user)
    {
        return $user->can('{{ RestoreAny }}');
    }
    public function replicate(User $user, StatusKerja $statusKerja)
    {
        return $user->can('{{ Replicate }}');
    }
    public function reorder(User $user)
    {
        return $user->can('{{ Reorder }}');
    }
}
