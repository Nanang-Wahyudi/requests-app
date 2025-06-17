<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RequesttypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InfrastructureController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', [DashboardController::class, 'index'])->name('home')->middleware(['auth']);
Route::resource('roles', RoleController::class)->middleware(['auth']);
Route::resource('requesttypes', RequesttypeController::class)->middleware(['auth']);
Route::resource('users', UserController::class)->middleware(['auth']);
Route::post('/users/{user}/update-role', [UserController::class, 'updateRole'])->name('users.updateRole')->middleware(['auth']);
Route::resource('infrastructure-complated', InfrastructureController::class)->middleware(['auth']);


