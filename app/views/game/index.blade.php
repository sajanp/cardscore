@extends('layouts.master')

@section('body')
	<h1>Game History {{HTML::linkRoute('game.create', 'Start New', null, ['class' => 'btn btn-lg pull-right btn-primary'])}}</h1>
	<p class="lead">Below is a history of all your games.</p>
	<table class="table table-hover table-bordered">
		<thead>
			<tr>
				<th>Started</th>
				<th>Player Count</th>
				<th>Deal Count</th>
				<th>High Scorer</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($games as $game)
			<?php

				foreach ($game->players->all() as $player) {
					$scores[$player->name] = $player->scores()->where('game_id', $game->id)->sum('amount');
				}

				arsort($scores);

				$highScore = reset($scores);

				$winners = array_keys($scores, $highScore);
			?>
				<tr>
					<td>{{$game->created_at->toDayDateTimeString()}}</td>
					<td>{{$game->players->count()}}</td>
					<td>{{$game->deals->count()}}</td>
					<td>
						@foreach($winners as $winner)
							{{$winner}} <br>
						@endforeach
					</td>
					<td>
						{{HTML::linkRoute('game.show', 'View Game', $game->id, ['class' => 'btn btn-xs btn-primary'])}}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop