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
Route::get('/project', 'App\Http\Controllers\projectController@index');
Route::get('/project/daihatsu-leads', 'App\Http\Controllers\projectController@daihatsuLeads');
Route::get('/project/daihatsu-leads/export/{nameTable}', 'App\Http\Controllers\projectController@daihatsuLeadsExport');