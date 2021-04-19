<?php

use App\Http\Controllers\CaptchaServiceController;
use App\Http\Controllers\GestionRoleController;
use App\Http\Controllers\IngredientController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ContactController;
use App\Http\Controllers\RecipesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
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

Route::get('/', function(){
    return view('index', [
        'auth_user' => Auth::user()
    ]);
});

Route::get('/home/recipes',[HomeController::class, 'index'] );
Route::get('/recipes',[RecipesController::class, 'index'] );
Route::get('/recipe/{id}',[RecipesController::class, 'show']);

Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact/create', [ContactController::class, 'store']);

Route::resources([
    '/admin/recipe' => RecipesController::class,
]);

Route::get('/manage/users',[GestionRoleController::class, 'index'] );
Route::get('/manage/search/users',[GestionRoleController::class, 'search'])->name('gestionSearch');
Route::put('/manage/update/{id}',[GestionRoleController::class, 'update'])->name('gestionUpdate');

Route::post('/comment/create', [CommentController::class, 'store']);
Route::post('/comment/delete/{id}', [CommentController::class, 'destroy']);

Route::put('/ingredient/update/{id}', [IngredientController::class, 'update'])->name('ingredientUpdate');

require __DIR__.'/auth.php';
