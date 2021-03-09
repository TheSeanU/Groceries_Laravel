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

Route::get('/', [
  GroceriesController::class, 'index'
]);

Route::get('/create', [
  GroceriesController::class, 'create'
]);

Route::get('/{grocerie}/edit', [
  GroceriesController::class, 'index'
]);

Route::match(['put', 'patch'], '/{grocerie}/update', [
  GroceriesController::class, 'index'
]);

Route::delete('/{grocerie}/delete', [
  GroceriesController::class, 'index'
]);
