@extends('layouts.master')

@section('body')
	<h1>Game History</h1>

	<table class="table table-hover table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Player Count</th>
				<th>Started</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($games as $game)
				<tr>
					<td>{{$game->id}}</td>
					<td>{{$game->players->count()}}</td>
					<td>{{$game->created_at}}</td>
					<td>{{HTML::linkRoute('game.deal.create', 'New Deal', $game->id, ['class' => 'btn btn-xs btn-primary'])}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop