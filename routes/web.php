<?php

use App\Livewire\Branch\Index as BranchIndex;
use App\Livewire\City\Index as CityIndex;
use App\Livewire\Company\Index as CompanyIndex;
use App\Livewire\Country\Index;
use App\Livewire\Dashboard;
use App\Livewire\Permission\Index as PermissionIndex;
use App\Livewire\Role\Index as RoleIndex;
use App\Livewire\User\Index as UserIndex;
use App\Livewire\UserPermission\Index as UserPermissionIndex;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::middleware('auth')->group(function () {

    // Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::get('/dashboard',Dashboard::class)->name('dashboard');
    Route::view('profile', 'profile')->name('profile');

    Route::get('/countries', Index::class)->name('countries.index');
    Route::get('/cities', CityIndex::class)->name('cities.index');
    Route::get('/companies', CompanyIndex::class)->name('companies.index');
    Route::get('/branches', BranchIndex::class)->name('branches.index');
    Route::get('/roles', RoleIndex::class)->name('roles.index');
    Route::get('/users', UserIndex::class)->name('users.index');
    Route::get('/permissions', PermissionIndex::class)->name('permissions.index');
    Route::get('/user-permission', UserPermissionIndex::class)->name('users.permissions.index');
});

require __DIR__ . '/auth.php';
