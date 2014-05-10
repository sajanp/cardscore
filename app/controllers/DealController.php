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
		$rules = [
			'point_value' => 'required|integer',
			'acheived' => 'required',
			'partners' => 'required|array'
		];

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails())
		{
			return Redirect::route('game.deal.create', $gameId)->withErrors($validator->messages())->withInput();
		}

		$game = Game::find($gameId);
		$deal = new Deal;
		$deal->trump_id = Input::get('trump_id');
		$deal->point_value = Input::get('point_value');
		$deal->acheived = Input::get('acheived');
		$deal->high = Input::get('high');

		$game->deals()->save($deal);

		$deal->scores()->save(new Score(['game_id' => $gameId, 'player_id' => Input::get('caller_id'), 'amount' => ($deal->acheived ? $deal->point_value : 0), 'caller' => true]));

		$partners = Input::get('partners');

		if (!is_array($partners))
		{
			$partners = [];
		}

		if (($key = array_search(Input::get('caller_id'), $partners)) !== false) {
			unset($partners[$key]);
		}

		foreach ($partners as $partner)
		{
			$deal->scores()->save(new Score(['game_id' => $gameId, 'player_id' => $partner, 'amount' => ($deal->acheived ? $deal->point_value : 0), 'partner' => true]));
		}

		$otherPlayers = array_diff($game->players->modelKeys(), $partners);

		if (($key = array_search(Input::get('caller_id'), $otherPlayers)) !== false) {
			unset($otherPlayers[$key]);
		}

		foreach ($otherPlayers as $player)
		{
			$deal->scores()->save(new Score(['game_id' => $gameId, 'player_id' => $player, 'amount' => ($deal->acheived ? 0 : $deal->point_value)]));
		}

		return Redirect::route('game.show', $game->id)->withSuccessMessage('Deal posted.  <strong>Please double check things.  You can only delete a hand in the first 5 MINUTES!</strong>');
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
	public function destroy($gameId, $dealId)
	{
		$deal = Deal::find($dealId);

		$deal->delete();

		return Redirect::route('game.show', $gameId)->withErrorMessage('You just deleted a deal!  Make sure you add it in again or that it was meant to be deleted!');
	}


}
