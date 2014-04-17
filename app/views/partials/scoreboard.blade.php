<h2>Scoreboard</h2>
<?php

foreach ($game->players->all() as $player) {
	$scores[$player->name] = $player->scores()->where('game_id', $game->id)->sum('amount');
}

arsort($scores);
?>
<ul>
	@foreach($scores as $player => $score)
		<li>
			{{$player}} - {{$score}}
		</li>
	@endforeach
</ul>