<?php

namespace App\Providers;

use App\Models\Acl\Permission;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function (User $user) {
           return $user->is_admin ?: null;
        });

        Permission::query()->get([
            'name',
            'enabled',
        ])->each(function (Permission $permission) {
            Gate::define($permission->name, function (User $user) use ($permission) {
                return $permission->enabled
                    && in_array($permission->name, $user->permissions);
            });
        });
    }
}
