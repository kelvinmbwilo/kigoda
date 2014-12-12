<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('home');
});

Route::get("about",function(){
   return View::make("about");
});

Route::get("festival",function(){
    return View::make("festival");
});

Route::get("activities",function(){
    return View::make("activities");
});

Route::get("publications",function(){
    return View::make("pubication");
});

Route::get("slogans",function(){
    return View::make("slogans");
});

Route::get("contacts",function(){
    return View::make("contacts");
});

Route::get("album",function(){
    return View::make("album");
});