@extends('layouts.master')

@section('body')
	<h1>Player Pool</h1>

	<table class="table table-hover">
		<thead>
			<tr>
				<th>Name</th>
				<th>Date Added</th>
				<th>Edit</th>
			</tr>
		</thead>
		<tbody>
			@foreach($players as $player)
				<tr>
					<td>{{$player->name}}</td>
					<td>{{$player->created_at}}</td>
					<td>{{HTML::linkRoute('player.edit', 'Edit', $player->id, ['class' => 'btn btn-xs btn-warning'])}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop