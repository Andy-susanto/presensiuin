<?php

namespace App\Policies;

use App\Models\User;
use App\Models\LevelJabatanKemenag;

class LevelJabatanKemenagPolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_level::jabatan::kemenag');
    }

    public function view(User $user, LevelJabatanKemenag $levelJabatanKemenag)
    {
        return $user->can('view_level::jabatan::kemenag');
    }

    public function create(User $user)
    {
        return $user->can('create_level::jabatan::kemenag');
    }

    public function update(User $user, LevelJabatanKemenag $levelJabatanKemenag)
    {
        return $user->can('update_level::jabatan::kemenag');
    }

    public function delete(User $user, LevelJabatanKemenag $levelJabatanKemenag)
    {
        return $user->can('delete_level::jabatan::kemenag');
    }

    public function deleteAny(User $user)
    {
        return $user->can('delete_any_level::jabatan::kemenag');
    }

    public function forceDelete(User $user, LevelJabatanKemenag $levelJabatanKemenag)
    {
        return $user->can('{{ ForceDelete }}');
    }

    public function forceDeleteAny(User $user)
    {
        return $user->can('{{ ForceDeleteAny }}');
    }

    public function restore(User $user, LevelJabatanKemenag $levelJabatanKemenag)
    {
        return $user->can('{{ Restore }}');
    }
    public function restoreAny(User $user)
    {
        return $user->can('{{ RestoreAny }}');
    }
    public function replicate(User $user, LevelJabatanKemenag $levelJabatanKemenag)
    {
        return $user->can('{{ Replicate }}');
    }
    public function reorder(User $user)
    {
        return $user->can('{{ Reorder }}');
    }
}
