<?php

use App\Http\Controllers\projet_2control;
use Illuminate\Support\Facades\Auth;
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
Route::get('/liste_product', function () {
    return view('liste_product');
});


Route::get('/creat_product', [projet_2control::class,'create']);
Route::post('/creat_product', [projet_2control::class,'store'])->name('creat_product');
Route::get('/liste', [projet_2control::class,'liste']);
Route::get('/detail/{id}', [projet_2control::class,'show'])->name('detail');
Route::get('/table' , [projet_2control::class,'table'])->name('table');
Route::get('/edit_product/{id}' , [projet_2control::class,'edit'])->name('edit');
Route::post('/edit_product/{id}' , [projet_2control::class,'update'])->name('update');
Route::get('/delete/{id}' , [projet_2control::class,'destroy'])->name('delete');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
