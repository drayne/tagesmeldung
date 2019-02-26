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

$proxy_url    = getenv('PROXY_URL');
$proxy_schema = getenv('PROXY_SCHEMA');

Route::get('/', function () {
    echo phpinfo();
});

//Route::get('/proba/{polisa}', 'ProbaController@index');
Route::get('/proba/log', 'ProbaController@index');

Route::get('/log', 'PolisaController@index');

Route::get('/testemail', function(){

    Mail::raw('Proba email!', function($message)
    {
        $message->to('vedran.bojicic@atososiguranje.com');
    });

});

Route::get('/rep', 'PolisaController@index');
Route::get('/doctrine', 'PolisaController@getIndex');


Route::get('/test', 'PolisaController@test');
Route::get('/generate/tagesmeldung', 'TagesmeldungController@createTagesmeldung')->name('generateTagesmeldung');