<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::controller(HomeController::class)->group(function(){

    Route::match(['get' , 'post'] , '/' , 'index')->name('index');

});

Route::controller(LoginController::class)->group(function(){

    Route::match(['get' , 'post'] , 'admin/login' , 'adminLogin')->name('adminLogin');
    Route::match(['get' , 'post'] , 'adminLogins' , 'adminLogins')->name('adminLogins');

});

Route::prefix('admin')->middleware(['auth:admin'])->name('admin.')->group(function () {

    Route::match(['get', 'post'], '/logout', [Logincontroller::class, 'adminlogout'])->name('logout');

    Route::controller(AdminController::class)->group(function(){

        Route::match(['get' , 'post'] , '' ,'index')->name('index');

    });

});