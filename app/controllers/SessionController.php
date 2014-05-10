<?php

class SessionController extends BaseController {

	public function create()
	{
		return View::make('login');
	}

	public function store()
	{
		$credentials['username'] = Input::get('username');
		$credentials['password'] = Input::get('password');

		if (Auth::attempt($credentials))
		{
			return Redirect::route('home');
		}

		return Redirect::back()->withErrorMessage('Invalid credentials');
	}

	public function destroy()
	{
		Auth::logout();

		return Redirect::route('session.create')->withSuccessMessage('You have been logged out.');
	}

}