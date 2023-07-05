<?php

namespace App\Observers\Oficina\Painel;

use App\Models\Oficina\Painel\Supplier;
use Illuminate\Support\Str;

class SupplierObserver
{
    /**
     * Handle the Supplier "creating" event.
     */
    public function creating(Supplier $supplier): void
    {
        $supplier->url = Str::kebab($supplier->nome);
    }

    /**
     * Handle the Supplier "updating" event.
     */
    public function updating(Supplier $supplier): void
    {
        $supplier->url = Str::kebab($supplier->nome);
    }
}
