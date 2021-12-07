<?php

use App\Http\Controllers\NoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/notes',[NoteController::class,'index'])->name('notes.index');
Route::post('/create',[NoteController::class,'store'])->name('notes.store');
Route::put('/update/{id}',[NoteController::class,'update'])->name('notes.update');
Route::get('/update/{id}',[NoteController::class,'edit'])->name('notes.edit');
Route::delete('/delete{id}',[NoteController::class,'destroy'])->name('notes.destroy');
Route::get('/detail{id}',[NoteController::class,'show'])->name('notes.show');
Route::get('/search',[NoteController::class,'search']);

