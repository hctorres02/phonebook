<?php

namespace App\Policies\Acl;

use App\Models\Acl\Permission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\Response;

class PermissionPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->can('acl_permissions_view');
    }

    public function view(User $user, Permission $permission)
    {
        return $user->can('acl_permissions_view');
    }

    public function create(User $user)
    {
        return $user->can('acl_permissions_create');
    }

    public function update(User $user, Permission $permission)
    {
        return $user->can('acl_permissions_update');
    }

    public function delete(User $user, Permission $permission)
    {
        if ($permission->roles()->count()) {
            return $this->deny('Cannot destroy permission attached a role.', Response::HTTP_LOCKED);
        }

        return $user->can('acl_permissions_destroy');
    }
}
