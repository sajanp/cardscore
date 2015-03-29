@extends('layouts.master')

@section('body')
	<h1>Player Pool {{HTML::linkRoute('player.create', 'Add New', null, ['class' => 'btn btn-primary pull-right'])}}</h1>

	<table class="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Active</th>
			</tr>
		</thead>
		<tbody>
			@foreach($players as $player)
				<tr>
					<td>{{HTML::linkRoute('player.show', $player->name, $player->id)}}</td>
					<td>
						@if($player->active)
							<span class="label label-success">Active</span>
						@else
							<span class="label label-danger">Disabled</span>
						@endif
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop
