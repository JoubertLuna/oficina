<?php

namespace App\Http\Controllers\Oficina\Painel;

use App\Http\Controllers\Controller;
use App\Models\Oficina\Painel\User;

class ListController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function mecanicos()
    {
        if ($mecanicos = $this->user->with('role')->where('role_id', '=', '2')->latest()->paginate(100000000)) {
            return view('oficina.painel.pages.list.mecanico.index', compact('mecanicos'));
        }
    }

    public function recepcionistas()
    {
        if ($recepcionistas = $this->user->with('role')->where('role_id', '=', '3')->latest()->paginate(100000000)) {
            return view('oficina.painel.pages.list.recepcionista.index', compact('recepcionistas'));
        }
    }
}
