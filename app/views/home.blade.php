@extends('layouts.master')

@section('body')
	<h1>Rook Scoring System <small>by Sajan Parikh</small></h1>
	<p class="lead">I was told to make this a long time ago.  I finally spent a Sunday night and got it done.  If it works, awesome.  If not, let me know and I'll fix it.  If it's not worth using it, that's fine too;  It was fun making it all the same.</p>

	<p>{{HTML::linkRoute('game.create', 'Start New Game', null, ['class' => 'btn btn-primary btn-lg btn-block'])}}</p>

<pre>
	
<?php
$game = Game::find(2);

foreach($game->players as $player)
{
	print_r($player->deals()->wherePivot('player_id', $player->id)->where('game_id', $game->id)->get());
}
?>
</pre>
@stop