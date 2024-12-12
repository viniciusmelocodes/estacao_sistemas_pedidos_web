<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/listagemPedidos', function(){
    return view('listagemPedidos');
})->middleware(['auth', 'verified'])->name('listagemPedidos');

Route::get('/cadastroPedido', function(){
    return view('cadastroPedido');
})->middleware(['auth', 'verified'])->name('cadastroPedido');

Route::get('/criptografarSenha/{senha}', function($senha){
    return Hash::make($senha);
});

require __DIR__.'/auth.php';
