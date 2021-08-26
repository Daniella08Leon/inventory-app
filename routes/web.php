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

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/prueba', function(){
	return "hola, esto es una prueba";
});

use App\Http\Controllers\PersonaController;
Route:: get('/usuario/{id?}', [PersonaController::class , 'mostrar']
)->where('id', '[0-9]+');//el where ayuda a flitar la expresion regular, [A-Za-z]+


use App\Http\Controllers\ProductController;
Route::get('/products' , [ProductController::class , 'show']);

Route::get('/product/delete/{id}',[ProductController::class, 'delete'])->name('product.delete');

Route::get('/product/form/{id?}',[ProductController::class, 'form'])->name('product.form');

Route::post('/product/save', [ProductController::class, 'save'])->name('product.save');



use App\Http\Controllers\BrandController;
Route::get('/brands' , [BrandController::class , 'show']);

Route::get('/brand/delete/{id}',[BrandController::class, 'delete'])->name('brand.delete');

Route::get('/brand/form/{id?}',[BrandController::class, 'form'])->name('brand.form');

Route::post('/brand/save', [BrandController::class, 'save'])->name('brand.save');



use App\Http\Controllers\CategorieController;
Route::get('/categories' , [CategorieController::class , 'show']);

Route::get('/categorie/delete/{id}',[CategorieController::class, 'delete'])->name('categorie.delete');

Route::get('/categorie/form/{id?}',[CategorieController::class, 'form'])->name('categorie.form');

Route::post('/categorie/save', [CategorieController::class, 'save'])->name('categorie.save');


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
