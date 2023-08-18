<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Jabfung;

class JabatanFungsionalPolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_jabfung');
    }

    public function view(User $user, Jabfung $jabatanFungsional)
    {
        return $user->can('view_jabfung');
    }

    public function create(User $user)
    {
        return $user->can('create_jabfung');
    }

    public function update(User $user, Jabfung $jabatanFungsional)
    {
        return $user->can('update_jabfung');
    }

    public function delete(User $user, Jabfung $jabatanFungsional)
    {
        return $user->can('delete_jabfung');
    }

    public function deleteAny(User $user)
    {
        return $user->can('delete_any_jabfung');
    }

    public function forceDelete(User $user, Jabfung $jabatanFungsional)
    {
        return $user->can('{{ ForceDelete }}');
    }

    public function forceDeleteAny(User $user)
    {
        return $user->can('{{ ForceDeleteAny }}');
    }

    public function restore(User $user, Jabfung $jabatanFungsional)
    {
        return $user->can('{{ Restore }}');
    }
    public function restoreAny(User $user)
    {
        return $user->can('{{ RestoreAny }}');
    }
    public function replicate(User $user, Jabfung $jabatanFungsional)
    {
        return $user->can('{{ Replicate }}');
    }
    public function reorder(User $user)
    {
        return $user->can('{{ Reorder }}');
    }
}
