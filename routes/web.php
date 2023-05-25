<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [TodoController::class, 'index']);
Route::get('/main', [TodoController::class, 'showMain']);

Route::get('create', [TodoController::class, 'create']);
Route::post('store-data', [TodoController::class, 'store']);


Route::get('details/{todo}', [TodoController::class, 'details']);

Route::put('update/{todo}', [TodoController::class, 'update'])->name('update');
Route::get('edit/{todo}', [TodoController::class, 'edit'])->name('edit');

Route::get('delete/{todo}', [TodoController::class, 'delete'])->name('delete');

