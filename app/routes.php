<?php

Route::resource('player', 'PlayerController');
Route::resource('meeting', 'MeetingController');

Route::get('/', function()
{
	return View::make('home');
});