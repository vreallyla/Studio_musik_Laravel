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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'], function (){
    Route::resource('jenis-recorder', 'JenisRecoderController');
    Route::resource('pengurus', 'PengurusController');




    Route::group(['prefix' => 'api'], function() {
        Route::get('jenis-recorder/data', 'JenisRecoderController@apiData')->name('api.jenis_recorder.data');
        Route::get('pengurus/data', 'PengurusController@apiData')->name('api.pengurus.data');
    });


});

Route::get('date', function() {
    echo indoDate(date('Y-m-d'));
});

Route::get('currency', function() {
    echo "Rp" . indoCurrency(12500000) . ",-";
});

Route::get('spell', function() {
    echo ucwords(indoSpellNumber(1432198));
});