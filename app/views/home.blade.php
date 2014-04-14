@extends('layouts.master')

@section('body')
	<h1>Rook Scoring System <small>by Sajan Parikh</small></h1>
	<p class="lead">I was told to make this a long time ago.  I finally got it.  If it works, awesome.  If not, let me know and I'll fix it.  If you don't want to use it, that's fine too.  It was fun making it.</p>

	<p>{{HTML::linkRoute('game.create', 'Start New Game', null, ['class' => 'btn btn-primary btn-lg btn-block'])}}</p>
@stop