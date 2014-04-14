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
			{{Form::submit('Add Player', ['class' => 'btn btn-success btn-lg'])}}
		</div>


		@foreach($errors->all() as $error)
			<p class="alert alert-danger">{{$error}}</p>
		@endforeach
	{{Form::close()}}
@stop