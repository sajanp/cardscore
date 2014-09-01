@extends('layouts.master')

@section('body')
	<h1>Game History {{HTML::linkRoute('game.create', 'Start New', null, ['class' => 'btn pull-right btn-primary hidden-xs hidden-sm'])}}</h1>
	<p class="lead">Below is a history of all your games.</p>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Started</th>
					<th>Player Count</th>
					<th>Deal Count</th>
					<th>High Scorer</th>
				</tr>
			</thead>
			<tbody>
				@foreach($games as $game)
				<?php

					foreach ($game->players->all() as $player) {
						$scores[$player->name] = $player->scores()->where('game_id', $game->id)->sum('amount');
					}

					arsort($scores);

					$highscore = head($scores);

					$winners = array_where($scores, function($key, $value) use ($highscore)
					{
						if ($value == $highscore)
						{
							return true;
						}

						return false;
					});
				?>
					<tr>
						<td>{{HTML::linkRoute('game.show', $game->created_at->toDayDateTimeString(), $game->id)}}</td>
						<td>{{$game->players->count()}}</td>
						<td>{{$game->deals->count()}}</td>
						<td>
							@foreach($winners as $name => $score)
								{{$name}} <br>
							@endforeach
						</td>
					</tr>

					<?php unset($scores); ?>
					<?php unset($winners); ?>
				@endforeach
			</tbody>
		</table>
	</div>
@stop