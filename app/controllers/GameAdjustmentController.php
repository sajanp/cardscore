<?php

class GameAdjustmentController extends \BaseController {


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($gameId)
	{
		$game = Game::findOrFail($gameId);

		return View::make('game.adjustment.create', compact('game'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($gameId)
	{
		$game = Game::findOrFail($gameId);
		$adjustment = new Adjustment;
		$input = Input::all();

		if ($input['adjustmentType'] == 0)
		{
			$adjustment->amount = $input['amount'] * -1;
		}
		else
		{
			$adjustment->amount = $input['amount'];
		}

		$adjustment->player_id = $input['player_id'];
		$adjustment->note = $input['note'];
		$game->adjustments()->save($adjustment);

		return Redirect::route('game.show', $game->id)->withSuccessMessage('Adjusted ' . $adjustment->player->name . ' by ' . $adjustment->amount);
	}

}
