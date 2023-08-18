<?php

namespace App\Policies;

use App\Models\User;
use App\Models\JenjangPendidikan;

class JenjangPendidikanPolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_jenjang::pendidikan');
    }

    public function view(User $user, JenjangPendidikan $jenjangPendidikan)
    {
        return $user->can('view_jenjang::pendidikan');
    }

    public function create(User $user)
    {
        return $user->can('create_jenjang::pendidikan');
    }

    public function update(User $user, JenjangPendidikan $jenjangPendidikan)
    {
        return $user->can('update_jenjang::pendidikan');
    }

    public function delete(User $user, JenjangPendidikan $jenjangPendidikan)
    {
        return $user->can('delete_jenjang::pendidikan');
    }

    public function deleteAny(User $user)
    {
        return $user->can('delete_any_jenjang::pendidikan');
    }

    public function forceDelete(User $user, JenjangPendidikan $jenjangPendidikan)
    {
        return $user->can('{{ ForceDelete }}');
    }

    public function forceDeleteAny(User $user)
    {
        return $user->can('{{ ForceDeleteAny }}');
    }

    public function restore(User $user, JenjangPendidikan $jenjangPendidikan)
    {
        return $user->can('{{ Restore }}');
    }
    public function restoreAny(User $user)
    {
        return $user->can('{{ RestoreAny }}');
    }
    public function replicate(User $user, JenjangPendidikan $jenjangPendidikan)
    {
        return $user->can('{{ Replicate }}');
    }
    public function reorder(User $user)
    {
        return $user->can('{{ Reorder }}');
    }
}
