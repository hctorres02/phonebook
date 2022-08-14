<?php

namespace App\Policies\Acl;

use App\Models\Acl\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\Response;

class RolePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->can('acl_roles_view');
    }

    public function view(User $user, Role $role)
    {
        return $user->can('acl_roles_view');
    }

    public function create(User $user)
    {
        return $user->can('acl_roles_create');
    }

    public function update(User $user, Role $role)
    {
        return $user->can('acl_roles_update');
    }

    public function delete(User $user, Role $role)
    {
        if ($role->is_admin) {
            return $this->deny('Cannot destroy the super-user role', Response::HTTP_LOCKED);
        }

        if ($role->users()->count()) {
            return $this->deny('Cannot destroy a role attached to users', Response::HTTP_LOCKED);
        }

        return $user->can('acl_roles_destroy');
    }
}
