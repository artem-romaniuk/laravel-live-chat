container_php = php-fpm
container_mysql = mysql
container_nginx = nginx

build:
	@docker-compose build

start: #start docker containers @docker-compose up -d
	@docker-compose up -d
	@cd www && sudo chown -R www-data storage bootstrap
	@docker-compose exec $(container_php) composer install --ignore-platform-reqs

migrate:
	@docker-compose exec $(container_php) php artisan migrate

queue:
	@docker-compose exec $(container_php) php artisan queue:work

server:
	@docker-compose exec $(container_php) laravel-echo-server start

stop: #stop docker containers
	@docker-compose down

status: #show docker's containers
	@sudo docker ps

connect_php: #Connect to APP container
	@docker-compose exec $(container_php) bash

connect_mysql: #Connect to DB container
	@docker-compose exec $(container_mysql) bash

connect_nginx: #Connect to container_server container
	@docker-compose exec $(container_nginx) /bin/sh
