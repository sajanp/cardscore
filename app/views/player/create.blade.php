@extends('layouts.master')

@section('body')
	<h1>Add New Player</h1>

	<div class="alert alert-warning">
	    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	    <strong>WARNING!!!</strong> Make sure the player has not already been added, maybe you disabled the player a long time ago.
	</div>

	{{Form::open(['route' => 'player.store'])}}
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