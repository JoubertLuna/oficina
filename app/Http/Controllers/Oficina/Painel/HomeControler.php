<?php

namespace App\Http\Controllers\Oficina\Painel;

use App\Http\Controllers\Controller;

class HomeControler extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('oficina.painel.pages.home');
    }
}
