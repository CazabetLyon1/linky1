<?php

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

use App\Http\Controllers\Graph;

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('pages.home');
    });

    Route::get('/import', "Controller@testExcel");

    Route::get('/consoView',function () {
        return view('pages.consoView', ['data1'=>Graph::getGraph(Auth::id(),'DEFAULT')]);
    });

});



Route::get('/logout', '\App\Http\Controllers\Auth\LoginC    ontroller@logout');
