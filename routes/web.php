<?php

use App\Http\Controllers\CaptchaServiceController;
use App\Http\Controllers\SocialiteController;
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

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

/*Route::middleware('admin')->group(function () {
    Route::get('/contact', [ContactController::class, 'index']);
});*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/recettes', [RecipesController::class, 'index'])->name('recettes');
Route::get('/recette/{url}',[RecipesController::class, 'show'])->name('recette');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/create', [ContactController::class, 'store'])->name('contactCreate');

Route::resources([
    '/admin/recette' => RecipesController::class,
]);

Route::post('/comment/create', [CommentController::class, 'store'])->name('commentCreate');
Route::post('/comment/delete/{id}', [CommentController::class, 'destroy'])->name('commentDelete');

Route::get('/gestion', [GestionRoleController::class, 'index'])->name('gestion');
Route::get('/gestion/search', [GestionRoleController::class, 'search'])->name('gestionSearch');
Route::post('/gestion/update/{id}', [GestionRoleController::class, 'update'])->name('gestionUpdate');

Route::get('/ingredient',[IngredientController::class, 'index'])->name('ingredient');
Route::post('/ingredient/create',[IngredientController::class, 'store'])->name('ingredientCreate');
Route::get('/ingredient/edit/{id}', [IngredientController::class, 'edit'])->name('ingredientEdit');
Route::post('/ingredient/update/{id}', [IngredientController::class, 'update'])->name('ingredientUpdate');
Route::get('/ingredient/search', [IngredientController::class, 'search'])->name('ingredientSearch');


Route::get("/loginRegister", [SocialiteController::class, 'loginRegister'])->name('socialite.loginRegister');
Route::get("/redirect/{provider}",  [SocialiteController::class, 'redirect'])->name('socialite.redirect');
Route::get("/callback/{provider}",  [SocialiteController::class, 'callback'])->name('socialite.callback');

require __DIR__.'/auth.php';
