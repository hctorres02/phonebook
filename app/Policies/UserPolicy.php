<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\Response;

class UserPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->is_admin) {
            return true;
        }
    }

    public function viewAny(User $user)
    {
        return $user->can('users_view');
    }

    public function view(User $user, User $model)
    {
        return $user->can('users_view') || $user->is($model);
    }

    public function create(User $user)
    {
        return $user->can('users_create');
    }

    public function update(User $user, User $model)
    {
        return $user->can('users_update') || $user->is($model);
    }

    public function delete(User $user, User $model)
    {
        if ($user->is($model)) {
            return $this->deny('Cannot destroy yourself account!', Response::HTTP_LOCKED);
        }

        return $user->can('users_destroy');
    }
}
