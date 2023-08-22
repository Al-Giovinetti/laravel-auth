<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Guest\HomeController as GuestHomeController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;

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
Auth::routes();

Route::prefix('admin') -> name('admin.') -> middleware('auth') -> group(function () {
    Route::get('/home',[AdminHomeController::class,'home'])->name('home');

    Route::get('/index',[AdminProjectController::class,'index'])->name(('projects.index'));
    Route::get('/show/{id}',[AdminProjectController::class,'show'])->name(('projects.show'));

});

Route::name('guest.') -> group(function () {
    Route::get('/',[GuestHomeController::class,'home'])->name('home');
});


