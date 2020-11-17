<?php

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

Route::get('/login', 'App\Http\Controllers\loginController@index');
Route::get('/login/auth', 'App\Http\Controllers\loginController@auth');
Route::get('/logout', 'App\Http\Controllers\loginController@logout');
Route::get('/dashboard', 'App\Http\Controllers\dashboardController@index');
Route::get('/project/{nameProject}', 'App\Http\Controllers\projectController@projectOverview');
Route::get('/project/daihatsu-leads/export/{nameProject}', 'App\Http\Controllers\projectController@export');
Route::get('/project/add', 'App\Http\Controllers\projectController@addProject');