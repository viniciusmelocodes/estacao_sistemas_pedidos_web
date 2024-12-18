<?php

use App\Http\Controllers\HelpersController;
use App\Models\EUnidadeEmpresarial;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/selecaoUnidadeEmpresarial', function () {
    $unems = EUnidadeEmpresarial::where('unem_situacao', 'Ativa')->get();
    
    return view('selecaoUnidadeEmpresarial', compact('unems'));
})->middleware(['auth', 'verified'])->name('selecaoUnidadeEmpresarial');

Route::get('/listagemPedidos', function () {
    return view('listagemPedidos');
})->middleware(['auth', 'verified'])->name('listagemPedidos');

Route::get('/cadastroPedido', function () {
    return view('cadastroPedido');
})->middleware(['auth', 'verified'])->name('cadastroPedido');

Route::get('/getAllUnidadesEmpresariais', [HelpersController::class, 'getAllUnidadesEmpresariais'])->name('getAllUnidadesEmpresariais');

Route::get('/criptografarSenha/{senha}', function ($senha) {
    return Hash::make($senha);
});

require __DIR__ . '/auth.php';
