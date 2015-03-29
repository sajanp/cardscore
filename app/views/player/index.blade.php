@extends('layouts.master')

@section('body')
	<h1>Player Pool {{HTML::linkRoute('player.create', 'Add New', null, ['class' => 'btn btn-primary pull-right'])}}</h1>

	<table class="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Games Played</th>
			</tr>
		</thead>
		<tbody>
			@foreach($players as $player)
				<tr>
					<td>
						{{HTML::linkRoute('player.show', $player->name, $player->id)}} 
						@if(!$player->active)
							<span class="label label-danger">Disabled</span>
						@endif
					</td>
					<td>{{$player->games->count()}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop
