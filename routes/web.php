<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\DashboardOperatorController;


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
    return view('auth.login');
});

Auth::routes();

/*------------------------------------------
--------------------------------------------
All Operator Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:operator'])->group(function () {
    Route::get('/operator/home', [HomeController::class, 'index'])->name('home');
    Route::resource('/operator/document', DocumentController::class);
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::resource('admin/operators', OperatorController::class);
    Route::get('/search/', 'OperatorController@search')->name('opt-search');
    Route::get('/searchs/', 'CategoryController@search')->name('searchs');
    Route::resource('admin/categories', CategoryController::class);
});

Route::get('/mig', function()
{
    // Call and Artisan command from within your application.
    Artisan::call('migrate:fresh');
    Artisan::call('db:seed');
});

Route::get('/cc', function()
{
    // Call and Artisan command from within your application.
    Artisan::call('config:clear');
});