<?php

use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\QuestionController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\LoginController;
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

Route::get('/',[LoginController::class,'login'])->name('login');
Route::post('/',[LoginController::class,'postLogin']);
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::get('/signup',[LoginController::class,'signin'])->name('signin');
Route::post('/signup',[LoginController::class,'postSignin']);

Route::prefix('admin')->middleware('auth')->middleware('role:super_admin|manager')->group(function () {

    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user.list');
        Route::get('/add', [UserController::class, 'add'])->name('user.add');
        Route::post('/add', [UserController::class, 'postAdd']);
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/edit/{id}', [UserController::class, 'postEdit']);
        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('user.remove');
    });
    Route::prefix('role')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('role.list');
        Route::get('/add', [RoleController::class, 'add'])->name('role.add');
        Route::post('/add', [RoleController::class, 'postAdd']);
        Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
        Route::post('/edit/{id}', [RoleController::class, 'postEdit']);
        Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('role.remove');
    });
    Route::prefix('permission')->group(function () {
        Route::get('/', [PermissionController::class, 'index'])->name('permission.list');
        Route::get('/add', [PermissionController::class, 'add'])->name('permission.add');
        Route::post('/add', [PermissionController::class, 'postAdd']);
        Route::get('/edit/{id}', [PermissionController::class, 'edit'])->name('permission.edit');
        Route::post('/edit/{id}', [PermissionController::class, 'postEdit']);
        Route::get('/delete/{id}', [PermissionController::class, 'delete'])->name('permission.remove');
    });
    Route::prefix('question')->group(function () {
        Route::get('/', [QuestionController::class, 'index'])->name('question.list');
        Route::get('/add', [QuestionController::class, 'add'])->name('question.add');
        Route::post('/add', [QuestionController::class, 'postAdd']);
        Route::get('/edit/{id}', [QuestionController::class, 'edit'])->name('question.edit');
        Route::post('/edit/{id}', [QuestionController::class, 'postEdit']);
        Route::get('/delete/{id}', [QuestionController::class, 'delete'])->name('question.remove');
    });
});
