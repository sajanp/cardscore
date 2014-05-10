@extends('layouts.master')

@section('body')
	<h1>Rook Scoring System <small>by Sajan Parikh</small></h1>

	<h2>Global Stats</h2>
	<p class="lead">Let's be honest, it's never <i>just</i> a game.</p>

	<h3>Trump Stats</h3>

	<div class="row">
		<div class="col-md-2">
			<h4>Hands Per Trump</h4>
			<table class="table table-condensed">
				<thead>
					<tr>
						<th>Trump</th>
						<th># of Hands</th>
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
@stop