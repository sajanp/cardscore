@extends('layouts.master')

@section('body')
	<h1>Rook Scoring System <small>by Sajan Parikh</small></h1>

	<h2>Global Stats</h2>
	<p class="lead">Let's be honest, it's never <i>just</i> a game.</p>
	
	<h3>Totals and Aggregates</h3>

	<div class="row">
		<div class="col-md-3">
			<table class="table table-condensed">
				<tbody>
					<tr>
						<td>Total Games Played</td>
						<td>{{Game::count()}}</td>
					</tr>
					<tr>
						<td>Total Deals</td>
						<td>{{Deal::count()}}</td>
					</tr>
					<tr>
						<td>Avg Deals Per Game</td>
						<td>{{number_format(Deal::count() / Game::count())}}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-md-3">
			<table class="table table-condensed">
				<tbody>
					<tr>
						<td>Avg Points Called</td>
						<td>{{number_format(Deal::avg('point_value'))}}</td>
					</tr>
					<tr>
						<td>Highest Points Called</td>
						<td>{{Deal::max('point_value')}} - {{Deal::where('point_value', Deal::max('point_value'))->count()}} times.</td>
					</tr>
					<tr>
						<td>Lowest Points Called</td>
						<td>{{Deal::min('point_value')}} - {{Deal::where('point_value', Deal::min('point_value'))->count()}} times.</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-md-3">
			<table class="table table-condensed">
				<tbody>
					<tr>
						<td>Total Points Awarded</td>
						<td>{{Score::sum('amount')}}</td>
					</tr>
					<tr>
						<td>Total Points To Callers</td>
						<td>{{Score::where('caller', true)->sum('amount')}}</td>
					</tr>
					<tr>
						<td>Total Points To Partners</td>
						<td>{{Score::where('partner', true)->sum('amount')}}</td>
					</tr>
					<tr>
						<td>Total Points To Opposition</td>
						<td>{{Score::where('partner', false)->where('caller', false)->sum('amount')}}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-md-3">
			<table class="table table-condensed">
				<tbody>
					<tr>
						<td>Deals Won By Caller</td>
						<td>{{Deal::where('acheived', true)->count()}} - {{number_format(Deal::where('acheived', true)->count() / Deal::count() * 100)}}%</td>
					</tr>
					<tr>
						<td>Deals Won By Opposition</td>
						<td>{{Deal::where('acheived', false)->count()}} - {{number_format(Deal::where('acheived', false)->count() / Deal::count() * 100)}}%</td>
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
						<td>{{Deal::where('trump_id', $trump->id)->count()}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>

		<div class="col-md-3">
			<h4>Caller Wins Per Trump</h4>
			<table class="table table-condensed">
				<thead>
					<tr>
						<th>Trump</th>
						<th>Caller Win %</th>
					</tr>
				</thead>
				<tbody>
					@foreach(Trump::all() as $trump)
					<tr>
						<td>{{$trump->name}}</td>
						<td>
							@if(Deal::where('trump_id', $trump->id)->count())
								{{number_format(Deal::where('trump_id', $trump->id)->where('acheived', true)->count() / Deal::where('trump_id', $trump->id)->count() * 100, 2)}}%
							@else
								N/A
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>

		<div class="col-md-3">
			<h4>Non-Caller Wins Per Trump</h4>
			<table class="table table-condensed">
				<thead>
					<tr>
						<th>Trump</th>
						<th>Non-Caller Win %</th>
					</tr>
				</thead>
				<tbody>
					@foreach(Trump::all() as $trump)
					<tr>
						<td>{{$trump->name}}</td>
						<td>
							@if(Deal::where('trump_id', $trump->id)->count())
								{{number_format(Deal::where('trump_id', $trump->id)->where('acheived', false)->count() / Deal::where('trump_id', $trump->id)->count() * 100, 2)}}%
							@else
								N/A
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<h3>Player Stats</h3>

	<div class="row">
		<div class="col-md-3">
			<h4>All Time Points</h4>

			<?php

			foreach (Player::all() as $player) {
				$scores[$player->name] = $player->scores()->sum('amount');
			}

			arsort($scores);
			?>

			<table class="table table-condensed">
				<tbody>
					@foreach($scores as $player => $score)
						<tr>
							<td>{{$player}}</td>
							<td>{{$score}}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop