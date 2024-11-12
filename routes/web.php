<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AfiliadoController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\ProdutoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    Route::resource('afiliados', AfiliadoController::class)->only(['index', 'create', 'store', 'destroy']);
    Route::get('vendas/create', [VendaController::class, 'create'])->name('vendas.create');
    Route::get('vendas', [VendaController::class, 'index'])->name('vendas.index');
    Route::post('vendas', [VendaController::class, 'store'])->name('vendas.store');
    Route::resource('produtos', ProdutoController::class);

});


require __DIR__.'/auth.php';
