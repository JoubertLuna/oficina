<?php

namespace App\Observers\Oficina\Painel;

use App\Models\Oficina\Painel\Role;
use Illuminate\Support\Str;

class RoleObserver
{
    /**
     * Handle the Role "creating" event.
     */
    public function creating(Role $role): void
    {
        $role->url = Str::kebab($role->nome);
    }

    /**
     * Handle the Role "updating" event.
     */
    public function updating(Role $role): void
    {
        $role->url = Str::kebab($role->nome);
    }
}
