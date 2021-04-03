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

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

/*Route::middleware('admin')->group(function () {
    Route::get('/contact', [ContactController::class, 'index']);
});*/

Route::get('/', function(){
    return view('index', [
        'auth_user' => Auth::user()
    ]);
});

Route::get('/home/recipes',[HomeController::class, 'index'] );
Route::get('/recipes',[RecipesController::class, 'index'] );
Route::get('/recipe/{id}',[RecipesController::class, 'show']);

Route::post('/contact/create', [ContactController::class, 'store']);

Route::resources([
    '/admin/recipe' => RecipesController::class,
]);

Route::get('/dashboard',[HomeController::class, 'index'] );

Route::get('/contact', [ContactController::class, 'index']);

Route::post('/comment/create', [CommentController::class, 'store']);
Route::post('/comment/delete/{id}', [CommentController::class, 'destroy']);





Route::get('/gestion', [GestionRoleController::class, 'index'])->name('gestion');
Route::get('/gestion/search', [GestionRoleController::class, 'search'])->name('gestionSearch');
Route::post('/gestion/update/{id}', [GestionRoleController::class, 'update'])->name('gestionUpdate');

Route::get('/ingredient',[IngredientController::class, 'index'])->name('ingredient');
Route::post('/ingredient/create',[IngredientController::class, 'store'])->name('ingredientCreate');
Route::get('/ingredient/edit/{id}', [IngredientController::class, 'edit'])->name('ingredientEdit');
Route::post('/ingredient/update/{id}', [IngredientController::class, 'update'])->name('ingredientUpdate');
Route::get('/ingredient/search', [IngredientController::class, 'search'])->name('ingredientSearch');


require __DIR__.'/auth.php';
