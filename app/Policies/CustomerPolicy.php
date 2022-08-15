<?php

namespace App\Policies;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\Response;

class CustomerPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->can('customers_view');
    }

    public function view(User $user)
    {
        return $user->can('customers_view');
    }

    public function create(User $user)
    {
        return $user->can('customers_create');
    }

    public function update(User $user, Customer $customer)
    {
        return $user->can('customers_update') && $user->is($customer->user);
    }

    public function delete(User $user, Customer $customer)
    {
        if ($customer->numbers()->count()) {
            return $this->deny('Cannot destroy a customer attached to numbers.', Response::HTTP_LOCKED);
        }

        return $user->can('customers_destroy') && $user->is($customer->user);
    }
}
