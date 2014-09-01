@extends('layouts.master')

@section('body')
	<div class="text-center">
		<div class="btn-group">
			<a href="#" class="btn btn-success">Contine Game In Progress</a>
			{{HTML::linkRoute('game.create', 'New Game', null, ['class' => 'btn btn-primary'])}}
		</div>
	</div>
@stop