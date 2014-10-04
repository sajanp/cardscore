@extends('layouts.master')

@section('body')
	<h2>Global Stats</h2>

	<h3>Totals and Aggregates</h3>

	<div class="row">
		<div class="col-md-3">
			<table class="table table-condensed">
				<tbody>
					<tr>
						<td>Total Games Played</td>
						<td>{{number_format(Game::count())}}</td>
					</tr>
					<tr>
						<td>Total Deals</td>
						<td>{{number_format(Deal::count())}}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-md-3">
			<table class="table table-condensed">
				<tbody>
					<tr>
						<td>Deals Won By Caller</td>
						<td>{{number_format(Deal::where('acheived', true)->count())}} - {{number_format(Deal::where('acheived', true)->count() / Deal::count() * 100)}}%</td>
					</tr>
					<tr>
						<td>Deals Won By Opposition</td>
						<td>{{number_format(Deal::where('acheived', false)->count())}} - {{number_format(Deal::where('acheived', false)->count() / Deal::count() * 100)}}%</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<hr>

	<h3>Trump Stats</h3>

	<div class="row">
		<div class="col-md-2">
			<h4>Deals Per Trump</h4>
			<table class="table table-condensed">
				<thead>
					<tr>
						<th>Trump</th>
						<th># of Deals</th>
					</tr>
				</thead>
				<tbody>
					@foreach(Trump::all() as $trump)
					<tr>
						<td>{{$trump->name}}</td>
						<td>{{number_format(Deal::where('trump_id', $trump->id)->count())}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<hr>

	<h3>Player Stats</h3>

	<div class="row">
		<div class="col-md-5">
			<h4>All Time Points</h4>

			<?php

			foreach (Player::all() as $player)
			{
				if ($player->scores->count())
				{
					$scores[$player->id]['name'] = $player->name;
					$scores[$player->id]['score'] = $player->scores()->sum('amount');
					$scores[$player->id]['games'] = $player->games()->count();
				}
			}

			function cmp($a, $b) {
				if ($a['score'] == $b['score'])
				{
					return 0;
				}

				return ($a['score'] > $b['score']) ? -1 : 1;
			}

			uasort($scores, 'cmp');
			?>

			<table class="table table-condensed">
				<tbody>
					@foreach($scores as $score)
						<tr>
							<td>{{$score['name']}}</td>
							<td>{{number_format($score['score'])}} - {{$score['games']}} Games</td>
						</tr>
					@endforeach
				</tbody>
			</table>

			<?php unset($scores); ?>
		</div>

		<div class="col-md-3">
			<h4>Deals Called</h4>

			<?php

				foreach (Player::all() as $player)
				{
					if (Score::where('caller', true)->where('player_id', $player->id)->count())
					{
						$deals[$player->name] = Score::where('caller', true)->where('player_id', $player->id)->count();
					}

				}

				if (isset($deals))
				{
					arsort($deals);
				}
				else
				{
					$deals = array();
				}

			?>

			<table class="table table-condensed">
				<tbody>
					@foreach($deals as $player => $deals)
						<tr>
							<td>{{$player}}</td>
							<td>{{number_format($deals)}}</td>
						</tr>
					@endforeach
				</tbody>
			</table>

			<?php unset($deals); ?>
		</div>
	</div>
@stop
