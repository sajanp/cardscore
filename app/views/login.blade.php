@extends('layouts.master')

@section('body')

	<p class="alert alert-info">Player stats are now available from the players page.</p>

	<h1>Login</h1>
	<p>Please login below to continue.</p>

	{{Form::open(['route' => 'session.store', 'class' => 'form-inline'])}}
		<div class="form-group">
			{{Form::label('username', 'Username', ['class' => 'sr-only'])}}
			{{Form::text('username', 'rook', ['class' => 'form-control input-lg', 'placeholder' => 'Username'])}}
		</div>
		<div class="form-group">
			{{Form::label('password', 'Password', ['class' => 'sr-only'])}}
			{{Form::password('password', ['class' => 'form-control input-lg', 'placeholder' => 'Password'])}}
		</div>
		<div class="form-group">
			{{Form::submit('Login', ['class' => 'btn btn-lg btn-success'])}}
		</div>
	{{Form::close()}}
@stop
