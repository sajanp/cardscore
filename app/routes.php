<?php

Route::resource('session', 'SessionController');

Route::group(['before' => 'auth'], function()
{
	Route::resource('game.deal', 'DealController');
	Route::resource('game', 'GameController');
	Route::resource('player', 'PlayerController');

	Route::get('stats', ['as' => 'stats', 'uses' => 'HomeController@showStats']);
	Route::get('/', ['as' => 'home', 'uses' => 'HomeController@showHome']);
});