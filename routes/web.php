<?php

use App\Livewire\City\Index as CityIndex;
use App\Livewire\Company\Index as CompanyIndex;
use App\Livewire\Country\Index;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::middleware('auth')->group(function () {

Route::view('dashboard', 'dashboard')->name('dashboard');
Route::view('profile', 'profile')->name('profile');

Route::get('/countries', Index::class)->name('countries.index');
Route::get('/cities', CityIndex::class)->name('cities.index');
Route::get('/companies', CompanyIndex::class)->name('companies.index');

});

require __DIR__.'/auth.php';
