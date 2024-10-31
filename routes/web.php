<?php

use App\Http\Controllers\CategoryController;
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
    return response()->json([
        'message' => 'success',
        'data' => 'Hello World',
        'code' => 200
    ]);
});

Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::get('categories', [CategoryController::class,'index'])->name('categories.index');
Route::get('categories/edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('categories/{category}', [CategoryController::class,'update'])->name('categories.update');
Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::post('categories', action: [CategoryController::class, 'store'])->name('categories.store');
Route::delete('categories/{category}', action:[CategoryController::class, 'destroy'])->name('categories.destroy');
