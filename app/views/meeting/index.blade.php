@extends('layouts.master')

@section('body')
	<h1>Meeting History</h1>

	<table class="table table-hover table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Player Count</th>
				<th>Started</th>
			</tr>
		</thead>
		<tbody>
			@foreach($meetings as $meeting)
				<tr>
					<td>{{$meeting->id}}</td>
					<td>{{$meeting->players->count()}}</td>
					<td>{{$meeting->created_at}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop