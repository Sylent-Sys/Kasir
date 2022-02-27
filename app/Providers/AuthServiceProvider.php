<?php

namespace App\Providers;

use App\Helpers\RoleUser;
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
        Gate::define('admin', function(User $user) {
            return $user->role === RoleUser::ADMIN;
        });
        Gate::define('pengguna', function(User $user) {
            return $user->role === RoleUser::PENGGUNA;
        });
        Gate::define('waiter', function(User $user) {
            return $user->role === RoleUser::WAITER;
        });
        Gate::define('kasir', function(User $user) {
            return $user->role === RoleUser::KASIR;
        });
        Gate::define('owner', function(User $user) {
            return $user->role === RoleUser::OWNER;
        });
        //
    }
}
