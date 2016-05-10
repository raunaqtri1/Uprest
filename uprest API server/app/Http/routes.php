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
Route::get('solrtosql',function(){
    return view('solrtosql');
} );
Route::get('article',function(){
    return view('article');
} );
Route::get('solrtosql2',function(){
    return view('solrtosql2');
} );
Route::group(['prefix' => 'api'], function() {

    Route::post('login', 'Api\AuthController@login');
    Route::get('search','Api\AuthController@search');
    Route::post('signup', 'Api\AuthController@signup');
    Route::get('page','Api\AuthController@page');
    Route::get('register/verify/{confirmationCode}','Api\AuthController@confirm');
    Route::get('autocomplete','Api\AuthController@autocomplete');
     Route::get('display','Api\AuthController@display');
     Route::group(['middleware' => ['jwt.auth']], function() {
        Route::post('logout', 'Api\AuthController@logout');
        Route::post('updatemail','Api\AuthController@updatemail');
     });
    Route::group(['middleware' => ['jwt.auth', 'jwt.refresh']], function() {
         Route::get('category','Api\AuthController@category');
         Route::get('article','Api\AuthController@article');
         Route::get('myfav','Api\AuthController@myfav');
         Route::get('dashinterest','Api\AuthController@dashinterest');
        Route::post('favourite','Api\AuthController@favourite');
        Route::post('follow','Api\AuthController@follow');
        Route::post('filter','Api\AuthController@filter');
        Route::post('page1','Api\AuthController@page1');
        Route::post('display1','Api\AuthController@display1');
         Route::post('yourinterest','Api\AuthController@yourinterest');
        Route::get('test', function(){
            return response()->json(['foo'=>'bar']);
        });
    });
});
//Route::controller('/','homecontroller');
Route::get('news',function() {
    $news=json_decode(file_get_contents('http://localhost:8983/solr/collection1/select?q=*%3A*&wt=json&indent=true'),true);
    //dd($news);
    //return $news['response']['docs'][0]['category'];
    return view('news1')->with('news',$news);
});
Route::resource('users','usercontroller');







