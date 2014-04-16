@extends('layouts.master')

@section('body')
	<h1>Game History {{HTML::linkRoute('game.create', 'Start New', null, ['class' => 'btn btn-lg pull-right btn-primary'])}}</h1>
	<p class="lead">Below is a history of all your games.</p>
	<table class="table table-hover table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Player Count</th>
				<th>Deal Count</th>
				<th>Started</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($games as $game)
				<tr>
					<td>{{$game->id}}</td>
					<td>{{$game->players->count()}}</td>
					<td>{{$game->deals->count()}}</td>
					<td>{{$game->created_at}}</td>
					<td>
						{{HTML::linkRoute('game.show', 'View Game', $game->id, ['class' => 'btn btn-xs btn-primary'])}}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop