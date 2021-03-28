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

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');



use App\Http\Controllers\ContactController;
use App\Http\Controllers\RecipesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;


Route::get('/', function(){
    return view('index');
});

Route::get('/home/recipes',[HomeController::class, 'index'] );
Route::get('/recipes',[RecipesController::class, 'index'] );
Route::get('/recipe/{url}',[RecipesController::class, 'show']);

// Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
// Route::get('/', 'HomeController@index');
Route::get('/dashboard',[HomeController::class, 'index'] );
// Route::get('/recettes', [RecipesController::class, 'index']);
// Route::get('/recette/{url}',[RecipesController::class, 'show']);

Route::resources([
    '/admin/recette' => RecipesController::class,
]);

Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact/create', [ContactController::class, 'store']);


Route::post('/comment/create', [CommentController::class, 'store']);
Route::post('/comment/delete/{id}', [CommentController::class, 'destroy']);




require __DIR__.'/auth.php';
