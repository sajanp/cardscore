<!DOCTYPE html>
<html lang="en-us">
	<head>
		<title>Rook Scoring System</title>
		<meta charset="UTF-8">
		<meta name=description content="">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap CSS -->
		<link href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/readable/bootstrap.min.css" rel="stylesheet" media="screen">
	</head>
	<body>
		<div class="container">
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					{{HTML::linkRoute('home', 'Rook Scoring System', null, ['class' => 'navbar-brand'])}}
				</div>
			
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Players <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li>{{HTML::linkRoute('player.index', 'List All')}}</li>
								<li>{{HTML::linkRoute('player.create', 'Add New')}}</li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Games <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li>{{HTML::linkRoute('game.create', 'Start New')}}</li>
								<li>{{HTML::linkRoute('game.index', 'History')}}</li>
							</ul>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</nav>
			@include('partials.alerts')
			@yield('body')
		</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	</body>
</html>

