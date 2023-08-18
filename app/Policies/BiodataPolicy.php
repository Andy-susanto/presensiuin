<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Biodata;

class BiodataPolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_biodata');
    }

    public function view(User $user, Biodata $Biodata)
    {
        return $user->can('view_biodata');
    }

    public function create(User $user)
    {
        return $user->can('create_biodata');
    }

    public function update(User $user, Biodata $Biodata)
    {
        return $user->can('update_biodata');
    }

    public function delete(User $user, Biodata $Biodata)
    {
        return $user->can('delete_biodata');
    }

    public function deleteAny(User $user)
    {
        return $user->can('delete_any_biodata');
    }

    public function forceDelete(User $user, Biodata $Biodata)
    {
        return $user->can('{{ ForceDelete }}');
    }

    public function forceDeleteAny(User $user)
    {
        return $user->can('{{ ForceDeleteAny }}');
    }

    public function restore(User $user, Biodata $Biodata)
    {
        return $user->can('{{ Restore }}');
    }
    public function restoreAny(User $user)
    {
        return $user->can('{{ RestoreAny }}');
    }
    public function replicate(User $user, Biodata $Biodata)
    {
        return $user->can('{{ Replicate }}');
    }
    public function reorder(User $user)
    {
        return $user->can('{{ Reorder }}');
    }
}
