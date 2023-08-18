<?php

namespace App\Policies;

use App\Models\User;
use App\Models\SatkerKemenag;

class SatkerKemenagPolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_satker::kemenag');
    }

    public function view(User $user, SatkerKemenag $satkerKemenag)
    {
        return $user->can('view_satker::kemenag');
    }

    public function create(User $user)
    {
        return $user->can('create_satker::kemenag');
    }

    public function update(User $user, SatkerKemenag $satkerKemenag)
    {
        return $user->can('update_satker::kemenag');
    }

    public function delete(User $user, SatkerKemenag $satkerKemenag)
    {
        return $user->can('delete_satker::kemenag');
    }

    public function deleteAny(User $user)
    {
        return $user->can('delete_any_satker::kemenag');
    }

    public function forceDelete(User $user, SatkerKemenag $satkerKemenag)
    {
        return $user->can('{{ ForceDelete }}');
    }

    public function forceDeleteAny(User $user)
    {
        return $user->can('{{ ForceDeleteAny }}');
    }

    public function restore(User $user, SatkerKemenag $satkerKemenag)
    {
        return $user->can('{{ Restore }}');
    }
    public function restoreAny(User $user)
    {
        return $user->can('{{ RestoreAny }}');
    }
    public function replicate(User $user, SatkerKemenag $satkerKemenag)
    {
        return $user->can('{{ Replicate }}');
    }
    public function reorder(User $user)
    {
        return $user->can('{{ Reorder }}');
    }
}
