<?php

use App\Livewire\City\Index as CityIndex;
use App\Livewire\Country\Index;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::middleware('auth')->group(function () {

Route::view('dashboard', 'dashboard')->name('dashboard');
Route::view('profile', 'profile')->name('profile');

Route::get('/countries', Index::class)->name('countries.index');
Route::get('/cities', CityIndex::class)->name('cities.index');

});

require __DIR__.'/auth.php';
