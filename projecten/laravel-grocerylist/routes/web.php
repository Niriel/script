<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello, World!';
});

// Just to test Blabes.
// Route::get('/welcome', function() {
//     return view('welcome');
// });


/* Manipulate the Items table.
  
  Note that it's always items, plural, even for one item.
  That's because we consider normal, in this application, to display ALL the items.
  It's a grocery list. On a social media website, we may want to display things
  like 'user/Alice', with user in the singular form, because we expect normal users
  to interact with one user at a time.
  
  We post, put or patch to /items or /items/id, which is where we get from.
  Only the forms get their /create or /edit extra URL bit.
  
  index, create, store, show, etc., in the name method seem be what we put in hrefs.
*/

// Retrieve all the items.
Route::get('/items', [ItemController::class, 'index'])->name('items.index');

// Serve a form to create one item.
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');

// Send the form data to this controller.
Route::post('/items', function(){})->name('items.store');

// Retrieve one item.
Route::get('/items/{id}', function(){})->name('items.show');

// Serve a form to edit one item. Items are small, we're not going to patch them by bits.
Route::get('/items/{id}/edit', function(string $item_id) {
  return view('items.edit');
})->name('items.edit');

// Send all the new data about an edited item to a controller.
Route::put('/items/{id}', function(){})->name('items.update');

// Delete an item.
Route::delete('/items/{id}', function(){})->name('items.destroy');

// This overrides the Route::get('/') defined above.
// Does that mean that if I post to /, I will create an item?
Route::redirect('/', '/items');

/*
  > php artisan route:list

  GET|HEAD  / ................................................................................
  ANY       / ........................................ Illuminate\Routing › RedirectController
  GET|HEAD  hello ............................................................................
  GET|HEAD  items ................................................................ items.index
  POST      items ................................................................ items.store
  GET|HEAD  items/create ........................................................ items.create
  GET|HEAD  items/{id} ............................................................ items.show
  PUT       items/{id} .......................................................... items.update
  DELETE    items/{id} ......................................................... items.destroy
  GET|HEAD  items/{id}/edit ....................................................... items.edit
  GET|HEAD  storage/{path} ..................................................... storage.local
  GET|HEAD  up ...............................................................................

  > php artisan route:list --except-vendor
  => returns the routes I defined.

  > php artisan route:list --only-vendor
  => Show storage and up, whatever they are.
*/
