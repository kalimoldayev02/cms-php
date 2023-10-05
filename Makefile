PHP_FPM_IMAGE = app

up:
	docker-compose up -d

down:
	docker-compose down

init:
	docker exec -it $(PHP_FPM_IMAGE) composer install

dump-autoload:
	docker exec -it $(PHP_FPM_IMAGE) composer dump-autoload -o