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

Route::get('/', [GroceriesController::class,
  'index'->name('groceries.index');
]);

Route::get('/create', [GroceriesController::class,
  'create'->name('groceries.index');
]);

Route::get('/{grocerie}/edit', [GroceriesController::class,
  'edit'->name('groceries.edit');
]);

Route::match(['put', 'patch'], '/{grocerie}/update', [ GroceriesController::class,
  'update'->name('groceries.update');
]);

Route::delete('/{grocerie}/delete', [ GroceriesController::class,
  'delete'->name('groceries.delete');
]);
