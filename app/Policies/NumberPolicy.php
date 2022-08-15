<?php

namespace App\Policies;

use App\Models\Number;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NumberPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->can('numbers_view');
    }

    public function view(User $user, Number $number)
    {
        return $user->can('numbers_view')
            && $user->is($number->customer->user);
    }

    public function create(User $user)
    {
        return $user->can('numbers_create');
    }

    public function update(User $user, Number $number)
    {
        return $user->can('numbers_update')
            && $user->is($number->customer->user);
    }

    public function delete(User $user, Number $number)
    {
        return $user->can('numbers_destroy')
            && $user->is($number->customer->user);
    }
}
