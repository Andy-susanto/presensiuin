<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_user');
    }

    public function view(User $user, User $User)
    {
        return $user->can('view_user');
    }

    public function create(User $user)
    {
        return $user->can('create_user');
    }

    public function update(User $user, User $User)
    {
        return $user->can('update_user');
    }

    public function delete(User $user, User $User)
    {
        return $user->can('delete_user');
    }

    public function deleteAny(User $user)
    {
        return $user->can('delete_any_user');
    }

    public function forceDelete(User $user, User $User)
    {
        return $user->can('{{ ForceDelete }}');
    }

    public function forceDeleteAny(User $user)
    {
        return $user->can('{{ ForceDeleteAny }}');
    }

    public function restore(User $user, User $User)
    {
        return $user->can('{{ Restore }}');
    }
    public function restoreAny(User $user)
    {
        return $user->can('{{ RestoreAny }}');
    }
    public function replicate(User $user, User $User)
    {
        return $user->can('{{ Replicate }}');
    }
    public function reorder(User $user)
    {
        return $user->can('{{ Reorder }}');
    }
}
