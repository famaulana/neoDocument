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
Route::get('/project/add', 'App\Http\Controllers\projectController@addProject');
Route::get('/project/settings', 'App\Http\Controllers\projectController@index');
Route::get('/project/delete/{nameProject}', 'App\Http\Controllers\projectController@deleteProject');
Route::post('/project/add/proccess', 'App\Http\Controllers\projectController@storeDataProject');
Route::get('/project/{nameProject}', 'App\Http\Controllers\projectController@projectOverview');
Route::get('/project/export/{nameProject}', 'App\Http\Controllers\projectController@export');