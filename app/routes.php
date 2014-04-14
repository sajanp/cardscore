<?php

Route::resource('meeting.game', 'GameController');
Route::resource('meeting', 'MeetingController');
Route::resource('player', 'PlayerController');

Route::get('/', function()
{
	return View::make('home');
});