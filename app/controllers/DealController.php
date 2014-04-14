<?php

class DealController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($gameId)
	{
		$game = Game::find($gameId);
		$trumps = Trump::all();

		return View::make('deal.create', compact('game', 'trumps'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($gameId)
	{
		$game = Game::find($gameId);
		$deal = new Deal;
		$deal->trump_id = Input::get('trump_id');
		$deal->point_value = Input::get('point_value');
		$deal->acheived = Input::get('acheived');

		$game->deals()->save($deal);

		$deal->players()->attach(Input::get('caller_id'), ['caller' => true]);

		$partners = Input::get('partners');

		if (($key = array_search(Input::get('caller_id'), $partners)) !== false) {
			unset($partners[$key]);
		}

		foreach ($partners as $partner)
		{
			$deal->players()->attach($partner, ['partner' => true]);
		}

		$otherPlayers = array_diff($game->players->modelKeys(), $partners);

		if (($key = array_search(Input::get('caller_id'), $otherPlayers)) !== false) {
			unset($otherPlayers[$key]);
		}

		foreach ($otherPlayers as $player)
		{
			$deal->players()->attach($player);
		}

		return Redirect::route('game.show', $game->id);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
