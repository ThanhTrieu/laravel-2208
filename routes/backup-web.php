<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return "hello world";
});
Route::get('hello', function () {
    return "hii";
});

Route::post('add-product', function(){
    return "added success";
});


//tham so truyen len routing
Route::get('product/{slug}/{id?}', function($slug, $id){
    return "slug: {$slug} - id: {$id}";
})->where(['id'=>'\d+','slug'=>'\w+'])
  ->name('list.products');

Route::get('watch-product',function(){
    return redirect()->route('list.products',['slug'=>'iphone','id'=>1]);
});

Route::prefix('admin')->as('admin.')->group(function(){ //->as('admin.) la tien to 
    Route::get('home',function(){
        return "Home";
    })->name('home');
    Route::get('role',function(){
        return "Role";
    })->name('role');
});

Route::get('login',function(){
    return redirect()->route('admin.home');
});

Route::get('admin/login',[LoginController::class,'index']);
Route::get('not-permission',function(){
    return "ban ko co quyen truy cap";
})->name('not.permission');

Route::get('admin/test',[LoginController::class,'test']);
Route::get('admin/admin',[LoginController::class,'test']);

//phai co domain that
// Route::domain('{domain}.laravel.com')->group(function(){
//     Route::get('docs', function(){
//         return 'docs';
//     });
//     Route::get('install', function(){
//         return 'install';
//     });
// });

Route::get('watch-film/{age}',function($age){
    return "ban da {$age} tuoi - chuc xem vui ve";
})->middleware(['check.age:admin']);
Route::get('warning',function(){
    return "ban ko duoc xem phim";
})->name('warning.film');

