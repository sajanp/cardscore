@extends('layouts.master')

@section('body')
	<h1>Rook Scoring System <small>by Sajan Parikh</small></h1>
	<h2>Changelog</h2>
	<p class="lead">I'll note a list of changes I make here.  Both as record for myself, and in case you guys are curious.  If anyone of you are <i>really</i> curious, you can find my actual code and technical changelog <a href="http://git.sajan.io/sajan/cardscore-in/commits/master" target="_blank">here</a>.</p>

	<ul>
		<li>Change delete button visibility from 5 minutes to 2 minutes.</li>
		<li>Fixed calculation error of 'high scorer(s)' on the game list page.</li>
	</ul>
@stop