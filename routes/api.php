<?php

use App\Http\Controllers\Api\MenuController;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/menus', [MenuController::class, 'index']);
Route::get('/menu/{id}', [MenuController::class, 'show']);
