@servers(['production' => "lemp4.noppix.net"])

@task('deploy', ['on' => 'production'])
	export APP_ENV=production
	cd cardscore.in
	git pull
	php artisan migrate
@endtask