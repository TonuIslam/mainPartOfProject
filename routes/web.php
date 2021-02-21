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
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('users')->group(function(){

Route::get('', [App\Http\Controllers\Backend\UserController::class, 'index'])->name('view.user');
Route::get('add', [App\Http\Controllers\Backend\UserController::class, 'add'])->name('add.user');
Route::post('store', [App\Http\Controllers\Backend\UserController::class, 'store'])->name('user.store');
Route::post('/update/{id}', [App\Http\Controllers\Backend\UserController::class, 'update'])->name('users.update');
Route::get('/edit/{id}', [App\Http\Controllers\Backend\UserController::class, 'edit'])->name('edit.user');
Route::get('/delete/{id}', [App\Http\Controllers\Backend\UserController::class, 'delete'])->name('delete.user');
});

Route::prefix('profiles')->group(function(){
Route::get('/view', [App\Http\Controllers\Backend\ProfileController::class, 'view'])->name('view.profiles');
Route::post('store', [App\Http\Controllers\Backend\ProfileController::class, 'update'])->name('profiles.update');
Route::get('/edit',[App\Http\Controllers\Backend\ProfileController::class, 'edit'])->name('edit.profiles');
Route::get('/password/view',[App\Http\Controllers\Backend\ProfileController::class, 'password'])->name('password.profiles.view');
Route::post('/password/update',[App\Http\Controllers\Backend\ProfileController::class, 'passwordUpdate'])->name('password.profiles.update');
 

});

