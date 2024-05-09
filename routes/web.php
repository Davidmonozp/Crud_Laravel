<?php
use App\Http\Controllers\ClientesController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});




Route::post('/clientes', [ClientesController::class,'store'])->name('clientes');

Route::get('/clientes', [ClientesController::class, 'index'])->name('clientes.index');

Route::get('/clientes/show', [ClientesController::class, 'show'])->name('clientes.show');

Route::get('/clientes/{cliente}/edit', [ClientesController::class, 'edit'])->name('clientes.edit');

Route::put('/clientes/{id}/edit', [ClientesController::class, 'update'])->name('clientes.update');

Route::delete('/clientes/{cliente}', [ClientesController::class,'destroy'])->name('clientes.destroy');












