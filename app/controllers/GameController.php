<?php

class GameController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$games = Game::with('players')->orderBy('created_at', 'desc')->get();

		return View::make('game.index', compact('games'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$players = Player::where('active', true)->get();

		return View::make('game.create', compact('players'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$game = Game::create([]);

		$game->players()->sync(Input::get('players'));

		return Redirect::route('game.deal.create', $game->id)->withSuccessMessage('Your game has been started.');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$game = Game::find($id);

		if (Input::get('tv', false))
		{
			return View::make('game.show-tv', compact('game'));
		}

		return View::make('game.show', compact('game'));
	}
}
