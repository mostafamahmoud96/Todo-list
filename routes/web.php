<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskGroupController;
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

Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => 'auth'],function () {
    Route::resource('taskGroup',TaskGroupController::class);
    Route::resource('task',TaskController::class);

    Route::get('changeStatus', [TaskController::class,'changeStatus'])->name('change-status');

});