<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroceriesController;

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
Route::get('/', [GroceriesController::class,'index'])
  ->name('groceries.index');

Route::post('/', [GroceriesController::class, 'store'] )
  ->name('groceries.store');

Route::put('/{update}', [GroceriesController::class, 'update'])
  ->name('groceries.update');

Route::delete('/{destroy}', [ GroceriesController::class, 'destroy'])
  ->name('groceries.destroy');
