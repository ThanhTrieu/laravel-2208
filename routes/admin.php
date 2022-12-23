<?php
use Illuminate\Support\Facades\Route;
//route cho admin
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;

Route::prefix('admin')->as('admin.')->group(function(){
    Route::get('login',[LoginController::class,'index'])->name('login');
    Route::post('handle-login',[LoginController::class,'handle'])->name('handle.login');
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
});
