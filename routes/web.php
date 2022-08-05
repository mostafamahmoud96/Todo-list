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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/create/task', [TaskController::class, 'create'])->name('task.create');
    Route::post('/store/task', [TaskController::class, 'store'])->name('task.store');
    Route::get('/list/grouptask',[TaskGroupController::class,'index'])->name('taskGroup.index');
    Route::get('/create/grouptask',[TaskGroupController::class,'create'])->name('taskGroup.create');
    Route::post('/store/grouptask',[TaskGroupController::class,'store'])->name('taskGroup.store');
    Route::Delete('/delete/grouptask/{id}',[TaskGroupController::class,'destroy'])->name('taskGroup.delete');
});