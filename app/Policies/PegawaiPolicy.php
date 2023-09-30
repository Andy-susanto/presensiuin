<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Pegawai;
use Illuminate\Auth\Access\HandlesAuthorization;

class PegawaiPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_pegawai');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pegawai  $pegawai
     * @return bool
     */
    public function view(User $user, Pegawai $pegawai): bool
    {
        return $user->can('view_pegawai');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create_pegawai');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pegawai  $pegawai
     * @return bool
     */
    public function update(User $user, Pegawai $pegawai): bool
    {
        return $user->can('update_pegawai');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pegawai  $pegawai
     * @return bool
     */
    public function delete(User $user, Pegawai $pegawai): bool
    {
        return $user->can('delete_pegawai');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_pegawai');
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pegawai  $pegawai
     * @return bool
     */
    public function forceDelete(User $user, Pegawai $pegawai): bool
    {
        return $user->can('force_delete_pegawai');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_pegawai');
    }

    /**
     * Determine whether the user can restore.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pegawai  $pegawai
     * @return bool
     */
    public function restore(User $user, Pegawai $pegawai): bool
    {
        return $user->can('restore_pegawai');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_pegawai');
    }

    /**
     * Determine whether the user can replicate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pegawai  $pegawai
     * @return bool
     */
    public function replicate(User $user, Pegawai $pegawai): bool
    {
        return $user->can('replicate_pegawai');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_pegawai');
    }

}
