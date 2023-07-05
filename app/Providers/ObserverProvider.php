<?php

namespace App\Providers;

use App\Models\Oficina\Painel\{
    Resource,
    Role,
    Supplier,
    User,
};


use App\Observers\Oficina\Painel\{
    ResourceObserver,
    RoleObserver,
    SupplierObserver,
    UserObserver,
};

use Illuminate\Support\ServiceProvider;

class ObserverProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //Pessoas
        User::observe(UserObserver::class);
        Supplier::observe(SupplierObserver::class);
        //Pessoas

        //Configurações
        Role::observe(RoleObserver::class);
        Resource::observe(ResourceObserver::class);
        //Configurações
    }
}
