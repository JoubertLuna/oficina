<?php

use App\Http\Controllers\Oficina\Painel\{
    HomeControler,
    ListController,
    ResourceControler,
    RoleControler,
    SupplierController,
    UserController,
};

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth', 'verified')->group(function () {

    #Route Home
    Route::get('/home', [HomeControler::class, 'index'])->name('home');
    #Route Home

    //Pessoas
    #Route User
    Route::resource('user', UserController::class);
    #Route User

    #Route Mecânico / Recepcionista
    Route::get('/mecanico', [ListController::class, 'mecanicos'])->name('mecanico.index');
    Route::get('/recepcionista', [ListController::class, 'recepcionistas'])->name('recepcionista.index');
    #Route Mecânico / Recepcionista

    #Route Fornecedor
    Route::resource('supplier', SupplierController::class);
    #Route Fornecedor
    //Pessoas

    // Configurações
    #Route Role
    Route::resource('role', RoleControler::class);
    #Route Role

    #Route Resource
    Route::resource('resource', ResourceControler::class);
    #Route Resource
    // Configurações
});

require __DIR__ . '/acl.php';

Auth::routes(['register' => false, 'verify' => true]);
