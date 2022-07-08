<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RecipeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('recipes', [RecipeController::class, 'index']);
Route::post('recipe/store', [RecipeController::class, 'store']);
Route::get('recipe/show/{id}', [RecipeController::class, 'show']);
Route::post('recipe/update/{id}', [RecipeController::class, 'update']);
Route::delete('recipe/delete/{id}', [RecipeController::class, 'destroy']);
