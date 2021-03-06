<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Client\ClientController;
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

Route::get('/', [ClientController::class, 'index']);
Auth::routes();
Route::group(['middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    });
   Route::resource('categories', CategoryController::class);
   Route::resource('product', ProductController::class);
   Route::resource('slide', SlideController::class);

});
