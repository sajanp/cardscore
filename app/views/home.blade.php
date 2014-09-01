@extends('layouts.master')

@section('body')
	<p>{{HTML::linkRoute('game.create', 'New Game', null, ['class' => 'btn btn-primary'])}}</p>
@stop