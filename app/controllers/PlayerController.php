<?php

class PlayerController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$players = Player::orderBy('active', 'desc')->orderBy('name')->get();

		return View::make('player.index', compact('players'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('player.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$rules = ['name' => 'required|min:2'];

		$validator = Validator::make($input, $rules);

		if ($validator->passes())
		{
			Player::create(
			[
				'name' => ucwords($input['name'])
			]);

			return Redirect::route('player.index')->withSuccessMessage('Player Added Successfully');
		}

		return Redirect::route('player.create')->withErrors($validator->messages());
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$player = Player::find($id);

		return View::make('player.edit', compact('player'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$player = Player::find($id);

		$input = Input::all();

		$rules = ['name' => 'required|min:2'];

		$validator = Validator::make($input, $rules);

		if ($validator->passes())
		{
			$player->name = ucwords($input['name']);
			$player->active = array_get($input, 'active', false);
			$player->save();

			return Redirect::route('player.index')->withSuccessMessage('Player Updated Successfully');
		}

		return Redirect::route('player.edit', $id)->withErrors($validator->messages());
	}

	public function show($id)
	{
		$player = Player::find($id);

		return View::make('player.show', compact('player'));
	}

	public function destroy($id)
	{
		$player = Player::find($id);

		$player->delete();

		return Redirect::route('player.index')->withSuccessMessage('Player Deleted Successfully');
	}
}
