<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RecipesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/recettes', [RecipesController::class, 'index']);
Route::get('/recettes/create', [RecipesController::class, 'create']);
Route::post('/recettes/create', [RecipesController::class, 'store']);

Route::get('/recette/{url}',[RecipesController::class, 'show']);

Route::resource('/admin/recettes',AdminController ::class);

Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact/create', [ContactController::class, 'store']);
