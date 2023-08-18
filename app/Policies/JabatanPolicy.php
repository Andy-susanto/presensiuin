<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Jabatan;

class JabatanPolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_jabatan');
    }

    public function view(User $user, Jabatan $jabatan)
    {
        return $user->can('view_jabatan');
    }

    public function create(User $user)
    {
        return $user->can('create_jabatan');
    }

    public function update(User $user, Jabatan $jabatan)
    {
        return $user->can('update_jabatan');
    }

    public function delete(User $user, Jabatan $jabatan)
    {
        return $user->can('delete_jabatan');
    }

    public function deleteAny(User $user)
    {
        return $user->can('delete_any_jabatan');
    }

    public function forceDelete(User $user, Jabatan $jabatan)
    {
        return $user->can('{{ ForceDelete }}');
    }

    public function forceDeleteAny(User $user)
    {
        return $user->can('{{ ForceDeleteAny }}');
    }

    public function restore(User $user, Jabatan $jabatan)
    {
        return $user->can('{{ Restore }}');
    }
    public function restoreAny(User $user)
    {
        return $user->can('{{ RestoreAny }}');
    }
    public function replicate(User $user, Jabatan $jabatan)
    {
        return $user->can('{{ Replicate }}');
    }
    public function reorder(User $user)
    {
        return $user->can('{{ Reorder }}');
    }
}
