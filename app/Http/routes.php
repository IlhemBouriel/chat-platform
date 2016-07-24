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
//GET Request
Route::get('/', function () {
    return view('connect',array('msg'=>'','email'=>''));
});
Route::get('/form',function()
	{
		return view('form');
	});
Route::get('/gethome',function()
{
	return view ("home");
});
Route::get('/deconnect','TestController@deconnect');
Route::get('/publication','TestController@publication');
Route::get('/getTest','TestController@test');
Route::get('/testForm',function()
{
	return view('testForm');
});
Route::get('/index',function()
{
	return view ("index");
});
//POST request
Route::post('/register','TestController@register');
Route::post('/form','TestController@verify');
Route::post('/connect','TestController@connect');


