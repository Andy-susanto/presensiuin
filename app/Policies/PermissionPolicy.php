<?php

namespace App\Policies;

use App\Models\User;
use Spatie\Permission\Models\Permission;

class PermissionPolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_permission');
    }

    public function view(User $user, Permission $permission)
    {
        return $user->can('view_permission');
    }

    public function create(User $user)
    {
        return $user->can('create_permission');
    }

    public function update(User $user, Permission $permission)
    {
        return $user->can('update_permission');
    }

    public function delete(User $user, Permission $permission)
    {
        return $user->can('delete_permission');
    }

    public function deleteAny(User $user)
    {
        return $user->can('delete_any_permission');
    }

    public function forceDelete(User $user, Permission $permission)
    {
        return $user->can('{{ ForceDelete }}');
    }

    public function forceDeleteAny(User $user)
    {
        return $user->can('{{ ForceDeleteAny }}');
    }

    public function restore(User $user, Permission $permission)
    {
        return $user->can('{{ Restore }}');
    }
    public function restoreAny(User $user)
    {
        return $user->can('{{ RestoreAny }}');
    }
    public function replicate(User $user, Permission $permission)
    {
        return $user->can('{{ Replicate }}');
    }
    public function reorder(User $user)
    {
        return $user->can('{{ Reorder }}');
    }
}
