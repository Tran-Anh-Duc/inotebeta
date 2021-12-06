<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\UserController;
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

Route::get('/login', [AuthController::class, 'showFormLogin'])->name('admin.showFormLogin');
Route::post('/login', [AuthController::class, 'login'])->name('admin.login');
Route::get('/register', [AuthController::class, 'showFormRegister'])->name('admin.showFormRegister');
Route::post('/register', [AuthController::class, 'register'])->name('admin.register');
Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::resource('/notes', NoteController::class)->name('get','notes.index');


Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
});
