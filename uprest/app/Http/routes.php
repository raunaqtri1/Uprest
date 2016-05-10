<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('fox',function(){
	return view('fox');
});
Route::get('page2',function(){
	return view('page2');
});
Route::get('article2',function(){
	return view('article2');
});
Route::get('article3',function(){
	return view('article3');
});
Route::controller('/','homecontroller');

