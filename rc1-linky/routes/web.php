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
use App\Http\Controllers\DataGetter;
use App\Http\Controllers\UploadFileController;

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('pages.home', [
                                        'moy7'=>DataGetter::getMoy7(Auth::id()),
                                        'moyPrev'=>DataGetter::getMoyprev(Auth::id()),
                                        'maxPrev'=>DataGetter::getMaxPrev(Auth::id()),
                                        'estimateCost'=>DataGetter::estimateCost(Auth::id()),
                                        'graphMoy7Prev'=>Graph::getGraphmoy7Prev(Auth::id()),
                                        'GraphType'=>Graph::getGraphType(Auth::id())
        ]);
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
        return view('pages.parametersEdit', ['datasupp'=>User::getUsers(Auth:id())]);
    });

});



Route::get('/logout', '\App\Http\Controllers\Auth\LoginC    ontroller@logout');

