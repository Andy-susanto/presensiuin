<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PangkatKemenag;

class PangkatKemenagPolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_pangkat::kemenag');
    }

    public function view(User $user, PangkatKemenag $pangkatKemenag)
    {
        return $user->can('view_pangkat::kemenag');
    }

    public function create(User $user)
    {
        return $user->can('create_pangkat::kemenag');
    }

    public function update(User $user, PangkatKemenag $pangkatKemenag)
    {
        return $user->can('update_pangkat::kemenag');
    }

    public function delete(User $user, PangkatKemenag $pangkatKemenag)
    {
        return $user->can('delete_pangkat::kemenag');
    }

    public function deleteAny(User $user)
    {
        return $user->can('delete_any_pangkat::kemenag');
    }

    public function forceDelete(User $user, PangkatKemenag $pangkatKemenag)
    {
        return $user->can('{{ ForceDelete }}');
    }

    public function forceDeleteAny(User $user)
    {
        return $user->can('{{ ForceDeleteAny }}');
    }

    public function restore(User $user, PangkatKemenag $pangkatKemenag)
    {
        return $user->can('{{ Restore }}');
    }
    public function restoreAny(User $user)
    {
        return $user->can('{{ RestoreAny }}');
    }
    public function replicate(User $user, PangkatKemenag $pangkatKemenag)
    {
        return $user->can('{{ Replicate }}');
    }
    public function reorder(User $user)
    {
        return $user->can('{{ Reorder }}');
    }
}
