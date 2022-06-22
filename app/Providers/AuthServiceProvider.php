<?php

namespace App\Providers;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
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

        $this->defineUserRoleGate('isAdmin',UserRole::ADMIN, "");
        $this->defineUserRoleGate('isMod',UserRole::MOD, UserRole::ADMIN);
        $this->defineUserRoleGate('isUser',UserRole::USER, "");
    }

    private function defineUserRoleGate(string $name, string $role, string $role2): void
    {
        Gate::define($name, function (User $user) use ($role, $role2) {
            return $user->role == $role || $user->role == $role2;
        });
    }
}
