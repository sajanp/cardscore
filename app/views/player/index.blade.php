@extends('layouts.master')

@section('body')
	<h1>Player Pool {{HTML::linkRoute('player.create', 'Add New', null, ['class' => 'btn btn-primary pull-right'])}}</h1>

	<table class="table table-hover">
		<thead>
			<tr>
				<th>Name</th>
				<th>Date Added</th>
			</tr>
		</thead>
		<tbody>
			@foreach($players as $player)
				<tr>
					<td>{{$player->name}}</td>
					<td>{{$player->created_at}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop