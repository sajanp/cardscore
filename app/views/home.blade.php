@extends('layouts.master')

@section('body')
	<h1>Rook Scoring System <small>by Sajan Parikh</small></h1>
	<p class="lead">I was told to make this a long time ago.  I finally spent a Sunday night and got it done.  If it works, awesome.  If not, let me know and I'll fix it.  If it's not worth using it, that's fine too;  It was fun making it all the same.</p>

	<p>If you decide you do, indeed, want to use this; Let me know and I'll clean things up and add a couple features like editing and deleting hands.</p>

	<p>{{HTML::linkRoute('game.create', 'Start New Game', null, ['class' => 'btn btn-primary btn-lg btn-block'])}}</p>
@stop