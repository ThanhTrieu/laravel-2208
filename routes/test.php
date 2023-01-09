<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Test\DemoController;

Route::get('test-orm',[DemoController::class,'test']);
Route::get('test-orm-2',[DemoController::class,'testv2']);
Route::get('test-orm-3',[DemoController::class,'testv3']);
Route::get('test-orm-4',[DemoController::class,'testv4']);