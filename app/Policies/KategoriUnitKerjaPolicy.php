<?php

namespace App\Policies;

use App\Models\User;
use App\Models\KategoriUnitKerja;

class KategoriUnitKerjaPolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_kategori::unit::kerja');
    }

    public function view(User $user, KategoriUnitKerja $kategoriUnitKerja)
    {
        return $user->can('view_kategori::unit::kerja');
    }

    public function create(User $user)
    {
        return $user->can('create_kategori::unit::kerja');
    }

    public function update(User $user, KategoriUnitKerja $kategoriUnitKerja)
    {
        return $user->can('update_kategori::unit::kerja');
    }

    public function delete(User $user, KategoriUnitKerja $kategoriUnitKerja)
    {
        return $user->can('delete_kategori::unit::kerja');
    }

    public function deleteAny(User $user)
    {
        return $user->can('delete_any_kategori::unit::kerja');
    }

    public function forceDelete(User $user, KategoriUnitKerja $kategoriUnitKerja)
    {
        return $user->can('{{ ForceDelete }}');
    }

    public function forceDeleteAny(User $user)
    {
        return $user->can('{{ ForceDeleteAny }}');
    }

    public function restore(User $user, KategoriUnitKerja $kategoriUnitKerja)
    {
        return $user->can('{{ Restore }}');
    }
    public function restoreAny(User $user)
    {
        return $user->can('{{ RestoreAny }}');
    }
    public function replicate(User $user, KategoriUnitKerja $kategoriUnitKerja)
    {
        return $user->can('{{ Replicate }}');
    }
    public function reorder(User $user)
    {
        return $user->can('{{ Reorder }}');
    }
}
