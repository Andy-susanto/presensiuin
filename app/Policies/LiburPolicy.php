<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Libur;

class LiburPolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_libur');
    }

    public function view(User $user, Libur $libur)
    {
        return $user->can('view_libur');
    }

    public function create(User $user)
    {
        return $user->can('create_libur');
    }

    public function update(User $user, Libur $libur)
    {
        return $user->can('update_libur');
    }

    public function delete(User $user, Libur $libur)
    {
        return $user->can('delete_libur');
    }

    public function deleteAny(User $user)
    {
        return $user->can('delete_any_libur');
    }

    public function forceDelete(User $user, Libur $libur)
    {
        return $user->can('{{ ForceDelete }}');
    }

    public function forceDeleteAny(User $user)
    {
        return $user->can('{{ ForceDeleteAny }}');
    }

    public function restore(User $user, Libur $libur)
    {
        return $user->can('{{ Restore }}');
    }
    public function restoreAny(User $user)
    {
        return $user->can('{{ RestoreAny }}');
    }
    public function replicate(User $user, Libur $libur)
    {
        return $user->can('{{ Replicate }}');
    }
    public function reorder(User $user)
    {
        return $user->can('{{ Reorder }}');
    }
}
