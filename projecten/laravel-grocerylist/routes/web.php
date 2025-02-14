<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello, World!';
});

Route::get('/items', [ItemController::class, 'index'])->name('items.index');
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
Route::post('/items', function(){})->name('items.store');
Route::get('/items/{id}', function(){})->name('items.show');
Route::get('/items/{id}/edit', function(string $item_id) {
  return view('items.edit');
})->name('items.edit');
Route::put('/items/{id}', function(){})->name('items.update');
Route::delete('/items/{item}', [ItemController::class, 'destroy'])->name('items.destroy');

Route::redirect('/', '/items');
