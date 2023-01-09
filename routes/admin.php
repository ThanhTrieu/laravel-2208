<?php
use Illuminate\Support\Facades\Route;
//route cho admin
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoleController;
use App\Models\Role;

Route::prefix('admin')->as('admin.')->group(function(){
    Route::get('login',[LoginController::class,'index'])
    ->middleware('admin.is.logined')
    ->name('login');

    Route::post('handle-login',[LoginController::class,'handle'])->name('handle.login');
    Route::post('logout',[LoginController::class, 'logout'])->name('logout');
});

Route::prefix('admin')
->as('admin.')
->middleware('check.admin.login')
->group(function(){
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    // router khac o day
    // tat ca deu bi middleware: check.admin.login xu ly
    Route::get('roles', [RoleController::class, 'index'])->name('roles.list');
    Route::get('create-role', [RoleController::class, 'create'])->name('roles.create');
    Route::post('store', [RoleController::class, 'store'])->name('roles.store');
    Route::get('roles/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
});
