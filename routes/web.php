<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;

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


Auth::routes();
Route::get('/index',[UserController::class,'index']);
// empolyees
Route::get('/empolyee', function () {
    return view('create');
});
Route::post('/empolyee_reg', [UserController::class,'store']);
Route::get('/data-listt',[UserController::class,'show']);
Route::post('/update_data/{id}', [UserController::class,'update']);
Route::get('/data-edit/{id}',[UserController::class,'edit']);
Route::get('/data-delete/{id}',[UserController::class,'destroy']);
//companiess

Route::get('/company', function () {
    return view('company/create');
});
Route::post('/company_reg', [CompanyController::class,'store']);
Route::get('/data-list',[CompanyController::class,'show']);
Route::post('/update_data/{id}', [CompanyController::class,'update']);
Route::get('/data-edit/{id}',[CompanyController::class,'edit']);
Route::get('/data-delete/{id}',[CompanyController::class,'destroy']);

