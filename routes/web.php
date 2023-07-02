<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Models\Contact;

Route::fallback(function () {
    return "<h1>Sorry, the page you are looking for is not exist.</h1>";
});

Route::get('/', function () {
    return view('welcome');
});
Route::controller(ContactController::class)->name('contacts.')->group(function () {
    Route::get('/contacts', 'index')->name('index');
    Route::get('/contacts/create', 'create')->name('create');
    Route::get('/contacts/{id}', 'show')->name('show');
    Route::post('/contacts/store', 'store')->name('store');
    Route::get('/contacts/{id}/edit', 'edit')->name('edit');
    Route::put('/contacts/{id}', 'update')->name('update');
    Route::delete('/contacts/{id}','destroy')->name('destroy');
});
