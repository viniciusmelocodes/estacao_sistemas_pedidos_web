<?php

use App\Http\Controllers\HelpersController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/selecaoUnidadeEmpresarial', [HelpersController::class, 'getAllBusinessUnitsToUserLogged'])->middleware(['auth', 'verified'])->name('selecaoUnidadeEmpresarial');
Route::get('/pedidos', [HelpersController::class, 'getSalesListing'])->middleware(['auth', 'verified'])->name('pedidos');
Route::get('/pedido', [HelpersController::class, 'getNewSale'])->middleware(['auth', 'verified'])->name('pedido');
Route::post('/setUnemIdToUserLogged', [HelpersController::class, 'setUnemIdToUserLogged'])->name('setUnemIdToUserLogged');
Route::get('/getAllPeople', [HelpersController::class, 'getAllPeople'])->name('getAllPeople');
Route::get('/getAllPaymentMethods', [HelpersController::class, 'getAllPaymentMethods'])->name('getAllPaymentMethods');
Route::get('/getAllProducts', [HelpersController::class, 'getAllProducts'])->name('getAllProducts');
Route::get('/getSale', [HelpersController::class, 'getSale'])->name('getSale');
Route::get('/getBusinessUnitData', [HelpersController::class, 'getBusinessUnitData'])->name('getBusinessUnitData');
Route::post('/saveSale', [HelpersController::class, 'saveSale'])->name('saveSale');
Route::get('/getSalesByTermSearch', [HelpersController::class, 'getSalesByTermSearch'])->name('getSalesByTermSearch');

Route::get('/criptografarSenha/{senha}', function ($senha) {
    return Hash::make($senha);
});

require __DIR__ . '/auth.php';
