<?php

namespace App\Policies;

use App\Models\User;
use App\Models\JabatanKemenag;

class JabatanKemengaPolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_jabatan::kemenag');
    }

    public function view(User $user, JabatanKemenag $jabatanKemenag)
    {
        return $user->can('view_jabatan::kemenag');
    }

    public function create(User $user)
    {
        return $user->can('create_jabatan::kemenag');
    }

    public function update(User $user, JabatanKemenag $jabatanKemenag)
    {
        return $user->can('update_jabatan::kemenag');
    }

    public function delete(User $user, JabatanKemenag $jabatanKemenag)
    {
        return $user->can('delete_jabatan::kemenag');
    }

    public function deleteAny(User $user)
    {
        return $user->can('delete_any_jabatan::kemenag');
    }

    public function forceDelete(User $user, JabatanKemenag $jabatanKemenag)
    {
        return $user->can('{{ ForceDelete }}');
    }

    public function forceDeleteAny(User $user)
    {
        return $user->can('{{ ForceDeleteAny }}');
    }

    public function restore(User $user, JabatanKemenag $jabatanKemenag)
    {
        return $user->can('{{ Restore }}');
    }
    public function restoreAny(User $user)
    {
        return $user->can('{{ RestoreAny }}');
    }
    public function replicate(User $user, JabatanKemenag $jabatanKemenag)
    {
        return $user->can('{{ Replicate }}');
    }
    public function reorder(User $user)
    {
        return $user->can('{{ Reorder }}');
    }
}
