<?php

Route::resource('game.deal', 'DealController');
Route::resource('game', 'GameController');
Route::resource('player', 'PlayerController');

Route::get('/', ['as' => 'home', function()
{
	return View::make('home');
}]);