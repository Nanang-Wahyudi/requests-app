<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RequesttypeController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InfrastructureController;
use App\Http\Controllers\NetworkController;
use App\Http\Controllers\ArchitectureController;
use App\Http\Controllers\DevsecopsController;
use App\Http\Controllers\DbadministratorController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', [DashboardController::class, 'index'])->name('home')->middleware(['auth']);
Route::resource('roles', RoleController::class)->middleware(['auth']);
Route::resource('requesttypes', RequesttypeController::class)->middleware(['auth']);
Route::resource('users', UserController::class)->middleware(['auth']);
Route::post('/users/{user}/update-role', [UserController::class, 'updateRole'])->name('users.updateRole')->middleware(['auth']);
Route::resource('infrastructure-complated', InfrastructureController::class)->middleware(['auth']);
Route::get('form-spec-upgrade', [InfrastructureController::class, 'formspecup'])->middleware(['auth']);
Route::get('form-soft-install', [InfrastructureController::class, 'formsoftinstall'])->middleware(['auth']);
Route::get('form-address-ip', [NetworkController::class, 'formaddressip'])->middleware(['auth']);
Route::get('form-firewall-access', [NetworkController::class, 'formfirewallaccess'])->middleware(['auth']);
Route::get('form-review-arch', [ArchitectureController::class, 'formreviewarch'])->middleware(['auth']);
Route::get('form-doc-arch', [ArchitectureController::class, 'formdocarch'])->middleware(['auth']);
Route::get('form-sec-scan', [DevsecopsController::class, 'formsecscan'])->middleware(['auth']);
Route::get('form-prod-merge', [DevsecopsController::class, 'formprodmerge'])->middleware(['auth']);
Route::get('form-query-exec', [DbadministratorController::class, 'formqueryexec'])->middleware(['auth']);
Route::get('form-data-retrieval', [DbadministratorController::class, 'formdataretrieval'])->middleware(['auth']);
Route::get('developer-request-complated', [RequestController::class, 'reqcomplated'])->middleware(['auth']);
Route::get('developer-request-onprogress', [RequestController::class, 'reqonprogress'])->middleware(['auth']);
Route::post('proses-formspec', [InfrastructureController::class, 'saveformspec'])->middleware(['auth']);


