<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PangkatGolongan;

class PangkatGolonganPolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_pangkat::golongan');
    }

    public function view(User $user, PangkatGolongan $pangkatGolongan)
    {
        return $user->can('view_pangkat::golongan');
    }

    public function create(User $user)
    {
        return $user->can('create_pangkat::golongan');
    }

    public function update(User $user, PangkatGolongan $pangkatGolongan)
    {
        return $user->can('update_pangkat::golongan');
    }

    public function delete(User $user, PangkatGolongan $pangkatGolongan)
    {
        return $user->can('delete_pangkat::golongan');
    }

    public function deleteAny(User $user)
    {
        return $user->can('delete_any_pangkat::golongan');
    }

    public function forceDelete(User $user, PangkatGolongan $pangkatGolongan)
    {
        return $user->can('{{ ForceDelete }}');
    }

    public function forceDeleteAny(User $user)
    {
        return $user->can('{{ ForceDeleteAny }}');
    }

    public function restore(User $user, PangkatGolongan $pangkatGolongan)
    {
        return $user->can('{{ Restore }}');
    }
    public function restoreAny(User $user)
    {
        return $user->can('{{ RestoreAny }}');
    }
    public function replicate(User $user, PangkatGolongan $pangkatGolongan)
    {
        return $user->can('{{ Replicate }}');
    }
    public function reorder(User $user)
    {
        return $user->can('{{ Reorder }}');
    }
}
