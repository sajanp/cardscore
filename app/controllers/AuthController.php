<?php

class AuthController extends BaseController {

	public function getLogin()
	{
		return View::make('login');
	}

	public function postLogin()
	{
		$credentials['username'] = Input::get('username');
		$credentials['password'] = Input::get('password');

		if (Auth::attempt($credentials))
		{
			return Redirect::route('home');
		}

		return Redirect::back()->withErrorMessage('Invalid credentials');
	}

	public function getLogout()
	{
		Auth::logout();

		return Redirect::route('login')->withSuccessMessage('You have been logged out.');
	}

}