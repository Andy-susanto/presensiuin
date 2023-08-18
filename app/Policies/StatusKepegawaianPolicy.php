<?php

namespace App\Policies;

use App\Models\User;
use App\Models\StatusKepegawaian;

class StatusKepegawaianPolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_status::kepegawaian');
    }

    public function view(User $user, StatusKepegawaian $statusKepegawaian)
    {
        return $user->can('view_status::kepegawaian');
    }

    public function create(User $user)
    {
        return $user->can('create_status::kepegawaian');
    }

    public function update(User $user, StatusKepegawaian $statusKepegawaian)
    {
        return $user->can('update_status::kepegawaian');
    }

    public function delete(User $user, StatusKepegawaian $statusKepegawaian)
    {
        return $user->can('delete_status::kepegawaian');
    }

    public function deleteAny(User $user)
    {
        return $user->can('delete_any_status::kepegawaian');
    }

    public function forceDelete(User $user, StatusKepegawaian $statusKepegawaian)
    {
        return $user->can('{{ ForceDelete }}');
    }

    public function forceDeleteAny(User $user)
    {
        return $user->can('{{ ForceDeleteAny }}');
    }

    public function restore(User $user, StatusKepegawaian $statusKepegawaian)
    {
        return $user->can('{{ Restore }}');
    }
    public function restoreAny(User $user)
    {
        return $user->can('{{ RestoreAny }}');
    }
    public function replicate(User $user, StatusKepegawaian $statusKepegawaian)
    {
        return $user->can('{{ Replicate }}');
    }
    public function reorder(User $user)
    {
        return $user->can('{{ Reorder }}');
    }
}
