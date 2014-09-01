@extends('layouts.master')

@section('body')
	<h1>Player Pool {{HTML::linkRoute('player.create', 'Add New', null, ['class' => 'btn btn-primary pull-right'])}}</h1>

	<table class="table">
		<thead>
			<tr>
				<th>Name</th>
			</tr>
		</thead>
		<tbody>
			@foreach($players as $player)
				<tr>
					<td>{{$player->name}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop