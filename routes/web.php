<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Auth\ChangePassword;
use App\Http\Livewire\Client\All;
use App\Http\Livewire\Client\Create;
use App\Http\Livewire\Client\Show;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
  Route::get('/', function () {
    return view('welcome');
  });

  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  Route::prefix('clients')->group(function () {

    Route::get('/create', Create::class)->name("clients.create");
    Route::get('/{client}', Show::class)->name('clients.show');
    Route::get('/{client}/edit', Create::class)->name("clients.edit");
    Route::get('/', All::class)->name('clients.all');
  });


  Route::get('users', \App\Http\Livewire\User\All::class)->name('users.all');


  Route::get('change-password', ChangePassword::class)->name('change-password');


});


require __DIR__ . '/auth.php';
