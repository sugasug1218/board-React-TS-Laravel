NAME=name
VERSION=1.0

init:
	docker-compose build && \
	docker-compose up -d && \
	docker-compose exec server bash -c "systemctl start nginx && systemctl enable nginx" && \
	docker-compose exec php bash -c "composer install && cp .env.local .env && php artisan migrate"

start:
	docker-compose start  && \
    docker-compose exec server bash -c "systemctl start nginx && systemctl enable nginx"

up:
	docker-compose up -d && \
    docker-compose exec server bash -c "systemctl start nginx && systemctl enable nginx"

restart:
	docker-compose restart

stop:
	docker-compose stop

down:
	docker-compose down

logs:
	docker-compose logs

ps:
	docker-compose ps

login-php:
	docker-compose exec php bash

login-mysql:
	docker-compose exec mysql bash -c "mysql -u user -p"

login-server:
	docker-compose exec server bash
