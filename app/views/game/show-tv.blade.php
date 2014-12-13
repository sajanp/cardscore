<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Bootstrap 101 Template</title>

		<!-- Bootstrap -->
		<link href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.0/lumen/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<style type="text/css">
		body {font-size: 24px}
		</style>
	</head>
	<body>
		<div class="container">
			<h1>Scoreboard</h1>

			<div class="row">
				<div class="col-md-8">
					<h2>Deal History</h2>
						<?php $i = $game->deals()->count(); ?>
						@foreach($game->deals()->orderBy('created_at', 'desc')->get() as $deal)
							<div class="row">
								<div class="col-md-2 col-xs-2">
									<img src="{{asset('img/profiles/' . $deal->scores()->where('caller', true)->first()->player->id . '.jpg')}}" alt="profile" class="img-responsive img-rounded" style="margin:5px">
								</div>
								<div class="col-md-10 col-xs-10">
									<h3>{{$deal->scores()->where('caller', true)->first()->player->name}}</h3>
									<span class="label {{$deal->acheived ? 'label-success' : 'label-danger'}}">{{$deal->trump->name}} - {{$deal->high ? 'High' : 'Low'}} - {{$deal->point_value}}</span>
									<p>
										@foreach($deal->scores()->where('partner', true)->get() as $partner)
											<span class="label label-default">{{$partner->player->name}}</span>
										@endforeach
									</p>
									<small style="color:grey"><i>{{$deal->created_at->format('h:i A')}} - Deal #{{$i}}</i></small>
									@if($deal->created_at->gt(\Carbon\Carbon::now()->subMinutes(2)))
										{{Form::open(['method' => 'delete', 'route' => ['game.deal.destroy', $game->id, $deal->id]])}}
											{{Form::submit('Delete', ['class' => 'btn btn-danger btn-xs pull-right'])}}
										{{Form::close()}}
									@endif
								</div>
							</div>
							<hr>
							<?php $i--; ?>
						@endforeach
				</div>
				<div class="col-md-4">
					@include('partials.scoreboard')
				</div>
			</div>
		</div>		

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

		<script>
		$('form').submit(function() {
			var c = confirm("Click OK To Confirm Deleting That Deal.");
			return c;
		});

		setTimeout(function(){
			location = ''
		}, 10000);
	</script>
	</body>
</html>