<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('welcome');
    })->name('dashboard');
});





Route::middleware(['check_user' , 'auth'])->group(function () {
    Route::resource('menue' , MenuController::class);
    Route::get('ajax', [CategoryController::class, 'home'])->name('category.home');
    Route::get('category/delete-all', [CategoryController::class, 'destroyAll'])->name('category.destroyAll');
    Route::resource('category', CategoryController::class);
});



