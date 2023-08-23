<?php

namespace App\Policies;

use App\Models\User;
use SolutionForest\FilamentFirewall\Models\Ip;

class FirewallPolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_firewall::ip');
    }

    public function view(User $user, Ip $ip)
    {
        return $user->can('view_firewall::ip');
    }

    public function create(User $user)
    {
        return $user->can('create_firewall::ip');
    }

    public function update(User $user, Ip $ip)
    {
        return $user->can('update_firewall::ip');
    }

    public function delete(User $user, Ip $ip)
    {
        return $user->can('delete_firewall::ip');
    }

    public function deleteAny(User $user)
    {
        return $user->can('delete_any_firewall::ip');
    }

    public function forceDelete(User $user, Ip $ip)
    {
        return $user->can('{{ ForceDelete }}');
    }

    public function forceDeleteAny(User $user)
    {
        return $user->can('{{ ForceDeleteAny }}');
    }

    public function restore(User $user, Ip $ip)
    {
        return $user->can('{{ Restore }}');
    }
    public function restoreAny(User $user)
    {
        return $user->can('{{ RestoreAny }}');
    }
    public function replicate(User $user, Ip $ip)
    {
        return $user->can('{{ Replicate }}');
    }
    public function reorder(User $user)
    {
        return $user->can('{{ Reorder }}');
    }
}
