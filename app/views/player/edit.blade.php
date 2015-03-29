@extends('layouts.master')

@section('body')
	<h1>Editing {{$player->name}}</h1>

	{{Form::model($player, ['method' => 'PATCH', 'route' => ['player.update', $player->id]])}}
		<div class="form-group">
			{{Form::label('name', 'Full Name')}}
			{{Form::text('name', null, ['class' => 'form-control input-lg'])}}
			<span class="help-block">Please enter first and last name.</span>
		</div>

		<div class="form-group">
			<div class="checkbox">
				<label for="active">
					{{Form::checkbox('active', 1, null)}}
					Active Player
				</label>
			</div>
		</div>
		
		<div class="form-group">
			{{Form::submit('Update Player', ['class' => 'btn btn-success btn-lg'])}}
		</div>

		@if($player->games->count() == 0)
			{{Form::open(['method' => 'delete', 'route' => ['player.destroy', $player->id]])}}
				<div class="form-group">
					{{Form::submit('Delete Player', ['class' => 'btn btn-danger btn-xs pull-right'])}}
				</div>
			{{Form::close()}}
		@endif


		@foreach($errors->all() as $error)
			<p class="alert alert-danger">{{$error}}</p>
		@endforeach
	{{Form::close()}}
@stop