<?php

Route::controller('auth', 'AuthController', ['getLogin' => 'login', 'postLogin' => 'do.login', 'getLogout' => 'logout']);

Route::group(['before' => 'auth'], function()
{
	Route::resource('game.deal', 'DealController');
	Route::resource('game', 'GameController');
	Route::resource('player', 'PlayerController');

	Route::get('/', ['as' => 'home', function()
	{
		return View::make('home');
	}]);
});