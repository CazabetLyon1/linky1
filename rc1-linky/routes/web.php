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
use App\Http\Controllers\UploadFileController;

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('pages.home');
    });

    //Route::get('/import', "Controller@testExcel");

    Route::get('/importPage',function () {
        return view('pages.importPage');
    });

    Route::post('/upload', "UploadController@uploadSubmit")->name('upload');

    Route::get('/consoView',function () {
        return view('pages.consoView', ['data1'=>Graph::getGraph(Auth::id(),'DEFAULT')]);
    });
    Route::get('/parameters',function () {
        return view('pages.parametersEdit');
    });

});



Route::get('/logout', '\App\Http\Controllers\Auth\LoginC    ontroller@logout');

